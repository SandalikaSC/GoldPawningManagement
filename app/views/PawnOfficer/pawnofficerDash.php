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
            <img src="<?php echo URLROOT . '/img/profile_pic.png'; ?>">
            <h3><?php echo $_SESSION['user_name']; ?></h3>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/pawningOfficerDashboard/dashboard" class="active">
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
                <h1>Dashboard</h1> 
            </div>
                    
            <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
        </header>

        <main>
            <div class="cards">
                <div class="card-single">                    
                    <div class="rates">
                        <h2>Gold Rates</h2>
                    </div>
                    <div class="rates">
                        <div class="sub-rates">
                            <?php foreach($data['gold_rates'] as $gold_rates) : ?>
                                <div class="rates-container">
                                    <div class="div-price"> 
                                        <?php echo $gold_rates->Karatage . 'k'; ?>             
                                        <input type="text" class="22k-price" placeholder="Rs. <?php echo $gold_rates->Price; ?>">
                                    </div>                            
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="card-single ">                    
                    <div class="rates">
                        <h2>Loan Interest</h2>
                    </div>
                    <div class="rates">
                        <div class="interest">
                            <?php echo $data['interest'] . '%'; ?> 
                        </div>
                    </div>
                </div>
                <div class="card-single">
                    <div class="main-btn-container">
                        <div class="main-buttons">
                            <div>                           
                                <a href="<?php echo URLROOT; ?>/customers/register_customer" class="register-customer btn-main">Register Customer</a>
                            </div>
                            <div>
                                <a href="<?php echo URLROOT; ?>/pawnings/new_pawning" class="new-pawn btn-main">New Pawning</a>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="validated">
                    <div class="card">
                        <div class="card-header">
                             <h2>Validated Articles</h2>
                             <button>See All</button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="appointments">
                    <div class="card">
                        <div class="card-header">
                             <h2>Appointments</h2>
                             <button>See All</button>
                        </div>

                        <div class="date">
                            <label for="appointment-date">Date</label>
                            <input type="date" class="appointment-date">
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <td>Appointment No</td>
                                            <td>Time</td>
                                            <td>Reason</td>
                                        </tr> 
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>AP001</td>
                                            <td>10.30 a.m. - 11.00 p.m.</td>
                                            <td>For Pawning</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>




