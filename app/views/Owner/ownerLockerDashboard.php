<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/ownerLockerDashboard.css">

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
                <a class="dash" href="<?php echo URLROOT ?>/ownerLocker">
                    <img src="<?php echo URLROOT ?>/img/golden_locker.png" alt="">
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
                    <h1>Locker</h1>
                    <a href="<?php echo URLROOT ?>/ownerDashboard" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>

                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="inside-page">
                <div class="search">

                    <div class="search-bar">
                        <input type="text" name="search_input" id="search_input" onkeyup="myFunction()" placeholder="Search..." />

                    </div>
                    <div class="locker-summary">
                        <div class="locker-sum-1">
                            <div class="topic-label">Total</div>
                            <div class="no">100</div>
                        </div>
                        <div class="locker-sum-1">
                            <div class="topic-label">Allocated</div>
                            <div class="no">20</div>
                        </div>
                        <div class="locker-sum-1">
                            <div class="topic-label">Remaining</div>
                            <div class="no">80</div>
                        </div>
                    </div>

                </div>
                <div class="card-set">
                    <div class="lc-card">
                        <div class="lc-no">
                            <p>LC001</p>
                        </div>
                        <div class="lc-img">
                            <a href="<?php echo URLROOT ?>/mgLocker/viewLockerItems"><img class="nonstatic-img" src="<?php echo URLROOT ?>/img/ownerLoc.png" alt="locker" /></a>
                            <img class="static-img" src="<?php echo URLROOT ?>/img/ownerLoc1.png" alt="locker" />
                        </div>
                        <div class="down-arrow">
                            <a class="toggle-button">
                                <img src="<?php echo URLROOT ?>/img/downArrow.png" />
                            </a>
                        </div>
                        <div>
                            <div id="myDropdown" class="hover-des drop-down hide">
                                <div class="hover-des-field">
                                    <div class="label">Date/Time</div>
                                    <div class="element">2000/11/03</div>
                                </div>
                                <div class="hover-des-field">
                                    <div class="label">Retrieve Date</div>
                                    <div class="element">2010/11/03</div>
                                </div>
                                <div class="hover-des-field">
                                    <div class="label">No of Item</div>
                                    <div class="element">2</div>
                                </div>
                                <div class="hover-des-field">
                                    <div class="label">Key</div>
                                    <div class="element key">Delivered</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lc-card">
                        <div class="lc-no">
                            <p>LC001</p>
                        </div>
                        <div class="lc-img">
                            <a href="<?php echo URLROOT ?>/mgLocker/viewLockerItems"><img class="nonstatic-img" src="<?php echo URLROOT ?>/img/ownerLoc.png" alt="" /></a>
                            <img class="static-img" src="<?php echo URLROOT ?>/img/ownerLoc1.png" alt="" />
                        </div>
                        <div class="down-arrow">
                            <a class="toggle-button">
                                <img src="<?php echo URLROOT ?>/img/downArrow.png" />
                            </a>
                        </div>
                        <div>
                            <div id="myDropdown" class="hover-des drop-down hide">
                                <div class="hover-des-field">
                                    <div class="label">Date/Time</div>
                                    <div class="element">2000/11/03</div>
                                </div>
                                <div class="hover-des-field">
                                    <div class="label">Retrieve Date</div>
                                    <div class="element">2010/11/03</div>
                                </div>
                                <div class="hover-des-field">
                                    <div class="label">No of Item</div>
                                    <div class="element">2</div>
                                </div>
                                <div class="hover-des-field">
                                    <div class="label">Key</div>
                                    <div class="element key">Delivered</div>
                                </div>
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
    let dropDowns = document.getElementsByClassName('drop-down');
    let toggleBtn = document.getElementsByClassName('toggle-button');

    for (let i = 0; i < toggleBtn.length; i++) {
        toggleBtn[i].addEventListener('click', () => {
            dropDowns[i].classList.toggle('hide');
        });
    }

    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("hide");
    }
</script>

</html>