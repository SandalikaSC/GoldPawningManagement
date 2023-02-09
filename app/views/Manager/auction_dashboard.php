<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/Img/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo SITENAME ?></title>
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/cards_in_auction.css">
</head>

<body>
  <!--  -->
  <div class="page">
    <div class="left" id="panel">
      <div class="profile">
        <div class="profile-pic">
          <a href="<?php echo URLROOT ?>/mgEditProfile"><img src="<?php if (!empty($_SESSION['image'])) {
                                                                    echo $_SESSION['image'];
                                                                  } else {
                                                                    echo URLROOT . "/img/image 1.png";
                                                                  } ?>" id="profileImg" alt=""></a>
          <div style="color:brown; position:absolute; font-weight:1000;" class="change-btn hidden" id="change-btn">Edit Profile</div>

        </div>
        <div class="name">
          <p><?php echo $_SESSION['user_name'] ?></p>
        </div>
      </div>
      <div class="btn-set">
        <a href="<?php echo URLROOT ?>/mgDashboard">
          <img src="<?php echo URLROOT ?>/img/dashboard.png" alt="">
          <p>Dashboard</p>
        </a>
        <a href="<?php echo URLROOT ?>/mgLocker">
          <img src="<?php echo URLROOT ?>/img/locker-white.png" alt="">
          <p>Locker</p>
        </a>
        <a href="<?php echo URLROOT ?>/mgPawnArticles">
          <img src="<?php echo URLROOT ?>/img/pawned.png" alt="">
          <p>Pawned Articles</p>
        </a>
        <a class="auc" href="<?php echo URLROOT ?>/mgAuction">
          <img src="<?php echo URLROOT ?>/img/golden_auction.png" alt="">
          <p>Auction</p>
        </a>
        <a href="<?php echo URLROOT ?>/staff">
          <img src="<?php echo URLROOT ?>/img/staff.png" alt="">
          <p>Staff</p>
        </a>
      </div>
      <div class="lgout">
        <a href="<?php echo URLROOT ?>/Users/logout">Logout</a>
      </div>
    </div>
    <div class="right">
      <div class="right-heading">
        <div class="right-side">
          <div class="bars" id="bars">
            <img src="<?php echo URLROOT ?>/img/icons8-bars-48.png" alt="bars">
          </div>
          <div class="page-name">
            <h1>Auction</h1>
          </div>
          <div class="back">
            <a href="<?php echo URLROOT ?>/mgDashboard" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>
          </div>
        </div>
        <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
      </div>


      <div class="inside-page">
        <div class="search">
          <div class="search-bar">
            <input type="text" name="search_input" id="search_input" onkeyup="myFunction()" placeholder="Search...">
            <img src="<?php echo URLROOT ?>/img/search-icon.png" alt="search-icon">
          </div>
        </div>

      
        <div class="auction-page-row">
          
          <div class="auction-page-column">
            <div class="card">
                <img src="<?php echo URLROOT ?>/img/1.png" alt="gold-bar" />
              <div class="details">
                
                <h3>No: A103 </h3>
                <p>Type: Jewelry </p>
                <p>Karatage: 20K</p>
                <p>Weight: 40.68g</p>
              </div>
            </div>
            <div class="card-view-btn">
              <a href="<?php echo URLROOT ?>/mgAuction/viewAuctionItem">View</a>
            </div>
          </div> 

          <div class="auction-page-column">
            <div class="card">
                <img src="<?php echo URLROOT ?>/img/2.png" alt="gold-bar" />
              <div class="details">
                
                <h3>No: A111</h3>
                <p>Type: Jewelry </p>
                <p>Karatage: 22K</p>
                <p>Weight: 100.34g</p>
              </div>
            </div>
            <div class="card-view-btn">
              <a href="<?php echo URLROOT ?>/mgAuction/viewAuctionItem">View</a>
            </div>
          </div> 

          <div class="auction-page-column">
            <div class="card">
                <img src="<?php echo URLROOT ?>/img/3.png" alt="gold-bar" />
              <div class="details">
                
                <h3>No: A230</h3>
                <p>Type: Jewelry</p>
                <p>Karatage: 24K</p>
                <p>Weight: 68.23g</p>
              </div>
            </div>
            <div class="card-view-btn">
              <a href="<?php echo URLROOT ?>/mgAuction/viewAuctionItem">View</a>
            </div>
          </div> 

          <div class="auction-page-column">
            <div class="card">
                <img src="<?php echo URLROOT ?>/img/4.png" alt="gold-bar" />
              <div class="details">
                
                <h3>No: A170 </h3>
                <p>Type: Jewelry </p>
                <p>Karatage: 22K</p>
                <p>Weight: 230g</p>
              </div>
            </div>
            <div class="card-view-btn">
              <a href="<?php echo URLROOT ?>/mgAuction/viewAuctionItem">View</a>
            </div>
          </div> 

          <div class="auction-page-column">
            <div class="card">
                <img src="<?php echo URLROOT ?>/img/5.png" alt="gold-bar" />
              <div class="details">
                
                <h3>No: A053 </h3>
                <p>Type: Jewelry</p>
                <p>Karatage: 24K</p>
                <p>Weight: 68g</p>
              </div>
            </div>
            <div class="card-view-btn">
              <a href="<?php echo URLROOT ?>/mgAuction/viewAuctionItem">View</a>
            </div>
          </div> 


          <div class="auction-page-column">
            <div class="card">
                <img src="<?php echo URLROOT ?>/img/6.png" alt="gold-bar" />
              <div class="details">
                
                <h3>No: A123 </h3>
                <p>Type: Jewelry</p>
                <p>Karatage: 24K</p>
                <p>Weight: 70g</p>
              </div>
            </div>
            <div class="card-view-btn">
              <a href="<?php echo URLROOT ?>/mgAuction/viewAuctionItem">View</a>
            </div>
          </div> 
          
        </div>

      </div>
    </div>
  </div>
  <!--  -->

</body>
<script src="<?php echo URLROOT ?>/js/sidebarHide.js"></script>
<script src="<?php echo URLROOT ?>/js/profileImageHover.js"></script>


</html>