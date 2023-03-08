<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/Img/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/edit-profile-details.css">
    <style>
        .error {
            color: red !important;
            /* font-size: small; */
        }

        input:invalid {
            border-color: red !important;
        }

        input:valid {
            border-color: green !important;
        }
    </style>
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

                <form id="change-form">
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

                            <div class="form-group-with-err">
                                <div class="form-group">
                                    <label for="fName"><b>First Name:</b></label>
                                    <input type="text" value="<?php echo $data[1][0]->First_Name ?>" placeholder="First Name" name="fName" id="fName" maxlength="20" title="First letter should be uppercase letter">
                                </div>
                                <div class="err">
                                    <small class="error" id="firstNameError"></small>
                                </div>
                            </div>

                            <div class="form-group-with-err">
                                <div class="form-group">
                                    <label for="lName"><b>Last Name:</b></label>
                                    <input type="text" value="<?php echo $data[1][0]->Last_Name ?>" placeholder="Last Name" name="lName" id="lName" maxlength="20" title="First letter should be uppercase letter">
                                </div>
                                <div class="err">
                                    <small class="error" id="lastNameError"></small>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="gender"><b>Gender:</b></label>
                                <select id="gender" name="gender" title="Select One" required>
                                    <option name="gender" value="male">Male</option>
                                    <option name="gender" value="female">Female</option>
                                    <option name="gender" value="other">Other</option>
                                </select>

                            </div>


                            <div class="form-group-with-err">
                                <div class="form-group">
                                    <label for="lane1"><b>Address:</b></label>
                                    <input type="text" value="<?php echo $data[1][0]->Line1 ?>" placeholder="Address Code" name="lane1" id="lane1" maxlength="50">
                                </div>
                                <div class="err">
                                    <small class="error" id="lane1Error"></small>
                                </div>
                            </div>


                            <div class="form-group-with-err">
                                <div class="form-group">
                                    <label for="lane2"><b>Address Lane 2:</b></label>
                                    <input type="text" value="<?php if ($data[1][0]->Line2 == null) {
                                                                    echo "";
                                                                } else {
                                                                    echo $data[1][0]->Line2;
                                                                } ?>" placeholder="Lane 2" name="lane2" id="lane2" maxlength="50" title="First letter should be uppercase letter">
                                </div>
                                <div class="err">
                                    <small class="error" id="lane2Error"></small>
                                </div>
                            </div>


                            <div class="form-group-with-err">
                                <div class="form-group">
                                    <label for="lane3"><b>Address Lane 3:</b></label>
                                    <input type="text" value="<?php if (!empty($data[1][0]->Line3)) {
                                                                    echo $data[1][0]->Line3;
                                                                } else {
                                                                    echo "";
                                                                } ?>" placeholder="Lane 3(Optional)" name="lane3" id="lane3" title="First letter should be uppercase letter" maxlength="20">
                                </div>
                                <div class="err">
                                    <small class="error" id="lane3Error"></small>
                                </div>
                            </div>


                            <div class="form-group-with-err">
                                <div class="form-group">
                                    <label for="mob-no"><b>Mobile Number1:</b></label>
                                    <input type="text" value="<?php if (!empty($data[1][0]) && !empty($data[1][1])) {
                                                                    echo $data[1][1]->phone;
                                                                } else if (!empty($data[1][0]) && empty($data[1][1])) {
                                                                    echo $data[1][0]->phone;
                                                                } ?>" placeholder="Mobile Number" name="mob-no" id="mob-no" minlength="10" maxlength="10" title="Ex: 07XXXXXXXX">
                                </div>
                                <div class="err">
                                    <small class="error" id="mob1Error"></small>
                                </div>
                            </div>


                            <div class="form-group-with-err">
                                <div class="form-group">
                                    <label for="home-no"><b>Additional Number:</b></label>
                                    <input type="text" value="<?php if (!empty($data[1][0]) && !empty($data[1][1])) {
                                                                    echo $data[1][0]->phone;
                                                                } else if (!empty($data[1][0]) && empty($data[1][1])) {
                                                                    echo "";
                                                                } ?>" placeholder="Optional" name="mob-no2" id="mob-no2" minlength="10" maxlength="10 ">
                                </div>
                                <div class="err">
                                    <small class="error" id="mob2Error"></small>
                                </div>
                            </div>


                            <div class="two-btns">
                                <a class="cancelbtn" id="cancelbtn">Cancel</a>
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



<script>
    let myArray = [1, 1, 1, 1, 1, 1, 1];

    let updatebtn = document.getElementById("updatebtn");
    

    let cancelbtn = document.getElementById("cancelbtn");
    cancelbtn.addEventListener('click', () => {
        location.reload("true");
    })

    function validateForm() {

        // Regular expression for first and last name
        const nameRegex = /^[A-Z][a-z]{1,19}$/;

        // Regular expression for phone number
        const phoneRegex1 = /^[0][7][0,1,2,5,6,7,8][0-9]{7,}$/;
        const phoneRegex2 = /^[0][7][0,1,2,5,6,7,8][0-9]{7,}$/;

        // Regular expression for address
        const addressRegex1 = /^[A-Za-z0-9-/]{1,19}$/;
        const addressRegex2 = /^[0][1,3,7][0-9]{8,}$/;

        // Validate first name
        const firstName = document.getElementById("fName").value;
        const firstNameError = document.getElementById("firstNameError");
        if (nameRegex.test(firstName)) {
            // firstName.classList.remove("invalid");
            firstNameError.style.display = "none";
        } else {
            // firstName.classList.add("invalid");
            firstNameError.textContent = "First letter should be Capital Letter, First name is required";
            firstNameError.style.display = "block";
            myArray[0] = 0;
        }

        // Validate last name
        const lastName = document.getElementById("lName").value;
        const lastNameError = document.getElementById("lastNameError");

        if (nameRegex.test(lastName)) {
            // lastName.classList.remove("invalid");
            lastNameError.style.display = "none";
        } else {
            // firstName.classList.add("invalid");
            lastNameError.textContent = "First letter should be Capital Letter, First name is required";
            lastNameError.style.display = "block";
            myArray[1] = 0;

        }

        // Validate phone number
        const phoneNumber1 = document.getElementById("mob-no").value;
        const mob1Error = document.getElementById("mob1Error");
        if (phoneRegex1.test(phoneNumber1)) {
            // phoneNumber1.classList.remove("invalid");
            mob1Error.style.display = "none";
        } else {
            // phoneNumber1.classList.add("invalid");
            mob1Error.textContent = "Please enter a valid 10-digit phone number.";
            mob1Error.style.display = "block";
            myArray[2] = 0;

        }

        const phoneNumber2 = document.getElementById("mob-no2").value;
        const mob2Error = document.getElementById("mob2Error");
        if (phoneRegex2.test(phoneNumber2) || phoneNumber2 == "") {
            // phoneNumber2.classList.remove("invalid");
            mob2Error.style.display = "none";
        } else {
            // phoneNumber2.classList.add("invalid");
            mob2Error.textContent = "Please enter a valid 10-digit phone number.";
            mob2Error.style.display = "block";
            myArray[3] = 0;

        }

        const addressLane1 = document.getElementById("lane1").value;
        const lane1Error = document.getElementById("lane1Error");

        if (addressRegex1.test(addressLane1)) {
            // addressLane1.classList.remove("invalid");
            lane1Error.style.display = "none";
        } else {
            // addressLane1.classList.add("invalid");
            lane1Error.textContent = "Please enter a valid address.";
            lane1Error.style.display = "block";
            myArray[4] = 0;

        }

        const addressLane2 = document.getElementById("lane2").value;
        const lane2Error = document.getElementById("lane2Error");

        if (addressRegex2.test(addressLane2) || addressLane2 == "") {
            // addressLane2.classList.remove("invalid");
            lane2Error.style.display = "none";
        } else {
            // addressLane2.classList.add("invalid");
            lane2Error.textContent = "Please enter a valid address.";
            lane2Error.style.display = "block";
            myArray[5] = 0;

        }

        const addressLane3 = document.getElementById("lane3").value;
        const lane3Error = document.getElementById("lane3Error");

        if (addressRegex2.test(addressLane3) || addressLane3 == "") {
            // addressLane3.classList.remove("invalid");
            lane3Error.style.display = "none";
        } else {
            // addressLane3.classList.add("invalid");
            lane3Error.textContent = "Please enter a valid address.";
            lane3Error.style.display = "block";
            myArray[6] = 0;

        }

        // If all validations pass, return true

        if (myArray.includes(0)) {
            return false;

        } else {
            console.log("fail");
            return true;

        }

    }


    let changeform = document.getElementById('change-form');
    updatebtn.addEventListener('click', (e) => {
        e.preventDefault();
        if (validateForm()) {
            // Get the form data
            const genderSelect = document.getElementById("gender");
            const gender = genderSelect.value;

            const image = document.getElementById("imageData").value;

            // Define the form data object
            let formData = new FormData(changeform);

            // Define the fetch options
            const options = {
                method: "POST",
                body: formData
            };

            // Send the fetch request
            fetch(`<?php echo URLROOT ?>/mgEditProfile/setPersonalDetails`, options)
                .then(response => response.text())
                .then(response => {
                    // Handle the response from the server
                    console.log(response);
                    location.reload(true);
                   
                })
                .catch(error => {
                    // Handle the error
                    console.error(error);
                    location.reload(true);

                });
        }

    })
</script>


</html>