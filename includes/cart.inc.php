<?php
  require 'dbconnect.php';

  $itemID = $_POST['itemID'];
  $itemName = $_POST['itemName'];
  $itemPrice = $_POST['itemPrice'];
  $itemImage = $_POST['itemImage'];

  $sql = "SELECT * FROM cart ORDER BY ItemID ASC"
  $stmt = mysqli_stmt_init($con);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../inventory.php?error=sqlerror04");
    exit();
  }
 ?>
