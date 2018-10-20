<?php

  require 'dbconnect.php';

  $itemID = $_POST['itemID'];
  $itemName = $_POST['ItemName'];
  $itemMillage = $_POST['itemMillage'];
  $itemPrice = $_POST['itemPrice'];
  $image1 = $_POST['image1'];
  $image2 = $_POST['image2'];
  $image3 = $_POST['image3'];
  $image4 = $_POST['image4'];

  $sql = "SELECT * FROM cart ORDER by itemID ASC";
  $stmt = mysqli_stmt_init($con);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../inventory.php?error=sqlerror04");
    exit();
  }
  else {
    mysqli_stmt_bind_param($stmt, "ssssssss", $itemID, $itemName, $itemMillage, $itemPrice, $image1, $image2, $image3, $image4);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($product = mysqli_fetch_assoc($result)) {
      print_r($result);
    }
  }
