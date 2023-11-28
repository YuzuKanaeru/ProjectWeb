<?php
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db   = 'vosis';
  $connection = mysqli_connect($host, $user, $pass, $db);

  if (!$connection) {
      throw new Exception("Unable to connect to the database: " . mysqli_connect_error());
  }

?>