<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URLROOT?>/css/manual_password_change.css">
</head>
<body>
    <body>
        <div class="page">
            <div class="right">
                <div class="right-heading">
                    <div class="right-side">
                        <a href="url" class="backbtn"><img src="<?php echo URLROOT?>/img/backbutton.png" alt="back"></a>
                        <h1>
                            Change Password
                        </h1>
                    </div>
                    <img class="vogue" src="<?php echo URLROOT?>/img/Panem Finance Inc 3.png" alt="logo">
                </div>
                <div class="content-add-new-page">
                    <div class="all">
                        <div class="whole-form">
                             <div class="form-group">
                                <label for="psw"><b>Current Password:</b></label>
                                <input type="password" placeholder="Enter Password" name="curr" id="curr"   required />
                             </div>
                             <div class="form-group">
                                <label for="psw"><b>New Password:</b></label>
                                <input type="password" placeholder="Enter Password" name="new" id="new"  title="Must contain 8 characters including at least one number and one uppercase and lowercase letter and one symbol and 4 more characters" required />
                             </div>
                             <div class="form-group">
                                <label for="psw"><b>Confirm Password:</b></label>
                                <input type="password" placeholder="Enter Password" name="confirm" id="confirm"   required />
                             </div>
                             <div class="two-btns">
                                <a href="url" class="cancelbtn">Cancel</a>
                                <button type="submit" id="changepwdbtn" class="changepwdbtn">Change Password</button>
                            </div>
                        </div>
                
                    </div>
                   
                </div>
            </div>
        </div>
    </body>
</body>
</html>