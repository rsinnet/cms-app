<?php
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
?>
<!DOCTYPE HTML>
<!--
    TXT 2.0 by HTML5 UP
    html5up.net | @n33co
    Free for personal and commercial use under the CCA 3.0 license
    (html5up.net/license)
  -->
<html>
  <head>
    <title>I AM PHILOSOPHER:
      World Perspectives © 2013</title>
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
    <!--[if lte IE 9]>
	<link rel="stylesheet" href="css/ie9.css" />
	<![endif]-->
    <!--[if lte IE 8]>
	<script src="js/html5shiv.js"></script>
	<link rel="stylesheet" href="css/ie8.css" />
	<![endif]-->
    <!--[if lte IE 7]>
	<link rel="stylesheet" href="css/ie7.css" />
	<![endif]-->
  </head>

  <body class="homepage">

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
    <nav id="nav" class="skel-panels-fixed">
      <ul>
	<li class="current_page_item"><a href="index.php">Home</a></li>
	<?php
	   foreach($topics_list as $this_topic)
	   {
	   echo '<li><a href="' . strtolower($this_topic) . '.php">' . $this_topic . '</a></li>';
	   }
	   ?>
	<li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
    <!-- /Nav -->
    <!-- Banner -->
    <div id="banner-wrapper">
      <section id="banner">
	<h2>Essays on Modern World Affairs</h2>
	<span class="byline">These exposés are intended to provide insightful
	  commentary canvassing the geopolitical landscape.</span>
	<!--<a href="#" class="button">Hold Breath and Continue</a>-->
      </section>
    </div>
    <!-- /Banner -->

    <!-- make the color of the background a function of the date--time of the
	 freshest article. -->

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
		This site will soon contain musings on topics of import both 
		contemporary and timeless. I will some scattered pieces as I
		write the backend.
	      </header>
	    </section>
	    <!-- /Highlight -->

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
	      <li><a href="http://www.facebook.com/rsinnet" class="facebook">Facebook</a></li>
	      <li><a href="http://twitter.com/rsinnet" class="twitter">Twitter</a></li>
	      <li><a href="http://rwsinnet.tumblr.com" class="tumblr">Tumblr</a></li>
	      <li><a href="http://www.linkedin.com/pub/ryan-sinnet/29/40/1b2" class="linkedin">LinkedIn</a></li>
	      <li><a href="https://plus.google.com/109475572145962156290" class="googleplus">Google+</a></li>
	    </ul>
	  </section>
	  <!-- /Contact -->
	</div>
      </div>
      <div class="row">

	<!-- Copyright -->
	<div id="copyright">
	  &copy; 2013 R. W. Sinnet |
	  Images: <a href="http://fotogrph.com">fotogrph</a>
	  + <a href="http://iconify.it">Iconify.it</a> |
	  Design: <a href="http://n33.co">n33</a>,
	  <a href="http://html5up.net/">HTML5 UP</a>
	</div>
	<!-- /Copyright -->

      </div>
    </footer>
    <!-- /Footer -->

  </body>
</html>
