<?php require APPROOT . "/views/inc/header.php" ?>
<title>Vogue | Login</title>
<!-- <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/change_password.css'> -->
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/login.css'>
</head>

<body class="wrapper">


    <div class="right-heading">
        <div class="right-side">

            <h1 id="title">Change Password</h1>
        </div>
        <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
    </div>

    <form class="set-pw center">
 
        <p class="p">Current password</p>
        <input type="password" name="current-pw" id="current-pw" class="input" value="" />
        <span class="invalid-feedback" id="current-pw-err"> </span>
        <p class="p">New password</p>
        <input type="password" name="new-pw" id="new-pw" class="input" value="" />
        <span class="invalid-feedback" id="new-pw-err"> </span>
        <p class="p">Confirm password</p>
        <input type="password" name="confirm-pw" id="confirm-pw" class="input" value="" />
        <span class="invalid-feedback" id="confirm-pw-err"> </span>



        <a class="p back" href="<?php echo URLROOT ?>/Users/login">Back to login</a>
        <input type="button" name="Reset-Password" onclick="" value="Reset Password" class="button">

    </form>

    <?php require APPROOT . "/views/inc/footer.php" ?>

    