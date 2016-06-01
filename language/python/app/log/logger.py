#_*_ coding: UTF-8 _*_

import logging

# 创建一个logger
logger = logging.getLogger('mylogger')
logger.setLevel(logging.DEBUG)

print logging.getLevelName(logging.DEBUG)

# 创建一个handler，用于写入日志文件
fh = logging.FileHandler('test.log')
fh.setLevel(logging.DEBUG)

# 再创建一个handler，用于输出到控制台
ch = logging.StreamHandler()
ch.setLevel(logging.DEBUG)

# 定义handler的输出格式
formatter = logging.Formatter("%(asctime)s\t%(name)s\t%(levelname)s\t%(message)s")
fh.setFormatter(formatter)
ch.setFormatter(formatter)

# 给logger添加handler
logger.addHandler(fh)
logger.addHandler(ch)



# 记录一条日志
logger.info('foorbar')

logger.warning('name:%s - msg:%s','BeginMan','Hi')               #方式一
logger.warning('name:%s - msg:%s' %('BeginMan','Hi'))            #方式二
logger.warning('name:{0} - msg:{1}'.format('BeginMan','Hi'))     #方式三
from string import Template                                     #方式四
msg = Template('name:$who - msg:$what')
logger.warning(msg.substitute(who='BeginMan',what='Hi'))

logger.debug("ddddd")

