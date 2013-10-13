from iap_utils import *

import re

class Resource:
    def __init__(self, cursor, id = None, debug = None):
        self.cursor = cursor
        self.debug = debug
        self.id = id
        self.rvalue = None
        self.rkey = None
        self.rtype = None
        if not id is None:
            self.load_resource()

    def load_resource(self):
        sql_query = "SELECT r1.id, rt1.type, r1.key, r1.rvalue, " + \
            "FROM resources AS r1 " + \
            "INNER JOIN resource_types AS rt1 ON r1.resource_type_id=rt1.id " + \
            "WHERE r1.id='" + self.id + "'"
        if self.debug:
            print sql_query + "<br/><br/>"

        self.cursor.execute(sql_query)
        if self.cursor.rowcount == 1:
            row = self.cursor.fetchone()
            self.rtype = row[2]
            self.rkey = row[3]
            self.rvalue = row[4]
        else:
            return False
        return True


    def check_resource(self):
        if self.rtype == "String" and \
                (not self.rvalue == "" or self.rvalue):
            sql_query = "SELECT r.id FROM resources AS r " + \
                "WHERE resource_type_id=" + \
                "(SELECT rt.id FROM resource_types AS rt " + \
                "WHERE rt.type='String') AND " + \
                "r.rkey='" + self.rkey + "' AND r.rvalue='" + self.rvalue + "'"
            if self.debug:
                print sql_query + "<br/><br/>"
            self.cursor.execute(sql_query)
            if self.cursor.rowcount > 0:
                self.id = self.cursor.fetchone()[0]
                print "String &laquo;" + self.rkey + \
                    "&raquo; already exists with value &laquo;" + \
                    self.rvalue + "&raquo; and ID &laquo;" + \
                    self.id + "&raquo;</br/><br/>"

    def add_resource(self, rtype = None, rkey = None, rvalue = None):
        if rtype:
            self.rtype = rtype
        if rkey:
            self.rkey = rkey
        if rvalue:
            self.rvalue = rvalue

        if self.id:
            return False

        if not self.rvalue and (self.rtype == "Attribution" or \
                                    self.rkey == "Title" or \
                                    self.rkey == "Extension" or \
                                    self.rkey == "Location" or \
                                    self.rkey == "Description"):
            return False

        if self.debug:
            self.id = get_random_hash(self.cursor, True)
        else:
            self.id = get_random_hash(self.cursor)

        values = []
        cols = []

        if self.id:
            values.append("'" + self.id + "'")
            cols.append("id")
        if self.rtype:
            values.append("(SELECT rt.id FROM resource_types AS rt " + \
                              "WHERE rt.type='" + self.rtype + "')")
            cols.append("resource_type_id")
        if self.rkey:
            values.append("'" + re.sub("'", "''", self.rkey) + "'")
            cols.append("rkey")
        if self.rvalue:
            values.append("'" + re.sub("'", "''", self.rvalue) + "'")
            cols.append("rvalue")

        sql_query = "INSERT INTO resources " + parenthesis_nostr_list(cols) + \
            " VALUES " + parenthesis_nostr_list(values)
        if self.debug:
            print sql_query + "<br/><hr/>"
        self.cursor.execute(sql_query)

    def link_to_child(self, resource):
        self.link_resources(self, resource)

    def link_to_parent(self, resource):
        self.link_resources(resource, self)

    def link_resources(self, resource1, resource2):
        if not resource1.id or not resource2.id:
            return
        resource_link_id = get_random_hash(self.cursor)
        sql_query = "INSERT INTO resources_graph " + \
            "(id, resource1_id, resource2_id) " + \
            "VALUES ('" + resource_link_id + "', '" + resource1.id + "', '" + \
            resource2.id + "')"
        if self.debug:
            print sql_query + "<br/><hr/>"
        self.cursor.execute(sql_query)

# @todo Change article to use article id
class iapArticle:
    def __init__(self, cursor, id=None, debug=None):
        self.cursor = cursor
        self.debug = debug
        self.id = id
        self.title = ""
        self.subtitle = ""
        self.date = ":"
        self.topic = ""
        if id:
            self.load_article()

    def load_article(self):
        # Fetch the article metadata
        sql_query = "SELECT a1.title AS title, a1.subtitle AS subtitle, " + \
            "a1.date as date, t1.name AS topic " + \
            "FROM articles AS a1 " + \
            "INNER JOIN topics AS t1 ON a1.topic_id=t1.id " + \
            "WHERE a1.id='" + str(self.id) + "'"
        if self.debug:
            print sql_query + "<br/><br/>"

        self.cursor.execute(sql_query)
        if self.cursor.rowcount == 1:
            row = self.cursor.fetchone()
            self.title = row[0]
            self.subtitle = row[1]
            self.date = row[2]
            self.topic = row[3]       
        else:
            return False
        return True

    def get_resource(self):
        sql_query = "SELECT r1.id FROM resources AS r1 " + \
            "INNER JOIN articles_resources_graph AS arg1 ON r1.id=arg1.resource_id " + \
            "INNER JOIN articles AS a1 ON arg1.article_id=a1.id " + \
            "WHERE a1.id='" + self.id + "'"
        if self.debug:
            print sql_query + "<br/><br/>"
        cursor.execute(sql_query)
        row = cursor.fetchone()
        return Resource(cursor, id=row[0], debug=self.debug)

    def validate_entries(self, title=None, subtitle=None, topic=None, date=None):
        return True

    def update_record(self, title=None, subtitle=None, topic=None, date=None):
        if not self.validate_entries(title, subtitle, topic, date=date):
            return False

        self.title = title
        self.subtitle = subtitle
        self.date = date
        self.topic =  topic

        values = []
        if title:
            values.append("title='" + title + "'")
        if subtitle:
            values.append("subtitle='" + subtitle + "'")
        if date:
            values.append("date='" + date + "'")
        if topic:
            values.append("topic_id=(SELECT id FROM topics WHERE name='" + topic + "')")

        sql_query = "UPDATE articles SET " + open_list(values) + \
            " WHERE id='" + self.article_id + "'"
        if self.debug:
            print sql_query + "<br/><br/>"
        self.cursor.execute(sql_query)

    def add_record(self, title=None, subtitle=None, topic=None):
        if not self.validate_entries(title, subtitle, topic):
            return False

        if self.debug:
            self.id = get_random_hash(self.cursor, True)
        else:
            self.id = get_random_hash(self.cursor)

        values = []
        cols = []

        if self.id:
            values.append("'" + self.id + "'")
            cols.append("id")
        if title:
            self.title = title
            values.append("'" + title + "'")
            cols.append("title")
        if subtitle:
            self.subtitle = subtitle
            values.append("'" + subtitle + "'")
            cols.append("subtitle")
        if topic:
            self.topic = topic 
            values.append("(SELECT id FROM topics WHERE name='" + topic + "')")
            cols.append("topic_id")

        values.append("NOW()")
        cols.append("date")

        sql_query = "INSERT INTO articles " + parenthesis_nostr_list(cols) + \
            " VALUES " + parenthesis_nostr_list(values)
        if self.debug:
            print sql_query + "<br/><br/>"
        self.cursor.execute(sql_query)

    def link_to_resource(self, resource):
        if not self.id:
            return
        article_resource_link_id = get_random_hash(self.cursor)
        sql_query = "INSERT INTO articles_resources_graph " + \
            "(id, article_id, resource_id) " + \
            "VALUES ('" + article_resource_link_id + "', '" + \
            self.id + "', '" + resource.id + "')"
        if self.debug:
            print sql_query + "<br/><hr/>"
        self.cursor.execute(sql_query)

    def get_xml_dom(self):
        impl = getDOMImplementation()
        dom = impl.createDocument(None, "div", None)
        root = dom.documentElement
        root.attributes["style"] = \
            "background: #c8c0a4;" + \
            "border-radius: 8px;" + \
            "max-width: 500px;" + \
            "text-align: center;"
        root.attributes["class"] = "article_draggable"

        br_element = dom.createElement("br")

        article_id_span = dom.createElement("span")
        article_id_span.attributes["id"] = "article_id"
        article_id_span.attributes["style"] = \
            "position: absolute;" + \
            "visibility: hidden;"
        txt = dom.createTextNode(self.id)
        article_id_span.appendChild(txt)
        root.appendChild(article_id_span)

        date_span = dom.createElement("span")
        date_span.attributes["id"] = "date"
        date_span.attributes["style"] = \
            "position: absolute;" + \
            "visibility: hidden;"
        txt = dom.createTextNode(self.date.isoformat())
        date_span.appendChild(txt)
        root.appendChild(date_span)

        topic_span = dom.createElement("span")
        topic_span.attributes["id"] = "topic"
        topic_span.attributes["style"] = \
            "font-weight: bold;"
        txt = dom.createTextNode(self.topic)
        topic_span.appendChild(txt)
        root.appendChild(topic_span)

        title_span = dom.createElement("span")
        title_span.attributes["id"] = "title"
        txt = dom.createTextNode(self.title + ": ")
        title_span.appendChild(txt)
        root.appendChild(title_span)

        subtitle_span = dom.createElement("span")
        subtitle_span.attributes["id"] = "subtitle"
        txt = dom.createTextNode(self.subtitle)
        subtitle_span.appendChild(txt)
        root.appendChild(subtitle_span)

        root.appendChild(br_element)
        return dom

    def __str__(self):
        return xml_to_html(self.get_xml_dom().toprettyxml())

class iapImage:
    def __init__(self, cursor, id):
        self.cursor = cursor
        self.id = id           # resource id

        self.keys = []
        self.values = []
        self.attribution = ""
        self.extension = ""
        self.title = ""
        self.location = ""
        self.description = ""

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

        for row in rows:
            self.keys.append(row[2])
            self.values.append(row[4])
            self.keys.append(row[3])
            if (row[3] == "Extension"):
                self.extension = row[4]
            elif (row[3] == "Title"):
                self.title = row[4]
            elif (row[3] == "Description"):
                self.description = row[4]
            elif (row[3] == "Location"):
                self.location = row[4]
            if (row[2] == "Attribution"):
                self.attribution = row[4]

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
        resource_img.attributes["draggable"] = "true"
        resource_img.attributes["ondragstart"] = "drag(event)"
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
