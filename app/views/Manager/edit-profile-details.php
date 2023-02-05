<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/edit-profile-details.css">
</head>

<body>
    
    <div class="page">
       <?php
        if (!empty($_SESSION['message'])) {
            include_once 'error.php';
        } 
        ?>
        <div class="right">
            <div class="right-heading">
                <div class="right-side">
                    <div class="bars" id="bars">
                        <a href="<?php echo URLROOT ?>/mgEditProfile" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>
                    </div>
                    <h1>
                        Edit Profile
                    </h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="content-add-new-page">

                <form action="<?php echo URLROOT ?>/mgEditProfile/setPersonalDetails" method="POST">
                    <section class="section_left">
                        <section class="section_right">
                            <div class="profile-card-header">
                                <label><b>Profile Picture</b></label>
                            </div>
                              <img src="<?php if (!empty($data[1][0]->image)) {
                                            echo $data[1][0]->image;
                                        } else {
                                            echo URLROOT . "/img/image 1.png";
                                        } ?>" id="profile-pic" class="profile-pic" alt="photo">
                            <div class="image_input">
                                <input type="file" id="myfile" name="myfile">
                            </div>
                            <input type="hidden" value="<?php if (!empty($data[1][0]->image)) {
                                            echo $data[1][0]->image;
                                        } else {
                                            echo URLROOT . "/img/image 1.png";
                                        } ?>" id="imageData" name="image">
                        </section>
                        <section class="big-form">
                            <div class="profile-card-header">
                                <label><b>Personal Details</b></label>
                            </div>

                            <div class="form-group">
                                <label for="fName"><b>First Name:</b></label>
                                <input type="text" value="<?php echo $data[1][0]->First_Name ?>" placeholder="First Name" name="fName" id="fName" maxlength="20" title="First letter should be uppercase letter" required>
                            </div>
                            <div class="form-group">
                                <label for="lName"><b>Last Name:</b></label>
                                <input type="text" value="<?php echo $data[1][0]->Last_Name ?>" placeholder="Last Name" name="lName" id="lName" maxlength="20" title="First letter should be uppercase letter" required>
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
                                <label for="lane1"><b>Address:</b></label>
                                <input type="text" value="<?php echo $data[1][0]->Line1 ?>" placeholder="Address Code" name="lane1" id="lane1" maxlength="50" required>
                            </div>
                            <div class="form-group">
                                <label for="lane2"><b>Address Lane 2:</b></label>
                                <input type="text" value="<?php if($data[1][0]->Line2==null){echo "";}else{echo $data[1][0]->Line2;} ?>" placeholder="Lane 2" name="lane2" id="lane2" maxlength="50" title="First letter should be uppercase letter" required>
                            </div>
                            <div class="form-group">
                                <label for="lane3"><b>Address Lane 3:</b></label>
                                <input type="text" value="<?php if (!empty($data[1][0]->Line3)) {
                                          echo $data[1][0]->Line3;
                                        } else {
                                          echo "";
                                        } ?>" placeholder="Lane 3(Optional)" name="lane3" id="lane3" title="First letter should be uppercase letter" maxlength="20">
                            </div>
                            <div class="form-group">
                                <label for="mob-no"><b>Mobile Number1:</b></label>
                                <input type="text" value="<?php if (!empty($data[1][0]) && !empty($data[1][1])) {
                                          echo $data[1][1]->phone;
                                        } else if (!empty($data[1][0]) && empty($data[1][1])) {
                                          echo $data[1][0]->phone;
                                        } ?>" placeholder="Mobile Number" name="mob-no" id="mob-no" minlength="10" maxlength="10" title="Ex: 07XXXXXXXX" required>
                            </div>
                            <div class="form-group">
                                <label for="home-no"><b>Additional Number:</b></label>
                                <input type="text" value="<?php if (!empty($data[1][0]) && !empty($data[1][1])) {
                                          echo $data[1][0]->phone;
                                        } else if (!empty($data[1][0]) && empty($data[1][1])) {
                                          echo "";
                                        } ?>" placeholder="Optional" name="mob-no2" id="mob-no2" minlength="10" maxlength="10 ">
                            </div>

                            <div class="two-btns">
                                <a href="<?php echo URLROOT ?>/mgEditProfile" class="cancelbtn">Cancel</a>
                                <button type="submit" id="updatebtn" class="updatebtn">Update Profile</button>
                            </div>
                        </section>
                    </section>

                </form>
            </div>
        </div>
    </div>
</body>


<script>

    let imageChooser = document.getElementById('myfile');
    let register = document.getElementById('updatebtn');
    let image = '';
imageChooser.addEventListener('change', () => {
    file = imageChooser.files[0];
    if (file) {
        const fileReader = new FileReader(); //create an object using FileReader class
        fileReader.readAsDataURL(file);
        fileReader.addEventListener('load', () => {
            image = fileReader.result;
            console.log(image)
            document.getElementById('profile-pic').src = image;
            document.getElementById('imageData').value = image;
        })
    }
}) 
</script>





</html>