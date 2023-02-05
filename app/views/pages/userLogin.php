<?php require APPROOT."/views/inc/header.php"?>
<title>Vogue | Login</title>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/login.css'>
</head>

<body>
<!-- <?php require APPROOT."/views/inc/notification.php"?> -->
    <div class="log-container center">
 
        <div class="login">
         
            <form class="form center" action="<?php echo URLROOT; ?>/Users/login" method="post">
                <img alt="logo" src="<?php echo URLROOT ?>/img/logo.png" class="logo center ">
                <h2 class="h2">Welcome back,</h2>
                <br> <?php flash('register'); ?>

                <br>
               
                <p class="p">EMAIL</p>
                <input type="email" name="email"
                    class=" <?php echo (!empty($data['email_err'])) ? 'is-invalid' : 'input'; ?>"
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
                <p class="p forget">Forgot password?</p>
                 
                <input type="submit" name="login" value="Login" class="button">
            </form>
            <form  class="forget-pw center">


            <img alt="logo" src="<?php echo URLROOT ?>/img/logo.png" class="logo center ">
            <h2 class="h2">Forget Password?</h2>
                <br> <?php flash('email'); ?>

                <br>
               
                <p class="p">EMAIL</p>
                <input type="email" name="otpemail" id="otpemail"
                    class="input"
                    value="" />
                <span class="invalid-feedback">
                    
                </span>
                <p class="p back">Back to login</p>

                <input type="button" name="sendEmail" onclick="checkEmail()" value="Send Email" class="button"> 

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
function checkEmail(){

    var email=document.getElementById("otpemail").value;
    
  $.ajax({
    type:"POST",
    url:"<?= URLROOT?>/Users/checkEmail",
    data:{
        email: email
    },
    dataType:"JSON",
    success:function(resp){
        // document.getElementsByClassName('new').innerHTML = resp.name;
        alert(resp.name);
    },
    error:function(resp){
      console.log(resp.name);
    }
  });
}

</script> 