<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/mgmain_dashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/mggold-rates.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</head>

<body>
    <div class="page">
        <div class="left" id="panel">
            <div class="profile">
                <div class="profile-pic">
                    <a href="<?php echo URLROOT ?>mgEditProfile"><img src="<?php if (!empty($_SESSION['image'])) {
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
                <a class="dash" href="<?php echo URLROOT ?>/mgDashboard">
                    <img src="<?php echo URLROOT ?>/img/golden_dashboard.png" alt="">
                    <p>Dashboard</p>
                </a>
                <a href="<?php echo URLROOT ?>/mgLocker">
                    <img src="<?php echo URLROOT ?>/img/locker.png" alt="">
                    <p>Locker</p>
                </a>
                <a href="<?php echo URLROOT ?>/mgPawnArticles">
                    <img src="<?php echo URLROOT ?>/img/pawned.png" alt="">
                    <p>Pawned Articles</p>
                </a>
                <a href="<?php echo URLROOT ?>/mgAuction">
                    <img src="<?php echo URLROOT ?>/img/auction.png" alt="">
                    <p>Auction</p>
                </a>
                <a href="<?php echo URLROOT ?>/staff">
                    <img src="<?php echo URLROOT ?>/img/staff.png" alt="">
                    <p>Staff</p>
                </a>
            </div>
            <div class="lgout">
                <a href="<?php echo URLROOT ?>/mgLogout">Logout</a>
            </div>
        </div>
        <div class="right">
            <div class="right-heading">
                <div class="right-side">
                    <div class="bars" id="bars">
                        <img src="<?php echo URLROOT ?>/img/icons8-bars-48.png" alt="bars">
                    </div>
                    <h1>Dashboard</h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/Panem Finance Inc 3.png" alt="logo">
            </div>
            <div class="inside-page">
                <div class="current-gold-rates">
                    <label class="gold-rate-topic" style="color: black; border-bottom: 2px solid #BB8A04; font-size: large; font-weight: 600;">Gold Rates</label>
                    <div class="gold-rates">
                        <div class="col1">
                            <div class="gold-rate-card">
                                <label for=""><?php echo $data[0]->Karatage?>K</label>
                                <p><?php echo $data[0]->Price ?></p>
                            </div>
                            <div class="gold-rate-card">
                                <label for=""><?php echo $data[1]->Karatage?>K</label>
                                <p><?php echo $data[1]->Price ?></p>
                            </div>
                        </div>
                        <div class="col2">
                            <div class="gold-rate-card">
                                <label for=""><?php echo $data[2]->Karatage?>K</label>
                                <p><?php echo $data[2]->Price ?></p>
                            </div>
                            <div class="gold-rate-card">
                                <label for=""><?php echo $data[3]->Karatage?>K</label>
                                <p><?php echo $data[3]->Price ?></p>
                            </div>
                        </div>
                        <div class="col3">
                            <div class="loan-interest">
                                <label for="">24%</label>
                                <p>Interest</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div >
                <label class="gold-rate-topic" style="color: black; border-bottom: 2px solid #BB8A04; font-size: large;font-weight: 600;">Income and Expenditure</label>
                    <div class="graph">
                        <canvas id="myChart" style="height: 300px; width:800px; margin-top:20px; float:left;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo URLROOT ?>/js/sidebarHide.js"></script>
<script src="<?php echo URLROOT ?>/js/profileImageHover.js"></script>
<script>
    var xValues = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug"," Sep", "Oct", "Nov", "Dec"];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: [10,20,30,40,50,60,70,80,90,100,110,120],
      borderColor: "red",
      fill: false
    }, { 
      data: [50,0,100,20,10,150,100,110,120,0,30,40],
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
    
});
</script>

</html>