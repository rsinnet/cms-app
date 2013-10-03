<?php
$result = $con->query("SELECT id, title, date FROM articles ORDER BY DATE DESC");
  while ($row = $result->fetch_array())
    {
      $recent_articles_list[] = $row['name'];
    }
  $result->close();

?>
