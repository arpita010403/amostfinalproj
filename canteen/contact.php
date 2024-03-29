<?php
include('./includes/connect.php');
include('./functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canteen website</title>
    <!-- boostrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!--css link-->
    <link rel="stylesheet" href="style.css">
    <style>
      
    </style>
  </head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!---first child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <img src="./images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Menu</a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <?php
if(isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='./users/profile.php'><i class='fa-solid fa-user'></i></a>
</li>";
}else{
  echo "<li class='nav-item'>
          <a class='nav-link' href='./users/user_register.php'>Register</a>
        </li>";

}
?>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: ₹ <?php total_cart_price();?>/-</a>
        </li> 
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-info" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php
cart();
?>

<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    
        <?php 
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome " .$_SESSION['username']."</a>
        </li>";
        }
if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='./users/user_login.php'>Login</a>
</li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link' href='./users/logout.php'>Logout</a>
</li>";
}

?>
    </ul>
</nav>

<section class="contact-us">

    <div class="row px-4 py-2 m-auto">
        <div class="contact-col">
            <div>
                <i class="fa-solid fa-house"></i>
                <span>
                    <h5>Address</h5>
                    <p>XYZ road, ABC building,Thane, Maharashtra</p>
                </span>
            </div>
            <div>
                <i class="fa-solid fa-phone"></i>
                <span>
                    <h5>Phone</h5>
                    <p>+91 0123456789</p>
                </span>
            </div>
            <div>
                <i class="fa-solid fa-envelope"></i>
                <span>
                    <h5>Email</h5>
                    <p>canteen@gmail.com</p>
                </span>
            </div>
            <div>
                
                <span>
                    <h5>Opening hours</h5>
                    <p>Mon - Sat 9 - 6 pm</p>
                    <p>Sun - CLOSED</p>
                </span>
            </div>
        </div>
<div class="container mt-5">
        <h2 class="text-center">Contact Us</h2>
        <p class="text-center">Feel free to reach out to us with any questions or concerns!</p>
        <br>
        <!-- Contact Form -->
        <form action="form-handler.php" method="post" class="text-center">
            <div class="form-outline mb-4 w-50 m-auto"><label for="name">Name:</label>
            <input type="text" id="name" name="name" required></div>
            <br>
           <div class="form-outline mb-4 w-50 m-auto"><label for="email">Email:</label>
            <input type="email" id="email" name="email" required></div> 
            <br>
            <div class="form-outline mb-4 w-50 m-auto"><label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required></div>
            <br>
            <div class="form-outline mb-4 w-50 m-auto"><label for="message">Query:</label>
            <textarea id="message" name="message" rows="4" required></textarea></div>
            <br>
            <div><input type="submit" id="btn" value="SEND MESSAGE" class="btn btn-info mb-3 px-3" name="submit"/></div>
                
            
        </form>
    </div>
    
    <br>
    <br>

    </div>

 <!--last child footer-->
<?php 
include('./includes/footer.php');
?>
<!--boostrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
     crossorigin="anonymous"></script>
</body>
</html>