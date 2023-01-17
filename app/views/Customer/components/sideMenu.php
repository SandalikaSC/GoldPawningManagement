
<div class="left" id="panel">
    <div class="profile">
        <div class="profile-pic">
            <a href="<?php echo URLROOT ?>editprofile/viewEditProfile"><img class="profileImg"
                    src="<?php if(!empty($_SESSION['image'])){echo $_SESSION['image'];}else{echo URLROOT . "/public/img/image 1.png";} ?>" alt=""></a>
        </div>
        <div class="name">
            <p class="profile_name">
                <?php echo $_SESSION['user_name'] ?>
            </p>
        </div>
    </div>
    <div class="btn-set">
        <a id="dashboard" class="" href="<?php echo URLROOT ?>/customerDashboard/dashboard">
            <img src="<?php echo URLROOT ?>/img/home.png" alt="">
            <p>Dashboard</p>
        </a>
        <a id="pawnArticles" class="dash-btn" href="<?php echo URLROOT ?>/customerDashboard/pawnArticles">
            <img src="<?php echo URLROOT ?>/img/pawn-white.png" alt="">
            <p>Pawn Articles</p>
        </a>
        <a id="locker" class="dash-btn" href="<?php echo URLROOT ?>/customerDashboard/locker">
            <img src="<?php echo URLROOT ?>/img/locker-white.png" alt="">
            <p>My Locker</p>
        </a>
        <a id="appointment"  class="dash-btn" href="<?php echo URLROOT; ?>/customerDashboard/appointment">
            <img id="appointment-Img" src="<?php echo URLROOT ?>/img/calender-white.png" alt="">
            <p >Appointments</p>
        </a>

        <hr class="hr">
        <a  id="contactUs" class="dash-btn" href="<?php echo URLROOT ?>/customerDashboard/ContactUs">
            <img src="<?php echo URLROOT ?>/img/contact-us-white.png" alt="">
            <p>Contact Us</p>
        </a>
        <a id="about" class="dash-btn" href="<?php echo URLROOT ?>/customerDashboard/About">
            <img src="<?php echo URLROOT ?>/img/about_white.png" alt="">
            <p>About</p>
        </a>
    </div>
    <div class="lgout">
        <a href="<?php echo URLROOT ?>/Users/logout">Logout</a>
    </div>
</div>
