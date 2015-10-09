""" Basic todo list using webpy 0.3 """
import web

urls = (
    '/', 'Index',
)

render = web.template.render('templates', base='base')


class Index:

    def GET(self):
        """ Show page """
        res = "hello girl"
        return render.index(res)

    def POST(self):
        """ Add new entry """
        form = self.form()
        if not form.validates():
            todos = model.get_todos()
            return render.index(todos, form)
        model.new_todo(form.d.title)
        raise web.seeother('/')

app = web.application(urls, globals())

if __name__ == '__main__':
    app.run()
