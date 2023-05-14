<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_locker.css">
    <title>Vogue Pawn | Locker</title>
</head>
<style>
    .count-card{
            display: inline-flex;
            flex-direction: column;
            margin:0 10px 10px 0;
            /* border: 1px solid #BB8A04; */
            border-radius: 10px;
            padding:20px;
            width: 200px;
            background-color: white;
            box-shadow: 1px 5px 5px 0 black;
            /* transition: top ease 0.5s; */

        }

        .count-card:hover{
            margin-top: -10;
        }

        img {
            width: 50%;
            position: center;
        }

        .btn {
            appearance: none;
            -webkit-appearance: none;
            font-family: sans-serif;
            cursor: pointer;
            padding: 12px;
            min-width: 100px;
            border: 0px;
            -webkit-transition: background-color 100ms linear;
            -ms-transition: background-color 100ms linear;
            transition: background-color 100ms linear;
        }

        .btn:focus, .btn.focus {
            outline: 0;
        }

        .btn-round-1 {
            border-radius: 8px;
        }

        .btn-success {
            background: #03fc17;
            color: #ffffff;
        }

        .btn-success:hover {
            background: #27ae60;
            color: #ffffff;
        }

        .btn-danger {
            background: #fc0303;
            color: #ffffff;
        }

        .btn-danger:hover {
            background: #c0392b;
            color: #ffffff;
        }
</style>
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
                    <a href="<?php echo URLROOT; ?>/Lockers/show_lockers" class="active">
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
                    <a href="<?php echo URLROOT ?>/Goldprices/index">
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

    <div class="main-content">
        <header>
            <div class="page-title">
                <label for="side-toggle">
                    <span class="menu-bar">
                        <img src="<?php echo URLROOT . '/img/menu_bar_black.png'; ?>">
                    </span>
                </label>   
                <h1>Locker</h1> 
            </div>
                    
            <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
        </header>

        <main>
            <?php foreach ($data['lockers'] as $locker) : ?>
            <a href="<?= URLROOT ?>/Admin/ViewLocker/<?= $locker->lockerNo ?>" class="locker ">
                <div class="count-card">
                    <div class="card-topic">
                        <div class="card-logo">
                            <img src="<?php echo URLROOT ?>/img/new_locker.png" alt="">
                        </div>
                        <button class="btn <?php echo ($locker->Status == "Not Available") ? "btn-danger" : "btn-success"; ?> btn-round-1"><?php echo $locker->Status ?></button>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </main>
    </div>
</body>
</html>

