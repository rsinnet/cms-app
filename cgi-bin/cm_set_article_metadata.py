#!/usr/bin/python

import json
import cgi


from iap_utils import *
from resource import iapArticle

db = connect_to_iap_db()
cursor = db.cursor()

form = cgi.FieldStorage()

print "Content-Type: application/json"
print

this_article = iapArticle(cursor, form.getvalue('resource_id'))
this_article.update_record(title=form.getvalue('title'),
                           subtitle=form.getvalue('subtitle'),
                           date=form.getvalue('date'),
                           topic=form.getvalue('topic'));
