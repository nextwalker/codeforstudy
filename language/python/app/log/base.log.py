# -*- coding:utf8 -*-

#Logging to a file
import os
import logging
FILE = os.getcwd()
logging.basicConfig(filename=os.path.join(FILE,'log.txt'),level=logging.DEBUG)
logging.debug('写进去')
logging.info('滚进去')
logging.warning('也滚进去')
