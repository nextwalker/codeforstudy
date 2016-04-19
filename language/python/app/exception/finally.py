try:
    f = open('1.txt')
    line = f.read(2)
    num = int(line)
    print "read num = %d" % num
except IOError, e:
    print "catch IOError:", e
finally:
    print "file close"
    f.close
