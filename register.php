<html lang="en">
<head>
      <title>Register</title>
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
    <!--<div class="login">
      <form action="includes/login.inc.php"method="post">
        <input type="text"  id="first_name" name="FirstName" placeholder="First Name...">
        <input type="text" name="LastName"placeholder="Last Name...">
        <input type="text" name="email" placeholder="E-mail...">
        <input type="password" name="password" placeholder="Password">
        <input type="text" name="postcode" placeholder="Postcode">
        <input type="text" name="address" placeholder="Address">
        <input type="text" name="City" placeholder="City">
        <button type="submit" name="login-submit">Login</button>
      </form>
      <a href="signup.php">signup</a>
      <form action="includes/logout.inc.php"method="post">
        <button type="submit" name="logout-submit">Logout</button>
      </form>
    </div>
    <p>You Are logged out!</p>
    <p>You are logged in!</p> !-->
    <div class="register">
      <div class="row">
        <form class="col s12" action="includes/login.inc.php" method="post">
          <div class="row">
            <div class="input-field col s6">
              <input id="first_name" name="FirstName" type="text" class="validate">
              <label for="first_name">First Name</label>
            </div>
            <div class="input-field col s6">
              <input id="last_name" name="LastName" type="text" class="validate">
              <label for="last_name">Last Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="postcode" name="postcode" type="text" class="validate">
              <label for="postcode">Postcode</label>
            </div>
            <div class="input-field col s6">
              <input id="City" name="City" type="text" class="validate">
              <label for="City">City</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="address" name="address" type="text" class="validate">
              <label for="address">Address</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="email" name="email" type="email" class="validate">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="password" name="password" type="password" class="validate">
              <label for="password">Password</label>
            </div>
          </div><div class="row">
            <div class="input-field col s12">
              <input id="password" name="password-repeat" type="password" class="validate">
              <label for="password">Confirm Password</label>
            </div>
          </div>
          <form action="includes/logout.inc.php"method="post">
            <button class="btn waves-effect waves-light" type="submit" name="login-submit">Submit
              <i class="material-icons right">add</i>
            </button>
          </form>
        </form>
      </div>
    </div>
    <div class="message">
      <p>You Are logged out!</p>
      <p>You are logged in!</p>
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
