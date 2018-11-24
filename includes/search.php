<?php
if (isset($_POST['searchbar'])) {
    $search = mysqli_real_escape_string($con, $_POST['Search']);
    $sql = "SELECT * FROM products WHERE itemMake LIKE '%$search%' OR itemModel LIKE '%$search%' OR itemYear LIKE '%$search%' trans LIKE '%$search%' fuelType LIKE '%$search%'";
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
