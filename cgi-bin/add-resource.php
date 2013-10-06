<html>
  <body>
    <?php
      // Just invoke python, forget PHP.
      $result = shell_exec('./add-resource.php');
      echo $result;
       ?>
  </body>
</html>
