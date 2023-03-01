<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_register_customer.css">
    <title>Vogue Pawn | Register Customer</title>
</head>
<body> 
 
    <div class="wrapper">
        <div class="header">
            <div class="title">
                <a href="<?php echo URLROOT; ?>/pawningOfficerDashboard/dashboard">
                    <img src="<?php echo URLROOT . '/img/back-arrow.png'; ?>">
                </a>
                
                <h1>Register Customer</h1>
            </div>
            
            <div class="logo">
                <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
            </div>
        </div>

        <div class="msg-flash"><?php echo flash('register'); ?></div>

        <div class="form-wrapper">
            <form action="<?php echo URLROOT; ?>/customers/register_customer" method="post">
                <div class="form-wrap">
                    <label>Full Name<sup>*</sup></label>
                    <div class="fullname">
                        <input type="text" name="first_name" class="<?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['first_name']; ?>" placeholder="First Name">
                        <input type="text" name="last_name" value="<?php echo $data['last_name']; ?>" placeholder="Last Name">
                    </div>
                    <span class="invalid-feedback"><?php echo $data['first_name_err']; ?></span>                    
                </div>
                <div class="form-wrap">
                    <label>Address<sup>*</sup></label>
                    <div class="fullname">
                        <input type="text" name="line1" class="<?php echo (!empty($data['line1_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['line1']; ?>" placeholder="Line 1">
                        <input type="text" name="line2" value="<?php echo $data['line2']; ?>" placeholder="Line 2">
                        <input type="text" name="line3" value="<?php echo $data['line3']; ?>" placeholder="Line 3">
                    </div>  
                    <span class="invalid-feedback"><?php echo $data['line1_err']; ?></span>                   
                </div>
                <div class="form-wrap">
                    <label>NIC<sup>*</sup></label>
                    <div class="fullname">
                        <input type="text" name="nic" class="<?php echo (!empty($data['nic_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['nic']; ?>" placeholder="NIC">
                    </div> 
                    <span class="invalid-feedback"><?php echo $data['nic_err']; ?></span>                   
                </div>
                <!-- <div class="form-wrap">
                    <label>Date of Birth</label>
                    <div class="fullname">
                        <input type="date" name="dob" class="<?php echo (!empty($data['dob_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['dob']; ?>">
                    </div>      
                    <span class="invalid-feedback"><?php echo $data['dob_err']; ?></span>              
                </div> -->
                <div class="form-wrap">
                    <label>Gender</label>
                    <div class="gender">                        
                        <label>
                            <input type="radio" name="gender" value="Male" checked> Male
                        </label>
                        <label>
                            <input type="radio" name="gender" value="Female"> Female
                        </label>
                    </div>                    
                </div>
                <div class="form-wrap">
                    <label>Phone Number<sup>*</sup></label>
                    <div class="fullname">
                        <input type="text" name="phone" class="<?php echo (!empty($data['phone_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['phone']; ?>" placeholder="Phone Number">
                    </div> 
                    <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>                   
                </div>
                <div class="form-wrap">
                    <label>Email<sup>*</sup></label>
                    <div class="fullname">
                        <input type="text" name="email" class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['email']; ?>" placeholder="Email">
                    </div> 
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>                   
                </div>
                <div class="register">
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
    <script>

    </script>

</body>
</html>