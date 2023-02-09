<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/Img/logo.png">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/add_employee.css">
</head>

<body>
    <div class="page">

        <?php
        if (!empty($_SESSION['message'])) {
          
            include_once 'error.php';
         
        } 
        ?>

        <div class="left" id="panel">
            <div class="profile">
                <div class="profile-pic">
                    <a href="<?php echo URLROOT ?>/mgEditProfile"><img src="<?php if(!empty($_SESSION['image'])){echo $_SESSION['image'];}else{echo URLROOT . "/public/img/image 1.png";} ?>" id="profileImg" alt=""></a>
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
                    <img src="<?php echo URLROOT ?>/img/locker-white.png" alt="">
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
                <a href="<?php echo URLROOT ?>/Users/logout">Logout</a>
            </div>
        </div>
        <div class="right">
            <div class="right-heading">
                <div class="right-side">
                    <div class="bars" id="bars">
                         <img src="<?php echo URLROOT ?>/img/icons8-bars-48.png" alt="bars">
                    </div>
                    <h1>
                        Add New
                    </h1>
                    <a href="<?php echo URLROOT ?>/staff" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="content-add-new-page">

                <form action="<?php echo URLROOT ?>/staff/setStaffMember" method="POST">
                    <section class="section_left">
                        <section class="big-form">

                            <img src="<?php echo URLROOT ?>/img/image 1.png" id="profile-pic" class="profile-pic" alt="photo">


                            <div class="form-group">
                                <label for="fName"><b>First Name:</b></label>
                                <input type="text" placeholder="First Name" name="fName" id="fName" maxlength="20" title="First letter should be uppercase letter" required>
                            </div>
                            <div class="form-group">
                                <label for="lName"><b>Last Name:</b></label>
                                <input type="text" placeholder="Last Name" name="lName" id="lName" maxlength="20" title="First letter should be uppercase letter" required>
                            </div>
                            <div class="form-group">
                                <label for="gender"><b>Gender:</b></label>
                                <select id="gender" name="gender" title="Select One" required>
                                    <option name="gender" value="male">Male</option>
                                    <option name="gender" value="female">Female</option>
                                    <option name="gender" value="other">Other</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="nic"><b>NIC:</b></label>
                                <input type="text" placeholder="National Identity Card Number" name="nic" id="nic" minlength="10" required>
                            </div>
                            <div class="form-group">
                                <label for="dob"><b>Date of Birth:</b></label>
                                <input type="date" placeholder="EX: year/month/day" name="dob" id="dob" maxlength="10" title="Ex: yyyy/mm/dd" oninput="dobValidate()" required>
                            </div>
                            <div class="form-group">
                                <label for="lane1"><b>Address:</b></label>
                                <input type="text" placeholder="Address Code" name="lane1" id="lane1" maxlength="50" required>
                            </div>
                            <div class="form-group">
                                <label for="lane2"><b>Address Lane 2:</b></label>
                                <input type="text" placeholder="Lane 2" name="lane2" id="lane2" maxlength="50" title="First letter should be uppercase letter" required>
                            </div>
                            <div class="form-group">
                                <label for="lane3"><b>Address Lane 3:</b></label>
                                <input type="text" placeholder="Lane 3(Optional)" name="lane3" id="lane3" title="First letter should be uppercase letter" maxlength="20">
                            </div>
                            <div class="form-group">
                                <label for="mob-no"><b>Mobile Number1:</b></label>
                                <input type="text" placeholder="Mobile Number" name="mob-no" id="mob-no" minlength="10" maxlength="10" title="Ex: 07XXXXXXXX" required>
                            </div>
                            <div class="form-group">
                                <label for="home-no"><b>Additional Number:</b></label>
                                <input type="text" placeholder="Optional" name="mob-no2" id="mob-no2" minlength="10" maxlength="10 ">
                            </div>
                            <div class="form-group">
                                <label for="email"><b>Email:</b></label>
                                <input type="text" placeholder="Email" name="email" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="myfile"><b>Image:</b></label>
                                <input type="file" id="myfile" name="myfile">
                            </div>
                            <input type="hidden" id="imageData" name="image">
                        </section>
                        <section class="section_right">
                            <div class="roles">
                                <label><b>Type :</b>
                                </label>
                                <div class="role">
                                    <input type="radio" id="role1" name="role" value="Pawning Officer" required /><label> Pawning Officer </label>
                                </div>
                                <div class="role">
                                    <input type="radio" id="role2" name="role" value="Gold Appraiser" required /> <label>Gold Appraiser</label>
                                </div>
                                <div class="role">
                                    <input type="radio" id="role3" name="role" value="Vault Keeper" required /> <label>Vault Keeper </label>
                                </div>
                            </div>
                            <div class="two-btns">
                                <a href="<?php echo URLROOT ?>/staff/index" class="cancelbtn">Cancel</a>
                                <button type="submit" id="registerbtn" class="registerbtn button-visibility">Add New</button>
                            </div>
                        </section>
                    </section>

                </form>
            </div>
        </div>
    </div>
</body>

<script src="<?php echo URLROOT ?>/js/imageChooser.js"></script>

<script src="<?php echo URLROOT ?>/js/sidebarHide.js"></script>

<script src="<?php echo URLROOT ?>/js/addEmployeeInputValidation.js"></script>

<script src="<?php echo URLROOT ?>/js/profileImageHover.js"></script>




</html>