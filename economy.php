<?php
   include ('.include/utilities.php');
   $topic = "Economy";

   $dbuser = 'rsinnet_webuser';
   $dbpass = 'Z?Z07uwL#(4g';

   $con = mysqli_connect("localhost", $dbuser, $dbpass, "rsinnet_iamphilosopher");
   if (mysqli_connect_errno())
   {
   echo "Failed to connect: " . mysqli_connect_error();
   //redirect to error page.
   }

   $result = $con->query("SELECT name FROM topics ORDER BY id ASC");
while ($row = $result->fetch_array())
{
$topics_list[] = $row['name'];
}
$result->close();
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
		  <li>
		    <article class="is-post-summary">
		      <h3><a href="#">Where are the graphics?</a></h3>
		      <ul class="meta">
			<li class="timestamp">6 hours ago</li>
			<li class="comments"><a href="#">34</a></li>
		      </ul>
		    </article>
		  </li>
		  <li>
		    <article class="is-post-summary">
		      <h3><a href="#">What achievements are there</a></h3>
		      <ul class="meta">
			<li class="timestamp">9 hours ago</li>
			<li class="comments"><a href="#">27</a></li>
		      </ul>
		    </article>
		  </li>
		  <li>
		    <article class="is-post-summary">
		      <h3><a href="#">Can I play w/a controller</a></h3>
		      <ul class="meta">
			<li class="timestamp">Yesterday</li>
			<li class="comments"><a href="#">184</a></li>
		      </ul>
		    </article>
		  </li>
		</ul>
		<a href="#" class="button button-alt">Browse Archives</a>
	      </section>
	      <!-- /Recent Posts -->

	      <!-- Something -->
	      <section>
		<h2 class="major"><span>Ipsum Dolore</span></h2>
		<a href="#" class="image image-full"><img src="images/pic03.jpg" alt="" /></a>
		<p>
		  Donec sagittis massa et leo semper scele risque metus faucibus. Morbi congue mattis mi. 
		  Phasellus sed nisl vitae risus tristique volutpat. Cras rutrum sed commodo luctus blandit.
		</p>
		<a href="#" class="button button-alt">Learn more</a>
	      </section>
	      <!-- /something -->

	      <!-- Something -->
	      <section>
		<h2 class="major"><span>Magna Feugiat</span></h2>
		<p>
		  Rhoncus dui quis euismod. Maecenas lorem tellus, congue et condimentum ac, ullamcorper non sapien. 
		  Donec sagittis massa et leo semper scele risque metus faucibus. Morbi congue mattis mi. 
		  Phasellus sed nisl vitae risus tristique volutpat. Cras rutrum sed commodo luctus blandit.
		</p>
		<a href="#" class="button button-alt">Learn more</a>
	      </section>
	      <!-- /something -->

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
				   $foo_article_blog_file = '.articles/'.$recent_article_ids[$i].'_blog.html';
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
	<div id="copyright">
	  &copy; 2013 R. W. Sinnet | Images: <a href="http://fotogrph.com">fotogrph</a> + <a href="http://iconify.it">Iconify.it</a> | Design: <a href="http://html5up.net/">HTML5 UP</a>
	</div>
	<!-- /Copyright -->

      </div>
    </footer>
    <!-- /Footer -->

  </body>
</html>
