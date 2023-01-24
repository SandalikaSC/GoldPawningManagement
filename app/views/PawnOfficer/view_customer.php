<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_view_customer.css">
    <title>Vogue Pawn | Customers</title>
</head>
<body>
    <input type="checkbox" id="side-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="<?php echo URLROOT . '/img/profile_pic.png'; ?>">
            <h3><?php echo $_SESSION['user_name']; ?></h3>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/pawningOfficerDashboard/dashboard">
                        <span>
                            <img src="<?php echo URLROOT . '/img/white_dashboard.png'; ?>">
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/pawnings/pawned_items">
                        <span>
                            <img src="<?php echo URLROOT . '/img/white_pawn_items.png'; ?>">
                        </span>
                        <span>Pawned Items</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/customers/view_customers"  class="active">
                        <span>
                            <img src="<?php echo URLROOT . '/img/white_customers.png'; ?>">
                        </span>
                        <span>Customers</span>
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
                <h1>Customers</h1> 
            </div>
                    
            <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
        </header>

        <main>
            <div class="right-content">
                <div class="div-search">
                    <input type="text" placeholder="Enter customer name">
                    <a href="#">
                    <img src="<?php echo URLROOT . '/img/search_icon.png'?>">
                    </a>                
                </div>
                <div class="tbl-details">
                    <table cellspacing="0">
                        <tbody>
                            <tr>
                                <th>Customer ID</th>
                                <th>Customer Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                            </tr>
                            
                            <?php foreach($data['customers'] as $customer) : ?>
                                <tr class="table-body">
                                    <td><?php echo $customer->UserId; ?></td>
                                    <td><?php echo $customer->First_Name . ' ' . $customer->Last_Name; ?></td>
                                    <td><?php echo $customer->phone; ?></td>
                                    <td><?php echo $customer->email; ?></td>
                                    <td><a href="<?php echo URLROOT; ?>/customers/customer_view_more/<?php echo $customer->UserId; ?>" class="view btn">View</a></td>                            
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </main>
    </div>
</body>
</html>









<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_view_customer.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
   
    <div class="wrapper">
        <div class="sidebar">
            <div class="menu">
                <a href="#">                
                    <img src="<?php echo URLROOT . '/public/img/menu_bar_white.png'?>" class="menu-bar">
                </a>
            </div>            
            <div class="profile">
                <img src="<?php echo URLROOT . '/public/img/profile_pic.png'?>" alt="profile_picture">
                <input type="text" class="user-name" placeholder="<?php echo $_SESSION['user_name']; ?>" disabled>
            </div>
            <nav class="side-buttons">
                <a href="<?php echo URLROOT; ?>/pawningOfficerDashboard/dashboard" class="btn-side">
                    <img src="<?php echo URLROOT . '/public/img/white_dashboard.png'?>" class="icons">
                    Dashboard
                </a>
                <a href="<?php echo URLROOT; ?>/pawnings/pawned_items" class="btn-side">
                    <img src="<?php echo URLROOT . '/public/img/white_pawn_items.png'?>" class="icons">
                    Pawn Items
                </a>
                <a href="#" class="is-active btn-side">
                    <img src="<?php echo URLROOT . '/public/img/gold_customers.png'?>" class="icons">
                    Customers
                </a>
                <hr>
                <a href="<?php echo URLROOT; ?>/employees/logout" class="btn-side logout">
                    Logout
                </a>
            </nav>
        </div>
    </div>

    <div class="right">
        <div class="right-heading">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <img src="<?php echo URLROOT . '/public/img/menu_bar_black.png'?>"class="menu-bar">
                    </a>
                </div>
                <div class="title">
                    <h1>Customers</h1>
                </div>
            </div>   
            <div class="logo">
                <img src="<?php echo URLROOT . '/public/img/logo_name.png'?>">
            </div>     
        </div>
    
        <div class="right-content">
            <div class="div-search">
                <input type="text" placeholder="Enter customer name">
                <a href="#">
                <img src="<?php echo URLROOT . '/public/img/search_icon.png'?>">
                </a>                
            </div>
            <div class="tbl-details">
                <table cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                        </tr>
                        
                        <?php foreach($data['customers'] as $customer) : ?>
                            <tr class="table-body">
                                <td><?php echo $customer->UserId; ?></td>
                                <td><?php echo $customer->First_Name . ' ' . $customer->Last_Name; ?></td>
                                <td><?php echo '0' . $customer->phone; ?></td>
                                <td><?php echo $customer->email; ?></td>
                                <td><a href="<?php echo URLROOT; ?>/customers/customer_view_more/<?php echo $customer->UserId; ?>" class="view btn">View</a></td>                            
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

    <script>
        var hamburger = document.querySelector(".hamburger");
        hamburger.addEventListener("click", function() {
            document.querySelector("body").classList.toggle("active");
        })
        var menu = document.querySelector(".menu");
        menu.addEventListener("click", function() {
            document.querySelector("body").classList.toggle("active");
        })
    </script>

</body>
</html> -->