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
       $con = mysqli_connect("eu-cdbr-west-02.cleardb.net", "b35dd9c913bab7", "2cd16625", "heroku_11b47e2296993b0") or die("Connection Failed" .
       mysqli_error($con));
       $query = 'SELECT * FROM cart ORDER by itemID ASC';
       $result = mysqli_query($con, $query);

       if ($result) {
         if (mysqli_num_rows($result) > 0) {
           ?>
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
           <?php
         }
       }
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
		  <div class="col s10 m4">
			<div class="card reveal-panel">
			  <div class="card-image waves-effect waves-block waves-light">
				<img class="activator" src="assets/gpu_thumb.png">
			  </div>
			<div class="card-content">
				  <span class="card-title activator grey-text text-lighten-3">GPU<i class="material-icons right">more_vert</i></span>
				  <p class="grey-text text-lighten-3"><a href="gpu.html">Click Here to See Reviews</a></p>
			</div>
			  <div class="card-reveal">
				<span class="card-title grey-text text-darken-4">GPU<i class="material-icons right">close</i></span>
				<p>A GPU also known as a Graphical Processing Unit connects to a computer system via the PCIE slot located on the motherboard.  A GPU is used to display all graphical aspects of a computer system. The GPU then outputs the graphical data to a monitor which then allows the user to operate the computer system with ease. GPU's can also be used for video games as it can render/display 3d models, images, and animations.
				</p>
			  </div>
			</div>
		  </div>
		   <div class="col s10 m4">
			<div class="card reveal-panel">
			  <div class="card-image waves-effect waves-block waves-light">
				<img class="activator" src="assets/psu_thumb.png">
			  </div>
			<div class="card-content">
				  <span class="card-title activator grey-text text-lighten-3">PSU<i class="material-icons right">more_vert</i></span>
				  <p class="grey-text text-lighten-3"><a href="PSU.html">Click Here to See Reviews</a></p>
			</div>
			  <div class="card-reveal">
				<span class="card-title grey-text text-darken-4">PSU<i class="material-icons right">close</i></span>
				<p>A PSU also known as a power supply unit is used to power a computer system. 90% of cables inside a computer system directly connect to the power supply unit. PSU’s come in many watt sizes, and layouts. Some examples of layouts are modular, semi-modular, and non-modular. Modular PSU’s allow for all cables to be disconnected from the power supply, this allows for cables not being used to be taken out of a computer system. This results in space being saved within the computer case. A semi-modular power supply contains all essential cables being fixed to the unit such as 16-pin power connecter and CPU power connector. All other cables such as PCIE, Sata etc. can all be disconnected. This still allows for room to be saved but not all cables can be taken out. A non-modular units do not allow for any cables to be removed. This is the cheapest category however cables not being used will take up unnecessary room.
				</p>
			  </div>
			</div>
		  </div>
		 </div>
		 <div class="row">
			 <div class="col s10 m4">
			<div class="card reveal-panel">
			  <div class="card-image waves-effect waves-block waves-light">
				<img class="activator" src="http://via.placeholder.com/300x300">
			  </div>
			<div class="card-content">
				  <span class="card-title activator grey-text text-lighten-3">RAM<i class="material-icons right">more_vert</i></span>
				  <p class="grey-text text-lighten-3"><a href="index.html">Click to see Reviews</a></p>
			</div>
			  <div class="card-reveal">
				<span class="card-title grey-text text-darken-4">RAM<i class="material-icons right">close</i></span>
				<p>RAM also known as Random Access Memory temporary stores information within a computer system. Once the programme is closed or the pc is powered down the RAM is cleared. When a piece of software is opened it requires memory (RAM) the more RAM a system has the more software and tasks can be done at one. It is recommended that 8GB of RAM is installed.
				</p>
			  </div>
			</div>
		  </div>
			  <div class="col s10 m4">
			<div class="card reveal-panel">
			  <div class="card-image waves-effect waves-block waves-light">
				<img class="activator" src="assets/case_thumb.png">
			  </div>
			<div class="card-content">
				  <span class="card-title activator grey-text text-lighten-3">Case<i class="material-icons right">more_vert</i></span>
				  <p class="grey-text text-lighten-3"><a href="case.html">Click to see Reviews</a></p>
			</div>
			  <div class="card-reveal">
				<span class="card-title grey-text text-darken-4">Case<i class="material-icons right">close</i></span>
				<p>A computer case is used to store and install all hardware, this includes the motherboard, CPU, GPU, PSU, RAM, and HDD. A computer case is important as it also protects each component from static interference/shock which could damage the computer system.
				</p>
			  </div>
			</div>
		  </div>
			  <div class="col s10 m4">
			<div class="card reveal-panel">
			  <div class="card-image waves-effect waves-block waves-light">
				<img class="activator" src="http://via.placeholder.com/300x300">
			  </div>
			<div class="card-content">
				  <span class="card-title activator grey-text text-lighten-3">Mouse<i class="material-icons right">more_vert</i></span>
				  <p class="grey-text text-lighten-3"><a href="#">Click to see Reviews</a></p>
			</div>
			  <div class="card-reveal">
				<span class="card-title grey-text text-darken-4">Mouse<i class="material-icons right">close</i></span>
				<p>A computer mouse is used to navigate the GUI (Graphical user interface) of a computer system via cursor. The cursor is represented by an arrow. A mouse contains a minimum of 2 buttons, a left click, and a right click. Left click can be used to open and move around files. Right click can be used to open properties or modify the file i.e. delete, copy, paste, etc.
				</p>
			  </div>
			</div>
		  </div>
		</div>
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
