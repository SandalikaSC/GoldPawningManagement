<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_pawned_items.css">
    <title>Vogue Pawn | Pawned Items</title>
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
                    <a href="<?php echo URLROOT; ?>/pawnings/pawned_items" class="active">
                        <span>
                            <img src="<?php echo URLROOT . '/img/white_pawn_items.png'; ?>">
                        </span>
                        <span>Pawned Items</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/customers/view_customers">
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
                <h1>Pawned Items</h1> 
            </div>
                    
            <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
        </header>

        <main>
            <div class="right-content">
                <div class="div-search">
                    <input type="text" placeholder="Enter Article ID">
                    <a href="#">
                    <img src="<?php echo URLROOT . '/img/search_icon.png'?>">
                    </a>                
                </div>
                <div class="tbl-details">
                    <table cellspacing="0">
                        <tbody>
                            <tr>
                                <th>Pawn ID</th>
                                <th>Customer ID</th>
                                <th>Article ID</th>
                                <th>Full Loan Amount</th>
                            </tr>
                            
                            <?php foreach($data['pawned_items'] as $pawned_item) : ?>
                                <tr class="table-body">
                                    <td><?php echo $pawned_item->Pawn_Id; ?></td>
                                    <td><?php echo $pawned_item->userId; ?></td>
                                    <td><?php echo $pawned_item->Article_Id; ?></td>
                                    <td><?php echo 'Rs. '.$pawned_item->Amount; ?></td>
                                    <td><a href="<?php echo URLROOT; ?>/pawnings/payment_details/<?php echo $pawned_item->Pawn_Id; ?>" class="view btn">View</a></td>                            
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

