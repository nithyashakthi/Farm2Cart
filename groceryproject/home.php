<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['add_to_wishlist'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);

   $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
   $check_wishlist_numbers->execute([$p_name, $user_id]);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_wishlist_numbers->rowCount() > 0){
      $message[] = 'already added to wishlist!';
   }elseif($check_cart_numbers->rowCount() > 0){
      $message[] = 'already added to cart!';
   }else{
      $insert_wishlist = $conn->prepare("INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES(?,?,?,?,?)");
      $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
      $message[] = 'added to wishlist!';
   }

}

if(isset($_POST['add_to_cart'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_cart_numbers->rowCount() > 0){
      $message[] = 'already added to cart!';
   }else{

      $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
      $check_wishlist_numbers->execute([$p_name, $user_id]);

      if($check_wishlist_numbers->rowCount() > 0){
         $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
         $delete_wishlist->execute([$p_name, $user_id]);
      }

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'added to cart!';
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="CSS/pagecss.css">
    <script src="Javascript/script.js"></script>
</head>
<body>

<?php include 'header.php'; ?>


    <div  class="content"style="background-color:whitesmoke;width:100%;height: 450px;">
        <img src="images/bgpicture.png" style="height:400px;float: right;">
    <section>
        <p style="display: inline;width:200px;">ALL NATURAL PRODUCTS</p>

        <p style="font-size: 40px;width:400px;"><strong>Fresh and Healthy Veggies</strong><span style="color:rgb(97, 93, 93)">Organic Market</span</p>
        <p style="color:orange;display: inline;">Organic food is food produced by methods that comply with the standard of farming.</p>
    </section>
    </div>
    <div style="justify-content: center;display:flex;">
        <img src="images/cat.png">
    </div>
    <div class="catagory">
        <div class="product">
            <a href="category.php?category=fruits">
            <img src="images/cat-1.png" style="width:180px;height: 100px;">
            <h3>Fruits</h3></a>
        </div>
        <div class="product">
            <a href="category.php?category=meat">
            <img src="images/cat-2.png"style="width:180px;height: 100px;">
            <h3>Meat</h3></a>
        </div>
        <div class="product">
            <a href="category.php?category=vegetables">
            <img src="images/cat-3.png"style="width:180px;height: 100px;">
            <h3>Vegetables</h3></a>
        </div>
        <div class="product">
            <a href="category.php?category=fish">
            <img src="images/cat-4.png"style="width:180px;height:100px;">
            <h3>Fish</h3></a>
        </div>
        <div class="product">
            <a href="category.php?category=snacks">
            <img src="images/Snack.png"style="width:180px;height:100px;">
            <h3>Snacks</h3></a>
        </div>
        
    </div>
 <!------offers--------->
 <section class="banner-container">
    <div class="banner" style="background-color: rgb(240, 240, 135);">
        <img src="images/mango.png">
    <div class="offer-text">
        <span>Summer sales</span>
        <h3>upto 50% off</h3>
        <a href="shop.php" class="btn">shop now</a>
    </div>
    </div>
    <div class="banner" style="background-color: rgb(252, 182, 182);">
        <img src="images/watermelon.png">
    <div class="offer-text">
        <span>Summer sales</span>
        <h3>upto 25% off</h3>
        <a href="shop.php" class="btn">shop now</a>
    </div>
    </div>
    <div class="banner" style="background-color: rgb(217, 188, 245);">
        <img src="images/grapes.png">
    <div class="offer-text">
        <span>Summer sales</span>
        <h3>upto 40% off</h3>
        <a href="shop.php" class="btn">shop now</a>
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