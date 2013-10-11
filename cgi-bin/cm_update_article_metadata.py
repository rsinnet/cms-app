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

response_data = json.dumps({'resource_id': this_article_id,
                            'title': this_article.title,
                            'subtitle': this_article.subtitle,
                            'date': this_article.date,
                            'topic': this_article.topic});
