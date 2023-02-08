<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_view_validated_articles.css">
    <title>Vogue Pawn | Validated Articles</title>
</head>
<body>
    <input type="checkbox" id="side-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="<?php echo URLROOT?>/img/profile_pic.png">
            <h3><?php echo $_SESSION['user_name']; ?></h3>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/goldAppraiser/dashboard">
                        <span>
                            <img src="<?php echo URLROOT?>/img/white_dashboard.png">
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="active">
                        <span>
                            <img src="<?php echo URLROOT?>/img/white_pawn_items.png">
                        </span>
                        <span>Validated Articles</span>
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
                <h1>Validated Articles</h1> 
            </div>
                    
            <img src="<?php echo URLROOT?>/img/logo_name.png">
        </header>

        <main> 
            <div class="right-content">
                <div class="div-search">
                    <input type="text" placeholder="Enter validated article ID">
                    <a href="#">
                    <img src="<?php echo URLROOT . '/img/search_icon.png'?>">
                    </a>                
                </div>
                <div class="tbl-details">
                    <table cellspacing="0">
                        <tbody>
                            <tr>
                                <th></th>
                                <th>Article ID</th>
                                <th>Customer ID</th>
                                <th>Type</th>
                                <th>Weight</th>
                                <th>Karats</th>
                                <th>Estimated Values</th>
                            </tr>
                            
                            <!-- <?php foreach($data['customers'] as $customer) : ?>
                                <tr class="table-body">
                                    <td><?php echo $customer->UserId; ?></td>
                                    <td><?php echo $customer->First_Name . ' ' . $customer->Last_Name; ?></td>
                                    <td><?php echo $customer->phone; ?></td>
                                    <td><?php echo $customer->email; ?></td>
                                    <td><a href="<?php echo URLROOT; ?>/customers/customer_view_more/<?php echo $customer->UserId; ?>" class="view btn">View</a></td>                            
                                </tr>
                            <?php endforeach; ?> -->

                            <tr class="table-body">
                                <td><img src="<?php echo URLROOT?>/img/ring1.jpg"></td>
                                <td>A001</td>
                                <td>CS0021</td>
                                <td>Jewelry</td>
                                <td>25g</td>
                                <td>24</td>
                                <td>Rs. 105000.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>                
            </div>            
        </main>

    </div>
</body>
</html>




