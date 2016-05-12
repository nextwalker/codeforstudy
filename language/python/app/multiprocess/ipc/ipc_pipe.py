# Multiprocessing with Pipe

import multiprocessing as mul

def proc1(pipe):
    for i in range(0, 10):
        pipe.send('proc1 say hello')
        print('proc1 rec:',pipe.recv())

def proc2(pipe):
    for i in range(0, 10):
        print('proc2 rec:',pipe.recv())
        pipe.send('proc2 say hello, too %d' % i)

# Build a pipe
pipe = mul.Pipe()

# Pass an end of the pipe to process 1
p1   = mul.Process(target=proc1, args=(pipe[0],))
# Pass the other end of the pipe to process 2
p2   = mul.Process(target=proc2, args=(pipe[1],))
p1.start()
p2.start()
p1.join()
p2.join()
