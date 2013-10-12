#!/usr/bin/python

import json
import cgi


from iap_utils import *
from resource import iapImage

db = connect_to_iap_db()
cursor = db.cursor()

form = cgi.FieldStorage()

print "Content-Type: application/json"
print

this_image = iapImage(cursor, form.getvalue('id'))

response_data = json.dumps({'id': this_image.id,
                            'extension': this_image.extension,
                            'title': this_image.title,
                            'location': this_image.location,
                            'description': this_image.description,
                            'attribution': this_image.attribution});
print response_data
