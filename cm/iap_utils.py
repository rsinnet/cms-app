from HTMLParser import HTMLParser
parser = HTMLParser()

import xml.dom.minidom
from xml.dom.minidom import getDOMImplementation

import MySQLdb
import re

def connect_to_iap_db():
    return MySQLdb.connect(host="localhost",
                           user="rsinnet_webuser",
                           passwd="Z?Z07uwL#(4g",
                           db="rsinnet_iamphilosopher");

def strip_xml_tag(xml_string):
    return re.sub("<\?xml.*\?>\s*", "", xml_string)

def xml_to_html(xml_string):
    return parser.unescape(strip_xml_tag(xml_string))

def get_random_hash(cursor, debug = False):
    sql_query = "SELECT SHA1(CONCAT(RAND(), RAND(), " + \
        "RAND(), RAND(), RAND())) as id"
    if debug:
        print sql_query + "<br/><br/>"
    cursor.execute(sql_query)
    xhash = cursor.fetchone()[0]
    return xhash

def open_list(list):
    return ", ".join ( str(e) for e in list)

def open_str_list(list):
    return ", ".join ( repr(e) for e in list)

def parenthesis_list(list):
    return "(" + open_str_list(list) + ")"

def parenthesis_nostr_list(list):
    return "(" + open_list(list) + ")"


def redirect_to(str):
    print "<html><head><script type=\"text/javascript\">"
    print "var i = 2;"
    print "var interval = setInterval(function () {"
    print "  document.getElementById(\"status_message\").innerHTML = \"Redirecting in \" + i + \" seconds...\";"
    print "  if (--i < 0)"
    print "    window.location.href = \"" + str  + "\""
    print "}, 1000);"
    print "</script></head><body><p id=\"status_message\">Updating Record...</p></html>"
