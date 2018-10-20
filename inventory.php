<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Inventory</title>
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
  	<script type="text/javascript" src="js/js.js"></script>
  	<style>
  		.mySlides {display:none}
  		.demo {cursor:pointer}
  	</style>
    <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
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
          <?php
            if (isset($_SESSION['userid'])) {
              echo '<li><a href="includes/logout.inc.php">logout</a></li>';
            }
            else {
              echo '<li><a href="login.php">Login</a></li>';
            }
           ?>
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
            <?php
              if (isset($_SESSION['userid'])) {
                echo '<li><a href="includes/logout.inc.php">logout</a></li>';
              }
              else {
                echo '<li><a href="login.php">Login</a></li>';
              }
             ?>
            <li><a href="register.php">Register</a></li>
          </div>
        </ul>
            <script>$(".button-collapse").sideNav();</script>
    </header>

  <body background="assets/Backg.jpg" width="100%" height="100%" text="white">
	 <main>

     <?php

       require 'dbconnect.php';
       $query = 'SELECT * FROM cart ORDER by itemID ASC';
       $result = mysqli_query($con, $query);

       if ($result):
         if (mysqli_num_rows($result) > 0):
           while ($product = mysqli_fetch_assoc($result)):
           print_r($product);
           ?>
             <!--Cards-->
            <div class="container">
              <div class="content">
               <div class="row">
                 <div class="col s10 m4">
                  <div class="card reveal-panel">
                      <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/cpu_thumb.png">
                      </div>
                       <div class="card-content">
                           <span class="card-title activator grey-text text-lighten-3">CPU<i class="material-icons right">more_vert</i></span>
                           <p class="grey-text text-lighten-3"><a href="cpu.html">Click Here to See Reviews</a></p>
                       </div>
                        <div class="card-reveal">
                          <span class="card-title grey-text text-darken-4">CPU<i class="material-icons right">close</i></span>
                          <p>A CPU also known as a Central Processing Unit, or processor is referred to as the brain of a computer system. A CPU completes most calculations. Without a CPU a computer system will be unable to operate as a CPU allocates tasks to each component of the system, this includes hard disks, RAM, GPU's etc.
                          </p>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <?php
          endwhile;
        endif;
      endif;
       ?>

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
                          }
                         ?>
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
                 © Copyright 2017 - All Rights Reserved
                  <a class="grey-text text-lighten-4 right" href="#!"></a>
                  </div>
                </div>
           </footer>
	  	</div>
  </body>
</html>
