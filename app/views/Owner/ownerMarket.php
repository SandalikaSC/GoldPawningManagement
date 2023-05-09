<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/Img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/ownerMarket.css">

</head>

<body>
    <div class="page">
        <div class="left" id="panel">
            <div class="profile">
                <div class="profile-pic">
                    <a href="<?php echo URLROOT ?>/mgEditProfile"><img src="<?php if (!empty($_SESSION['image'])) {
                                                                                echo $_SESSION['image'];
                                                                            } else {
                                                                                echo URLROOT . "//img/image 1.png";
                                                                            } ?>" id="profileImg" alt=""></a>
                    <div style="color:brown; position:absolute; font-weight:1000;" class="change-btn hidden" id="change-btn">Edit Profile</div>

                </div>
                <div class="name">
                    <p><b><i>Hi...</i></b><?php echo $_SESSION['user_name'] ?></p>

                </div>
            </div>
            <div class="btn-set">
                <a href="<?php echo URLROOT ?>/ownerDashboard">
                    <img src="<?php echo URLROOT ?>/img/dashboard.png" alt="">
                    <p>Dashboard</p>
                </a>
                <a href="<?php echo URLROOT ?>/ownerLocker">
                    <img src="<?php echo URLROOT ?>/img/locker.png" alt="">
                    <p>Locker</p>
                </a>
                <a href="<?php echo URLROOT ?>/ownerPawnArticleDash">
                    <img src="<?php echo URLROOT ?>/img/pawned.png" alt="">
                    <p>Pawned Articles</p>
                </a>
                <a href="<?php echo URLROOT ?>/ownerAuction">
                    <img src="<?php echo URLROOT ?>/img/auction.png" alt="">
                    <p>Auction</p>
                </a>
                <a class="dash" href="<?php echo URLROOT ?>/ownerMarket">
                    <img src="<?php echo URLROOT ?>/img/market-gold.png" alt="">
                    <p>Market</p>
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
                    <h1>World Gold Market</h1>
                    <a href="<?php echo URLROOT ?>/ownerDashboard" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>

                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="inside-page">

                <div class="market-table">
                    <div class="market-table-topic">
                        Gold Price Rates in USD NOW
                    </div>
                    <div class="table-rows">
                        <div class="tab-row">
                            <div id="label1" class="tab-row-label">
                                Currency
                            </div>
                            <div id="value1" class="tab-row-data">

                            </div>
                        </div>

                        <div class="tab-row">
                            <div id="label3" class="tab-row-label">
                                18K Gram Price
                            </div>
                            <div id="value3" class="tab-row-data">

                            </div>
                        </div>
                        <div class="tab-row">
                            <div id="label4" class="tab-row-label">
                                20K Gram Price
                            </div>
                            <div id="value4" class="tab-row-data">

                            </div>
                        </div>
                        <div class="tab-row">
                            <div id="label5" class="tab-row-label">
                                21K Gram Price
                            </div>
                            <div id="value5" class="tab-row-data">

                            </div>
                        </div>
                        <div class="tab-row">
                            <div id="label6" class="tab-row-label">
                                22K Gram Price
                            </div>
                            <div id="value6" class="tab-row-data">

                            </div>
                        </div>
                        <div class="tab-row">
                            <div id="label7" class="tab-row-label">
                                24K Gram Price
                            </div>
                            <div id="value7" class="tab-row-data">

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
<!-- <script>
    var myHeaders = new Headers();
    myHeaders.append("x-access-token", "goldapi-2hqcerlhet7ykr-io");
    myHeaders.append("Content-Type", "application/json");

    var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        redirect: 'follow'
    };


    let value1, value2, value3, value4, value5, value6, value7;


    value1 = document.getElementById('value1');
    value3 = document.getElementById('value3');
    value4 = document.getElementById('value4');
    value5 = document.getElementById('value5');
    value6 = document.getElementById('value6');
    value7 = document.getElementById('value7');



    fetch("https://www.goldapi.io/api/XAU/USD", requestOptions)
        .then(response => response.json())
        .then(result => {
            console.log(result);

            value1.innerHTML = result.currency;
            value3.innerHTML = '$' + result.price_gram_18k;
            value4.innerHTML = '$' + result.price_gram_20k;
            value5.innerHTML = '$' + result.price_gram_21k;
            value6.innerHTML = '$' + result.price_gram_22k;
            value7.innerHTML = '$' + result.price_gram_24k;
        })
        .catch(error => console.log('error', error));
</script> -->


</html>