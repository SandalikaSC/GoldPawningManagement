<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo SITENAME ?></title>
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/sendOTPwindowcss.css" />
</head>

<body>
  <div style="display:flex; align-items:center; justify-content:center; height:100vh;">

    <div class="whole-send-otp-form">
      <div class="left-side-of-send-otp">
        <label class="label-welcome">Welcome</label>
        <label class="label-back-to"> Back to</label>
        <img class="vogue" src="<?php echo URLROOT ?>/img/Panem Finance Inc 3.png" alt="logo" />
      </div>
      <div class="right-side-of-send-otp">
        <div class="title-part">
          <span>FORGOT PASSWORD?</span>
          <p>Please enter your Email</p>
          <p>An OTP code will be received.</p>
        </div>

        <form action="<?php echo URLROOT ?>/mgForgotPassword/sendOTP" method="post">
          <div class="input-field-part">
            <label for="uname">
              <h3><b>Email</b></h3>
            </label>
            <input type="text" placeholder="Enter Email" name="email" id="email" onfocus="this.value=''" required />

            <button type="submit" id="manager-send-otp-btn">send-otp</button>
            <a style="display:flex; align-items:center; justify-content:center;" href="<?php echo URLROOT ?>/mgLogin/index">Return to Login</a>
            <label style="color:red">
              <?php
              if ($data == 'failed') {
                echo "This is Email is not registered";
              }else if($data=='conn_error'){
                echo "Connection Error.Check Connection";
              }

              ?>
            </label>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<script>
  let email = document.getElementById('email');
  email.addEventListener("keyup", () => {
    let pattern=/^[a-z0-9](\.?[a-z0-9]){5,}@g(oogle)?mail\.com$/;
    if (pattern.test(email.value)) {
      email.classList.remove("border-red");
      email.classList.add("border-green");
      document.getElementById("manager-send-otp-btn").disabled = false;
    } else {
      email.classList.remove("border-green");
      email.classList.add("border-red");
      document.getElementById("manager-send-otp-btn").disabled = true;
    }
  })
</script>

</html>