from iap_utils import *
import re

def get_random_hash(cursor, debug = False):
    sql_query = "SELECT SHA1(CONCAT(RAND(), RAND(), " + \
        "RAND(), RAND(), RAND())) as id";
    if debug:
        print sql_query + "<br/><br/>"
    cursor.execute(sql_query)
    xhash = cursor.fetchone()[0]
    return xhash

class Resource:
    def __init__(self, cursor, rtype, rvalue = None, rkey = None, debug = None):
        self.cursor = cursor
        self.debug = debug
        self.rvalue = rvalue
        self.rkey = rkey
        self.rtype = rtype
        self.id = None

    def load_resource(self):
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

    def add_resource(self):
        self.load_resource()
        if not self.rvalue and (self.rtype == "Attribution" or \
                                    self.rkey == "Title" or \
                                    self.rkey == "Extension" or \
                                    self.rkey == "Location"):
            return False

        if self.id:
            return False

        if self.debug:
            self.id = get_random_hash(self.cursor, True)
        else:
            self.id = get_random_hash(self.cursof);

        values = []
        cols = []

        values.append(self.id)
        cols.append("id")

        values.append("(SELECT rt.id FROM resource_types AS rt " + \
                          "WHERE rt.type='" + self.rtype + "')")
        cols.append("resource_type_id")

        sv = "('{0}', {1})"
        sc = '({0}, {1})'

        if self.rvalue:
            values.append(re.sub("'", "''", self.rvalue))
            cols.append("rvalue")
            sv = "('{0}', {1}, '{2}')"
            sc = '({0}, {1}, {2})'

        if self.rkey:
            values.append(re.sub("'", "''", self.rkey))
            cols.append("rkey")
            sv = "('{0}', {1}, '{2}', '{3}')"
            sc = "({0}, {1}, {2}, {3})"

        sql_query = "INSERT INTO resources " + sc.format(*cols) + \
            " VALUES " + sv.format(*values);
        if self.debug:
            print sql_query + "<br/><br/><hr/>"

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
            print sql_query + "<br/><br/><hr/>"
