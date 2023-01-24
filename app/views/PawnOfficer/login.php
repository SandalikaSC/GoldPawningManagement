<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/Img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_login.css">
    <title>Vogue Pawn | Login</title>
</head>
<body>
    <div class="back-style">
            
    </div>
    <div class="content">
        <div class="div-form">
            <div class="div-inputs">
                <div class="title">
                    <img src="<?php echo URLROOT . '/public/img/logo_1.png'?>">
                    <h1>WELCOME</h1>
                    <h2>Login</h2>
                    <p>Please fill in your credentials to Login</p>
                </div>
                
                <form action="<?php echo URLROOT; ?>/employees/login" method="post">
                    <div class="form-group">
                        <label for="email">Email: <sup>*</sup></label><br>
                        <input type="text" name="email" class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['email']; ?>" placeholder="Email"> <br>
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: <sup>*</sup></label><br>
                        <input type="password" name="password" class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['password']; ?>" placeholder="Password"> <br>
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Login" class="btn btn-success btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="pic">
            <img src="<?php echo URLROOT . '/public/img/login.svg'?>">
        </div>
    </div> 

</body>
</html>