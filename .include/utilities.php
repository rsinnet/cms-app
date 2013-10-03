<?php
  if (!isset($__INCLUDE_UTILITIES_PHP))
    {
      function getFirstParagraph($relative_file_path)
      {
	$blogXmlChildren = simplexml_load_file($relative_file_path)->children();
	for ($i = 0; $i < count($blogXmlChildren); $i++)
	  if ($blogXmlChildren[$i]->getName() == "p")
	    break;
	return "<section>".xmlToHtml5($blogXmlChildren[$i]->asXML())."</section>";
     }


      function xmlToHtml5($xmlAsString)
      {
	$string = preg_replace("/^<\?xml.*\?>\s*/i", "", $xmlAsString);
	return $string;
      }
    }
$__INCLUDE_UTILITIES_PHP = 1;
?>
