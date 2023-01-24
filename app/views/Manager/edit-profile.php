<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/edit-profile.css">
</head>

<body>
    <div class="page">
        <div class="right">
            <div class="right-heading">
                <div class="right-side">
                    <a href="<?php echo URLROOT ?>/mgDashboard" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>
                    <h1>
                        My Profile
                    </h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/Panem Finance Inc 3.png" alt="logo">
            </div>
            <div class="content-add-new-page">
              
                <div class="all">
                    <section class="big-form">
                       <section class="section_left">

                            <img src="<?php echo URLROOT ?>/img/image 1.png" id="profile-pic" class="profile-pic" alt="photo">
 

                            <div class="form-group">
                                <label for="fName"><b>First Name:</b></label>
                                <span  name="fName" id="fName" >Thimeth</span>
                            </div>
                            <div class="form-group">
                                <label for="lName"><b>Last Name:</b></label>
                                <span  name="lName" id="lName" >Imesha</span>
                            </div>
                    
                            <div class="form-group">
                                <label for="nic"><b>NIC:</b></label>
                                <span  name="nic" id="nic">990122156V</span>
                            </div>
                            <div class="form-group">
                                <label for="dob"><b>Date of Birth:</b></label>
                                <span  name="dob" id="dob">1999/01/12</span>
                            </div>
                            <div class="form-group">
                                <label for="address"><b>Address:</b></label>
                                <div class="address">
                                    <span  name="address" id="address">104/189/D</span>
                                    <span  name="address" id="address">Higgahalanda</span>
                                    <span  name="address" id="address">Kalagedihena</span>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email"><b>Email:</b></label>
                                <span name="email" id="email">thimethimesha03@gmail.com</span>
                            </div>
                            <div class="form-group">
                                <label for="gender"><b>Gender:</b></label>
                                <span  name="gender" id="gender">Male</span>
                            </div>
                            <div class="form-group">
                                <label for="mob-no"><b>Mobile Number1:</b></label>
                                <span  name="mob-no" id="mob-no">0705935817</span>
                            </div>
                            <div class="form-group">
                                <label for="home-no"><b>Additional Number:</b></label>
                                <span name="mob-no2" id="mob-no2">0750398557</span>
                            </div>
                           
                            
                        </section>
                        <section class="section_right">
                            <div class="form-group">
                                <label for="created_on"><b>Created On:</b></label>
                                <span name="created_on" id="created_on">2022/12/20</span>
                            </div>
                            <div class="form-group">
                                <label for="created_by"><b>Created By:</b></label>
                                <span name="created_by" id="created_by" >AD001</span>
                            </div>
                            <div class="form-group">
                                <label for="last_edit"><b>Last Edit:</b></label>
                                <span name="last_edit" id="last_edit" >2022/10/11</span>
                            </div>
                            
                        </section>
                        <img src="<?php echo URLROOT ?>/img/onEditPage.png" alt="avatar" class="avatar">
                    </section>
                    
                    <div class="two-btns">
                        <a href="<?php echo URLROOT ?>/mgEditProfile/editProfileDetails" class="edit_profile">Edit Profile</a>
                        <a href="<?php echo URLROOT ?>/mgEditProfile/manualEmailChange" class="edit_email">Edit Email</a>
                        <a href="<?php echo URLROOT ?>/mgEditProfile/manualPasswdChange" class="edit_password">Edit Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>