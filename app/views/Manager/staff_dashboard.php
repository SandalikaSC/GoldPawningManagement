<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/staff_dashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/staff_table.css">
</head>

<body>
    <?php
       if (!empty($data[1] && $data[1] == 'success')) {
           include_once URLROOT.'/Manager/add-success.php';
        } elseif (!empty($data[1] && $data[1] == 'delsuccess')) {
            include_once 'del-success.php';
        } else if (!empty($data[1] && $data[1] == 'unsuccess')) {
            include_once 'mgNetworkError.php';
        }
        ?>
    
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
                <a href="<?php echo URLROOT ?>/mgDashboard">
                    <img src="<?php echo URLROOT ?>/img/dashboard.png" alt="">
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
                <a class="staf" href="<?php echo URLROOT ?>/staff">
                    <img src="<?php echo URLROOT ?>/img/golden_staff.png" alt="">
                    <p>Staff</p>
                </a>
            </div>
            <div class="lgout">
                <a href="<?php echo URLROOT ?>/mgLogout">Logout</a>
            </div>
        </div>
        <div class="right">
            <div class="right-heading">
                <div class="right-side">
                    <div class="bars" id="bars">
                        <img src="<?php echo URLROOT ?>/img/icons8-bars-48.png" alt="bars">
                    </div>
                    <h1>
                        Staff
                    </h1>
                    <a href="<?php echo URLROOT ?>/mgDashboard" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/Panem Finance Inc 3.png" alt="logo">
            </div>
            <div class="inside-page">
                <div class="add-new-and-search">

                    <div class="search-bar">
                        <input type="text" name="search_input" id="search_input" onkeyup="myFunction()" placeholder="Search...">
                        <img src="<?php echo URLROOT ?>/img/search-icon.png" alt="search-icon">


                    </div>
                    <div class="add-new-btn">
                        <a href="<?php echo URLROOT ?>/staff/addNew">
                            <img src="<?php echo URLROOT ?>/img/golden-plus.png" alt="plus">
                            <label for="add-new-btn">Add New</label>
                        </a>
                    </div>

                </div>
                <div class="table">
                    <div class="table-section">
                        <?php
                        if ($data[0] != 0) {
                        ?>
                            <table id="myTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                foreach ($data[0] as $row) {
                                    echo "
                                            <tr>
                                                <td>" . $row->UserId . "</td>
                                                <td>" . $row->Name . "</td>
                                                <td>" . $row->Role . "</td>
                                                <td>" . $row->Date . "</td>
                                                <td>
                                                    <a href='" . URLROOT . "/staff/viewStaffMember/" . $row->UserId . "' class='view'>View</a>
                                                    <a href='" . URLROOT . "/staff/confirmDelete/" . $row->UserId . "' class='delete'>Delete</a>
                                                </td>
                                            </tr>";
                                }
                            } else {
                                echo "<center>NO Matched Data</center>";
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


<script src="<?php echo URLROOT ?>/js/searchOnStaffDashboard.js"></script>
<script src="<?php echo URLROOT ?>/js/sidebarHide.js"></script>
<script src="<?php echo URLROOT ?>/js/profileImageHover.js"></script>


</html>