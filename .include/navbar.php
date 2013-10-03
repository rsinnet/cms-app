<nav id="nav" class="skel-panels-fixed">
  <ul>
    <li><a href="index.php">Home</a></li>
    <?php
       foreach($topics_list as $this_topic)
       {
       echo '<li' . ($topic == $this_topic ? ' class="current_page_item"' : '') .'><a href="' . strtolower($this_topic) . '.php">' . $this_topic . '</a></li>';
       }
       ?>
    <li><a href="contact.php">Contact</a></li>
  </ul>
</nav>
