<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>About</title>
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
              echo '<li><a href="myprofile.php">My Profile</a></li>';
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
                echo '<li><a href="myprofile.php">My Profile</a></li>';
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
  <body background="assets/mechanic.jpeg" width="100%" height="100%" text="white">
    <main>
         <script>
              $('.carousel.carousel-slider').carousel({fullWidth: true});
        </script>
     <div class="aboutinfo">
          <div class="container">
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                  <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>About JDM Customs</div>
                  <div class="collapsible-body"><span> JDM Customs is a japanese car sales services which only provides top quality vehicle</span></div>
                </li>
                <li>
                  <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Where are we based</div>
                  <div class="collapsible-body">
                    <div class="row">
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d2418.9092143436396!2d-1.831383186105619!3d52.67967718346019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x4870a78510ba1c69%3A0x4fc30a0eff73c8c2!2sSouth+Staffordshire+College%2C+Lichfield+Campus%2C+The+Friary%2C+Lichfield+WS13+6QG!3m2!1d52.6797598!2d-1.8295561999999999!5e0!3m2!1sen!2suk!4v1510328670473" width="800" height="800" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class="col s6">
                            <b>Location</b>
                            <br>Lichfield Campus, The Friary,
                            <br>Postcode: WS13 6QG

                      </div>
                      <div class="col s6">
                            <!--Specs
                            <b>Title</b>

                            <br>Cores: 4
                            <br>Threads: 8
                            <br>Processor Base Frequency: 3.50 GHz
                            <br>Max Turbo Frequency: 3.90 GHz
                            <br>Cache: 8 MB SmartCache
                            <br>Memory Type: DDR3
                            <br>TDP: 84 W -->
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Contact</div>
                  <div class="collapsible-body"><span> Email: g1492622@student.southstaffs.ac.uk</span></div>
                </li>
            </ul>
        </div>
    </div>
      <script>
            $(document).ready(function(){
            $('.collapsible').collapsible();
          });
      </script>
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
                            echo '<li><a href="myprofile.php">My Profile</a></li>';
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
                 © Copyright 2017 - All Rights Reserved
                  <a class="grey-text text-lighten-4 right" href="#!"></a>
                  </div>
                </div>
           </footer>
	  	</div>
    <!--Import jQuery before materialize.js-->

  </body>
</html>
