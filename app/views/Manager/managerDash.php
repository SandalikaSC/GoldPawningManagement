<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/mgmain_dashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/mggold-rates.css">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/Img/logo.png">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/loading.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>

<body>

    <div id="pleaseWait" style="display:none;position:absolute;left:0;right:0;top:0;bottom:0;padding:20px 40px;z-index:10;">
        <section class="whole">
            <div class="loading-box">
                <p>please Wait...</p>
                <img src="<?php echo URLROOT ?>/img/loading.gif" alt="">
            </div>
        </section>
    </div>

    <div class="page">


        <?php include_once 'sendReplyForm.php'; ?>

        <?php
        if (!empty($_SESSION['message']) and $_SESSION['check']==0) {

            include_once 'error.php';
        }else if(!empty($_SESSION['message']) and $_SESSION['check']==1){
            include_once 'ok.php';
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
                    <p><b>Hi...</b><?php echo $_SESSION['user_name'] ?></p>
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
                            <div class="vk-count"><?php if ($data[4][0]->customers) echo $data[4][0]->customers;
                                                    else echo 0; ?></div>
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
                                    <div class="vk-c"><?php if ($data[4][1]->vault_keepers) echo $data[4][1]->vault_keepers;
                                                        else echo 0; ?></div>
                                </div>
                                <div class="vk-count">
                                    <div class="vk">GA:</div>
                                    <div class="vk-c"><?php if ($data[4][2]->gold_appraisers) echo $data[4][2]->gold_appraisers;
                                                        else echo 0; ?></div>
                                </div>
                                <div class="vk-count">
                                    <div class="vk">PO:</div>
                                    <div class="vk-c"><?php if ($data[4][3]->pawning_officers) echo $data[4][3]->pawning_officers;
                                                        else echo 0; ?></div>
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

                            <div class="vk-count"><?php if ($data[4][4]->pawn_articles) echo $data[4][4]->pawn_articles;
                                                    else echo 0; ?></div>
                        </div>
                        <div class="count-card">
                            <div class="card-topic">
                                <div class="name">Auction Article</div>
                                <div class="card-logo">
                                    <img src="<?php echo URLROOT ?>/img/golden_auction.png" alt="">
                                </div>
                            </div>
                            <div class="vk-count"><?php if ($data[4][5]->auction_articles) echo $data[4][5]->auction_articles;
                                                    else echo 0; ?></div>
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
                                    <div class="vk-count"><?php if ($data[4][6]->lockers) echo $data[4][6]->lockers;
                                                            else echo 0; ?></div>
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
                                <div class="gold-rate-card">
                                    <label><?php echo $data[0][2]->Karatage ?>K</label>
                                    <p><?php echo $data[0][2]->Price ?></p>
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
                                    <label><?php echo $data[0][3]->Karatage ?>K</label>
                                    <p><?php echo $data[0][3]->Price ?></p>
                                </div>
                                <div class="gold-rate-card">
                                    <label><?php echo $data[0][4]->Karatage ?>K</label>
                                    <p><?php echo $data[0][4]->Price ?></p>
                                </div>
                                <div class="gold-rate-card">
                                    <label><?php echo $data[0][5]->Karatage ?>K</label>
                                    <p><?php echo $data[0][5]->Price ?></p>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="complaint-chart">
                        <div class="chart">
                            <div class="topic-income">
                                <label>Income and Expenditure</label>
                                <select name="yearSelect" id="yearSelect">
                                    <option value=2023>2023</option>
                                    <option value=2022>2022</option>
                                </select>

                                <button type="button" onclick="redirectToReport()" id="downloadbtn">Print Me</button>

                            </div>

                            <div class="graph">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <div class="add-note">
                            <?php include_once 'mgAddNote.php'; ?>
                        </div>

                    </div>

                    <div class="complaint-tab">
                        <div class="topic">
                            <label>Complaints</label>
                            <div class="search">

                                <div class="search-bar">
                                    <input type="text" id="myInput" name="search_input" onkeyup="searchComplaints()" placeholder="DATE.." />

                                </div>

                            </div>
                        </div>

                        <div class="complaint-sec">

                            <?php include_once 'viewComplaints.php'; ?>
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
    let amountsIncome = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    let amountsExpen = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

    let incomeData = <?php echo json_encode($data[3][0]); ?>;
    let expenData = <?php echo json_encode($data[3][1]); ?>;


    for (let i = 0; i < 12; i++) {
        amountsIncome[i] = 0;
    }

    // Store the income and expense month and total amount in separate arrays
    for (var i = 0; i < incomeData.length; i++) {
        var month = parseInt(incomeData[i].Month);
        amountsIncome[month - 1] = parseFloat(incomeData[i].totalIncome);

    }


    for (let i = 0; i < 12; i++) {
        amountsExpen[i] = 0;
    }

    for (var i = 0; i < expenData.length; i++) {
        var month = parseInt(expenData[i].Month);
        amountsExpen[month - 1] = parseFloat(expenData[i].totalExpen);

    }
    var xValues = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", " Sep", "Oct", "Nov", "Dec"];

    new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                label: 'Monthly Income',
                data: amountsIncome,
                // data: amountsIncome,
                borderColor: "#BB8A04",
                fill: false
            }, {
                label: 'Monthly Expenditure',
                data: amountsExpen,
                // data: amountsExpen,
                borderColor: "black",
                fill: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: true
            }
        }

    });
</script>


<script>
    let currentDate = new Date();
    let currentYear = currentDate.getFullYear();
    let selectedValue = currentYear;
    let mySelect = document.getElementById("yearSelect");
    mySelect.addEventListener("change", function() {
        selectedValue = mySelect.value;
        fetch(`<?php echo URLROOT ?>/ownerDashboard/loadChartData/${selectedValue}`)
            .then(response => response.json())
            .then(data => {
                let incomeData, expenData;

                incomeData = data[0];

                for (let i = 0; i < 12; i++) {
                    amountsIncome[i] = 0;
                }


                for (var i = 0; i < incomeData.length; i++) {
                    var month = parseInt(incomeData[i].Month);
                    amountsIncome[month - 1] = parseFloat(incomeData[i].totalIncome);

                }
                // console.log(amountsIncome);


                expenData = data[1];

                for (let i = 0; i < 12; i++) {
                    amountsExpen[i] = 0;
                }

                for (var i = 0; i < expenData.length; i++) {
                    var month = parseInt(expenData[i].Month);
                    amountsExpen[month - 1] = parseFloat(expenData[i].totalExpen);

                }

                // console.log(amountsExpen);
                new Chart("myChart", {
                    type: "line",
                    data: {
                        labels: xValues,
                        datasets: [{
                            label: 'Monthly Income',
                            data: amountsIncome,
                            borderColor: "#BB8A04",
                            fill: "false"
                        }, {
                            label: 'Monthly Expenditure',
                            data: amountsExpen,
                            borderColor: "black",
                            fill: "false"
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            display: true
                        }

                    }

                });

            })

    });
</script>

<script>
    let download = document.getElementById('downloadbtn');
    download.addEventListener('click', () => {
        const imageLink = document.createElement('a');
        const canvas = document.getElementById('myChart');
        imageLink.download = 'canvas.png';
        imageLink.href = canvas.toDataURL('image/png', 1);
        imageLink.click();
    });
</script>

<script>
    function searchComplaints() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        di = document.getElementById("myDiv");
        li = di.getElementsByTagName("section");
        nonCount = 0;
        for (i = 0; i < li.length; i++) {
            a = li[i];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                nonCount++;
                li[i].style.display = "none";
            }
        }
        if (nonCount == li.length) {
            document.getElementById('tfoot').innerHTML = "<div style='text-align:center;'>No Complaints </div>";
            nonCount = 0;
        } else {
            document.getElementById('tfoot').innerHTML = "";
        }
    }
</script>

<script>
    function redirectToReport() {
        // Store income and expenditure arrays in local storage
        localStorage.setItem('amountsIncome', JSON.stringify(amountsIncome));
        localStorage.setItem('amountsExpen', JSON.stringify(amountsExpen));

        window.location.href = `<?php echo URLROOT ?>/ownerDashboard/generateReport/${selectedValue}`;
    }
</script>



</html>