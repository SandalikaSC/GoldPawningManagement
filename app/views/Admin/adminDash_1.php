<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_adminDash.css">
    <title>Vogue Pawn | Dashboard</title>
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
                    <a href="<?php echo URLROOT; ?>/Admin/AdminDash" class="active">
                        <span>
                            <img src="<?php echo URLROOT?>/img/white_dashboard.png">
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                
            </ul>

            <div class="btn-logout">
                <a href="<?php echo URLROOT; ?>/employees/logout" class="logout">Logout</a>
            </div>
            
        </div>
    </div>

    <div class="main-content">
        <header>
            <div class="page-title">
                <label for="side-toggle">
                    <span class="menu-bar">
                        <img src="<?php echo URLROOT?>/img/menu_bar_black.png">
                    </span>
                </label>   
                <h1>Dashboard</h1> 
            </div>
                    
            <img src="<?php echo URLROOT?>/img/logo_name.png">
        </header>

        <main> 
            <div class="page-wrapper">   
                <div class="div-welcome">

                </div>     
                <div class="cards">  
                    <div class="gold-rates">
                        <div class="icon-case">
                            <img src="<?php echo URLROOT?>/img/gold-gold-rates.png" alt="">
                        </div>
                        <div class="box">
                            <h4>24 KARATS</h4>
                            <h2><?php foreach ($data['gold_rates'] as $gold_rates) : if($gold_rates->Karatage == 24) echo 'Rs. ' . $gold_rates->Price; endforeach; ?></h2>
                        </div>                                
                    </div>

                    <div class="gold-rates">
                        <div class="icon-case">
                            <img src="<?php echo URLROOT?>/img/gold-gold-rates.png" alt="">
                        </div>
                        <div class="box">
                            <h4>22 KARATS</h4>
                            <h2><?php foreach ($data['gold_rates'] as $gold_rates) : if($gold_rates->Karatage == 22) echo 'Rs. ' . $gold_rates->Price; endforeach; ?></h2>
                        </div>                                
                    </div>

                    <div class="loan-interest">
                        <div class="box">
                            <h3>Loan Interest</h3>
                            <h1><?php echo $data['interest'] . '%'; ?></h1>
                        </div>                                
                    </div> 

                    <div class="gold-rates">
                        <div class="icon-case">
                            <img src="<?php echo URLROOT?>/img/gold-gold-rates.png" alt="">
                        </div>
                        <div class="box">
                            <h4>20 KARATS</h4>
                            <h2><?php foreach ($data['gold_rates'] as $gold_rates) : if($gold_rates->Karatage == 20) echo 'Rs. ' . $gold_rates->Price; endforeach; ?></h2>
                        </div>                                
                    </div>

                    <div class="gold-rates">
                        <div class="icon-case">
                            <img src="<?php echo URLROOT?>/img/gold-gold-rates.png" alt="">
                        </div>
                        <div class="box">
                            <h4>18 KARATS</h4>
                            <h2><?php foreach ($data['gold_rates'] as $gold_rates) : if($gold_rates->Karatage == 18) echo 'Rs. ' . $gold_rates->Price; endforeach; ?></h2>
                        </div>                                
                    </div>                    
                </div>

                     
            </div>
            
        </main>
    </div>
</body>
</html>




