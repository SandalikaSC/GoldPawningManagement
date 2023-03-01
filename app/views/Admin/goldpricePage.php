<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/AdminDash.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/headerAdmin.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/base.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/goldprice.css'>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_locker.css">
    <title>Vogue Pawn | Gold Prices</title>
</head>
<body>
    <input type="checkbox" id="side-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="<?php echo URLROOT?>/img/profile.jpg">
            <h3><?php echo $_SESSION['user_name']; ?></h3>
        </div>

        <div class="sidebar-menu">
        <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/Admin/AdminDash">
                        <span>
                            <img src="<?php echo URLROOT?>/img/white_dashboard.png">
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/Admin/pawned_items">
                        <span>
                            <img src="<?php echo URLROOT?>/img/pawned.png">
                        </span>
                        <span>Pawn Articles</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/Lockers/show_lockers">
                        <span>
                            <img src="<?php echo URLROOT?>/img/locker-white.png">
                        </span>
                        <span>Locker</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/Admin/view_staff">
                        <span>
                            <img src="<?php echo URLROOT?>/img/staff_white.png">
                        </span>
                        <span>Staff</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/Admin/view_gold_market">
                        <span>
                            <img src="<?php echo URLROOT?>/img/market_white.png">
                        </span>
                        <span>Market</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT ?>/Goldprices/index"  class="active">
                        <span>
                            <img src="<?php echo URLROOT?>/img/goldprice_white.png">
                        </span>
                        <span>Gold Prices</span>
                    </a>
                </li>               
                
            </ul>

            <div class="btn-logout">
                <a href="<?php echo URLROOT; ?>/employees/logout" class="logout">Logout</a>
            </div>
            
        </div>
    </div>




<!--  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gold Price</title>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/AdminDash.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/headerAdmin.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/base.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/goldprice.css'>

</head>
<body>

<div class="container">

 navbar -->
<!-- <nav>
    <h1>Gold Price</h1>
    <img width="48" src="./img/logo.png" class="logo" alt="logo">
</nav> -->



<!-- sidebar -->
<!-- <aside class="sidebar">
        <div class="sidebar_header">
            <div class="profile_image">
                <img width="100" src="img/profile.jpg" alt="profile">
            </div>
            <p><?php echo $_SESSION['user_name']; ?></p>
        </div>

        <div class="link">                    
            <a href="./index.php">
                <img width="24" class="page-btn-img" src="./img/home.png"> 
                <p>Dashboard</p>
            </a>
            
            <a href="./pawnarticales.php">
            <img width="24" class="page-btn-img" src="./img/articale.png"> 
                <p>Pawn Articles</p>
            </a>

            <a href="./locker.php">
                <img width="24" class="page-btn-img" src="./img/locker.png">
                <p>Locker</p>
            </a>

            <a href="./staff.php">
                <img width="24" class="page-btn-img" src="./img/staff.png">
                <p>Staff</p>
            </a>
            
            <a href="./market.php">
                <img width="24" class="page-btn-img" src="./img/payment.png">
                <p>Market</p>
            </a>

            <a class="active" href="./goldprice.php">
                <img width="24" class="page-btn-img" src="./img/goldprice.png">
                <p>Gold Price</p>
            </a>
        </div>
        <div class="sidebar_footer">
            <a href="./logout.php">Logout</a>
        </div>
    </aside>  -->


    <div class="main-content">
        <header>
            <div class="page-title">
                <label for="side-toggle">
                    <span class="menu-bar">
                        <img src="<?php echo URLROOT . '/img/menu_bar_black.png'; ?>">
                    </span>
                </label>   
                <h1>Gold Prices</h1> 
            </div>
                    
            <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
        </header>
<!-- four cards -->
        <div class="cardWrapper">
            <?php

            
                foreach ($data['goldrates'] as $goldrate):  
                ?>   



                    <div class="card">
                        <div class="karat">
                            <p><?php echo $goldrate->Karatage?>K</p>
                        </div>
                        <h2>Rs.<?php echo $goldrate->Price?>/-</h2>
                        <p>Last Update</p>
                        <p><?php echo $goldrate->Last_Edit?></p>

                        <form  action="<?php echo URLROOT?>/Goldprices/selectRate/<?php echo $goldrate->Rate_Id?>" method="GET">
                            <button class="editIcon" type="submit" name="edit" value="<?php echo $goldrate->Rate_Id?>">
                                <img width="24" src="<?php echo URLROOT?>/img/edit-white.png" alt="edit">
                            </button>
                        </form>
                    </div>



                    <?php endforeach; ?>

                    

        </div>



        <?php
            
                    if($data['editRate']):
                        ?>
        

                        <div id="form" class="formWrapper">
                        <div class="formIcon">
                            <img width="32" src="<?php echo URLROOT?>/img/edit.png" alt="edit">
                        </div>
                        <form action="<?php echo URLROOT?>/Goldprices/editRate" method="POST">
                            <div class="inputField">
                                <label>Karat</label>
                                <input type="number" name="Karat" placeholder="Karat" value="<?php echo $data['editRate']->Karatage ?>" readonly />
                            </div>
                            <div class="inputField">
                                <label>Current Price</label>
                                <input type="number" name="currentPrice" placeholder="Current Price" value="<?php echo $data['editRate']->Price ?>" readonly/>
                            </div>
                            <div class="inputField">
                                <label>New Price</label>
                                <input type="text" name="newPrice" placeholder="New Price" required />
                            </div>
                            
                            <div class="btnGroup">
                                <a href="goldprice.php" class="btn">Cancel</a>
                                <button type="submit" name="update" value="<?php echo $edit?>" class="btn goldBtn">Update</button>
                            </div>
                        </form>
                        </div>
    </div>





        <?php
            
        endif;
        ?>



</div>
</body>


</html>