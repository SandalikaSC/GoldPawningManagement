<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/Img/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/edit-profile.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/authentication-for-editprofile.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manualSetEmail.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manualSetPassword.css">

</head>

<body>
    
    <?php
    // if ($data == 'success') {
    //     include_once 'errorEmailChanged.php';
    // } else if ($data == 'failed') {
    //     include_once "errorEmailChangeFailure.php";
    // } else if ($data == 'emailExist') {
    //     include_once 'errorEmailExist.php';
    // }
    

    include_once "authentication-for-editprofile.php";
    include_once "manualSetEmail.php";
    include_once "manualSetPassword.php";
    include_once "messagePasswordChanged.php";
    include_once "messagePasswordChangeFailure.php";
    ?>
    <div class="page">
       <?php
        if (!empty($_SESSION['message'])) {
          
            include_once 'error.php';
         
        } 
        ?>
        <div class="right">
            <div class="right-heading">
                <div class="right-side">
                    <a href="<?php echo URLROOT ?>/mgDashboard" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>
                    <h1>
                        My Profile
                    </h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="content-edit-profile-page">
             
                <div class="all">
                    <section class="big-form">
                        <section class="section_left">

                            <img src="<?php if (!empty($data[0]->image)) {
                                            echo $data[0]->image;
                                        } else {
                                            echo URLROOT . "/img/image 1.png";
                                        } ?>" id="profile-pic" class="profile-pic" alt="photo">


                            <div class="form-group">
                                <div class="field-label">
                                    <label for="fName"><b>First Name :</b></label>
                                </div>
                                 <div class="field-value">
                                     <span name="fName" id="fName"><?php echo $data[0]->First_Name ?></span>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="field-label">
                                    <label for="lName"><b>Last Name :</b></label>
                                </div>
                                <div class="field-value">
                                    <span name="lName" id="lName"><?php echo $data[0]->Last_Name ?></span>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="field-label">
                                    <label for="nic"><b>NIC :</b></label>
                                </div>
                                <div class="field-value">
                                    <span name="nic" id="nic"><?php echo $data[0]->NIC ?></span>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="field-label">
                                    <label for="dob"><b>Date of Birth :</b></label>
                                </div>
                                <div class="field-value">
                                    <span name="dob" id="dob"><?php echo $data[0]->DOB ?></span>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="field-label">
                                    <label for="address"><b>Address :</b></label>
                                </div>
                                <div class="address field-value">
                                    <span name="address" id="address"><?php echo $data[0]->Line1 ?></span>
                                    <span name="address" id="address"><?php if($data[0]->Line2==NULL){echo "Not Available";}else{echo $data[0]->Line2;} ?></span>
                                    <span name="address" id="address"><?php if (!empty($data[0]->Line3)) {
                                          echo $data[0]->Line3;
                                        } else {
                                          echo "Not Available";
                                        } ?></span>

                                </div>

                            </div>
                            <div class="form-group">
                                <div class="field-label">
                                    <label for="email"><b>Email :</b></label>
                                </div>
                                <div class="field-value">
                                    <span name="email" id="email"><?php echo $data[0]->email ?></span>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="field-label">
                                    <label for="gender"><b>Gender :</b></label>
                                </div>
                                <div class="field-value">
                                    <span name="gender" id="gender"><?php echo $data[0]->Gender ?></span>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="field-label">
                                    <label for="mob-no"><b>Mobile Number1 :</b></label>
                                </div>
                                <div class="field-value">
                                <span name="mob-no" id="mob-no"><?php if (!empty($data[0]) && !empty($data[1])) {
                                          echo $data[1]->phone;
                                        } else if (!empty($data[0]) && empty($data[1])) {
                                          echo $data[0]->phone;
                                        } ?></span>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="field-label">
                                    <label for="home-no"><b>Additional Number :</b></label>
                                </div>
                                <div class="field-value">
                                <span name="mob-no2" id="mob-no2"><?php if (!empty($data[0]) && !empty($data[1])) {
                                          echo $data[0]->phone;
                                        } else if (!empty($data[0]) && empty($data[1])) {
                                          echo "Not Available";
                                        } ?></span>
                                </div>

                            </div>


                        </section>
                        <section class="section_right">
                            <div class="form-group">
                                <div class="field-label">
                                    <label for="created_on"><b>Created On :</b></label>
                                </div>
                                <div class="field-value">
                                    <span name="created_on" id="created_on"><?php echo $data[0]->Created_date ?></span>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="field-label">
                                    <label for="created_by"><b>Created By :</b></label>
                                </div>
                                <div class="field-value">
                                    <span name="created_by" id="created_by"><?php if($data[0]->Created_By==null){echo "Not Available";}else{echo $data[0]->Created_By;} ?></span>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="field-label">
                                    <label for="last_edit"><b>Last Edit :</b></label>
                                </div>
                                <div class="field-value">
                                    <span name="last_edit" id="last_edit"><?php echo $data[0]->last_edit ?></span>
                                </div>

                            </div>

                        </section>
                        <img src="<?php echo URLROOT ?>/img/onEditPage.png" alt="avatar" class="avatar">
                    </section>

                    <div class="three-btns">
                        <div class="edit-profile">
                            <a href="<?php echo URLROOT ?>/mgEditProfile/editProfileDetails">Edit Profile</a>
                        </div>
                        <div class="edit-email">
                            <button id="edit_email">Edit Email</button>
                        </div>
                        <div  class="edit-password">
                            <button id="edit_password">Edit Password</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<Script>
    let popupform = document.getElementById('popup-form');
    document.getElementById('edit_email').addEventListener('click', () => {
        popupform.style.display = 'flex';
    })

    document.getElementById('cancel').addEventListener('click', () => {
        popupform.style.display = 'none';
    })

    let otpbtn = document.getElementById('otpbtn');
    let changeForm = document.getElementById('change-form');
    let message = document.getElementById('message');

    otpbtn.addEventListener('click', () => {
        fetch('<?php echo URLROOT ?>/mgEditProfile/sendOTP')
            .then(data => data.json())
            // .then(data => data.slice(27))
            // .then((data => JSON.parse(data)))
            .then(data => {
                if (data.msg == "ok") {
                    otpbtn.style.display = "none";
                    message.style.color = "green";
                    message.textContent = "OTP SENT";
                    document.getElementById('otp-input-field').style.display = "flex";
                } else {
                    otpbtn.style.display = "inline";
                    message.style.color = "red";
                    message.textContent = "OTP NOT SENT";
                }
            })
            .catch((e) => {
                otpbtn.style.display = "inline";
                message.style.color = "red";
                message.textContent = "OTP NOT SENT";
                otpbtn.style.display = "inline";
            })
        otpbtn.style.display = "none";
    })


    changeForm.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(changeForm);
        fetch('<?php echo URLROOT ?>/mgEditProfile/verifyOtpAndPassword', {
                method: "post",
                body: formData
            })
            .then(data => data.json())
            // .then(data => data.slice(27))
            // .then(data => JSON.parse(data))
            .then(data => {
                if (data.msg == "ok") {
                    popupform.style.display = "none";
                    document.getElementById('manual-set-email-form').style.display = "flex";
                } else {
                    message.style.color = "red";
                    message.textContent = "Incorrect Inputs..Try again.";
                }
            })
            .catch(e => {
                message.style.color = "red";
                message.textContent = e;
                console.log(e);
            })
    })

    let passwordChangeForm = document.getElementById("manual-password-change-form");
    document.getElementById('edit_password').addEventListener('click', () => {
        passwordChangeForm.style.display = 'flex';
    })

    document.getElementById('cancelButton').addEventListener('click', () => {
        passwordChangeForm.style.display = 'none';
    })

    // let passwordChangeMessageBox=document.getElementById('password-changed-message-box')
    let passwordChange = document.getElementById('password-popup-form');
    passwordChange.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(passwordChange);
        fetch('<?php echo URLROOT ?>/mgEditProfile/userChangePassword', {
                method: "post",
                body: formData
            })
            .then(data => data.json())
            // .then(data => data.slice(27))
            // .then(data => JSON.parse(data))
            .then(data => {
                console.log(data.msg);
                if (data.msg === 1) {
                    
                    passwordChangeForm.style.display = "none";
                    document.getElementById('password-changed-message-box').style.display = "flex";
                } else {
                    document.getElementById('password-changed-failure-message-box').style.display = "flex";

                }
            })
            .catch(e => {
                document.getElementById('password-changed-failure-message-box').style.display = "flex";
                console.log(e);
            })
    })

    let donebtn = document.getElementById('donebtn');
    donebtn.addEventListener('click', () => {
        location.reload(true);
    })

    let Donebtn = document.getElementById('done-btn');
    Donebtn.addEventListener('click', () => {
        location.reload(true);
    })
</Script>

</html>