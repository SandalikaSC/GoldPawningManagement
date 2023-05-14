<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/Img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/locker_dashboard.css">

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
                <a href="<?php echo URLROOT ?>/mgDashboard">
                    <img src="<?php echo URLROOT ?>/img/dashboard.png" alt="">
                    <p>Dashboard</p>
                </a>
                <a class="dash" href="<?php echo URLROOT ?>/mgLocker">
                    <img src="<?php echo URLROOT ?>/img/golden_locker.png" alt="">
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
                    <h1>Locker</h1>
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
                                        <th>Locker No</th>
                                        <th>Date</th>
                                        <th>Retrieve Date</th>
                                        <th>No of Items</th>
                                        <th>Key Status</th>
                
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                            <tr>
                                                <td>LC001</td>
                                                <td>2000/11/03</td>
                                                <td>2001/01/03</td>
                                                <td>1</td>
                                                <td style="color:green;">Delivered</td>
                                                
                                                <td>
                                                    <a href="<?php echo URLROOT ?>/mgLocker/viewLockerItems" class='view'>View</a>
                                            
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>LC002</td>
                                                <td>2001/03/20</td>
                                                <td>2002/06/20</td>
                                                <td>1</td>
                                                <td style="color:green;">Delivered</td>
                                                
                                                <td>
                                                    <a href="<?php echo URLROOT ?>/mgLocker/viewLockerItems" class='view'>View</a>
                                            
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>LC003</td>
                                                <td>2001/04/02</td>
                                                <td>2001/12/02</td>
                                                <td>2</td>
                                                <td style="color:green;">Delivered</td>
                                                
                                                <td>
                                                    <a href="<?php echo URLROOT ?>/mgLocker/viewLockerItems" class='view'>View</a>
                                            
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>LC004</td>
                                                <td>2002/05/12</td>
                                                <td>2003/01/12</td>
                                                <td>2</td>
                                                <td style="color:green;">Delivered</td>
                                                
                                                <td>
                                                    <a href="<?php echo URLROOT ?>/mgLocker/viewLockerItems" class='view'>View</a>
                                            
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>LC005</td>
                                                <td>2003/07/30</td>
                                                <td>2003/12/30</td>
                                                <td>1</td>
                                                <td style="color:green;">Delivered</td>
                                                
                                                <td>
                                                    <a href="<?php echo URLROOT ?>/mgLocker/viewLockerItems" class='view'>View</a>
                                            
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


</html>