class CustomError(Exception):

    def __init__(self, info):
        Exception.__init__(self)
        self.errorinfo = info
        print id(self)

    def __str__(self):
        return "CustomError: %s" % self.errorinfo

try:
    raise CustomError("test CustomError")
except CustomError, e:
    print "ErrorInfo: %d,%s" %(id(e), e)
