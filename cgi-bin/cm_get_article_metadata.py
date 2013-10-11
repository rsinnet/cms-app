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

this_article = iapArticle(cursor, form.getvalue('id'))

response_data = json.dumps({'id': this_article.id,
                            'title': this_article.title,
                            'subtitle': this_article.subtitle,
                            'date': this_article.date.isoformat(),
                            'topic': this_article.topic});
print response_data
