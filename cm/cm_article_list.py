#!/usr/bin/python

# This script returns a fragment of HTML and does not
# contain the necessary header to be interpreted by
# a browser as HTML.

from iap_utils import *
from resource import iapArticle

db = connect_to_iap_db()
cursor = db.cursor()

sql_query = "SELECT id FROM articles"
cursor.execute(sql_query)
rows = cursor.fetchall()

for row in rows:
    print "<center>" + str(iapArticle(cursor, row[0], debug=False)) + "</center>"
