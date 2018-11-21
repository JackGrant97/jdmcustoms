<?php
  session_start();
?>
<!DOCTYPE html>
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
  <body background="assets/Backg.jpg" width="100%" height="100%" text="white">
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
                      <a class="carousel-item" href="#two!"><img src="http://via.placeholder.com/900x500"></a>
                      <a class="carousel-item" href="#three!"><img src="http://via.placeholder.com/900x500"></a>
                      <a class="carousel-item" href="#four!"><img src="http://via.placeholder.com/900x500"></a>
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
                           <h3><?php echo $product['itemMake']?></h3>
                        </div>
                      <div class="col s6">
                            <b><br>Make:</b> <?php echo $product['itemMake']?>
                            <b><br>Model:</b>
                            <b><br>Year:</b>
                            <b><br>Millage:</b>
                            <b><br>Engine Size:</b>
                            <b><br>WHP:</b>
                      </div>
                      <div class="col s6">
                            <b><br>Fuel Type:</b>
                            <b><br>Transmission:</b>
                            <b><br>Price:</b>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Owner Overview</div>
                  <div class="collapsible-body">
                    <div class="row">
                        <!--<div class="title">
                            <h3>Product Review</h3>
                        </div>
                        <div class="col s6">
                            <b>Advantages</b>
                            <br><a>• Performance per pound is extremely good</a>
                            <br><a>• Still a viable choice for the latest games</a>
                            <br><a>• Perfect for 1080p gaming</a>
                            <br><a>• Can be overclocked</a>
                            <br><br>
                        </div>
                        <div class="col s6">
                            <b>Disadvantages</b>
                              <br><a>• Older Chipset</a>
                              <br><a>• Doesn't support DDR4 memory</a>
                              <br><a>• LGA 1150 is no longer supported</a>
                              <br><a>• Only small improvements over last gen CPU's </a>
                              <br><br>
                        </div>
                        <div class="con">
                                <br>
                                <b>Conclusion</b>
                                <br>
                                    <a>Intel’s i7 4770k is a LGA 1150 socket CPU codename Haswell which offers 4 cores, and 8 threads at a base clock of 3.5ghz. However, can easily be overclocked to 4.5ghz with adequate cooling such as a AIO liquid cooling kit. The 4770K is a perfect choice when building a system for 1080p gaming as it can run the latest AAA games at 50- 70FPS. However, newer CPU’s would be preferred for 1440p and 4K gaming as the 4770k cannot handle higher resolutions. This is due to it possibly bottlenecking even with the latest NVidia gtx 1080ti.
                                    The 4770k is also perfect for entry level content creation as render times at 1080 are surprisingly short especially when paired with a NVidia gtx 1070 and 16gb of DDR3 RAM.
                                    As a final conclusion I would defiantly recommend the 4770K to first time or budget builders as the CPU is stable, reliable, easy to overclock, and performs exceptionally well.
                                    </a>
                        </div>
                        <div class="rating">
                            <h3>Final Score</h3>
                            <b>7/10</b>
                        </div>
                        -->
                    </div>
                  </div>
                </div>
                </li>
                <div class="container">
                  <div class="buy">
                    <a href="#!" class="btn waves-effect">Buy Now</a>
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
