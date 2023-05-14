<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_staff_admin.css">
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/js/simple-datatables/style.css'>
    
    <title>Vogue Pawn | Staff</title>
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
                    <a href="<?php echo URLROOT; ?>/Admin/view_staff" class="active">
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
                <h1>Staff</h1> 
            </div>
                    
            <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
        </header>

        <main>
            <div class="right-content">
                <div class="div-top">
                    <!-- <div class="div-search">
                        <input class='dataTable-input'  type="text" placeholder="Enter Locker Number">
                        <a href="#">
                        <img src="<?php echo URLROOT . '/img/search_icon.png'?>">
                        </a>                
                    </div> -->
                    <div class="main-btn">
                        <a href="<?php echo URLROOT; ?>/Admin/view_add_staff">
                            <img src="<?php echo URLROOT . '/img/golden-plus.png'?>">
                            <div>New Employee</div>
                        </a>
                    </div>
                </div>
                
                <div class="tbl-details">
                    <table cellspacing="0" id="table1">
                        
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Emp_ID</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created Date/Time</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php foreach($data['get_staff_list'] as $key => $get_staff_list) : ?>
                            <tr class="tbl-body">
                                <td><?php echo ++$key; ?></td>
                                <td><?php echo $get_staff_list->UserId; ?></td>
                                <td><?php echo $get_staff_list->Gender; ?></td>
                                <td><?php echo $get_staff_list->First_Name." ".$get_staff_list->Last_Name; ?></td>
                                <td><?php echo $get_staff_list->type; ?></td>
                                <?php if($get_staff_list->Status == 1){?>
                                   <td class="key-status">Working</td>  <?php } else{ ?>
                                   <td class="key-status" style="color: #e90b43;">-----------</td>  <?php }?>
                                <td><?php echo $get_staff_list->Created_date; ?></td>
                                <td><a href="<?php echo URLROOT?>/Admin/view_staff_details/<?php echo $get_staff_list->UserId; ?>" class="btn">View</a></td>
                                <!-- <td><a href="<?php echo URLROOT?>/Admin/view_staff_details/<?php echo $get_staff_list->UserId; ?>" class="btn">Delete</a></td> -->
                                <td><a href="<?php echo URLROOT?>/Admin/confirm_delete_staff/<?php echo $get_staff_list->UserId; ?>" class="btn">Delete</a></td>
                            </tr> 
                         <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>

<script src='<?php echo URLROOT ?>/js/simple-datatables/simple-datatables.js'></script>

<script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
</script>

</html>

