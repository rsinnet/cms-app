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
  $article_blog_file = ".articles/" . $article_id . ".php";

  $sql_query = "SELECT title, subtitle, date, topic_id,
  (SELECT name FROM topics WHERE id='topic_id') AS topic,
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
    <title>
      <?php echo $article_title; ?> - I AM PHILOSOPHER
    </title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700|Open+Sans+Condensed:700"
	  rel="stylesheet" />
    <script src="js/jquery.min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-panels.min.js"></script>
    <noscript>
      <link rel="stylesheet" href="css/skel-noscript.css" />
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/style-desktop.css" />
    </noscript>
    <!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><script src="js/html5shiv.js"></script>
	<link rel="stylesheet" href="css/ie8.css" /><![endif]-->
    <!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->
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
    <!-- /Nav -->
    
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
	<div class="row">
	  <div class="12u">
	    
	    <!-- Features -->
	    <section class="is-features">
	      <h2 class="major"><span>Valid Commands</span></h2>
	      <div>
		<div class="row">
		  <div class="3u">
		    
		    <!-- Feature -->
		    <section class="is-feature">
		      <a href="#" class="image image-full"><img src="images/pic01.jpg" alt="" /></a>
		      <h3><a href="#">Look Up</a></h3>
		      <p>
			Phasellus quam turpis, feugiat sit amet ornare in, a hendrerit in 
			lectus dolore. Praesent semper mod quis eget sed etiam eu ante risus.
		      </p>
		    </section>
		    <!-- /Feature -->
		    
		  </div>
		  <div class="3u">
		    
		    <!-- Feature -->
		    <section class="is-feature">
		      <a href="#" class="image image-full"><img src="images/pic02.jpg" alt="" /></a>
		      <h3><a href="#">Look Down</a></h3>
		      <p>
			Phasellus quam turpis, feugiat sit amet ornare in, a hendrerit in 
			lectus dolore. Praesent semper mod quis eget sed etiam eu ante risus.
		      </p>
		    </section>
		    <!-- /Feature -->
		    
		  </div>
		  <div class="3u">
		    
		    <!-- Feature -->
		    <section class="is-feature">
		      <a href="#" class="image image-full"><img src="images/pic03.jpg" alt="" /></a>
		      <h3><a href="#">Examine Room</a></h3>
		      <p>
			Phasellus quam turpis, feugiat sit amet ornare in, a hendrerit in 
			lectus dolore. Praesent semper mod quis eget sed etiam eu ante risus.
		      </p>
		    </section>
		    <!-- /Feature -->
		    
		  </div>
		  <div class="3u">
		    
		    <!-- Feature -->
		    <section class="is-feature">
		      <a href="#" class="image image-full"><img src="images/pic04.jpg" alt="" /></a>
		      <h3><a href="http://getlamp.com">Get Lamp</a></h3>
		      <p>
			Phasellus quam turpis, feugiat sit amet ornare in, a hendrerit in 
			lectus dolore. Praesent semper mod quis eget sed etiam eu ante risus.
		      </p>
		    </section>
		    <!-- /Feature -->
		    
		  </div>
		</div>
	      </div>
	    </section>
	    <!-- /Features -->
	    
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
	  <section>
	    <h2 class="major"><span>Get in touch</span></h2>
	    <ul class="contact">
	      <li><a href="#" class="facebook">Facebook</a></li>
	      <li><a href="http://twitter.com/n33co" class="twitter">Twitter</a></li>
	      <li><a href="http://n33.co/feed/" class="rss">RSS</a></li>
	      <li><a href="http://dribbble.com/n33" class="dribbble">Dribbble</a></li>
	      <li><a href="#" class="linkedin">LinkedIn</a></li>
	      <li><a href="#" class="googleplus">Google+</a></li>
	    </ul>
	  </section>
	  <!-- /Contact -->
	  
	</div>
      </div>
      <div class="row">
	
	<!-- Copyright -->
	<div id="copyright">
	  &copy; 2013 Ryan W. Sinnet | Images: <a href="http://fotogrph.com">fotogrph</a> + <a href="http://iconify.it">Iconify.it</a> | Design: <a href="http://html5up.net/">HTML5 UP</a>
	</div>
	<!-- /Copyright -->
	
      </div>
    </footer>
    <!-- /Footer -->
    
  </body>
</html>
