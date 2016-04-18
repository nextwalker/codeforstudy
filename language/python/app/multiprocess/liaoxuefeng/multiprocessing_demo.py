from multiprocessing import Process
import os
import time

# process 
def run_proc(name):
    print 'Run child process %s (%s)...' % (name, os.getpid())
    time.sleep(2)
    print "sleep, sleep"

if __name__=='__main__':
    print 'Parent process %s.' % os.getpid()
    p = Process(target=run_proc, args=('test',))
    print 'Process will start.'
    p.start()
    print "Process will join"
    p.join()
    print 'Process end.'
