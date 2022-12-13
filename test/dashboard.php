<?php 
    session_start();
    if(!isset($_SESSION["user"])){
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style_dashboard.css">
</head>
<body>
    <div class="page">
        <div class="left" id="panel">
            <div class="profile">
               <div class="profile-pic">
                  <a href="url"><img src="img/image 1.png" alt=""></a>
               </div>
               <div class="name">
                   <p>Thimeth Imesha</p>
               </div>
            </div>
            <div class="btn-set">
                <a class= "dash" href="url">
                   <img src="img/golden_dashboard.png" alt="">
                   <p>Dashboard</p>
                </a>
                <a href="url">
                   <img src="img/locker.png" alt="">
                   <p>Locker</p>
                </a>
                <a href="url">
                   <img src="img/pawned.png" alt="">
                   <p>Pawned Articles</p>
                </a>
                <a href="url">
                   <img src="img/auction.png" alt="">
                   <p>Auction</p>
                </a>
                <a href="url">
                   <img src="img/staff.png" alt="">
                   <p>Staff</p>
                </a>
            </div>
            <div class="lgout">
                <a href="logout.php">Logout</a>
            </div>
        </div>
        <div class="right">
            <div class="right-heading">
                <div class="right-side">
                    <div class="bars" id="bars">
                    <img src="img/icons8-bars-48.png" alt="bars">
                    </div>
                    <h1>
                        Dashboard
                    </h1>
                </div>
                <img class="vogue" src="img/Panem Finance Inc 3.png" alt="logo">
            </div>
            <div class="inside-page">
                <div >
                    <?php include "chartjs.php" ?>
                </div>
                <div class="rates">
                    <?php include "card.php" ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    let bars = document.getElementById("bars");
    let panel = document.getElementById("panel");

    bars.addEventListener("click",()=>{
        panel.classList.toggle("hide");
    })    
</script>
</html>