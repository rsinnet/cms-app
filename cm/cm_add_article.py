#!/usr/bin/python

# Adds an article with supporting data.

from resource import Resource, iapArticle
from iap_utils import *

import cgi
form = cgi.FieldStorage(keep_blank_values=True)

# Establish connection to the database
db = connect_to_iap_db()
cursor = db.cursor()

print "Content-type: text/html"
print

redirect_to("cm-articles.php")

# Add the article to the articles table.
article = iapArticle(cursor, debug=True)
article.add_record(title=form.getvalue("title"),
                   subtitle=form.getvalue("subtitle"),
                   topic=form.getvalue("topic"))

# Add the article to the resources table.
resource_article = Resource(cursor, debug=True);
resource_article.add_resource("Article")



article.link_to_resource(resource_article);

with open('../resources/' + article.id + '.php', 'wb') as fb:
    fb.write(form["file"].file.read())

db.commit()
