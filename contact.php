<?php
  $topic= 'Contact';
  include '.include/utilities.php';

  $con = iap_sql_connect();
  $topics_list = iap_get_topics($con);
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
    <?php include '.include/topic_html_head.html'; ?>
  </head>
  <body>
    
    <!-- Header -->
    <?php include '.include/topic_header.php'; ?>
    
    <!-- Nav -->
    <?php include '.include/navbar.php'; ?>

    <!-- Footer -->
    <footer id="footer" class="container">
      <div class="row">
	<div class="12u">
	  
	  <!-- Contact -->
	  <?php echo file_get_contents('.include/footer_contact.html'); ?>
	  
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
