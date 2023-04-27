<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/ownerPawnArticleDashboard.css">

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
                <a href="<?php echo URLROOT ?>/ownerLocker">
                    <img src="<?php echo URLROOT ?>/img/locker.png" alt="">
                    <p>Locker</p>
                </a>
                <a class="dash" href="<?php echo URLROOT ?>/ownerPawnArticleDash">
                    <img src="<?php echo URLROOT ?>/img/golden_pawned_article.png" alt="">
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
                    <h1>Pawned Articles</h1>
                    <a href="<?php echo URLROOT ?>/ownerDashboard" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>
                    <div class="notifi">
                        <?php if (!empty($data[1])) { ?> <span class='badge'><?php echo $data[1]; ?></span> <?php } ?>                    
                    </div>
                    <div>
                        <?php if (!empty($data[2])) { ?> <span class='badge'><?php echo $data[2]; ?></span> <?php } ?>
                    </div>
                    
                </div>
                <div class="search">

                    <div class="search-bar">
                        <input type="text" name="search_input" id="search_input" onkeyup="searchItems()" placeholder="Enter Article ID..">
                        <img src="<?php echo URLROOT ?>/img/searchicon.gif" alt="search-icon">
                    </div>
                    <div class="filter-set">
                        <button id="filter-dropdown-button">Filter</button>
                    </div>
                    <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">

                </div>
            </div>
            <div class="inside-page">
                <div class="search-filter">

                    <div class="filter-sec">
                        <?php include_once 'pawnArticleFilter.php' ?>
                    </div>

                </div>


                <div class="table">
                    <div class="table-section">
                        <?php
                        if (!empty($data[0])) {
                        ?>
                            <table id="myTable">
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
                                <tbody>
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
                                                            <a href='" . URLROOT . "/ownerPawnArticleDash/viewPawnedItem/" . $row->Article_Id . "' class='" . (($this->dateCompare($row->End_Date, 0)) ? '' : (($this->dateCompare($row->End_Date, 14)) ? 'passEndDate' : 'passRedeemedDate')) . "'>View</a>
                                                            
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
<script src="<?php echo URLROOT ?>/js/profileImageHover.js"></script>


</html>