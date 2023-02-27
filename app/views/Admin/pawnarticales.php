

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pawnarticales</title>
 
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/headerAdmin.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/base.css'>
  

</head>
<body>

<div class="container">

<!-- navbar -->
<nav>
    <h1>pawnarticales</h1>
    <img width="100" src="<?php echo URLROOT ?>/img/logo.png" class="logo" alt="logo">
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
            <a class="active" href="<?php echo URLROOT ?>/adDashboard/index">
                <img width="24" class="page-btn-img" src="<?php echo URLROOT ?>/img/home-gold.png"> 
                <p>Dashboard</p>
            </a>
            
            <a href="<?php echo URLROOT ?>/adpawnarticale/index">
            <img width="24" class="page-btn-img" src="<?php echo URLROOT ?>/img/articale.png"> 
                <p>Pawn Articles</p>
            </a>

            <a href="<?php echo URLROOT ?>adlocker/index">
                <img width="24" class="page-btn-img" src="<?php echo URLROOT ?>/img/locker1.png">
                <p>Locker</p>
            </a>

            <a href="<?php echo URLROOT ?>/adstaff/index">
                <img width="24" class="page-btn-img" src="<?php echo URLROOT ?>/img/staff1.png">
                <p>Staff</p>
            </a>
            
            <a href="<?php echo URLROOT ?>/admarket/index">
                <img width="24" class="page-btn-img" src="<?php echo URLROOT ?>/img/payment.png">
                <p>Market</p>
            </a>

            <a href="<?php echo URLROOT ?>/Goldprices/index">
                <img width="24" class="page-btn-img" src="<?php echo URLROOT ?>/img/goldprice.png">
                <p>Gold Price</p>
            </a>
        </div>
        <div class="sidebar_footer">
            <a href="<?php echo URLROOT ?>/logout.php">Logout</a>
        </div>
    </aside>