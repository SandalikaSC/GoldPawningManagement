<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_dashboard_po.css">
    <title>Vogue Pawn | Dashboard</title>
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
                    <a href="<?php echo URLROOT; ?>/pawningOfficerDashboard/dashboard" class="active">
                        <span>
                            <img src="<?php echo URLROOT?>/img/white_dashboard.png">
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/pawnings/pawned_items">
                        <span>
                            <img src="<?php echo URLROOT?>/img/white_pawn_items.png">
                        </span>
                        <span>Pawned Items</span>
                    </a>
                </li>
                <li>
                    <a href = "<?php echo URLROOT; ?>/customers/view_customers">
                        <span>
                            <img src="<?php echo URLROOT?>/img/white_customers.png">
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
                        <img src="<?php echo URLROOT?>/img/menu_bar_black.png">
                    </span>
                </label>   
                <h1>Dashboard</h1> 
            </div>
                    
            <img src="<?php echo URLROOT?>/img/logo_name.png">
        </header>

        <main> 
            <div class="page-wrapper">
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
                        <div class="icon-case">
                            <img src="<?php echo URLROOT?>/img/gold-interest.png" alt="">
                        </div>
                        <div class="box">
                            <h4>Loan Interest</h4>
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

                <div class="table-wrapper">
                    <div class="table-container">
                        <div class="table-title">
                            <h2>Validated Articles</h2>
                        </div>
                        <div class="div-table-validated">
                            <table>
                                <thead>
                                    <tr>
                                        <td>Article ID</td>
                                        <td>Estimated Value</td>
                                    </tr> 
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>AR001</td>
                                        <td>Rs. 150,000/-</td>
                                        <td><a href="#" class="btn-validated btn-pawn">Pawn</a></td>
                                        <td><a href="#" class="btn-validated btn-cancel">Cancel</a></td>
                                    </tr>
                                    <tr>
                                        <td>AR001</td>
                                        <td>Rs. 150,000/-</td>
                                        <td><a href="#" class="btn-validated btn-pawn">Pawn</a></td>
                                        <td><a href="#" class="btn-validated btn-cancel">Cancel</a></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <div class="table-container">
                        <div class="table-title">
                            <h2>Appointments</h2>
                        </div>
                        <div class="div-date">
                            <label for="date">Date</label>
                            <input type="date">
                        </div>
                        <div class="div-table-appointments">
                            <table>
                                <thead>
                                    <tr>
                                        <td>Appointment No</td>
                                        <td>Appointment Date</td>
                                        <td>Time</td>
                                        <td>Reason</td>
                                    </tr> 
                                </thead>
                                <tbody>

                                    <?php foreach ($data['appointments'] as $appointment) : ?>
                                        <tr>
                                            <td><?php echo $appointment->Appointment_Id;?></td>
                                            <td><?php echo $appointment->appointment_date;?></td>
                                            <td>10.30 a.m. - 11.00 p.m</td>
                                            <td>For Pawning</td>
                                        </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="div-main-buttons">
                    <a href="<?php echo URLROOT; ?>/customers/register_customer">Register Customer</a>
                    <a href="<?php echo URLROOT; ?>/pawnings/new_pawning">New Pawning</a>
                </div>

            </div>
            
        </main>
    </div>
</body>
</html>




