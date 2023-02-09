<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/mgmain_dashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/mggold-rates.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>

<body>  
    <div class="page">
        <?php include_once 'sendReplyForm.php';?>

        <?php
        if (!empty($_SESSION['message'])) {
          
            include_once 'success.php';
         
        } 
        ?>

        <div class="left" id="panel">
            <div class="profile">
                <div class="profile-pic">
                    <a href="<?php echo URLROOT ?>/mgEditProfile"><img src="<?php if (!empty($_SESSION['image'])) {
                                                                                echo $_SESSION['image'];
                                                                            } else {
                                                                                echo URLROOT . "/img/image 1.png";
                                                                            } ?>" id="profileImg" alt=""></a>
                    <div style="color:brown; position:absolute; font-weight:1000;" class="change-btn hidden" id="change-btn">Edit Profile</div>

                </div>
                <div class="name">
                    <p><?php echo $_SESSION['user_name']?></p>
                </div>
            </div>
            <div class="btn-set">
                <a class="dash" href="<?php echo URLROOT ?>/mgDashboard">
                    <img src="<?php echo URLROOT ?>/img/golden_dashboard.png" alt="">
                    <p>Dashboard</p>
                </a>
                <a href="<?php echo URLROOT ?>/mgLocker">
                    <img src="<?php echo URLROOT ?>/img/locker.png" alt="">
                    <p>Locker</p>
                </a>
                <a href="<?php echo URLROOT ?>/mgPawnArticles">
                    <img src="<?php echo URLROOT ?>/img/pawned.png" alt="">
                    <p>Pawned Articles</p>
                </a>
                <a href="<?php echo URLROOT ?>/mgAuction">
                    <img src="<?php echo URLROOT ?>/img/auction.png" alt="">
                    <p>Auction</p>
                </a>
                <a href="<?php echo URLROOT ?>/staff">
                    <img src="<?php echo URLROOT ?>/img/staff.png" alt="">
                    <p>Staff</p>
                </a>
            </div>
            <div class="lgout">
                <a href="<?php echo URLROOT ?>/Users/logout">Logout</a>
            </div>
        </div>
        <div class="right">
            <div class="right-heading">
                <div class="right-side">
                    <div class="bars" id="bars">
                        <img src="<?php echo URLROOT ?>/img/icons8-bars-48.png" alt="bars">
                    </div>
                    <h1>Dashboard</h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="inside-page">
                <div class="dashboard-items">
                    <div class="item-count">
                        <div class="count-card">
                            <div class="card-topic">
                                <div class="name">Customer</div>
                                <div class="card-logo">
                                    <img src="<?php echo URLROOT ?>/img/golden_staff.png" alt="">
                                </div>

                            </div>
                            <div class="vk-count">85</div>
                        </div>
                        <div class="count-card">
                            <div class="card-topic">
                                <div class="name">Employee</div>
                                <div class="card-logo">
                                    <img src="<?php echo URLROOT ?>/img/golden_staff.png" alt="">
                                </div>
                            </div>
                            <div class="count">
                                <div class="vk-count">
                                    <div class="vk">VK:</div>
                                    <div class="vk-c">10</div>
                                </div>
                                <div class="vk-count">
                                    <div class="vk">GA:</div>
                                    <div class="vk-c">10</div>
                                </div>
                                <div class="vk-count">
                                    <div class="vk">ST:</div>
                                    <div class="vk-c">10</div>
                                </div>
                            </div>
                        </div>
                        <div class="count-card">
                            <div class="card-topic">
                                <div class="name">Pawned Article</div>
                                <div class="card-logo">
                                    <img src="<?php echo URLROOT ?>/img/golden_pawned_article.png" alt="">
                                </div>
                            </div>

                            <div class="vk-count">500</div>
                        </div>
                        <div class="count-card">
                            <div class="card-topic">
                                <div class="name">Auction Article</div>
                                <div class="card-logo">
                                    <img src="<?php echo URLROOT ?>/img/golden_auction.png" alt="">
                                </div>
                            </div>
                            <div class="vk-count">60</div>
                        </div>
                        <div class="count-card">
                            <div class="card-topic">
                                <div class="name">Locker</div>
                                <div class="card-logo">
                                    <img src="<?php echo URLROOT ?>/img/golden_locker.png" alt="">
                                </div>
                            </div>
                            <div class="alloc-not-count lc-card">
                                <div class="count">
                                    <div class="vk-count">10</div>
                                    <div class="vk-count">Out Of</div>
                                    <div class="vk-count">100</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="current-gold-rates">
                        <div class="topic-gold-rates">
                            <label>Gold Rates</label>
                        </div>

                        <div class="gold-rates">
                            <div class="col1">
                                <div class="gold-rate-card">
                                    <label><?php echo $data[0][0]->Karatage ?>K</label>
                                    <p><?php echo $data[0][0]->Price ?></p>
                                </div>
                                <div class="gold-rate-card">
                                    <label><?php echo $data[0][1]->Karatage ?>K</label>
                                    <p><?php echo $data[0][1]->Price ?></p>
                                </div>
                            </div>
                            <div class="col3">
                                <div class="loan-interest">
                                    <label><?php echo $data[1]->Interest_Rate ?>%</label>
                                    <p>Interest</p>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="gold-rate-card">
                                    <label><?php echo $data[0][2]->Karatage ?>K</label>
                                    <p><?php echo $data[0][2]->Price ?></p>
                                </div>
                                <div class="gold-rate-card">
                                    <label><?php echo $data[0][3]->Karatage ?>K</label>
                                    <p><?php echo $data[0][3]->Price ?></p>
                                </div>
                            </div>
                        </div>

                    </div>

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
                                <label>Complaints</label>
                                <div class="search">

                                    <div class="search-bar">
                                        <input type="text" id="myInput" name="search_input" onkeyup="myFunction()" placeholder="DATE.." />

                                    </div>

                                </div>
                            </div>

                            <div id="myDiv" class="graph complaint-sec">
            
                                <?php include_once 'viewComplaints.php'; ?>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>
</body>
<script src="<?php echo URLROOT ?>/js/sidebarHide.js"></script>
<script src="<?php echo URLROOT ?>/js/profileImageHover.js"></script>
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


<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    di = document.getElementById("myDiv");
    li = di.getElementsByTagName("section");
    for (i = 0; i < li.length; i++) {
        a=li[i];
        // a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>

</html>