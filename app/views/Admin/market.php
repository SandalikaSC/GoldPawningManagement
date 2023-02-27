<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gold market</title>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/admarket.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/headerAdmin.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/base.css'>
     
</head>
<body>

<div class="container">

<!-- navbar -->
<nav>
    <h1>Gold market</h1>
    <img width="100" src="<?php echo URLROOT ?>/img/FULLlogo.png" class="logo" alt="logo">
</nav>


<!-- sidebar -->
<aside class="sidebar">
        <div class="sidebar_header">
            <div class="profile_image">
                <img width="100" src="<?php echo URLROOT ?>/img/profile.jpg" alt="profile">
            </div>
         <!--   <p><?php echo $_SESSION['user_name']; ?></p>-->
        </div>

        <div class="link">                    
            <a href="<?php echo URLROOT ?>/adDashboard/index">
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
            
            <a class="active" href="<?php echo URLROOT ?>/market/index">
                <img width="24" class="page-btn-img" src="<?php echo URLROOT ?>/img/payment.png">
                <p>Market</p>
            </a>

            <a href="<?php echo URLROOT ?>/Goldprices/index">
                <img width="24" class="page-btn-img" src="<?php echo URLROOT ?>/img/goldprice.png">
                <p>Gold Price</p>
            </a>
        </div>
        <div class="sidebar_footer">
            <a href="../mgLogout.php">Logout</a>
        </div>
 </aside>


<!-- h1,h2-->
    <div class="h1">
       <div class="h0" >
        <p>Home</p>
       </div>
        <p>/ Gold Price Today in Sri Lanka</p>
    </div>
    <br>
    <div class="h2">
        <h1>Gold Price Today in Sri Lanka</h1>
    </div>
    <br>
    <div class="h3">
        <p>22 Carat 8 Grams (1 pawn) Gold price today in sri Lanka is Rs. 154,150 as on 5th November 2022 . You can buy 22 carot 1 gram of gold rate is Rs. 168,200.</p>
    </div>
    <br>
    <div class="h4">
        <table>
            <tr>
                <th>Gold Unit</th>
                <th>Gold Price</th>
            </tr>
            
            <tr>
                <td>Gold Ounce</td>
                <td>Rs. 595,883.00</td>
            </tr>
            <tr>
                <td>24 Carot 1 Gram</td>
                <td>Rs. 21,020.00</td>
            </tr>
            <tr>
                <td>24 Carot 8 Grams (8 pawn)</td>
                <td>Rs. 168,200.00</td>
            </tr>
            <tr>
                <td>22 Carot 1 Gram</td>
                <td>Rs. 19,270.00</td>
            </tr>
            <tr>
                <td>22 Carot 8 Grams (8 pawn)</td>
                <td>Rs. 154,150.00</td>
            </tr>
            <tr>
                <td>21 Carot 1 Gram</td>
                <td>Rs. 18,400.00</td>
            </tr>
            <tr>
                <td>21 Carot 8 Grams (8 pawn)</td>
                <td>Rs. 147,150.00</td>
            </tr>
        </table>
    </div>






</body>
</html>
