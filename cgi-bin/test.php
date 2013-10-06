<html>
  <body>
    <?php
      // Just invoke python, forget PHP.
      $result = shell_exec('./test.py');
      echo $result;
       ?>
  </body>
</html>
