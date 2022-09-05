import psutil
import sys, os

MY_PID = os.getpid()
IGNORE_PROCESSES = ["cmd.exe"]


def get_running_processes(procCMD):
    lst = []
    for i in psutil.process_iter():
        try:
            if procCMD.lower() in ' '.join(i.cmdline()).lower() and i.pid != MY_PID and i.name() not in IGNORE_PROCESSES:
                lst.append(i)
        except psutil.AccessDenied:
            pass
    return lst

def kill_process(procCMD):
    processes = get_running_processes(procCMD)

    for proc in processes:
        print('Killing', proc)
        proc.terminate()


if __name__ == "__main__":
    if sys.argv[1] == "check":
        if bool(get_running_processes(sys.argv[2])):
            print("started")
        else:
            print("stopped")
    elif sys.argv[1] == "stop":
        kill_process(sys.argv[2])