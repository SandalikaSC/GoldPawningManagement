<?php require APPROOT . "/views/inc/header.php" ?>
<title>Vogue | Login</title>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/login.css'>
</head>

<body>
    <!-- <?php require APPROOT . "/views/inc/notification.php" ?> -->
    <?php notification("login"); ?>
    <?php notification("otp"); ?>
    <div class="log-container center">

        <div class="login">

            <form class="form center" action="<?php echo URLROOT; ?>/Users/login" method="post">
                <img alt="logo" src="<?php echo URLROOT ?>/img/logo.png" class="logo center ">
                <h2 class="h2">Welcome back,</h2>
                <br> <?php flash('register'); ?>

                <br>

                <p class="p">EMAIL</p>
                <input type="email" name="email" class=" <?php echo (!empty($data['email_err'])) ? 'is-invalid' : 'input'; ?>" value="<?php echo $data['email']; ?>" />
                <span class="invalid-feedback">
                    <?php echo $data['email_err']; ?>
                </span>
                <p class="p">PASSWORD</p>
                <input class=" <?php echo (!empty($data['password_err'])) ? 'is-invalid' : 'input'; ?>" value="<?php echo $data['password']; ?>" type="password" name="password" />
                <span class="invalid-feedback">
                    <?php echo $data['password_err']; ?>
                </span>
                <p class="p forget">Forgot password?</p>

                <input type="submit" name="login" value="Login" class="button">
            </form>
            <form class="forget-pw center">


                <img alt="logo" src="<?php echo URLROOT ?>/img/logo.png" class="logo center ">
                <h2 class="h2">Forget Password?</h2>
                

                <br>

                <p class="p">EMAIL</p>
                <input type="email" name="otpemail" id="otpemail" class="input">
                <span class="invalid-feedback" id="otp-email-err">
                </span>
                <p class="p back">Back to login</p>

                <input type="button" name="sendEmail" onclick="checkEmail()" value="Send Email" class="button">

            </form>
            <form class="otp center" method="POST" id="otp-section"  >


                <img alt="logo" src="<?php echo URLROOT ?>/img/logo.png" class="logo center ">
                <h2 class="h2">Welcome,</h2>
                <h2 class="h3 otp-msg">We have sent the OTP to your email.</h2>
                 

                <p class="p">OTP</p>
                <input type="text" name="otp" id="otp" class="input" >
                <span class="invalid-feedback" id="otp-err">

                </span>
                <a class="p back" href="<?php echo URLROOT ?>/Users/login">Back to login</a>
                <input type="submit" name="ConfirmOTP" value="Confirm OTP" class="button" onclick="verifyOTP()"></input>

            </form>

        </div>
        <img src="<?php echo URLROOT ?>/img/loginImg.svg" class="login-Img">
        <div class="reg-section">
            <h2 class="new h2">New here?</h2>
            <p class="p">Sign up and discover great amount of new opportunities!</p>

            <button type="button" class="button signup"><a href="<?php echo URLROOT ?>/Users/signUp">SignUp</a></button>


        </div>

    </div>
    <script src='<?php echo URLROOT ?>/js/main.js'></script>

    <script src="<?php echo URLROOT ?>/js/jquery.min.js"></script>
    <script>
        var forget = document.getElementsByClassName('forget')[0];
        var forgetPw = document.getElementsByClassName('forget-pw')[0];
        var form = document.getElementsByClassName('form')[0];
        var otp_section = document.getElementsByClassName('otp')[0];
        var set_pw = document.getElementsByClassName('set-pw')[0];


        forget.addEventListener('click', function() {
            forgetPw.style.display = 'flex';
            form.style.display = 'none';
        });


        var back = document.getElementsByClassName('back');

        back.addEventListener('click', function() {
            form.style.display = 'flex';
            forgetPw.style.display = 'none';
            otp_section.style.display = 'none';
            <?php flash('register', "", 'invalid');
            ?>
        });

        function checkEmail() { 
            var email = document.getElementById('otpemail').value;
 
            if (email == '') {
                document.getElementById("otp-email-err").innerHTML = "Please fill this field";
            } else {
               

                $.ajax({
                    type: "POST",
                    url: "<?= URLROOT ?>/Users/checkEmail",
                    data: {
                        email: email
                    },
                    dataType: "JSON",
                    success: function(resp) {
                        if (resp.success == 1) {
                            form.style.display = 'none';
                            forgetPw.style.display = 'none';
                            otp_section.style.display = 'flex';

                        } else if (resp.success == 0) {
                            location.reload();

                        }

                    },
                    error: function(resp) {
                        //   console.log(resp.name);
                    }
                });
            }

        }

        function verifyOTP() { 
            var otp = document.getElementById('otp').value;
            event.preventDefault()
            if (otp == '') {
                console.log("empty");
                document.getElementById("otp-err").innerHTML = "Please fill this field";
            } else { 
                $.ajax({
                    type: "POST",
                    url: "<?= URLROOT ?>/Users/verifyOTP",
                    data: {
                        otp: otp
                    },
                    dataType: "JSON",
                    success: function(resp) {
                        if (resp.success == 0) { 
                            window.location='<?= URLROOT ?>/Users/login';
                            
                        } 
                        if (resp.success == 1) {
                          window.location='<?= URLROOT ?>/Users/changepassword';

                        }   

                    }
                });
            }

        }
    </script>