<?php
   include ('.include/utilities.php');

  $con = iap_sql_connect();
  $topics_list = iap_get_topics($con);

  $recent_articles_constrain_topic = $topic;
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
    <title>I AM PHILOSOPHER - <?php echo $topic; ?></title>
    <?php echo file_get_contents('.include/topic_html_head.html'); ?>
  </head>
  <body>

    <!-- Header -->
    <?php include '.include/topic_header.php' ?>
    <!-- /Header -->

    <!-- Nav -->
    <?php include '.include/navbar.php' ?>
    <!-- /Nav -->
    
    <!-- Main -->
    <div id="main-wrapper">
      <div id="main" class="container">
	<div class="row">
	  <div class="3u">
	    <div class="sidebar">
	      
	      <!-- Sidebar -->
	      
	      <!-- Recent Posts -->
	      <section>
		<h2 class="major"><span>Recent Posts</span></h2>
		<ul class="style2">
  <?php
  for ($i = 0; $i < count($recent_article_ids); $i++)
    {
      $foo_article_id = $recent_article_ids[$i];
      $foo_article_title = $recent_article_titles[$i];
      $foo_article_age = $recent_article_ages[$i];
      include '.include/sidebar_post.php';
    }
  ?>
		</ul>
		<a href="#" class="button button-alt">Browse Archives</a>
	      </section>
	      <!-- /Recent Posts -->

	      <!-- /Sidebar -->
	      
	    </div>
	  </div>

	  <div class="9u skel-cell-mainContent">
	    <div class="content content-left">
	      
	      <!-- Content -->
	      <?php
  		for ($i = 0; $i < count($recent_article_ids); $i++)
		  {
		    $foo_article_id = $recent_article_ids[$i];
		    $foo_article_title = $recent_article_titles[$i];
		    $foo_article_subtitle = $recent_article_subtitles[$i];
		    $foo_article_age = $recent_article_ages[$i];
		    $foo_article_blog_file = 'resources/'.$recent_article_ids[$i].'.php';
		    include('.include/article_brief.php');
		  }
	      ?>
		 <!-- /Content -->
		 
	    </div>
	  </div>
	</div>
      </div>
    </div>
    <!-- /Main -->

    <!-- Footer -->
    <footer id="footer" class="container">
      <div class="row">
	<div class="12u">

	  <!-- About -->
	  <section>
	    <h2 class="major"><span>Under Construction</span></h2>
	    <p>
	      This site is currently under construction. The content is fresh
	      but new features will be added and the layout may change.
	    </p>
	  </section>
	  <!-- /About -->

	</div>
      </div>
      <div class="row">
	<div class="12u">

	  <!-- Contact -->
	  <?php echo file_get_contents('.include/footer_contact.html'); ?>
	  <!-- /Contact -->
	</div>
      </div>
      <div class="row">

	<!-- Copyright -->
	<?php echo file_get_contents('.include/copyright.html'); ?>

      </div>
    </footer>
    <!-- /Footer -->

  </body>
</html>
