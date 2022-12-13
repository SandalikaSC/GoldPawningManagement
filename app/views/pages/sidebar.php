<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/header.css'>
    
</head>

<body>
<div class="all">
        <img class="vogue" src="assets/logo.png" alt="logo">
        <div class="toggler" id="toggler">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <nav class="nav" id="nav">
            <div class="old">
                <div class="profile">
                    <img class="profileImg center" src="<?php echo URLROOT?>/img/pp.png" alt="pp">
                    <h4 class="user-name"><?php echo $_SESSION['user_name']?></h4>
                </div>

                <?php include APPROOT.'/views/Customer/components/dashboardContainer.html' ?>

                <div class="logout-btn inactive-btn center ">
                    <h4 class="page-btn-text gold-text"><a href="<?php echo URLROOT; ?>/Login/logout"> Logout</a></h4>
                </div>
            </div>
        </nav>
        
    </div>
    <script src='<?php echo URLROOT ?>/js/header.js'></script>
</body>

</html>