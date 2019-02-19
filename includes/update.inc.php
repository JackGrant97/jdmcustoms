<?php
session_start();
if (isset($_POST['update-submit'])) {

  require 'dbconnect.php';

  $firstname = $_POST['FirstName'];
  $lastname = $_POST['LastName'];
  $postcode = $_POST['postcode'];
  $city = $_POST['City'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordRepeat = $_POST['password-repeat'];
  $Dob = $_POST['Dob'];
  $Telephone = $_POST['telephone'];
  $id = $_SESSION['UserID'];

  if (empty($firstname) || empty($lastname)  || empty($postcode) || empty($city) || empty($address) || empty($email) || empty($Dob) || empty($Telephone)) {
    header("Location: ../update.php?error=emptyfields&FirstName=".$firstname."&LastName=".$lastname."&postcode=".$postcode.
    "&City=".$city."&address=".$address."&email=".$email."&Dob=".$Dob."&telephone=".$Telephone);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z]*$/",$firstname) && !preg_match("/^[a-zA-Z]*$/",$lastname) && !preg_match("/^[a-zA-Z]*$/",$city)) {
      header("Location: ../update.php?error=invalidmailfirstnamelastnamecity&address=".$address);
      exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../update.php?error=invalidmail&FirstName=".$firstname."&LastName=".$lastname."&postcode=".$postcode.
    "&City=".$city."&address=".$address);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z]*$/",$firstname)) {
    header("Location: ../update.php?error=invalidfirstname&LastName=".$lastname."&postcode=".$postcode.
    "&City=".$city."&address=".$address);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z]*$/",$lastname)) {
    header("Location: ../update.php?error=invalidlastName&FirstName=".$firstname."&postcode=".$postcode.
    "&City=".$city."&address=".$address);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z]*$/",$city)) {
    header("Location: ../update.php?error=invalidCity&FirstName=".$firstname."&LastName=".$lastname."&postcode=".$postcode."&address=".$address);
    exit();
  }
  else {

    $sql = "SELECT email FROM users WHERE email=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../update.php?error=sqlerror01");
      exit();
    }
    else {
      //checks if email entered on register page is already in use
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        header("Location: ../update.php?error=emailtaken".$email);
        exit();
      }
      else {
        //inputs data entered from the register page into the database
        $sql = "UPDATE users SET FirstName = ?, LastName = ?, email = ?, password = ?, postcode = ?, address = ?, City = ?, Dob = ?, telephone = ? WHERE UserID = $id";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../update.php?error=sqlerror02");
          exit();
        }
        else {
          //Uses BCrypt to hash users password
          mysqli_stmt_bind_param($stmt, "ssssssss", $firstname, $lastname, $email, $postcode, $address, $city, $Dob, $Telephone);
          mysqli_stmt_execute($stmt);
          header("Location: ../update.php?update=success");
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($con);
}
else {
  header("Location: ../update.php");
  exit();
}
