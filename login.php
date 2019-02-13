<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <title>Login</title>
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
  <header>
  <!-- Navbar -->
  <nav class="z-depth-0 grey darken-4">
       <div class="nav-wrapper">
        <a href="#!" class="brand-logo"></a>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
        <li><a href="inventory.php">Inventory</a></li>
        <li><a href="about.php">About</a></li>
        <?php
          if (isset($_SESSION['userid'])) {
            echo '<li><a href="includes/logout.inc.php">logout</a></li>';
          }
          else {
            echo '<li><a href="login.php">Login</a></li>';
            echo '<li><a href="includes/signup.inc.php">Register</a></li>';
          }
         ?>

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
          <?php
            if (isset($_SESSION['userid'])) {
              echo '<li><a href="includes/logout.inc.php">logout</a></li>';
            }
            else {
              echo '<li><a href="login.php">Login</a></li>';
              echo '<li><a href="includes/signup.inc.php">Register</a></li>';
            }
           ?>

        </div>
      </ul>
          <script>$(".button-collapse").sideNav();</script>
  </header>
<body background="assets/bg.jpeg" width="100%" height="100%">
  <main>
   <div class="container">
    <div class="login">
      <div class="row">
        <form class="col s12 m12 l12" action="includes/login.inc.php" method="post">
          <div class="row">
            <div class="input-field col s12 m12 l12">
              <input id="email" name="email" type="email" class="validate">
              <label for="email">E-mail</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m12 l12">
              <input id="password" name="password" type="password" class="validate">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="submit">
              <button class="waves-effect waves-light btn" type="submit" name="login-submit">LOGIN
                <i class="material-icons right">add</i>
              </button>
          </div>
        </form>
      </div>
    </div>
  </div>
    <div class="status">
      <?php
        if (isset($_SESSION['userid'])) {
          echo '<p><b>Welcome</b></p>'. $_SESSION['FirstName'];

        }
        else {
          echo '<p><b>You are Logged out!</b></p>';
        }
       ?>
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
                    <?php
                      if (isset($_SESSION['userid'])) {
                        echo '<li><a href="includes/logout.inc.php">logout</a></li>';
                      }
                      else {
                        echo '<li><a href="login.php">Login</a></li>';
                        echo '<li><a href="includes/signup.inc.php">Register</a></li>';
                      }
                     ?>

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
