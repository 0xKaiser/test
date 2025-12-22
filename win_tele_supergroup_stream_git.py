import time
import subprocess
import threading
import asyncio
import platform

from telegram import Update
from telegram.ext import (
    ApplicationBuilder,
    CommandHandler,
    ContextTypes,
)

assert platform.system().lower() == "windows"

# ================= CONFIG =================

BOT_TOKEN = "BOT_TOKEN"

ADMIN_ID = ""              # Telegram user ID của bạn
ALLOWED_CHAT_ID = -100+  # ID supergroup (bắt buộc)
ALLOWED_TOPIC_ID = 3             # None = cho phép toàn group

STREAM_LINES = 30 # send when 30 lines ouput
STREAM_INTERVAL = 60 #send message every 60 second

BLACKLIST = [
    "format ",
    "diskpart",
    "shutdown",
    "reboot",
    "rm ",
]

RUNNING = {}

# ================= UTILS =================

def allowed(update: Update) -> bool:
    if update.effective_user.id != ADMIN_ID:
        return False
    if update.effective_chat.id != ALLOWED_CHAT_ID:
        return False
    if ALLOWED_TOPIC_ID is not None:
        if update.message.message_thread_id != ALLOWED_TOPIC_ID:
            return False
    return True

def blocked(cmd: str) -> bool:
    cmd = cmd.lower()
    return any(b in cmd for b in BLACKLIST)

def tg_send(app, chat_id, text, thread_id):
    loop = app.bot_data["loop"]
    asyncio.run_coroutine_threadsafe(
        app.bot.send_message(
            chat_id=chat_id,
            text=text,
            message_thread_id=thread_id
        ),
        loop
    )

# ================= STREAM =================

def stream_output(job_id, app):
    job = RUNNING[job_id]
    proc = job["proc"]

    for line in proc.stdout:
        job["buf"].append(line.rstrip())
        now = time.time()

        if len(job["buf"]) >= STREAM_LINES or now - job["last"] >= STREAM_INTERVAL:
            tg_send(
                app,
                job["chat"],
                f"📡 JOB {job_id}\n" + "\n".join(job["buf"][-20:]),
                job["thread"]
            )
            job["buf"].clear()
            job["last"] = now

    if job["buf"]:
        tg_send(
            app,
            job["chat"],
            f"📡 JOB {job_id}\n" + "\n".join(job["buf"]),
            job["thread"]
        )

    tg_send(app, job["chat"], f"✅ JOB {job_id} finished", job["thread"])
    RUNNING.pop(job_id, None)

# ================= PROCESS =================

def start_job(raw_cmd, update, app):
    job_id = int(time.time())

    proc = subprocess.Popen(
        ["cmd.exe", "/c", raw_cmd],
        stdout=subprocess.PIPE,
        stderr=subprocess.STDOUT,
        text=True,
        bufsize=1,
        creationflags=subprocess.CREATE_NEW_PROCESS_GROUP
    )

    RUNNING[job_id] = {
        "proc": proc,
        "buf": [],
        "last": time.time(),
        "chat": update.effective_chat.id,
        "thread": update.message.message_thread_id,
    }

    threading.Thread(
        target=stream_output,
        args=(job_id, app),
        daemon=True
    ).start()

    return job_id, proc.pid

def kill_job(job_id):
    job = RUNNING.get(job_id)
    if not job:
        return False
    subprocess.run(
        ["taskkill", "/F", "/T", "/PID", str(job["proc"].pid)],
        stdout=subprocess.DEVNULL,
        stderr=subprocess.DEVNULL
    )
    return True

# ================= HANDLERS =================

async def run_cmd(update: Update, context: ContextTypes.DEFAULT_TYPE):
    if not allowed(update):
        return

    cmd = " ".join(context.args)
    if not cmd:
        await update.message.reply_text("/run <command>")
        return

    if blocked(cmd):
        await update.message.reply_text("❌ Blocked command")
        return

    job_id, pid = start_job(cmd, update, context.application)
    await update.message.reply_text(
        f"▶️ STARTED\nJOB: {job_id}\nPID: {pid}\nCMD: {cmd}"
    )

async def stop_cmd(update: Update, context: ContextTypes.DEFAULT_TYPE):
    if not allowed(update):
        return

    if not context.args:
        await update.message.reply_text("/stop <job_id>")
        return

    job_id = int(context.args[0])
    if kill_job(job_id):
        await update.message.reply_text(f"🛑 Job {job_id} killed")
    else:
        await update.message.reply_text("❌ Job not found")

async def jobs_cmd(update: Update, context: ContextTypes.DEFAULT_TYPE):
    if not allowed(update):
        return

    if not RUNNING:
        await update.message.reply_text("No running jobs")
        return

    msg = []
    for jid, j in RUNNING.items():
        msg.append(f"ID {jid} | PID {j['proc'].pid}")
    await update.message.reply_text("\n".join(msg))

# ================= MAIN =================

async def post_init(app):
    app.bot_data["loop"] = asyncio.get_running_loop()

def main():
    app = (
        ApplicationBuilder()
        .token(BOT_TOKEN)
        .post_init(post_init)
        .build()
    )

    app.add_handler(CommandHandler("run", run_cmd))
    app.add_handler(CommandHandler("stop", stop_cmd))
    app.add_handler(CommandHandler("jobs", jobs_cmd))

    print("[+] Telegram bot started (Windows / Group / Topic / FIXED)")
    app.run_polling()

if __name__ == "__main__":
    main()
