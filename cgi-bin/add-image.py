#!/usr/bin/python

# Adds an image with supporting data.

from resource import Resource
from iap_utils import *

# Establish connection to the database
db = connect_to_iap_db()
cursor = db.cursor();

print "Content-type: text/html\n\n";

# Add the image to the resources table.
resource_image = Resource(cursor, "Image");
resource_image.debug = True
resource_image.add_resource()

# Add the file extension.
resource_extension = Resource(cursor, "String", "jpg", "Extension")
resource_extension.debug = True
resource_extension.add_resource()
resource_extension.link_to_parent(resource_image)

# Add an attribution.
resource_attribution = Resource(cursor, "Attribution")
resource_attribution.debug = True
resource_attribution.add_resource()
resource_attribution.link_to_parent(resource_image)
