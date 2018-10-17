<?php
if (isset($_POST['signup-submit'])) {

  require 'dbconnect.php';

  $firstname = $_POST['FirstName'];
  $lastname = $_POST['LastName'];
  $postcode = $_POST['postcode'];
  $city = $_POST['City'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordRepeat = $_POST['password-repeat'];

  if (empty($firstname) || empty($lastname)  || empty($postcode) || empty($city) || empty($address) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../register.php?error=emptyfields&FirstName=".$firstname."&LastName=".$lastname."&postcode=".$postcode.
    "&City=".$city."&address=".$address."&email=".$email);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z]*$/",$firstname) && !preg_match("/^[a-zA-Z]*$/",$lastname) && !preg_match("/^[a-zA-Z]*$/",$city)) {
      header("Location: ../register.php?error=invalidmailfirstnamelastnamecity&address=".$address);
      exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../register.php?error=invalidmail&FirstName=".$firstname."&LastName=".$lastname."&postcode=".$postcode.
    "&City=".$city."&address=".$address);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z]*$/",$firstname)) {
    header("Location: ../register.php?error=invalidfirstname&LastName=".$lastname."&postcode=".$postcode.
    "&City=".$city."&address=".$address);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z]*$/",$lastname)) {
    header("Location: ../register.php?error=invalidlastName&FirstName=".$firstname."&postcode=".$postcode.
    "&City=".$city."&address=".$address);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z]*$/",$city)) {
    header("Location: ../register.php?error=invalidCity&FirstName=".$firstname."&LastName=".$lastname."&postcode=".$postcode."&address=".$address);
    exit();
  }
  else if ($password !== $passwordRepeat) {
    header("Location: ../register.php?error=passwordcheck&FirstName=".$firstname."&LastName=".$lastname."&postcode=".$postcode."&address=".$address);
    exit();
  }
  else {

    $sql = "SELECT email FROM users WHERE email=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../register.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        header("Location: ../register.php?error=emailtaken");
        exit();
      }
      else {
        $sql = "INSERT INTO users (FirstName, LastName, email, password, postcode, address, city) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../register.php?error=sqlerror");
          exit();
        }
        else {
          $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

          mysqli_stmt_bind_param($stmt, "sssssss", $FirstName, $lastName, $email, $hashedpassword, $postcode, $address, $city);
          mysqli_stmt_execute($stmt);
          header("Location: ../register.php?signup=success");
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($con);
}
else {
  header("Location: ../register.php");
  exit();
}
