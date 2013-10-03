<?php
if (!isset($__INCLUDE_RECENT_ARTICLES_PHP))
  {
    include ('.include/article_age.php');
    if (!isset($now)) $now = time();

    $result = $con->query("SELECT id, title, subtitle, date, TO_DAYS(NOW()) - TO_DAYS(date) AS age " .
			  "FROM articles " . (isset($recent_articles_constrain_topic) ? "WHERE topic_id=(SELECT id FROM topics WHERE name='" . $recent_articles_constrain_topic."') " : "") . "ORDER BY DATE DESC LIMIT 5");
    while ($row = $result->fetch_array())
      {
	$recent_article_ids[] = $row['id'];
	$recent_article_titles[] = $row['title'];
	$recent_article_subtitles[] = $row['subtitle'];
	$recent_article_dates[] = $row['date'];
	$recent_article_ages[] = new ArticleAge($row['age']);
      }
    $result->close();
  }
$__INCLUDE_RECENT_ARTICLES_PHP = 1;
?>
