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
<main>
  <div id="login-page" class="row">
      <div class="col s12 z-depth-6 card-panel">
        <form class="login-form">
          <div class="row">
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
            <div class="input-field col s12 m12 l12  login-text">
                <input type="checkbox" id="remember-me" />
                <label for="remember-me">Remember me</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <a href="#" class="btn waves-effect waves-light col s12">Login</a>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6 m6 l6">
              <p class="margin medium-small"><a href="#">Register Now!</a></p>
            </div>
            <div class="input-field col s6 m6 l6">
                <p class="margin right-align medium-small"><a href="#">Forgot password?</a></p>
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
