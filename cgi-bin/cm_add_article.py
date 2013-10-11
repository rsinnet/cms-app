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

# Add the article to the resources table.
resource_article = Resource(cursor, debug=True);
resource_article.add_resource("Article")

# Add the article to the articles table.
article = iapArticle(cursor, debug=True)
article.add_record(title=form.getvalue("title"),
                   subtitle=form.getvalue("subtitle"),
                   topic=form.getvalue("topic"))
article.link_to_resource();

# Add a file extension resource.
resource_extension = Resource(cursor, debug=True)
resource_extension.add_resource("String", "Extension", form["extension"].value)
resource_extension.link_to_parent(resource_article)

#with open('../resources/' + resource_article.id + '.' + resource_extension.rvalue, 'wb') as fb:
#    fb.write(form["file"].file.read())
