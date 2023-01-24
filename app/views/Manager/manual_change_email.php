<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URLROOT?>/css/manual_email_change.css">
    <link rel="stylesheet" href="<?php echo URLROOT?>/css/authentication-for-editprofile.css">
</head>

<body>
    <?php
    include_once "authentication-for-editprofile.php";
    ?>
        <div class="page">
            <div class="right">
                <div class="right-heading">
                    <div class="right-side">
                        <a href="url" class="backbtn"><img src="<?php echo URLROOT?>/img/backbutton.png" alt="back"></a>
                        <h1>
                            Change Email
                        </h1>
                    </div>
                    <img class="vogue" src="<?php echo URLROOT?>/img/Panem Finance Inc 3.png" alt="logo">
                </div>
                <div class="content-add-new-page">
                    <div class="all">
                        <div class="whole-form">
                        <div class="form-group">
                                <label for="email"><b>Previous Email:</b></label>
                                <input type="text" placeholder="Email" name="email" id="email" required>
                            </div>
                             <div class="form-group">
                                <label for="email"><b>New Email:</b></label>
                                <input type="text" placeholder="Email" name="email" id="email" required>
                            </div>
                             <div class="form-group">
                                <label for="email"><b>Re-enter New Email:</b></label>
                                <input type="text" placeholder="Email" name="email" id="email" required>
                            </div>
                             <div class="two-btns">
                                <a href="url" class="cancelbtn">Cancel</a>
                                <button type="submit" id="changeEmailbtn" class="changeemailbtn">Change Email</button>
                            </div>
                        </div>
                
                    </div>
                   
                </div>
            </div>
        </div>
    </body>

</html>