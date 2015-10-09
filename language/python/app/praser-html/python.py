import HTMLParser
import urllib

class parseLinks(HTMLParser.HTMLParser):
    def handle_starttag(self, tag, attrs):
        if tag == 'a':
            for name,value in attrs:
                if name == 'href':
                    print value
                    print self.get_starttag_text()

lParser = parseLinks()
lParser.feed(urllib.urlopen("http://www.python.org/index.html").read())
