<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/Img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/Img/logo.png">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/locker_dashboard.css">

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
                    <p><b>Hi...</b><?php echo $_SESSION['user_name'] ?></p>

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
                <a href="<?php echo URLROOT?>/ownerMarket">
                    <img src="<?php echo URLROOT ?>/img/market.png" alt="">
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
                        <input type="text" name="search_input" id="search_input" placeholder="Locker No" onkeyup="searchLockers()" />

                    </div>
                    <div class="locker-summary">
                        <div class="locker-sum-1">
                            <div class="topic-label">Total</div>
                            <div class="no">100</div>
                        </div>
                        <div class="locker-sum-1">
                            <div class="topic-label">Allocated</div>
                            <div class="no"><?php echo $data[1] ?></div>
                        </div>
                        <div class="locker-sum-1">
                            <div class="topic-label">Remaining</div>
                            <div class="no"><?php echo $data[2] ?></div>
                        </div>
                    </div>

                </div>

                <?php if (!empty($data[0])) { ?>
                    <div id="myDiv" class="card-set">
                        <?php foreach ($data[0] as $row) { ?>
                            <section class="lc-card">
                                <div class="lc-no">
                                    <p>LC<?php echo $row->lockerNo ?></p>
                                </div>
                                <div class="lc-img">
                                    <?php if ($row->No_of_Articles == 0) { ?>
                                        <a href="#"><img class="nonstatic-img" src="<?php echo URLROOT ?>/img/ownerLoc.png" alt="locker" /></a>
                                    <?php } else { ?>
                                        <a href="<?php echo URLROOT ?>/mgLocker/viewLockerItems/<?php echo $row->lockerNo ?>"><img class="nonstatic-img" src="<?php echo URLROOT ?>/img/ownerLoc.png" alt="locker" /></a>
                                    <?php } ?>

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
                                            <div class="label">Loc Status</div>
                                            <div class="element"><?php echo $row->Status ?></div>
                                        </div>
                                        <div class="hover-des-field">
                                            <div class="label">No of Articles</div>
                                            <div class="element"><?php echo $row->No_of_Articles ?></div>
                                        </div>
                                        <div class="hover-des-field">
                                            <div class="label">Key</div>
                                            <div class="element Green"><?php if ($row->Key_Status == 1) {
                                                                            echo "Delivered";
                                                                        } else {
                                                                            echo "Not Delivered";
                                                                        } ?></div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        <?php } ?>


                    </div>

                <?php } else {
                    echo "<center>No Data</center>";
                } ?>
                <div id="tfoot"></div>

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

<script>
    function searchLockers() {
        var input, filter, td1, i, nonCount, txtValue1;
        input = document.getElementById("search_input");
        filter = input.value.toUpperCase();
        ele = document.getElementById("myDiv");
        row = ele.getElementsByTagName("section");
        nonCount = 0;
        for (i = 0; i < row.length; i++) {
            td1 = row[i].getElementsByTagName("p")[0];

            if (td1) {
                txtValue1 = td1.textContent || td1.innerText;

                if (txtValue1.toUpperCase().indexOf(filter) > -1) {
                    row[i].style.display = "";
                } else {
                    row[i].style.display = "none";
                    nonCount++;
                }
            }
        }
        if (nonCount == row.length) {
            document.getElementById('tfoot').innerHTML = "<div style='display:flex;justify-content:center;align-items:center;text-align:center;margin-top:30px;margin-left:100px;'>No Lockers Found </div>";
            nonCount = 0;
        } else {
            document.getElementById('tfoot').innerHTML = "";
        }
    }
</script>


<script>
    const searchInput = document.querySelector('#search_input');

searchInput.addEventListener('input', () => {
  const userInput = searchInput.value;
  const regex = /^(100|[1-9][0-9]?)$/;

  if (!regex.test(userInput)) {
    searchInput.value = userInput.slice(0, -1); // Remove the last character
  }
});
</script>

</html>