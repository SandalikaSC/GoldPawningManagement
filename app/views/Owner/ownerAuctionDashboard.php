<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/ownerAuctionDashboard.css">
</head>

<body>
    <!--  -->
    <div class="page">
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
                    <p><?php echo $_SESSION['user_name'] ?></p>
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
                <a href="<?php echo URLROOT?>/ownerPawnArticleDash">
                    <img src="<?php echo URLROOT ?>/img/pawned.png" alt="">
                    <p>Pawned Articles</p>
                </a>
                <a class="auc" href="<?php echo URLROOT ?>/ownerAuction">
                    <img src="<?php echo URLROOT ?>/img/golden_auction.png" alt="">
                    <p>Auction</p>
                </a>
                <a href="#">
                    <img src="<?php echo URLROOT ?>/img/staff.png" alt="">
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
                    <div class="page-name">
                        <h1>Auction</h1>
                    </div>
                    <div class="back">
                        <a href="<?php echo URLROOT ?>/mgDashboard" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>
                    </div>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>


            <div class="inside-page">
                <div class="search">
                    <div class="search-bar">
                        <input type="text" name="search_input" id="search_input" onkeyup="myFunction()" placeholder="Search...">
                        <img src="<?php echo URLROOT ?>/img/search-icon.png" alt="search-icon">
                    </div>
                </div>

                <div class="auction-page-row">

                <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="<?php echo URLROOT ?>/img/1.png" alt="Jewelry" style="width:200px;height:200px;">
                            </div>
                            <div class="flip-card-back">
                                <h1>A101</h1>
                                <p>Jewelry</p>
                                <p>18K</p>
                                <p>23.50g</p>
                                 <a href="<?php echo URLROOT ?>/mgAuction/viewAuctionItem">View</a>

                            </div>
                        </div>
                    </div>

                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="<?php echo URLROOT ?>/img/2.png" alt="Jewelry" style="width:200px;height:200px;">
                            </div>
                            <div class="flip-card-back">
                                <h1>A008</h1>
                                <p>Jewelry</p>
                                <p>20K</p>
                                <p>50g</p>
                                 <a href="<?php echo URLROOT ?>/mgAuction/viewAuctionItem">View</a>

                            </div>
                        </div>
                    </div>

                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="<?php echo URLROOT ?>/img/3.png" alt="Jewelry" style="width:200px;height:200px;">
                            </div>
                            <div class="flip-card-back">
                                <h1>A108</h1>
                                <p>Jewelry</p>
                                <p>20K</p>
                                <p>100g</p>
                                 <a href="<?php echo URLROOT ?>/mgAuction/viewAuctionItem">View</a>

                            </div>
                        </div>
                    </div>

                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="<?php echo URLROOT ?>/img/4.png" alt="Jewelry" style="width:200px;height:200px;">
                            </div>
                            <div class="flip-card-back">
                                <h1>A130</h1>
                                <p>Jewelry</p>
                                <p>24K</p>
                                <p>68.40g</p>
                                 <a href="<?php echo URLROOT ?>/mgAuction/viewAuctionItem">View</a>

                            </div>
                        </div>
                    </div>

                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="<?php echo URLROOT ?>/img/5.png" alt="Jewelry" style="width:200px;height:200px;">
                            </div>
                            <div class="flip-card-back">
                                <h1>A134</h1>
                                <p>Jewelry</p>
                                <p>22K</p>
                                <p>97.20g</p>
                                 <a href="<?php echo URLROOT ?>/mgAuction/viewAuctionItem">View</a>

                            </div>
                        </div>
                    </div>

                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="<?php echo URLROOT ?>/img/6.png" alt="Jewelry" style="width:200px;height:200px;">
                            </div>
                            <div class="flip-card-back">
                                <h1>A271</h1>
                                <p>Jewelry</p>
                                <p>22K</p>
                                <p>89g</p>
                                 <a href="<?php echo URLROOT ?>/mgAuction/viewAuctionItem">View</a>

                            </div>
                        </div>
                    </div>

                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="<?php echo URLROOT ?>/img/images.jpg" alt="Jewelry" style="width:200px;height:200px;">
                            </div>
                            <div class="flip-card-back">
                                <h1>A378</h1>
                                <p>Jewelry</p>
                                <p>23K</p>
                                <p>100.40g</p>
                                 <a href="<?php echo URLROOT ?>/mgAuction/viewAuctionItem">View</a>


                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <!--  -->

</body>
<script src="<?php echo URLROOT ?>/js/sidebarHide.js"></script>
<script src="<?php echo URLROOT ?>/js/profileImageHover.js"></script>


</html>