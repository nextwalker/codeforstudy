class MyContext(object):
    def __init__(self, name):
        self.name = name
    
    def __enter__(self):
        print "__enter__"
        return self

    def do_self(self):
        print "do self"
        print a

    def __exit__(self, exc_type, exc_value, traceback):
        print "__exit__"
        print "Error:", exc_type, " info:", exc_value

if __name__ == "__main__":
    with MyContext('test comtext') as f:
        print f.name
        f.do_self()
