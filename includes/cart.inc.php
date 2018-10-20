<?php
  require 'dbconnect.php';

  $query = "SELECT * FROM cart ORDER BY ItemID ASC"
  $stmt = mysqli_stmt_init($con);
  if (!mysqli_stmt_prepare($stmt, $query)) {
    header("Location: ../inventory.php?error=sqlerror04");
    exit();
  }
  $result = mysqli_stmt_get_result($stmt);
  if ($result) {
    while ($product = mysqli_fetch_assoc($result)) {
      print_r($product);
    }
  }
 ?>
