<?php
  $host = 'localhost';
  $user = 'sivosism_db';
  $pass = '26Desember2003.';
  $db   = 'sivosism_db';
  $connection = mysqli_connect($host, $user, $pass, $db);

  if (!$connection) {
      throw new Exception("Unable to connect to the database: " . mysqli_connect_error());
  }

?>