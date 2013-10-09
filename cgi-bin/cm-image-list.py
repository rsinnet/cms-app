#!/usr/bin/python

# This script returns a fragment of HTML and does not
# contain the necessary header to be interpreted by
# a browser as HTML.

from iap_utils import *

class iapArticle:
    def __init__(self, cursor, id):
        # article_id
        self.id = id
        sql_query = "SELECT r1.id AS resource_id, " + \
            "rt1.type AS resource_type, " + \
            "r1.rvalue AS resource_value " + \
            "FROM resources AS r1 " + \
            "INNER JOIN resources_graph AS rg1 ON r1.id=rg1.resource2_id " + \
            "INNER JOIN resources AS r2 ON r2.id=rg1.resource1_id " + \
            "INNER JOIN articles_resources_graph AS arg1 ON r2.id=arg1.resource_id " + \
            "INNER JOIN articles AS a1 ON a1.id=arg1.article_id " + \
            "INNER JOIN resource_types AS rt1 ON rt1.id=r1.resource_type_id " + \
            "WHERE rt1.type='Image' AND a1.id='""" + str(id) + "'"

        cursor.execute(sql_query)
        rows = cursor.fetchall()
        self.images = []
        for row in rows:
            if row[1] == "Image":
                self.images.append(iapImage(cursor, row[0]))

    def get_xml_dom(self):
        impl = getDOMImplementation()
        dom = impl.createDocument(None, "div", None)
        root = dom.documentElement
        for image in self.images:
            root.appendChild(image.get_xml_dom().documentElement)
        #root.attributes["style"] = "max-width: 200px; max-height: 100px;"
        #root.attributes["src"] = "../resources/" + self.id + ".jpg"
        return dom
    def __str__(self):
        return xml_to_html(self.get_xml_dom().toprettyxml())

class iapImage:
    def __init__(self, cursor, id):
        self.cursor = cursor
        self.id = id           # resource id
        sql_query = "SELECT r1.id AS id, rt1.type, " + \
            "rt2.type AS key_type, r2.rkey, r2.rvalue " + \
            "FROM resources AS r1 " + \
            "INNER JOIN resources_graph AS rg1 ON rg1.resource1_id=r1.id " + \
            "INNER JOIN resources AS r2 ON rg1.resource2_id=r2.id " + \
            "INNER JOIN resource_types AS rt1 ON r1.resource_type_id=rt1.id " + \
            "INNER JOIN resource_types AS rt2 ON r2.resource_type_id=rt2.id " + \
            "WHERE r1.id='""" + str(id) + "'"
        cursor.execute(sql_query)
        rows = cursor.fetchall()
        self.keys = []
        self.values = []
        for row in rows:
            self.keys.append(row[2])
            self.values.append(row[4])
            if (self.keys.append(row[3]) == "Extension"):
                self.extension = row[3]
            else:
                self.extension = "jpg"

    def get_xml_dom(self):
        impl = getDOMImplementation()
        dom = impl.createDocument(None, "div", None)
        root = dom.documentElement
        root.attributes["style"] = \
            "background: #d8d0d8;" + \
            "border-radius: 8px;" + \
            "max-width: 500px;" + \
            "text-align: center;"
        resource_img = dom.createElement("img")
        resource_img.attributes["style"] = \
            "max-width: 500px;" + \
            "max-height: 200px;" + \
            "border-radius: 8px;"
        resource_img.attributes["src"] = "../resources/" + \
            self.id + "." + self.extension
        root.appendChild(resource_img)

        resource_div = dom.createElement("div")
        root.appendChild(resource_div)

        key_span = dom.createElement("span")
        key_span.attributes["style"] = "font-weight: bold;"
        resource_div.appendChild(key_span)

        txt = dom.createTextNode(self.keys[0])
        key_span.appendChild(txt)

        key_value = dom.createElement("span")
        key_value.attributes["style"] = "font-style: italic;"
        resource_div.appendChild(key_value)

        txt = dom.createTextNode(self.values[0])
        key_value.appendChild(txt)

        return dom

    def __str__ (self):
        # ^<\?xml.*\(\?\)>\s*
        return xml_to_html(self.get_xml_dom().toprettyxml())

db = connect_to_iap_db()
cursor = db.cursor()

sql_query = "SELECT id FROM resources " + \
    "WHERE resource_type_id=(SELECT id FROM resource_types where type='Image')"
cursor.execute(sql_query)
rows = cursor.fetchall()
for row in rows:
    # print row[0]
    print "<center>" + str(iapImage(cursor, row[0])) + "</center>"


# Get all resources related to this article
#sql_quer = """\
#SELECT r3.id, a1.title, rt2.type, r3.rkey, r3.rvalue
#FROM resources AS r1
#INNER JOIN resources_graph AS rg1 on r1.id=rg1.resource2_id
#INNER JOIN resources AS r2 ON r2.id=rg1.resource1_id
#INNER JOIN articles_resources_graph AS arg1 ON arg1.resource_id=r2.id
#INNER JOIN articles AS a1 ON a1.id=arg1.article_id
#INNER JOIN resource_types AS rt1 ON rt1.id=r1.resource_type_id
#INNER JOIN resources_graph rg2 ON rg2.resource1_id=r1.id
#INNER JOIN resources AS r3 ON r3.id=rg2.resource2_id
#INNER JOIN resource_types AS rt2 ON rt2.id=r3.resource_type_id
#WHERE a1.id=3"""
