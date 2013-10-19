<nav id="nav" class="skel-panels-fixed">
  <ul>
    <?php
      echo '<li' . ($topic == "Home" ? ' class="current_page_item"' : '') . '><a href="index.php">Home</a></li>';
      foreach($topics_list as $this_topic)
	echo '<li' . ($topic == $this_topic ? ' class="current_page_item"' : '') . '><a href="' . strtolower($this_topic) . '.php">' . $this_topic . '</a></li>';
      echo '<li' . ($topic == "Contact" ? ' class="current_page_item"' : '') . '><a href="contact.php">Contact</a></li>';
    ?>
  </ul>
</nav>
