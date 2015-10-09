from flask import Flask
from flask.ext.restful import Api, Resource
from flask.ext.restful import reqparse

app = Flask(__name__)
api = Api(app)


users = [
    {
        'id': 1,
        'name':'yang'
    },
    {
        'id': 2,
        'name':'sun'
    }
]

tasks = [
    {
        'id': 1,
        'title': u'Buy groceries',
        'description': u'Milk, Cheese, Pizza, Fruit, Tylenol',
        'done': False
    },
    {
        'id': 2,
        'title': u'Learn Python',
        'description': u'Need to find a good Python tutorial on the web',
        'done': False
    }
]

class UserAPI(Resource):
    def get(self, id):
        user = filter(lambda u: u['id'] == id, users)
        if len(user) == 0:
            abort(404)
        return user[0]


    def put(self, id):
        pass

    def delete(self, id):
        pass

api.add_resource(UserAPI, '/users/<int:id>', endpoint = 'user')

class TaskListAPI(Resource):
    def __init__(self):
        self.reqparse = reqparse.RequestParser()
        self.reqparse.add_argument('title', type = str, required = True, help = 'No task title provided', location = 'json')
        self.reqparse.add_argument('description', type = str, default = "", location = 'json')
        super(TaskListAPI, self).__init__()
    
    def get(self):
        pass

    def post(self):
        pass

class TaskAPI(Resource):
    def __init__(self):
        self.reqparse = reqparse.RequestParser()
        self.reqparse.add_argument('title', type = str, location = 'json')
        self.reqparse.add_argument('description', type = str, location = 'json')
        self.reqparse.add_argument('done', type = bool, location = 'json')
        super(TaskAPI, self).__init__()
    def get(self, id):
        return 'hello world'
        pass

    def put(self, id):
        pass

    def delete(self, id):
        pass

api.add_resource(TaskListAPI, '/todo/api/v1.0/tasks', endpoint = 'tasks')
api.add_resource(TaskAPI, '/todo/api/v1.0/tasks/<int:id>', endpoint = 'task')

if __name__ == '__main__':
    app.run(debug=True)
