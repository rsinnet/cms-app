#!/usr/bin/python

# Adds an image with supporting data.

from resource import Resource
from iap_utils import *

import cgi
form = cgi.FieldStorage(keep_blank_values=True)

# Establish connection to the database
db = connect_to_iap_db()
cursor = db.cursor();

print "Content-type: text/html\n\n";

# Add the image to the resources table.
resource_image = Resource(cursor, "Image");
resource_image.debug = True
resource_image.add_resource()

# Add the file extension if it doesn't exist.
resource_extension = Resource(cursor, "String", form["extension"].value, "Extension")
resource_extension.debug = True
resource_extension.add_resource()
resource_extension.link_to_parent(resource_image)

# Add an attribution.
resource_attribution = Resource(cursor, "Attribution", form.getvalue("attribution"))
resource_attribution.debug = True
resource_attribution.add_resource()
resource_attribution.link_to_parent(resource_image)

with open('../resources/' + resource_image.id + '.' + resource_extension.rvalue, 'wb') as fb:
    fb.write(form["file"].file.read())
