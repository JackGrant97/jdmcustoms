<?php

if (isset($_POST["reset-request-submit"])) {

  $selector = $_POST["selector"];
  $validator = $_POST["validator"];
  $password = $_POST["password"];
  $passwordRepeat = $_POST["password-repeat"];

  if (empty($password) || empty($passwordRepeat)) {
    header("Location: ../login.php?newpwd=empty");
    exit();

  }elseif ($password != $passwordRepeat) {
    header("Location: ../login.php?newpwd=pwdnotsame");
    exit();
  }

  $currentDate = date("U");

  require 'dbconnect.php';

  $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
  $stmt = mysqli_stmt_init($con);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!";
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s" , $selector);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt, $currentDate);
    if (!$row = mysqli_fetch_assoc($result)) {
      echo "Please re-submit your reset request.";
      exit();
    } else {

      $tokenBin = hex2bin($validator);
      $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

      if ($tokenCheck === false) {
        echo "Please re-submit your reset request.";
        exit();
      } elseif ($tokenCheck === true) {

        $tokenEmail = $row["pwdResetEmail"];

        $sql = "SELECT * FROM users WHERE email=?;";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo "There was an error!";
          exit();
        } else {
          mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt, $currentDate);
          if (!$row = mysqli_fetch_assoc($result)) {
            echo "There was an error!";
            exit();
          } else {

            $sql = "UPDATE users SET password=? WHERE email=?";
            $stmt = mysqli_stmt_init($con);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "There was an error!";
              exit();
            } else {
              $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
              mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
              mysqli_stmt_execute($stmt);

              $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
              $stmt = mysqli_stmt_init($con);
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "There was an error!";
                exit();
              } else {
                mysqli_stmt_bind_param($stmt, "s" , $tokenEmail);
                mysqli_stmt_execute($stmt);
                header("Location: ../login.php?newpwd=passwordupdated")
              }
            }
          }
        }
      }
    }
  }

  } else {
  header("Location: ../index.php");
  }