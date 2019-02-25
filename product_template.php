<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Product</title>
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
  <body background="assets/audi.jpg" width="100%" height="100%" text="white">
      <main>
        <div class="maincontent">
          <?php
          $con = mysqli_connect("eu-cdbr-west-02.cleardb.net", "b35dd9c913bab7", "2cd16625", "heroku_11b47e2296993b0") or die("Connection Failed" .
          mysqli_error($con));

          $id = intval($_GET['itemID']);
          $sql = mysqli_query($con,"SELECT * FROM products WHERE itemID = ".$id);
          if(mysqli_num_rows($sql)){
            $product = mysqli_fetch_array($sql);
          }
           ?>
          <div class="slide">
            <div class="container">
                <div class="carousel carousel-slider center" data-indicators="true">
                   <a class="carousel-item" href="#one!"><img src="<?php echo $product['image1']?>"></a>
                      <a class="carousel-item" href="#two!"><img src="<?php echo $product['image2']?>"></a>
                      <a class="carousel-item" href="#three!"><img src="<?php echo $product['image3']?>"></a>
                      <a class="carousel-item" href="#four!"><img src="<?php echo $product['image4']?>"></a>
                </div>
            </div>
         </div>

         <script>
              $('.carousel.carousel-slider').carousel({fullWidth: true});
        </script>
     <div class="info">
          <div class="container">
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                  <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Vehicle Details</div>
                  <div class="collapsible-body">
                    <div class="row">
                        <div class="title">
                           <h3><?php echo $product['itemMake']?>: <?php echo $product['itemModel']?></h3>
                        </div>
                      <div class="col s6">
                            <b><br>Make:</b> <?php echo $product['itemMake']?>
                            <b><br>Model:</b> <?php echo $product['itemModel']?>
                            <b><br>Year:</b>  <?php echo $product['itemYear']?>
                            <b><br>Colour</b>  <?php echo $product['itemColour']?>
                            <b><br>Millage:</b> <?php echo $product['itemMillage']?>
                      </div>
                      <div class="col s6">
                            <b><br>Fuel Type:</b> <?php echo $product['fuelType']?>
                            <b><br>Engine Size:</b> <?php echo $product['engineSize']?>
                            <b><br>Transmission:</b> <?php echo $product['trans']?>
                            <b><br>WHP:</b> <?php echo $product['whp']?> WHP
                            <b><br>Price:</b> £<?php echo $product['itemPrice']?>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Owner Overview</div>
                  <div class="collapsible-body">
                    <div class="row">
                      <div class="col s6">
                      <b>Statement:</b><br> <?php echo $product['OwnerDesc']?>
                      </div>
                    </div>
                  </div>
                </div>
                </li>
                <div class="container">
                  <div class="buy">
                    <a href="buy.php" class="btn waves-effect">Buy Now</a>
                  </div>
              </div>
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
