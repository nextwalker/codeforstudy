# coding=utf-8

DEFAULT_KEY = "\x59\xf3\x02\xc3\x25\x9a\x82\x30\x0b\xbb\x25\x7f\x7e\x3b\xd2\xdc"

def rc4(data, key=DEFAULT_KEY, skip=1024):
    '''
    >>> rc4("123")
    'p\\x05k'
    >>> rc4("p\x05k")
    '123'
    >>> rc4("p\x05k", skip=1023)
    '\\x8bD\\\\'
    '''
    x = 0
    box = range(256)
    for i in range(256):
        x = (x + box[i] + ord(key[i % len(key)])) % 256
        box[i], box[x] = box[x], box[i]
    x = 0
    y = 0
    out = []
    if skip > 0:
        for i in range(skip):
            x = (x + 1) % 256
            y = (y + box[x]) % 256
            box[x], box[y] = box[y], box[x]
    #s = ""
    #for i in range(256):
    #    s += str(box[i]) + " "
    #print s
    for char in data:
        x = (x + 1) % 256
        y = (y + box[x]) % 256
        box[x], box[y] = box[y], box[x]
        out.append(chr(ord(char) ^ box[(box[x] + box[y]) % 256]))

    return ''.join(out)

if __name__ == '__main__':
    # handle input file or stream
    import sys

    if len(sys.argv) > 3:
        if sys.argv[1] == "en":
            print rc4(sys.argv[3], sys.argv[2], 0)
        if sys.argv[1] == "de":
            print rc4(sys.argv[3], sys.argv[2], 0)
    else:
        raw = "梯子网@91waijiao";
        key = "\x31\x32\x33\x34\x35\x36\x37\x38";
        encrypt_data = rc4(raw, key, 0)
        decrypt_data = rc4(encrypt_data, key, 0)
        print "key : ", key
        print "raw : ", raw
        print "encrypt  : ", encrypt_data
        print "decrypt  : ", decrypt_data

