<?php
if (isset($_POST['signup-submit'])) {

  require'dbconnect.php';

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
    "&City=".$city."&address=".$address."&email=".$email."&password=".$password."&passwword-repeat=".$passwordRepeat);
  }
}
