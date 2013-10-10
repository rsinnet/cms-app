#!/usr/bin/python

# This script returns a fragment of HTML and does not
# contain the necessary header to be interpreted by
# a browser as HTML.

from iap_utils import *
from resource import iapArticle

db = connect_to_iap_db()
cursor = db.cursor()

sql_query = "SELECT id FROM resources " + \
    "WHERE resource_type_id=(SELECT id FROM resource_types where type='Article')"
cursor.execute(sql_query)
rows = cursor.fetchall()
for row in rows:
    # print row[0]
    print "<center>" + str(iapArticle(cursor, row[0])) + "</center>"


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
