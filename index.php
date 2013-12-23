<?php
  $topic = "Home";
  include ('.include/utilities.php');

  $con = iap_sql_connect();
  $topics_list = iap_get_topics($con);

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
    <title>I AM PHILOSOPHER © 2013</title>
    <?php echo file_get_contents('.include/topic_html_head.html'); ?>
  </head>
  <body>

    <!-- Header -->
    <header id="header">
      <div class="logo">
	<div>
	  <h1><a href="#" id="logo">I AM PHILOSOPHER</a></h1>
	  <span class="byline">World Perspectives</span>
	</div>
      </div>
    </header>
    <!-- /Header -->

    <!-- Nav -->
    <?php include '.include/navbar.php' ?>
    <!-- /Nav -->

    <!-- Banner -->
    <div id="banner-wrapper">
      <section id="banner">
	<h2>Essays on Modern World Affairs</h2>
	<span class="byline">These exposés are intended to provide insightful
	  commentary canvassing the landscape of human thought.</span>
	<!--<a href="#" class="button">Hold Breath and Continue</a>-->
      </section>
    </div>
    <!-- /Banner -->

    
    <!-- Main -->
    <div id="main-wrapper">
      <div id="main" class="container">
	<div class="row">
	  <div class="12u">
	    <!-- Highlight -->
	    <section class="is-highlight">
	      <!--<ul class="special">
		<li><a href="#" class="battery">Battery</a></li>
		<li><a href="#" class="tablet">Tablet</a></li>
		<li><a href="#" class="flask">Flask</a></li>
		<li><a href="#" class="chart">Pie Chart?</a></li>
	      </ul>-->
	      <header>
		<h2>Message from the Editor</h2>
		<span class="byline">R. W. Sinnet, Septemter 30, 2013</span>
		<!--<span class="byline">it contains: many items that seem
		    important but actually aren’t</span>-->
		<p>
		  This site will soon contain musings on topics of import both 
		  contemporary and timeless. I will some scattered pieces as I
		  write the backend.
		</p>
	      </header>
	    </section>
	    <!-- /Highlight -->

	  </div>

	  <div class="12u skel-cell-mainContent">
	    <div class="content">
	      
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
	<?php echo file_get_contents('.include/sitelock-badge.html'); ?>
      </div>

      <div class="row">

	<!-- Copyright -->
	<?php echo file_get_contents('.include/copyright.html'); ?>

      </div>
    </footer>
    <!-- /Footer -->

  </body>
</html>
