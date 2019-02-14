<?php

if (isset($_POST["reset-request-submit"])) {

  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);

  $url = "https://jdmcustoms.herokuapp.com/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

  $expires = date("U") + 1800;

  require 'dbconnect.php';

  $userEmail = $_POST["email"];

  $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
  $stmt = mysqli_stmt_init($con);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!";
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s" , $userEmail);
    mysqli_stmt_execute($stmt);
  }

  $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";

  $stmt = mysqli_stmt_init($con);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!";
    exit();
  } else {
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss" , $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);
  }

    mysqli_stmt_close($stmt);
    mysqli_close($con);

    $to = $userEmail;

    $subject = 'Reset Your Password for JDMCustoms';

    $message = '<p>We recieved a password reset request. The link to reset your password is below. If you did not make this request you can ignore this email</p>';
    $message .= '<p>Here is you password reset link: </br></p>';
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    $headers = "From: JDMCustoms <g1492622@student.southstaffs.ac.uk>\r\n";
    $headers .= "Reply-To: g1492622@student.southstaffs.ac.uk\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: ../reset-password.php?reset=succcess");

} else {
  header("Location: ../index.php");
}
