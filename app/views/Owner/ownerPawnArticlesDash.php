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
                    <a href="<?php echo URLROOT ?>/mgEditProfile"><img src="<?php if(!empty($_SESSION['image'])){echo $_SESSION['image'];}else{echo URLROOT . "//img/image 1.png";} ?>" id="profileImg" alt=""></a>
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
                <a class="dash" href="<?php echo URLROOT?>/ownerPawnArticleDash">
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
                    <a href="<?php echo URLROOT ?>/mgDashboard" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>

                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="inside-page">
                <div class="search">

                    <div class="search-bar">
                        <input type="text" name="search_input" id="search_input" onkeyup="myFunction()" placeholder="Search.." />

                    </div>

                </div>
                
                <div class="table">
                    <div class="table-section">
                       
                            <table id="myTable">
                                <thead>
                                    <tr>
                                        <th>Article</th>
                                        <th>Article ID</th>
                                        <th>Pawned Date</th>
                                        <th>Retrieve Date</th>
                                        <th>Full Loan Amount</th>
                
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                            <tr>
                                                <td><img src="<?php echo URLROOT ?>/img/1.png" alt="bracelet"></td>
                                                <td>A101</td>
                                                <td>2000/01/30</td>
                                                <td>2003/12/31</td>
                                                <td>Rs.320000/=</td>
                                                
                                                <td>
                                                    <a href="<?php echo URLROOT ?>/mgPawnArticles/viewPawnedItem" class='view'>View</a>
                                            
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="<?php echo URLROOT ?>/img/2.png" alt="bracelet"></td>
                                                <td>A021</td>
                                                <td>2000/05/07</td>
                                                <td>2001/10/30</td>
                                                <td>Rs.200000/=</td>
                                                
                                                <td>
                                                    <a href="<?php echo URLROOT ?>/mgPawnArticles/viewPawnedItem" class='view'>View</a>
                                            
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><img src="<?php echo URLROOT ?>/img/3.png" alt="bracelet"></td>
                                                <td>A050</td>
                                                <td>2001/02/14</td>
                                                <td>2001/12/14</td>
                                                <td>Rs.120000/=</td>
                                                
                                                <td>
                                                    <a href="<?php echo URLROOT ?>/mgPawnArticles/viewPawnedItem" class='view'>View</a>
                                            
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><img src="<?php echo URLROOT ?>/img/4.png" alt="bracelet"></td>
                                                <td>A100</td>
                                                <td>2002/03/10</td>
                                                <td>2003/12/10</td>
                                                <td>Rs.420,000/=</td>
                                                
                                                <td>
                                                    <a href="<?php echo URLROOT ?>/mgPawnArticles/viewPawnedItem" class='view'>View</a>
                                            
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><img src="<?php echo URLROOT ?>/img/5.png" alt="bracelet"></td>
                                                <td>A101</td>
                                                <td>2002/04/13</td>
                                                <td>2003/08/31</td>
                                                <td>Rs.125000/=</td>
                                                
                                                <td>
                                                    <a href="<?php echo URLROOT ?>/mgPawnArticles/viewPawnedItem" class='view'>View</a>
                                            
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><img src="<?php echo URLROOT ?>/img/6.png" alt="bracelet"></td>
                                                <td>A105</td>
                                                <td>2002/12/30</td>
                                                <td>2003/11/30</td>
                                                <td>Rs.235,000/=</td>
                                                
                                                <td>
                                                    <a href="<?php echo URLROOT ?>/mgPawnArticles/viewPawnedItem" class='view'>View</a>
                                            
                                                </td>
                                            </tr>

                                </tbody>
                            </table>
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