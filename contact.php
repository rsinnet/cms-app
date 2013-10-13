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
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
  -->
<html>
  <head>
    <title>Contact - I AM PHILOSOPHER</title>
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
	  <h1><a href="#" id="logo">Contact</a></h1>
	  <span class="byline">I AM PHILOSOPHER</span>
	</div>
      </div>
    </header>
    <!-- /Header -->

    <!-- Nav -->
    <nav id="nav" class="skel-panels-fixed">
      <ul>
	<li><a href="index.php">Home</a></li>
	<?php
	   foreach($topics_list as $this_topic)
	   {
	   echo '<li><a href="' . strtolower($this_topic) . '.php">' . $this_topic . '</a></li>';
	   }
	   ?>
	<li class="current_page_item"><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
    <!-- /Nav -->
    
    <!-- Main -->
    <div id="main-wrapper">
      <div id="main" class="container">
	<div class="row">
	  <div class="12u skel-cell-mainContent">
	    <div class="content">
	      
	      <!-- Content -->
	      
	      <!--<article class="is-page-content">

		<header>
		  <h2>No Sidebar</h2>
		  <span class="byline">Semper amet scelerisque metus faucibus morbi congue mattis</span>
		  <ul class="meta">
		    <li class="timestamp">5 days ago</li>
		    <li class="comments"><a href="#">1,024</a></li>
		  </ul>
		</header>

		<section>
		  <span class="image image-full"><img src="images/pic05.jpg" alt="" /></span>
		  <p>
		    Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus. 
		    Praesent semper mod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat. 
		    Aliquam luctus et mattis lectus sit amet pulvinar. Nam turpis nisi 
		    consequat etiam lorem ipsum dolor sit amet nullam.
		  </p>
		</section>
		
		<section>
		  <h3>More intriguing information</h3>
		  <p>
		    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac quam risus, at tempus 
		    justo. Sed dictum rutrum massa eu volutpat. Quisque vitae hendrerit sem. Pellentesque lorem felis, 
		    ultricies a bibendum id, bibendum sit amet nisl. Mauris et lorem quam. Maecenas rutrum imperdiet 
		    vulputate. Nulla quis nibh ipsum, sed egestas justo. Morbi ut ante mattis orci convallis tempor. 
		    Etiam a lacus a lacus pharetra porttitor quis accumsan odio. Sed vel euismod nisi. Etiam convallis 
		    rhoncus dui quis euismod. Maecenas lorem tellus, congue et condimentum ac, ullamcorper non sapien
		    vulputate. Nulla quis nibh ipsum, sed egestas justo. Morbi ut ante mattis orci convallis tempor. 
		    Etiam a lacus a lacus pharetra porttitor quis accumsan odio. Sed vel euismod nisi. Etiam convallis 
		    rhoncus dui quis euismod. Maecenas lorem tellus, congue et condimentum ac, ullamcorper non sapien. 
		    Donec sagittis massa et leo semper a scelerisque metus faucibus. Morbi congue mattis mi. 
		    Phasellus sed nisl vitae risus tristique volutpat. Cras rutrum commodo luctus.
		  </p>
		</section>

		<section>
		  <h3>So in conclusion ...</h3>
		  <p>
		    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac quam risus, at tempus 
		    justo. Sed dictum rutrum massa eu volutpat. Quisque vitae hendrerit sem. Pellentesque lorem felis, 
		    ultricies a bibendum id, bibendum sit amet nisl. Mauris et lorem quam. Maecenas rutrum imperdiet 
		    vulputate. Nulla quis nibh ipsum, sed egestas justo. Morbi ut ante mattis orci convallis tempor. 
		    Etiam a lacus a lacus pharetra porttitor quis accumsan odio. Sed vel euismod nisi. Etiam convallis 
		    rhoncus dui quis euismod. Maecenas lorem tellus, congue et condimentum ac, ullamcorper non sapien. 
		    Donec sagittis massa et leo semper a scelerisque metus faucibus. Morbi congue mattis mi. 
		    Phasellus sed nisl vitae.
		  </p>
		  <p>
		    Suspendisse laoreet metus ut metus imperdiet interdum aliquam justo tincidunt. Mauris dolor urna, 
		    fringilla vel malesuada ac, dignissim eu mi. Praesent mollis massa ac nulla pretium pretium. 
		    Maecenas tortor mauris, consectetur pellentesque dapibus eget, tincidunt vitae arcu. 
		  </p>
		</section>

	      </article>
	      -->

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
	    <h2 class="major"><span>UNDER CONSTRUCTION</span></h2>
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
	  &copy; 2013 R. W. Sinnet | Images: <a href="http://fotogrph.com">fotogrph</a> + <a href="http://iconify.it">Iconify.it</a> | Design: <a href="http://html5up.net/">HTML5 UP</a>
	</div>
	<!-- /Copyright -->

      </div>
    </footer>
    <!-- /Footer -->

  </body>
</html>
