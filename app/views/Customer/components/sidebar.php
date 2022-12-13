<div class="all">
    <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
    <div class="toggler" id="toggler">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
    <nav class="nav" id="nav">
         
            <div class="profile">
                <img class="profileImg center" src="<?php echo URLROOT ?>/img/pp.png" alt="pp">
                <h4 class="user-name">
                    <?php echo $_SESSION['user_name'] ?>
                </h4>
            </div>
            <div class="container">
            <br>
            <br>
                <div class="activate page-btn">
                    <img class="page-btn-img" src="<?php echo URLROOT ?>/img/home-gold.png">
                    <h4 class="page-btn-text gold-text">Dashboard</h4>
                </div>
                <div class="page-btn inactive-btn">
                    <img class="page-btn-img" src="<?php echo URLROOT ?>/img/home.png">
                    <h4 class="page-btn-text">Pawn Articles</h4>
                </div>
                <div class="page-btn inactive-btn">
                    <img class="page-btn-img" src="<?php echo URLROOT ?>/img/home.png">
                    <h4 class="page-btn-text">My Locker</h4>
                </div>
                <div class="page-btn inactive-btn" id="appointment" >
                    <img class="page-btn-img" src="<?php echo URLROOT ?>/img/home.png">
                    <h4 class="page-btn-text">Appointments</h4>
                </div>
                <br>
                <hr>
                <br>
                <div class="page-btn inactive-btn">
                    <img class="page-btn-img" src="<?php echo URLROOT ?>/img/home.png">
                    <h4 class="page-btn-text">Contact Us</h4>
                </div>
                <div class="page-btn inactive-btn">
                    <img class="page-btn-img" src="<?php echo URLROOT ?>/img/home.png">
                    <h4 class="page-btn-text">About</h4>
                </div>
            </div>
            <div class="logout-btn inactive-btn center ">
                <h4 class="page-btn-text gold-text"><a class="a" href="<?php echo URLROOT; ?>/Login/logout"> Logout</a></h4>
            </div>
         
    </nav>

</div>
<script src='<?php echo URLROOT ?>/js/header.js'></script>