<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/AdminDash.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/headerAdmin.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/base.css'>
     
</head>
<body>

<div class="container">

<!-- navbar -->
<nav>
    <h1>Dashboard</h1>
    <img width="100" src="<?php echo URLROOT ?>/img/FULLlogo.png" class="logo" alt="logo">
</nav>


<!-- sidebar -->
<aside class="sidebar">
        <div class="sidebar_header">
            <div class="profile_image">
                <img width="100" src="<?php echo URLROOT ?>/img/profile.jpg" alt="profile">
            </div>
            <p><?php echo $_SESSION['user_name']; ?></p>
        </div>

        <div class="link">                    
            <a class="active" href="./index.php">
                <img width="24" class="page-btn-img" src="<?php echo URLROOT ?>/img/home-gold.png"> 
                <p>Dashboard</p>
            </a>
            
            <a href="./pawnarticales.php">
            <img width="24" class="page-btn-img" src="<?php echo URLROOT ?>/img/articale.png"> 
                <p>Pawn Articles</p>
            </a>

            <a href="./locker.php">
                <img width="24" class="page-btn-img" src="<?php echo URLROOT ?>/img/locker1.png">
                <p>Locker</p>
            </a>

            <a href="./staff.php">
                <img width="24" class="page-btn-img" src="<?php echo URLROOT ?>/img/staff1.png">
                <p>Staff</p>
            </a>
            
            <a href="./market.php">
                <img width="24" class="page-btn-img" src="<?php echo URLROOT ?>/img/payment.png">
                <p>Market</p>
            </a>

            <a href="<?php echo URLROOT ?>/Goldprices/index">
                <img width="24" class="page-btn-img" src="<?php echo URLROOT ?>/img/goldprice.png">
                <p>Gold Price</p>
            </a>
        </div>
        <div class="sidebar_footer">
            <a href="./logout.php">Logout</a>
        </div>
    </aside>

<!-- hero -->
<div class="hero">
    <div class="left">
        <p>We are friends in need when,</p>
        <p>You're in urgent financial difficulities indeed.</p>
    </div>
    <div class="right">
        <div class="circle">
            <h2>24%</h2>
            <h3>Interest</h3>
        </div>
    </div>
</div>


<!-- four cards -->

<div class="cardWrapper">
    <div class="card">
        <p>24K</p>
        <p>|</p>
        <p>Rs. 106,000/-</p>
    </div>
    <div class="card">
        <p>23K</p>
        <p>|</p>
        <p>Rs. 96,200/-</p>
    </div>
    <div class="card">
        <p>22K</p>
        <p>|</p>
        <p>Rs. 92,000/-</p>
    </div>
    <div class="card">
        <p>21K</p>
        <p>|</p>
        <p>Rs. 87,000/-</p>
    </div>
</div>



</div>
</body>
</html>