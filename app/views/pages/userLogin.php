<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/style.css'>
</head>

<body>
  <div class="log-container center">
 
    <div class="login">
   
      <form class="form center" action="" method="post">
        <img alt="logo" src="<?php echo URLROOT ?>/img/logo.png" class="logo center ">
        <h2 class="h2">Welcome back,</h2>
        <br> <?php flash('register_success'); ?><br>
        <p class="p">EMAIL</p>
        <input type="email" name="email" class=" <?php echo (!empty($data['email_err'])) ? 'is-invalid' : 'input'; ?>"
          value="<?php echo $data['email']; ?>" />
        <span class="invalid-feedback">
          <?php echo $data['email_err']; ?>
        </span>
        <p class="p">PASSWORD</p>
        <input class=" <?php echo (!empty($data['password_err'])) ? 'is-invalid' : 'input'; ?>"
          value="<?php echo $data['password']; ?>" type="password" name="password" />
        <span class="invalid-feedback">
          <?php echo $data['password_err']; ?>
        </span>
        <p class="p">Forgot password?</p>
        <!-- <input type="hidden" name="login" value="login" /> -->
        <input type="submit" name="login" value="Login" class="button">
      </form>
    </div>
    <img src="<?php echo URLROOT ?>/img/loginImg.svg" class="login-Img">
    <div class="reg-section">
      <h2 class="h2">New here?</h2>
      <p class="p">Sign up and discover great amount of new opportunities!</p>

      <button type="button" class="button signup"><a href="<?php echo URLROOT ?>/Login/signUp">SignUp</a></button>


    </div>
    
  </div>

</body>

</html>