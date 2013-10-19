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
      $string = preg_replace("/^<\?xml.*\(\?\)>\s*/i", "", $xmlAsString);
      return $string;
    }
    
    function iap_sql_connect()
    {
      $dbuser = 'rsinnet_webuser';
      $dbpass = 'Z?Z07uwL#(4g';
      $con = mysqli_connect("localhost", $dbuser, $dbpass, "rsinnet_iamphilosopher");
      if (mysqli_connect_errno())
	{
	  echo "Failed to connect: " . mysqli_connect_error();
	  //redirect to error page.
	}
      return $con;
    }
    
    function iap_get_topics($con)
    {
      $result = $con->query("SELECT name FROM topics ORDER BY id ASC");
      while ($row = $result->fetch_array())
	$topics_list[] = $row['name'];
      $result->close();
      return $topics_list;
    }
  }
$__INCLUDE_UTILITIES_PHP = 1;
?>
