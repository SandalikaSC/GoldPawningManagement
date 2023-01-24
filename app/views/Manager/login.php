<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo SITENAME ?></title>
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/login.css">
</head>

<body>
  <?php
  if ($data == 'passwordChanged') {
    include_once 'passwordChanged.php';
  }

  ?>

  <div style="display:flex; align-items:center; justify-content:center; height:100vh;">

    <div class="whole-login-form">
      <div class="left-side-of-login">
        <label class="label-welcome">Welcome</label>
        <label class="label-back-to"> Back to</label>
        <img class="vogue" src="<?php echo URLROOT ?>/img/Panem Finance Inc 3.png" alt="logo">
      </div>
      <div class="right-side-of-login">
        <div class="title-part">
          <span>L O G I N</span>
        </div>

        <form action="<?php echo URLROOT ?>/mgLogin/verify" method="post">
          <div class="input-field-part">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" onfocus="this.value=''" required />

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" id="psw" onfocus="this.value=''" title="Must contain 8 characters including at least one number and one uppercase and lowercase letter and one symbol and 4 more characters" required />

            <button type="submit" id="manager-login-btn">Login</button>
            <label style="color: red;">
              <?php
              if ($data == 'incorrectpassword') {
                echo "Password is incorrect.Please Try again";
              } else if ($data == 'invalidpassword') {
                echo "Password is invalid.Please Try again";
              } else if ($data == 'invalidUser') {
                echo "User is Invalid.Please try again";
              }

              ?>
            </label>
          </div>

          <div class="bot-div">
            <a href="<?php echo URLROOT ?>/mgForgotPassword/sendOTPwindow">Forgot password?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<script>
  let email = document.getElementById('email');
  email.addEventListener("keyup", () => {
    // let pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let pattern=/^[a-z0-9](\.?[a-z0-9]){5,}@g(oogle)?mail\.com$/;
    if (pattern.test(email.value)) {
      email.classList.remove("border-red");
      email.classList.add("border-green");
      document.getElementById("manager-login-btn").disabled = false;
    } else {
      email.classList.remove("border-green");
      email.classList.add("border-red");
      document.getElementById("manager-login-btn").disabled = true;
    }
  })


  let password = document.getElementById('psw');
  let pwd;
  password.addEventListener("keyup", () => {
    let number = false,
      symbol = false,
      lowercase = false,
      uppercase = false;
    pwd = password.value;
    for (let ch in password.value) {
      console.log(pwd[ch]);
      if (pwd[ch] >= "A" && pwd[ch] <= "Z") {
        uppercase = true;
      } else if (pwd[ch] >= "a" && pwd[ch] <= "z") {
        lowercase = true;
      } else if (pwd[ch] >= 0 && pwd[ch] <= 9) {
        number = true;
      } else if (/[~!@#$%^&*()_+-?><= |\/:;]/.test(pwd[ch])) {
        symbol = true;
      }

    }

    if (number == true && symbol == true && lowercase == true && uppercase == true && pwd.length >= 8) {
      password.classList.remove("border-red");
      password.classList.add("border-green");
      document.getElementById("manager-login-btn").disabled = false;
    } else {
      password.classList.remove("border-green");
      password.classList.add("border-red");
      document.getElementById("manager-login-btn").disabled = true;
    }




  })
</script>

</html>