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
