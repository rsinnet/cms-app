    <!-- Footer -->
    <footer id="footer" class="container">
      <div class="row">
	<div class="12u">

	  <!-- About -->
	  <?php echo file_get_contents('.include/about.html'); ?>

	</div>
      </div>
      <div class="row">
	<div class="12u">

	  <!-- Contact -->
	  <?php echo file_get_contents('.include/footer_contact.html'); ?>

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
