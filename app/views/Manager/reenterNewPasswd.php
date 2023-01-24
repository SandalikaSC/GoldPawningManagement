<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo SITENAME ?></title>
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/reenterNewPasswd.css" />
</head>

<body>
  <div style="display:flex; align-items:center; justify-content:center; height:100vh;">

    <div class="whole-new-passwd-form">
      <div class="left-side-of-new-passwd">
        <label class="label-welcome">Welcome</label>
        <label class="label-back-to"> Back to</label>
        <img class="vogue" src="<?php echo URLROOT ?>/img/Panem Finance Inc 3.png" alt="logo" />
      </div>
      <div class="right-side-of-new-passwd">
        <div class="title-part">
          <span>Enter New Password</span>
        </div>

        <form action="<?php echo URLROOT ?>/mgForgotPassword/setNewPassword" method="post">
          <div class="input-field-part">
            <label for="password"><b>New Password</b></label>
            <input type="password" placeholder="XXXXXXXX" id="new-password" name="new-password" onfocus="this.value=''" title="Must contain 8 characters including at least one number and one uppercase and lowercase letter and one symbol and 4 more characters" required />

            <label for="new-passwd"><b>Re-enter New Password</b></label>
            <input type="password" placeholder="XXXXXXXX" name="confirm-password" id="confirm-password" onfocus="this.value=''" title="Must contain 8 characters including at least one number and one uppercase and lowercase letter and one symbol and 4 more characters" required />

            <button type="submit" id="manager-new-passwd-btn">Confirm</button>
            <a href="<?php echo URLROOT ?>/mgLogin/index">Back to Login</a>
            <label style="color:red;">
              <?php
              if ($data == 'failed') {
                echo "Password is incorrect..please try again.";
              } else if ($data == "empty") {
                echo "Please enter the new Password..";
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
  let password = document.getElementById('new-password');
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
      document.getElementById("manager-new-passwd-btn").disabled = false;
    } else {
      password.classList.remove("border-green");
      password.classList.add("border-red");
      document.getElementById("manager-new-passwd-btn").disabled = true;
    }



    let confirmPassword = document.getElementById('confirm-password');
    confirmPassword.addEventListener('keyup', () => {
      if (pwd == confirmPassword.value) {
        confirmPassword.classList.remove("border-red");
        confirmPassword.classList.add("border-green");
        document.getElementById("manager-new-passwd-btn").disabled = false;
      } else {
        confirmPassword.classList.remove("border-green");
        confirmPassword.classList.add("border-red");
        document.getElementById("manager-new-passwd-btn").disabled = true;
      }
    })




  })
</script>

</html>