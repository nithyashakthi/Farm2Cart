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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="CSS/pagecss.css">
    <script src="Javascript/script.js"></script>
</head>
<body>
<?php include 'header.php'; ?>
    <div class="about-bg-img">
        <img src="images/veg.jpg" style="width:100%;height: 500px;position:relative;z-index: -1;">
       <div id="about-div" style="transform: translate(-50%,-50%);">
        <h1>About  Us</h1>
        <nav class="navbar">
            <a href="home.html">Home>></a>
            <a href="about.html">About</a>
       </div> 
        </nav>
    </div>
    <div style="text-align: center;"><img src="images/delivery.png"></div>
    <section class="about">

        <div class="row">
     
           <div class="box">
              <img src="images/about-img-1.png" alt="" width="300px" height="200px">
              <h3>why choose us?</h3>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam, a quod, quis alias eius dignissimos pariatur laborum dolorem ad ullam iure, consequatur autem animi illo odit! Atque quia minima voluptatibus.</p>
              <!--<a href="contact.html" class="btn">contact us</a>--->
           </div>
     
           <div class="box">
              <img src="images/about-img-2.png" alt="" width="300px"  height="200px">
              <h3>what we provide?</h3>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam, a quod, quis alias eius dignissimos pariatur laborum dolorem ad ullam iure, consequatur autem animi illo odit! Atque quia minima voluptatibus.</p>
              <!---<a href="shop.html" class="btn">our shop</a>--->
           </div>
     
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
</body>
</html>