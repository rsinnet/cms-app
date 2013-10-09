<!DOCTYPE HTML>
<!--
    TXT 2.0 by HTML5 UP
    html5up.net | @n33co
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
  -->
<html>
  <head>
    <title>Images - Content Manager - I AM PHILOSOPHER</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700|Open+Sans+Condensed:700" rel="stylesheet" />
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
    <!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
    <!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->
  </head>
  <body>
    
    <!-- Header -->
    <header id="header">
      <div class="logo">
	<div>
	  <h1><a href="#" id="logo">Images [CM]</a></h1>
	  <span class="byline">I AM PHILOSOPHER</span>
	</div>
      </div>
    </header>
    <!-- /Header -->
    
    <!-- Nav -->
    <nav id="nav" class="skel-panels-fixed">
      <ul>
	<li><a href="index.html">Main</a></li>
	<li><a href="#">Articles</a><li>
	<li class="current_page_item"><a href="cm-images.php">Images</a></li>
	<li><a href="#">Metadata</a></li>
      </ul>
    </nav>
    <!-- /Nav -->
    
    <!-- Main -->
    <div id="main-wrapper">
      <div id="main" class="container">
	<div class="row">
	  <div class="9u skel-cell-mainContent">
	    <div class="content content-left">
	      
	      <!-- Content -->
	      
	      <article class="is-page-content">
		<script src="js/cm-images.js"></script>

		<section>
		  <h3>Browse Images</h3>
		  <?php system('cgi-bin/cm_image_list.py') ?>

		  <h3>Edit Image</h3>
		  <?php include 'cgi-bin/cm-edit-image.php'; ?>

		  <h3>Add Image</h3>
		  <?php include 'cgi-bin/cm-add-image.php'; ?>
	      </article>
	      
	      <!-- /Content -->
	      
	    </div>
	  </div>
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
		</ul>
		<a href="#" class="button button-alt">Browse Archives</a>
	      </section>
	      <!-- /Recent Posts -->
	      
	    </div>
	  </div>
	</div>
      </div>
      <!-- /Main -->
      
      <!-- Footer -->
      <footer id="footer" class="container">
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
