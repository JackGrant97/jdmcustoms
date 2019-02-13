<?php
if (isset($_POST['login-submit'])) {

  require 'dbconnect.php';

  $mail = $_POST['email'];
  $password = $_POST['password'];
  $_SESSION['FirstName'] = $firstname;

  //checks if both fields contain information
  if (empty($mail) || empty($password)) {
    header("Location: ../login.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT * FROM users WHERE email=?;";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../login.php?error=sqlerror03");
      exit();
    }
    else {

      mysqli_stmt_bind_param($stmt, "s", $mail);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $passwordcheck = password_verify($password, $row['password']);
        if ($passwordcheck == false) {
          header("Location: ../login.php?error=wrongpassword");
          exit();
        }
        else if ($passwordcheck == true) {
          session_start();
          $_SESSION['userid'] =  $row['UserID'];
          $_SESSION['FirstName'] =  $row['FirstName'];

          header("Location: ../login.php?login=success");
          exit();
        }
        else {
          header("Location: ../login.php?error=wrongpassword");
          exit();
        }
      }
      else {
        header("Location: ../login.php?error=nouser");
        exit();
      }
    }
  }

}
else {
  header("Location: ../login.php");
  exit();
}
