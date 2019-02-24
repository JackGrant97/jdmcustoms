<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <title>My Profile</title>
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
<body background="assets/rearlight.jpg" width="100%" height="100%">
  <main>
    <?php
      $con = mysqli_connect("eu-cdbr-west-02.cleardb.net", "b35dd9c913bab7", "2cd16625", "heroku_11b47e2296993b0") or die("Connection Failed" .
      mysqli_error($con));
      $id = $_SESSION['userid'];
      $query = "SELECT FirstName, LastName, email, postcode, address, Dob, telephone FROM users WHERE UserID = $id";
      $result = mysqli_query($con, $query);
+
      $sql = "SELECT * FROM search WHERE UserID = $id GROUP BY keyword ORDER by COUNT(*) Desc limit 1";
        $sresult = mysqli_query($con, $sql);
        $datas = array();
          if ($sresult):
            if (mysqli_num_rows($sresult) > 0):
             while ($row = mysqli_fetch_assoc($sresult)):
               $datas[] = $row;

      if ($result):
        if(mysqli_num_rows($result) > 0):
          while($details = mysqli_fetch_assoc($result)):


     ?>
    <div class="container">
     <div class="accountDetails">
       <div class="row">
         <form class="col s12 m12 l12">
           <div class="row">
             <div class="col s12 m12 l12">
               <h3 style="text-align:center;" ><b> Profile Details</b></h3>
             </div>
           </div>
           <div class="row">
             <div class="col s12 m12 l12">
               <p>
               <b>First Name: </b> <?php echo $details['FirstName'];?>
               <br>
               <b>Last Name: </b> <?php echo $details['LastName'];?>
               <br>
               <b>E-Mail: </b> <?php echo $details['email'];?>
               <br>
               <b>Postcode: </b> <?php echo $details['postcode'];?>
               <br>
              <b>Address: </b> <?php echo $details['address'];?>
              <br>
              <b>Date of Birth: </b> <?php echo $details['Dob'];?>
              <br>
              <b>Telephone: </b> <?php echo $details['telephone'];?>
             </p>
             </div>
           </div>
           <div class="change">
               <a class="btn waves-effect" href="update.php">Update Details</a>
           </div>
           <div class="row">
             <div class="col s12 m12 l12">
               <h3 style="text-align:center;" ><b>FAVORITE SEARCH</b></h3>
             </div>
           </div>
           <div class="row">
             <div class="col s12 m12 l12">
               <P style="text-align:center;">
                <?php
                //echo $psearch['keyword'];
                foreach ($datas as $data) {
                  echo $data['keyword'];
                  echo "<br>";
                }
                ?> <br>
              </p>
             </div>
           </div>
         </form>
       </div>
     </div>
   </div>
   <?php
      endwhile;
    endif;
  endif;
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
             © Copyright 2018 - All Rights Reserved
              <a class="grey-text text-lighten-4 right" href="#!"></a>
              </div>
            </div>
       </footer>
  </div>
</body>
</html>
