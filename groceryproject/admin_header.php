<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="CSS/pagecss.css">
</head>
<body>
    <header class="header">
        <a href="login.php" class="logo">Farm2Cart</a>
  
        <nav class="navbar">
           <a href="admin_page.php">home</a>
           <a href="admin_products.php">products</a>
           <a href="admin_orders.php">orders</a>
           <a href="admin_users.php">users</a>
        </nav>
  
        <div class="icons">
           <div id="menu-btn" class="fas fa-bars"></div>
           <div id="user-btn" class="fas fa-user"></div>
        </div>
  
        <div class="profile">
           <?php
              $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
              $select_profile->execute([$admin_id]);
              $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
           ?>
           <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
           <p><?= $fetch_profile['name']; ?></p>
           <a href="logout.php" class="delete-btn">logout</a>
           <div class="flex-btn">
              <a href="login.php" class="option-btn">login</a>
              <a href="register.php" class="option-btn">register</a>
           </div>
        </div>
  </header>
</body>
</html>

    