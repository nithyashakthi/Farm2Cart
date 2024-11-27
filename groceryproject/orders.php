<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/pagecss.css">

</head>
<body>
   <!----------------------------  header nav  --------------------------------->
   <?php include 'header.php'; ?>
<section class="placed-orders">

   <h1 class="title">placed orders</h1>

   <div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
      $select_orders->execute([$user_id]);
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <p> placed on : <span><?= $fetch_orders['placed_on']; ?></span> </p>
      <p> name : <span><?= $fetch_orders['name']; ?></span> </p>
      <p> number : <span><?= $fetch_orders['number']; ?></span> </p>
      <p> email : <span><?= $fetch_orders['email']; ?></span> </p>
      <p> address : <span><?= $fetch_orders['address']; ?></span> </p>
      <p> payment method : <span><?= $fetch_orders['method']; ?></span> </p>
      <p> your orders : <span><?= $fetch_orders['total_products']; ?></span> </p>
      <p> total price : <span>₹<?= $fetch_orders['total_price']; ?>/-</span> </p>
      <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">no orders placed yet!</p>';
   }
   ?>

   </div>

</section>
 <!-------------------footer section start ------------------------->
 <section class="footer">
    <div id="box-container">
        <div class="box">
            <h3>QUICK LINKS</h3>
            <a href=""><i class="fas fa-arrow-right"></i>Home</a>
            <a href=""><i class="fas fa-arrow-right"></i>About</a>
            <a href=""><i class="fas fa-arrow-right"></i>Shop</a>
            <a href=""><i class="fas fa-arrow-right"></i>Orders</a>
        </div>

        <div class="box">
            <h3>EXTRA LINKS</h3>
            <a href=""><i class="fas fa-arrow-right"></i>My order</a>
            <a href=""><i class="fas fa-arrow-right"></i>My wishlist</a>
            <a href=""><i class="fas fa-arrow-right"></i>My cart</a>
            <a href=""><i class="fas fa-arrow-right"></i>My account</a>
        </div>
        <div class="box">
            <h3>FOLLOW US</h3>
            <a href=""><i class="fas fa-arrow-right"></i>Facebook</a>
            <a href=""><i class="fas fa-arrow-right"></i>Instagram</a>
            <a href=""><i class="fas fa-arrow-right"></i>Twitter</a>
            <a href=""><i class="fas fa-arrow-right"></i>Youtube</a>
        </div>
        <div class="box">
            <h3>CONTACT</h3>
            <a href=""><i class="fa-solid fa-phone"></i>+123-456-7890</a>
            <a href=""><i class="fa-solid fa-phone"></i>+111-222-3330</a>
            <a href=""><i class="fa-solid fa-envelope"></i>Grocery12@gmail.com</a>
            <a href=""><i class="fa-solid fa-location-dot"></i>Bangalore,karnataka</a>
        </div>
        
    </div>
</section>
<!---------------footer section end--------------------------------->

<section class="credit">created by Nithya Shakthi.B | all rights reserved!</section>





<script src="js/script.js"></script>

</body>
</html>