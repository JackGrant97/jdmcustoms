<?php

  require 'dbconnect.php';
  $query = "SELECT * FROM cart ORDER by itemID ASC";
  $result = mysqli_query($con, $query);

  $itemID = $_POST['itemID'];
  $itemName = $_POST['ItemName'];
  $itemMillage = $_POST['itemMillage'];
  $itemPrice = $_POST['itemPrice'];
  $image1 = $_POST['image1'];
  $image2 = $_POST['image2'];
  $image3 = $_POST['image3'];
  $image4 = $_POST['image4'];

  $product = mysqli_fetch_assoc($result);

  print_r($result);
