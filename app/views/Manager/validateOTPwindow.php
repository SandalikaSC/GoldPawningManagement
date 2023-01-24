<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo SITENAME ?></title>
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/validateOTPwindow.css" />
</head>

<body>
  <div style="display:flex; align-items:center; justify-content:center; height:100vh;">

    <div class="whole-otp-form">
      <div class="left-side-of-otp">
        <label class="label-welcome">Welcome</label>
        <label class="label-back-to"> Back to</label>
        <img class="vogue" src="<?php echo URLROOT ?>/img/Panem Finance Inc 3.png" alt="logo" />
      </div>


      <div class="right-side-of-otp">
        <div class="title-part">
          <span>Enter OTP Code</span>
        </div>

        <form action="<?php echo URLROOT ?>/mgForgotPassword/validateOTP" method="post">
          <div class="input-field-part">
            <label for="otp">
              <h3><b>OTP Code</b></h3>
            </label>
            <input type="text" placeholder="XXXXXX" name="otp" onfocus="this.value=''" minlength="6" maxlength="6" required />

            <button type="submit" id="manager-otp-btn">submit</button>
            <a style="display:flex; align-items:center; justify-content:center;" href="<?php echo URLROOT ?>/mgForgotPassword/sendOTPwindow">Back</a>
            <label style="color:red">
              <?php
              if ($data == 'failed') {
                echo "OTP is incorrect";
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
  let otp = document.getElementById('manager-otp-btn');
  otp.addEventListener("click", () => {
    let value = otp.value;
    if (otp.length == 6) {
      password.classList.remove("border-red");
      password.classList.add("border-green");
      document.getElementById("manager-otp-btn").disabled = false;
    } else {
      password.classList.remove("border-green");
      password.classList.add("border-red");
      document.getElementById("manager-otp-btn").disabled = true;
    }
  })
</script>

</html>