#!/usr/bin/env python
from ConfigParser import ConfigParser
CONFIGFILE="demo.conf"
config=ConfigParser()
config.read(CONFIGFILE)
print config.get('messages','greeting')
radius=input(config.get('messages','questions')+' ')
print config.get('messages','result')
print config.getfloat('numbers','pi')*radius**2

s=config.sections()
print'section: ',s
o=config.options('messages')
print'messages option: ',o
v=config.items("messages")
print'message de xinxi: ',v

config.add_section('liuyang1')
config.set('liuyang1','int','15')
config.set('liuyang'1,'hhhh','hello world')
config.write(open("f.txt","w"))
print config.get('liuyang1','int')
print config.get('liuyang1','hhhh')





#!/usr/bin/env python
import ConfigParser
import sys
config=ConfigParser.ConfigParser()
config.add_section("book1")
config.set("book1","title","hello world")
config.set("book1","aut","log")
config.write(open("f.txt","w"))
