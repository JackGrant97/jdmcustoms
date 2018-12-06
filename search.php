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
  <body background="assets/Backg.jpg" width="100%" height="100%" text="white">
	 <main>
     <div class="container">
       <form action="search.php"class="searchbar" method="POST">
         <div class="input-field">
           <input id="search" type="search" required>
           <label class="label-icon" for="search"><i class="material-icons">search</i></label>
           <i class="material-icons">close</i>
         </div>
       </form>

     <div class="row">
         <?php
           $con = mysqli_connect("eu-cdbr-west-02.cleardb.net", "b35dd9c913bab7", "2cd16625", "heroku_11b47e2296993b0") or die("Connection Failed" .
           mysqli_error($con));
           if (isset($_POST['searchbar'])) {
             $query = "SELECT * FROM products WHERE itemMake LIKE '%$search%' OR itemModel LIKE '%$search%' OR itemYear LIKE '%$search%' trans LIKE '%$search%' fuelType LIKE '%$search%'";
             $result = mysqli_query($con, $sql);
             $queryResult = mysqli_num_rows($result);

             if ($queryResult > 0 ) {
               while ($row = mysqli_fetch_assoc($result)) {

               }
             } else {
               echo "There Are No Results Matching Your Search";
             }
           }
            ?>
                <div class="col s12 m12 l4">
                  <form class="car" method="post" action="inventory.php?actionid<?php echo $product['itemID'];?>">
                    <div class="products">
     			            <div class="card reveal-panel">
     			             <div class="card-image waves-effect waves-block waves-light">
     				            <img class="activator" src="<?php echo $product['image1']?>">
     			             </div>
                     	 <div class="card-content">
                     		 <span class="card-title activator grey-text text-lighten-3"><?php echo $product['itemMake']?>: <?php echo $product['itemModel']?><br>Price: £<?php echo $product['itemPrice']?><i class="material-icons right">more_vert</i></span>
                     		 <p class="waves-effect waves-light btn"><a href="product_template.php?itemID=<?php echo $product['itemID'];?>">More Details</a></p>
                     	 </div>
                   		 <div class="card-reveal">
                     	   <span class="card-title grey-text text-darken-4"><?php echo $product['itemMake']?>: <?php echo $product['itemModel']?><br>Price: £<?php echo $product['itemPrice']?><i class="material-icons right">close</i></span>
                     		 <p>A CPU also known as a Central Processing Unit, or processor is referred to as the brain of a computer system. A CPU completes most calculations. Without a CPU a computer system will be unable to operate as a CPU allocates tasks to each component of the system, this includes hard disks, RAM, GPU's etc.
                     		</p>
                   		</div>
                    </div>
                  </div>
                </form>
              </div>
               <?php
             endwhile;
           endif;
         endif;
         ?>
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
  </body>
</html>
