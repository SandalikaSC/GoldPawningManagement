<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_adminDash.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_staff_admin.css">
    <style>
        .inside-page{
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            flex-wrap: wrap;
        }
        .dashboard-items{
            display: flex;
            flex-direction: column;
        }
        .item-count{
            display:flex;
            flex-wrap: wrap;
            /* align-items: center; */
            justify-content: space-between;
            width: 100%;

        }
        .count-card{
            display: flex;
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
        .card-topic{
            display: flex;
            justify-content: space-between;
            /* margin-bottom: 10px;   */
        }

        .vk-count{
            font-style: oblique;
        }

        .card-topic .name{
            font-weight: bold;
        }
        .right{
            margin-top: 25px;
            /* flex: auto; */
            display: flex !important;
            flex-direction: column;
            /* overflow-y: scroll; */
            position: relative;
        }

        .complaint-chart{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 10px;
        }

        .chart{
            display: flex;
            background-color: white;
        }
        .complaint-chart .chart{
            display: flex;
            flex-direction: column;
            padding: 10px;
            float: left;
            /* border: 2px solid goldenrod; */
            border-radius: 20px;
            margin-right: 10px;
            box-shadow: 1px 5px 5px 0 black;
            margin-bottom: 2px;

        }

        .topic-income{
            display: flex;
            /* align-items: center; */
            justify-content: space-around;
            padding:10px;
            /* border-bottom: 1px solid goldenrod; */
            font-weight: bold;
            font-size: large;
            margin-bottom: 5px;
        }

        .topic-gold-rates{
            display: flex;
            font-weight: bold;
            font-size: large;
            margin-left:10px;
        }

        .topic{
            /* display: flex; */
            /* align-items: center; */
            justify-content: space-around;
            /* padding:3px; */
            /* border-bottom: 1px solid goldenrod; */
            font-weight: bold;
            font-size: large;
            margin-bottom: 5px;
        }

        .topic .search{
            display: flex;
        }

        .graph{
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 10px;
            width: 520px;
            height:220px;
        }
        input[type=text] {
            width: 140px;
            box-sizing: border-box;
            border: 2px solid #BB8A04;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            /* background-image: url('http://localhost/vogueMy/public/img/search-icon.png'); */
            /* background-image: url('searchicon.png'); */
            /* background-position: 10px 10px;  */
            background-repeat: no-repeat;
            padding: 15px 20px 15px 10px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        input[type=text]:focus {
            width: 100%;
        }

        .search-bar>input::placeholder {
            color: rgba(82, 82, 82, 0.608);
        }

        .complaint-chart .complaint-tab{
            display: flex;
            flex-direction: column;
            padding: 10px;
            float: left;
            /* border: 2px solid goldenrod;  */
            border-radius: 20px;
            background-color: white;
            box-shadow: 1px 5px 5px 0 black;

        }
    </style>
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
                        <img src="<?php echo URLROOT?>/img/menu_bar_black.png">
                    </span>
                </label>   
                <h1>Dashboard</h1> 
            </div>
                    
            <img src="<?php echo URLROOT?>/img/logo_name.png">
        </header>

        <main> 
            <div class="page-wrapper">   
                <div class="div-quote">
                    <div><i>We are friends in need when you're in urgent financial difficulties indeed.</i></div>
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
                
                    <div class="right">
                        <div class="inside-page">
                            <div class="dashboard-items">
                                <div class="item-count">
                                    <div class="count-card">
                                        <div class="card-topic">
                                            <div class="name">Admin</div>
                                            <div class="card-logo">
                                                <img src="<?php echo URLROOT ?>/img/golden_staff.png" alt="">
                                            </div>

                                        </div>
                                        <div class="vk-count"><?php echo $data['admin_count']; ?></div>
                                    </div>
                                    <div class="count-card">
                                        <div class="card-topic">
                                            <div class="name">Manager</div>
                                            <div class="card-logo">
                                                <img src="<?php echo URLROOT ?>/img/golden_staff.png" alt="">
                                            </div>

                                        </div>
                                        <div class="vk-count"><?php echo $data['manager_count']; ?></div>
                                    </div>  
                                    <div class="count-card">
                                        <div class="card-topic">
                                            <div class="name">Customer</div>
                                            <div class="card-logo">
                                                <img src="<?php echo URLROOT ?>/img/golden_staff.png" alt="">
                                            </div>

                                        </div>
                                        <div class="vk-count"><?php echo $data['customer_count']; ?></div>
                                    </div>
                                    <div class="count-card">
                                        <div class="card-topic">
                                            <div class="name">Pawning Officer</div>
                                            <div class="card-logo">
                                                <img src="<?php echo URLROOT ?>/img/golden_staff.png" alt="">
                                            </div>

                                        </div>
                                        <div class="vk-count"><?php echo $data['pawning_officer_count']; ?></div>
                                    </div>
                                    <div class="count-card">
                                        <div class="card-topic">
                                            <div class="name">Vault Keeper</div>
                                            <div class="card-logo">
                                                <img src="<?php echo URLROOT ?>/img/golden_staff.png" alt="">
                                            </div>

                                        </div>
                                        <div class="vk-count"><?php echo $data['vault_keeper_count']; ?></div>
                                    </div>                    
                                </div>
                            </div>
                        </div>
                    </div>
                
            <div class="div-income">
                <div class="title">
                    <h2>Monthly Income</h2>
                    <div class="complaint-chart">
                        <div class="chart">
                            <div class="topic-income">
                                <label>Income and Expenditure</label>
                            </div>

                            <div class="graph">
                                <canvas id="myChart"></canvas>
                            </div>
                    </div>
                    <div class="complaint-tab">
                            <div class="topic">
                                <div class="topic-income">
                                    <label>Payment</label>
                                </div>
                                <div class="right-content">
                                    <div class="tbl-details" style="padding: 0px 0px;">
                                        <table cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Emp_ID</th>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                </tr>
                                                <?php foreach($data['get_payment_list'] as $key => $get_payment_list) : ?>
                                                <tr class="tbl-body">
                                                    <td><?php echo ++$key; ?></td>
                                                    <td><?php echo $get_payment_list->UserId; ?></td>
                                                    <td><?php echo $get_payment_list->First_Name; ?></td>
                                                    <td><?php echo $get_payment_list->PayType; ?></td>
                                                    <td><?php echo $get_payment_list->Amount; ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>  
        </main> 
    </div>
</body>

<script>
    var xValues = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", " Sep", "Oct", "Nov", "Dec"];

    new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                data: [10, 40, 30, 21, 50, 35, 90, 80, 90, 15, 100, 1],
                borderColor: "#BB8A04",
                fill: false
            }, {
                data: [50, 0, 100, 20, 10, 150, 100, 110, 120, 0, 30, 40],
                borderColor: "black",
                fill: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false
            }
        }

    });
</script>
</html>




