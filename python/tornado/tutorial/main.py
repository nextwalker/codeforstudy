# coding=utf8

import tornado.ioloop
import tornado.web
from tornado.web import RequestHandler

class MainHandler(tornado.web.RequestHandler):
    def get(self):
        self.write("Welcome to tornado, and this is main page!")
        ## self.write(self.request) 报错
        ## AssertionError: Expected bytes, unicode, or None; got <class 'tornado.httpserver.HTTPRequest'>

class HelloHandler(RequestHandler):
    def get(self):
        #if not self.user_is_logged_in():
        #   raise tornado.web.HTTPError(403)
        self.write("Hello, world!")
        
    def user_is_logged_in(self):
        return 0;
    ## 没有self参数的时候 报错user_is_logged_in() takes no arguments (1 given)
    ## 没有false ？？
        
class StoryHandler(tornado.web.RequestHandler):
    def get(self, story_id):
        self.write("You requested the stroy " + story_id)
        #  self.write("<br>\n Get argument is " + self.get_argument('story_id'))
        ## 这个时候请求的url没有story_id, 回报400错误
        ## 函数调用错误会返回500错误
        ## 参数的story_id 和 url解析的story_id并不冲突，可并存
        ## 没有对应方法时 返回405method not allowed
        
class SubmitHandler(tornado.web.RequestHandler):
    def get(self):
        self.write('<html><body><form action="/submit" method="post">'
                   '<input type="text" name="message">'
                   '<input type="submit" value="Submit">'
                   '</form></body></html>')
    def post(self):
        self.set_header("Content-Type", "text/plain")
        self.write("You wrote " + self.get_argument("message"))

class UploadHandler(tornado.web.RequestHandler):
    def get(self):
        self.write('<html><body><form action="/upload" method="post">'
                   '<input type="file" name="message">'
                   '<input type="submit" value="Submit">'
                   '</form></body></html>')
    def post(self):
        self.set_header("Content-Type", "text/plain")
        self.write("You wrote " + self.get_argument("message"))
        self.write(self.request.files)
        ## message body 都无法访问， 这里显示空字典
        ## 怎样上传文件 上传多个文件怎么处理

class ProfileHandler(tornado.web.RequestHandler):
    def initialize(self,database):
        self.database = database
    
    def get(self, username):
        self.write(self.database)
        
application = tornado.web.Application([
    (r"/", MainHandler),
    (r"/hello", HelloHandler),
    (r"/story/([0-9]+)", StoryHandler),
    (r"/submit", SubmitHandler),
    (r"/upload", UploadHandler),
    (r"/user/(.*)", ProfileHandler, dict(database='xxxx')),
])

if __name__ == "__main__":
    application.listen(8888)
    tornado.ioloop.IOLoop.instance().start()
