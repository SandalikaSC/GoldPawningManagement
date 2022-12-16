<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/Img/logo.png">
<title>Vogue | SignUp</title>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/MainSignUp.css'>
</head>

<body>
    <div class="form-container center">
        <div class="topic">
            <img alt="logo" src="<?php echo URLROOT ?>/img/logo.png" class="logo center ">
            <h1 class="h1 center">Signup form</h1>

        </div>
        <hr class="line">
        <form action="<?php echo URLROOT; ?>/Login/signUp" method="post" class="signup-form">
            <label for="Fname" class="label">Name</label><span class="span require">*</span>
            <div class="name-div">

                <div><input id="Fname" name="Fname" type="text" class="input input-section <?php echo (!empty($data['fname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['fname']; ?>"><br>
                    <span class="<?php echo (!empty($data['fname_err'])) ? 'invalid-feedback' : 'span'; ?>">First name</span>
                    <span class="invalid-feedback"><?php echo $data['fname_err']; ?></span>
                </div>

                <div>
                    <input id="Lname" name="Lname" type="text" class="input input-section <?php echo (!empty($data['lname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lname']; ?>"><br>

                    <span class="<?php echo (!empty($data['lname_err'])) ? 'invalid-feedback' : 'span'; ?>">Last name</span>
                    <span class="invalid-feedback"><?php echo $data['lname_err']; ?></span>

                </div>
            </div>
            <br>
            <label for="nic" class="label" value="<?php echo $data['nic']; ?>">NIC</label><span class="span require">*</span><br>
            <input type="text" id="nic" name="nic" class="input <?php echo (!empty($data['nic_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nic']; ?>"><br>

            <span class="<?php echo (!empty($data['nic_err'])) ? 'invalid-feedback' : 'span'; ?>">NIC</span>
            <span class="invalid-feedback"><?php echo $data['nic_err']; ?></span>
            <br>
            <label for="dob" class="label">Date of Birth</label><span class="span require">*</span><br>
            <input type="date" id="dob" name="dob" class="input <?php echo (!empty($data['dob_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['dob']; ?>"><br>
            <span class="<?php echo (!empty($data['dob_err'])) ? 'invalid-feedback' : 'span'; ?>">date of birth</span>
            <span class="invalid-feedback"><?php echo $data['dob_err']; ?></span><br>

            <label for="gender" class="label">Gender</label><span class="span require">*</span><br>


            <div class="radio-div">
                <input type="radio" id="gender" name="gender" class="radio" value="male" <?php echo ($data['gender']=='male')?'checked':'' ?>><label
                    class="radio-label">Male</label>

               <input type="radio" id="gender" name="gender" class="radio" value="female" <?php echo ($data['gender']=='female')?'checked':'' ?>><label
                    class="radio-label">Female</label>

            </div>
            <br>
            <label for="line1" class="label">Address</label><span class="span require">*</span>

            <div><input id="line1" name="line1" type="text" class="input <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['address1']; ?>"><br>
            <span class="<?php echo (!empty($data['dob_err'])) ? 'invalid-feedback' : 'span'; ?>">Line1</span>
            <span class="invalid-feedback"><?php echo $data['address_err']; ?></span>
            </div>
            <div class="input-section"> <input type="text" id="line2" name="line2" class="input" value="<?php echo $data['address2']; ?>"><br>
                <span class="span">Line2</span>
            </div>
            <div class="input-section"> <input type="text" id="line3" name="line3" class="input" value="<?php echo $data['address3']; ?>"><br>
                <span class="span">Line3</span>
            </div>

            <br>
            <label for="mobile" class="label">Contact number</label><span class="span require">*</span>
            <div class="name-div">
                <div><input id="mobile" name="mobile" type="text" class="input input-section <?php echo (!empty($data['contact_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mobile']; ?>"><br>
                <span class="<?php echo (!empty($data['contact_err'])) ? 'invalid-feedback' : 'span'; ?>">mobile</span>
            <span class="invalid-feedback"><?php echo $data['contact_err']; ?></span>
                </div>
                <div class="input-section"> <input type="text" id="home" name="home" class="input input-section"><br>
                    <span class="span">Home</span>
                </div>
            </div>
            
            <hr class="line">
            <br>
            <label for="email" class="label">Email</label><span class="span require">*</span><br>
            <input type="email" id="email" name="email" class="input <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>"><br>
            <span class="<?php echo (!empty($data['email_err'])) ? 'invalid-feedback' : 'span'; ?>">email</span>
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            <br>
            <label for="password" class="label">Password</label><span class="span require">*</span><br>
            <input type="password" id="password" name="password" class="input <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>"><br>
            <span class="<?php echo (!empty($data['password_err'])) ? 'invalid-feedback' : 'span'; ?>">password</span>
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            <br>
            <label for="confirm-pw" class="label">Confirm Password</label><span class="span require">*</span><br>
            <input type="password" id="confirm-pw" name="confirm-pw" class="input <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>"><br>
            <span class="<?php echo (!empty($data['confirm_password_err'])) ? 'invalid-feedback' : 'span'; ?>">confirm password</span>
            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
            
            <br>
            <input type="submit" name="signup" value="SignUp" class="btn"><br>
            <div><label class="label">Alredy Have an Account? <a href="<?php echo URLROOT?>/Login/index">Login</a></label>
            </div>
        </form>
    </div>
    
</body>

</html>