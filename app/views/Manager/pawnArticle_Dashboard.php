<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/Img/logo.png">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/pawnedArticleDashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/loading.css">
</head>

<body>
    <div id="pleaseWait" style="display:none;position:absolute;left:0;right:0;top:0;bottom:0;z-index:99;">
        <section class="whole">
            <div class="loading-box">
                <p>please Wait...</p>
                <img src="<?php echo URLROOT ?>/img/loading.gif" alt="">
            </div>
        </section>
    </div>
    <div class="page">
        <?php
        if (!empty($_SESSION['message']) and $_SESSION['check'] == 0) {

            include_once 'error.php';
        } else if (!empty($_SESSION['message']) and $_SESSION['check'] == 1) {
            include_once 'ok.php';
        }
        ?>
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
                <a href="<?php echo URLROOT ?>/mgDashboard">
                    <img src="<?php echo URLROOT ?>/img/dashboard.png" alt="">
                    <p>Dashboard</p>
                </a>
                <a href="<?php echo URLROOT ?>/mgLocker">
                    <img src="<?php echo URLROOT ?>/img/locker.png" alt="">
                    <p>Locker</p>
                </a>
                <a class="dash" href="<?php echo URLROOT ?>/mgPawnArticles">
                    <img src="<?php echo URLROOT ?>/img/golden_pawned_article.png" alt="">
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
                    <h1>Pawned Articles</h1>
                    <a href="<?php echo URLROOT ?>/mgDashboard" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>

                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>

            <div class="inside-page">
                <div class="search-filter">
                    <div class="search">

                        <div class="search-bar">
                            <input type="text" name="search_input" id="search_input" onkeyup="searchItems()" placeholder="Search.." />
                        </div>
                        <div class="filter-set">
                            <button type="button" id="filter-dropdown-button">Filter</button>
                            <a class="filter-hide-button" href="<?php echo URLROOT ?>/mgPawnArticles">Cancel</a>

                        </div>

                        <div class="twobtns">
                            <div id="auctionBtn" class="auction-btn"><button>
                                    <span>Add to Auction</span>
                                    <?php if (!empty($data[1])) { ?> <span class='badge'><?php echo $data[1]; ?></span> <?php } ?>
                                </button>
                            </div>


                            <div id="warningBtn" class="warning-btn"><button>
                                    <span>Send Warnings</span>
                                    <?php if (!empty($data[2])) { ?> <span class='badge'><?php echo $data[2]; ?></span> <?php } ?>
                                </button>
                            </div>

                        </div>

                    </div>
                    <div class="filter-sec">
                        <?php include_once 'pawnArticleFilter.php' ?>
                    </div>

                </div>


                <div class="table">
                    <div class="table-section">
                        <?php
                        if (!empty($data[0])) {
                        ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Article ID</th>
                                        <th>Pawned Date/Time</th>
                                        <th>Retrieve Date</th>
                                        <th>Full Loan Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                <?php

                                $i = 1;
                                foreach ($data[0] as $row) {
                                    echo "
                                            <tr>
                                                        <td>$i. </td>
                                                        <td>" . $row->Article_Id . "</td>
                                                        <td>" . $row->Pawn_Date . "</td>
                                                        <td>" . $row->End_Date . "</td>
                                                        <td>Rs. " . $row->Estimated_Value . "/=</td>
                                                        <td>
                                                            <a href='" . URLROOT . "/mgPawnArticles/viewPawnedItem/" . $row->Article_Id . "' class='" . (($this->dateCompare($row->End_Date, 0) and $row->WarningTwo == 0) ? '' : (($this->dateCompare($row->End_Date, 14) and $row->Status == "Pawned") ? 'passEndDate' : 'passRedeemedDate')) . "'>View</a>
                                                            
                                                        </td>
                                                    </tr>";
                                    $i++;
                                }
                            } else {
                                echo "<p style='display:flex; align-items: center; justify-content:center; margin-top: 50px;'>No Articles Found</p>";
                            }
                                ?>

                                </tbody>
                            </table>
                            <div id="tfoot"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo URLROOT ?>/js/sidebarHide.js"></script>
<script src="<?php echo URLROOT ?>/js/profileImageHover.js"></script>

<script src="<?php echo URLROOT ?>/js/pawnedArticleDashboardSearch.js"></script>


<script>
    const URL = "<?php echo URLROOT ?>";
    let auctionBtn = document.getElementById("auctionBtn");
    let pleaseWait = document.getElementById("pleaseWait");


    auctionBtn.onclick = () => {
        pleaseWait.style.display = "block";
        fetch(`${URL}/mgPawnArticles/addToAuction`)
            .then(response => response.text())
            .then(data => {
                // pleaseWait.style.display = "none";  
                location.reload(true);
            })
            .catch(e => {
                // pleaseWait.style.display = "none";   
                console.log(e);
                location.reload(true);
            });
    }
</script>


<script>
    let warningBtn = document.getElementById("warningBtn");
    let wait = document.getElementById("pleaseWait");


    warningBtn.onclick = () => {
        wait.style.display = "block";
        fetch(`${URL}/mgPawnArticles/sendWarningEmails`)
            .then(response => response.text())
            .then(data => {
                // pleaseWait.style.display = "none";  
                location.reload(true);
            })
            .catch(e => {
                // pleaseWait.style.display = "none";   
                console.log(e);
                location.reload(true);
            });
    }
</script>

<script>
    let inputClean = document.getElementById('filter-clear-inputs');
    inputClean.addEventListener('click', () => {
        document.getElementById('end-date').value = "";
        document.getElementById('created-date').value = "";
        document.getElementById('karatage').value = "";
        document.getElementById('type').value = "";
        document.getElementById('min-weight').value = "";
        document.getElementById('max-weight').value = "";

    })
</script>



</html>