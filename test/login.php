<?php
session_start();
if (isset($_SESSION["user"])) {
  header("location:dashboard.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="login.css">
</head>

<body >
  <div class="whole">
    <div class="pic">
      <img src="img/manager.png" alt="">
    </div>
    <div class="form">
      <div class="title">
        <span>Welcome</span>
        <img class="logo-anim" src="img/logo.png" alt="logo">
      </div>
      <hr>

      <form action="action_page.php" method="post">

        <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="email" onfocus="this.value=''" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" onfocus="this.value=''" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{3,}"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 3 or more characters" required>

          <button type="submit">Login</button>
          <label>
            <?php
            if (isset($_GET["message"])) {
              echo $_GET['message'];
            }
            ?>
          </label>
        </div>

        <div class="bot-div">
          <a href="#">Forgot password?</a>
        </div>
      </form>
    </div>
    

  </div>

</body>

</html>