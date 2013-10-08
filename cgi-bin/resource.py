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
        if debug:
            self.id = get_random_hash(cursor, True)
        else:
            self.id = get_random_hash(cursor)
        self.rvalue = rvalue
        self.rkey = rkey
        self.rtype = rtype

    def add_resource(self):
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
            print sql_query + "<br/><br/>"

    def link_to_child(self, resource):
        self.link_resources(self, resource)

    def link_to_parent(self, resource):
        self.link_resources(resource, self)

    def link_resources(self, resource1, resource2):
        resource_link_id = get_random_hash(self.cursor)
        sql_query = "INSERT INTO resources_graph " + \
            "(id, resource1_id, resource2_id) " + \
            "VALUES ('" + resource_link_id + "', '" + resource1.id + "', '" + \
            resource2.id + "')"
        if self.debug:
            print sql_query + "<br/><br/>"
