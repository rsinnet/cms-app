<?php
  // Enable debug mode by setting IAP_DEBUG, could be false even.
  // $IAP_DEBUG_ = true;
  // Include useful scripts.
  include '.include/article_age.php';
  include '.include/utilities.php';
  
  $dbuser = 'rsinnet_webuser';
  $dbpass = 'Z?Z07uwL#(4g';
  
  $con = mysqli_connect("localhost", $dbuser, $dbpass, "rsinnet_iamphilosopher");
  if (mysqli_connect_errno())
    {
      echo "Failed to connect: " . mysqli_connect_error();
      //redirect to error page.
      echo "<script language=\"text/javascript\">window.location = 'errors/404.html';</script>";
    }
  
  $result = $con->query("SELECT name FROM topics ORDER BY id ASC");
  while ($row = $result->fetch_array())
    {
      $topics_list[] = $row['name'];
    }
  $result->close();
  
  $article_id = $_GET['id'];
  $article_blog_file = "resources/" . $article_id . ".php";

  $sql_query = "SELECT title, subtitle, date, topic_id,
  (SELECT name FROM topics WHERE id=topic_id) AS topic,
  TO_DAYS(NOW()) - TO_DAYS(date) AS age
  FROM articles WHERE id='" . $article_id . "'";
  $result = $con->query($sql_query);
  $row = $result->fetch_array();
  $article_title = $row['title'];
  $article_subtitle = $row['subtitle'];
  $article_date = $row['date'];
  $article_topic_id = $row['topic_id'];
  $article_topic = $row['topic'];
  $topic = $article_topic;
  $article_age = new ArticleAge($row['age']);
  $result->close();

  include '.include/recent_articles.php';
?>
<!DOCTYPE HTML>
<!--
    TXT 2.0 by HTML5 UP
    html5up.net | @n33co
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
  -->
<html>
  <head>
    <title><?php echo $article_topic_id; ?> - I AM PHILOSOPHER</title>
    <?php echo file_get_contents('.include/topic_html_head.html'); ?>
  </head>
  <body>
    <!-- Header -->
    <header id="header">
      <div class="logo">
	<div>
	  <h1><a href="#" id="logo">I AM PHILOSOPHER</a></h1>
	    <span class="byline"><?php echo $topic; ?></span>
	</div>
      </div>
    </header>
    <!-- /Header -->
    
    <!-- Nav -->
    <?php include '.include/navbar.php' ?>
    
    <!-- Main -->
    <div id="main-wrapper">
      <div id="main" class="container">
	<div class="row">
	  <div class="12u skel-cell-mainContent">
	    <div class="content">
	      
	      <!-- Content -->
	      
	      <article class="is-page-content">
		<?php
		  $foo_article_title = $article_title;
		  $foo_article_subtitle = $article_subtitle;
		  $foo_article_age = $article_age;
		  include '.include/article_header.php';
		  include $article_blog_file;
		?>
	      </article>
	      <!-- /Content -->
	      
	    </div>
	  </div>
	</div>
      </div>
    </div>
    <!-- /Main -->
    
    <!-- Footer -->
    <?php include '.include/topic_footer.php'; ?>>
    
  </body>
</html>
