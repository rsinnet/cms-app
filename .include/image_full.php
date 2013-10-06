<?php
  // Get the relevant resources values.
  // The first resource is 256-bit SHA2 resource locator. In this case, it is
  // part of the file name.
  // The second is resource the attribution HTML for the image.
  $sql_query = "
  SELECT r.rvalue AS hash, r2.rvalue AS attribution
  FROM resources_graph AS rg
  INNER JOIN resources AS r ON rg.resource2_id=r.id
  INNER JOIN resource_types AS rt ON r.resource_type_id=rt.id
  INNER JOIN resources_graph AS rg2 ON rg2.resource1_id=r.id
  INNER JOIN resources r2 ON r2.id=rg2.resource2_id
  WHERE rg.resource1_id=(
  SELECT arg.resource_id FROM articles_resources_graph AS arg
  WHERE arg.article_id=".$foo_article_id.")
  AND r2.resource_type_id=(SELECT rt2.id FROM resource_types AS rt2 WHERE type='Attribution')
  AND rt.type='Image'
  ORDER BY r.id ASC";
  $result = $con->query($sql_query);
  $resource_ids = array();
  $attributions = array();
  while($row = $result->fetch_array())
    {
      $resource_hashes[] = $row['hash'];
      $attributions[] = $row['attribution'];
    }
  $result->close();
?>

<span class="image image-full">
  <img src=<?php
    $version = explode('.', PHP_VERSION);
    if ($version[0] == 5 && $version[1] < 3)
      {
	echo "../";
      }
    echo "resources/";
    echo $resource_hashes[$foo_image_id - 1];
  ?>.jpg alt="" />
</span>
  <?php
    echo "<span class='image-attribution'>";
  echo "<span>Attribution: </span>";
  echo "<span style='font-style: italic;'>";

  echo $attributions[$foo_image_id - 1];
  if (isset($IAP_DEBUG_))
    {
      echo "<br>Debug: SQL> ".$sql_query.";";
    }
  echo "</span>";
  echo "</span>";
  ?>
