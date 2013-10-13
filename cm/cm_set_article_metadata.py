#!/usr/bin/python

import json
import cgi


from iap_utils import *
from resource import iapArticle

db = connect_to_iap_db()
cursor = db.cursor()

form = cgi.FieldStorage()

print "Content-Type: text/html"
print

redirect_to("cm-articles.php")

this_article = iapArticle(cursor, form.getvalue('article_id'), debug=True)
this_article.update_record(title=form.getvalue('title'),
                           subtitle=form.getvalue('subtitle'),
                           date=form.getvalue('date'),
                           topic=form.getvalue('topic'));

db.commit()
