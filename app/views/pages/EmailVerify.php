<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/Img/logo.png">
  <title>Vogue | Email Verify</title>
  <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/EmailVerify.css'>
</head>

<body>
  <div class="wrapper">
    <img src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="verify Image" class="verifyImg">

    <h4 class="verifyMSG">Your registration is  <?php echo(!empty($data['status'])) ?$data['status'] :"succesfull."; ?></h4>
    <p class="logintxt"><?php echo(!empty($data['status'])) ?"Something went wrong":"Login to your account." ; ?></p>
    <a href="<?php echo URLROOT ?>/Users" >
      <input type="submit" name="login" value="Login" class="<?php echo(!empty($data['status'])) ? "hide" : "button"; ?>">
    </a>
  </div>

</body>

</html>