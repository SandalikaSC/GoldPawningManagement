
<div class="left" id="panel">
    <div class="profile">
        <div class="profile-pic">
            <a href="<?php echo URLROOT ?>editprofile/viewEditProfile"><img class="profileImg"
                    src="<?php echo URLROOT ?>/img/image 1.png" alt=""></a>
        </div>
        <div class="name">
            <p class="profile_name">
                <?php echo $_SESSION['user_name'] ?>
            </p>
        </div>
    </div>
    <div class="btn-set">
        <a class="dash" href="<?php echo URLROOT ?>/customerDashboard/dashboard">
            <img src="<?php echo URLROOT ?>/img/home-gold.png" alt="">
            <p>Dashboard</p>
        </a>
        <a href="<?php echo URLROOT ?>locker">
            <img src="<?php echo URLROOT ?>/img/pawn-white.png" alt="">
            <p>Pawn Articles</p>
        </a>
        <a href="<?php echo URLROOT ?>pawnArticles">
            <img src="<?php echo URLROOT ?>/img/locker-white.png" alt="">
            <p>My Locker</p>
        </a>
        <a href="<?php echo URLROOT; ?>/customerDashboard/appointment">
            <img src="<?php echo URLROOT ?>/img/calender-white.png" alt="">
            <p>Appointments</p>
        </a>

        <hr class="hr">
        <a href="<?php echo URLROOT ?>Auction">
            <img src="<?php echo URLROOT ?>/img/contact-us-white.png" alt="">
            <p>Contact Us</p>
        </a>
        <a href="<?php echo URLROOT ?>staff">
            <img src="<?php echo URLROOT ?>/img/about_white.png" alt="">
            <p>About</p>
        </a>
    </div>
    <div class="lgout">
        <a href="<?php echo URLROOT ?>logout">Logout</a>
    </div>
</div>
