#!/usr/bin/python

# Adds an image with supporting data.

from resource import Resource
from iap_utils import *

import cgi
form = cgi.FieldStorage(keep_blank_values=True)

# Establish connection to the database
db = connect_to_iap_db()
cursor = db.cursor()

print "Content-type: text/html"
print

redirect_to("cm-images.php")

# Add the image to the resources table.
resource_image = Resource(cursor);
resource_image.debug = True
resource_image.add_resource("Image")

# Add a file extension resource.
resource_extension = Resource(cursor)
resource_extension.debug = True
resource_extension.add_resource("String", "Extension", form["extension"].value)
resource_extension.link_to_parent(resource_image)

# Add a title resource.
resource_title = Resource(cursor)
resource_title.debug = True
resource_title.add_resource("String", "Title", form["title"].value)
resource_title.link_to_parent(resource_image)

# Add a location resource.
resource_location = Resource(cursor)
resource_location.debug = True
resource_location.add_resource("String", "Location", form["location"].value)
resource_location.link_to_parent(resource_image)

# Add an attribution.
resource_attribution = Resource(cursor)
resource_attribution.debug = True
resource_attribution.add_resource("Attribution", None, form.getvalue("attribution"))
resource_attribution.link_to_parent(resource_image)

with open('resources/' + resource_image.id + '.' + resource_extension.rvalue, 'wb') as fb:
    fb.write(form["file"].file.read())
