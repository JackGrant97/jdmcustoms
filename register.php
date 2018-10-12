<html lang="en">
<head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/materialize.css">
      <link type="text/css" rel="stylesheet" href="css/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    <style>
      .mySlides {display:none}
      .demo {cursor:pointer}
    </style>
      <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body ng-app="mainModule" ng-controller="mainController">
  <!-- Navbar -->
  <nav class="z-depth-0">
      <div class="nav-wrapper">
      <a href="#!" class="brand-logo"></a>
               <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
         <li><a href="inventory.php">Inventory</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
      </ul>
    </div>
  </nav>
      <!--Side Nav-->
       <ul id="slide-out" class="side-nav">
        <div class="text">
          <li><a href="index.php">Home</a></li>
          <li><div class="divider"></div></li>
          <li><a href="inventory.php">Inventory</a></li>
          <li><a href="about.php">About</a></li>
          <li><div class="divider"></div></li>
          <li><a href="login.php">login</a></li>
          <li><a href="register.php">Register</a></li>
        </div>
      </ul>
          <script>$(".button-collapse").sideNav();</script>
  </header>
<body background="assets/bg.jpeg" width="100%" height="100%">
  <?php
    session_start();
    if(isset($_SESSION['userID'])) {
    header("Location: index.php");
    }
    include_once 'dbconnect.php';
    //set validation error flag as false
    $error = false;
    //check if form is submitted
    if (isset($_POST['signup'])) {
    $firstname = mysqli_real_escape_string($con, $_POST['First Name']);
    $Lastname = mysqli_real_escape_string($con, $_POST['Last Name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $City = mysqli_real_escape_string($con, $_POST['City']);
    $postcode = mysqli_real_escape_string($con, $_POST['postcode']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
    $error = true;
    $firstname_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $error = true;
    $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
    $error = true;
    $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
    $error = true;
    $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
    if(mysqli_query($con, "INSERT INTO users(name,email,password) VALUES('" .

    $firstname_error . "', '" . $email . "', '" . md5($password) . "')")) {

    $successmsg = "Successfully Registered! <a href='login.php'>Click here to

    Login</a>";

    } else {
    $errormsg = "Error in registering...Please try again later!";
    }
    }
    }
    ?>
<main>
  <div id="login-page" class="row">
      <div class="col s12 z-depth-6 card-panel">
        <form class="login-form">
          <div class="row">
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">info_outline</i>
              <input class="FIrstName" type="email">
              <label for="FirstName">First Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">info_outline</i>
              <input class="LastName" type="email">
              <label for="LastName">Last Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">info_outline</i>
              <input class="Address" type="email">
              <label for="City">Address</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">info_outline</i>
              <input class="City" type="email">
              <label for="City">City</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">info_outline</i>
              <input class="PostCode" type="email">
              <label for="PostCode">Postcode</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">mail_outline</i>
              <input class="validate" id="email" type="email">
              <label for="email" data-error="wrong" data-success="right">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">lock_outline</i>
              <input id="password" type="password">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <a href="#" class="btn waves-effect waves-light col s12">Register</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </main>
  <!--Footer-->
    <div class="footer">
      <footer class="page-footer grey darken-4">
            <div class="container">
              <div class="row">
                <div class="col l6 s12">
                  <h5 class="white-text">Footer Content</h5>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="inventory.php">Inventory</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="login.php">login</a></li>
                    <li><a href="register.php">Register</a></li>
                </div>
                <div class="col l4 offset-l2 s12">
                  <h5 class="white-text">Links</h5>
                  <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Twitter</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Youtube</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Instagram</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="footer-copyright">
              <div class="container">
             © Copyright 2018 - All Rights Reserved
              <a class="grey-text text-lighten-4 right" href="#!"></a>
              </div>
            </div>
       </footer>
  </div>
</body>
</html>
