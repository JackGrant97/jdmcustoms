<?php
  
  $query = 'SELECT * FROM cart ORDER by itemID ASC';
  $result = mysqli_query($con, $query);

  if ($result){
    if (mysqli_num_rows($result) > 0) {
    while ($product = mysqli_fetch_assoc($result)) {
        print_r($product);
      }
    }
  }
