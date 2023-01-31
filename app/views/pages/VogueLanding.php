<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Vogue Pawn</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/Img/logo.png">
  <link rel="stylesheet" href='<?php echo URLROOT ?>/css/landing.css' />
</head>

<body>
  <!-- Header Start -->
  <header class="site-header">
    <div class="wrapper site-header__wrapper">
      <div class="site-header__start">
        <div><img src='<?php echo URLROOT ?>/img/logo.png' alt="" class="logo"></div>
        <div><img src='<?php echo URLROOT ?>/img/halflogo.png' alt="" class="halflogo"></div>
        <!-- <a href="#" class="brand">Brand</a> -->
      </div>
      <div class="site-header__middle">
        <nav class="nav">
          <button class="nav__toggle" aria-expanded="false" type="button">
            menu
          </button>
          <ul class="nav__wrapper">
            <li class="nav__item"><a href="#">Home</a></li>
            <li class="nav__item"><a href="#">About</a></li>
            <li class="nav__item"><a href="#">Services</a></li>
            <li class="nav__item"><a href="#">FAQ</a></li>
            <li class="nav__item"><a href="#">Contact</a></li>
          </ul>
        </nav>
      </div>
      <div class="site-header__end">
        <a href="<?php echo URLROOT ?>/Users/login"> <button class="signin"> Sign in</button></a>
      </div>
    </div>
  </header>
  <section class="top1">
    <img class="top1Img" src="<?php echo URLROOT ?>/img/Picture1.png">
    <div class="top1Content">
   
        <h2 class="sectiontopic">INSTANT CASH FOR <br> YOUR <b><i><span class="gold">GOLD!</span></i></b> </h2>
        <h3 class="registration">New Here ?</h3>
        <h3 class="reg-txt">Sign up and discover great amount of new opportunities!</h3>
        <a href="<?php echo URLROOT ?>/Users/signup"> <button class="signup"> Sign Up >></button></a>

    </div>

<div class="info">
  <div class="sec">
      <img src="<?php echo URLROOT ?>/img/icons8-lock-100.png" alt="" class="secure">
      <h3 class="txt">Safe & Secure!</h3>
  </div>
  <div class="sec">
  <img src="<?php echo URLROOT ?>/img/sanda-01.png" alt="" class="process">
      <h3 class="txt"> Transparent Process</h3>
  </div>
  <div class="sec">
  <img src="<?php echo URLROOT ?>/img/icons8-magnetic-card-100.png" alt="" class="payment">
      <h3 class="txt">Anytime Anywhere Payment</h3>
  </div>
  <div class="sec">
  <img src="<?php echo URLROOT ?>/img/icons8-magnetic-card-100.png" alt="" class="rate">
      <h3 class="txt">Best Gold Rates</h3>
  </div>
  <!-- <div class="process">
  <!-- <img class="logo 100" src="<?php echo URLROOT ?>/img/sanda-01.png"> -->
  <!-- </div> --> 


</div>
  </section>
  <!-- Header End -->

  
  <script src='<?php echo URLROOT ?>/js/landing.js'></script>
</body>

</html>