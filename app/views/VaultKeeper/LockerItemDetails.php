<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/LockerDetails.css'>
<!-- <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/article_pawn.css'> -->
<title>Vogue | Locker</title>
</head>

<body class="wrapper">

    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/VKDashboard/Reservations" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">Locker </h1>
            </div>
            <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
        </div>

    </div>
    <div class="content">
    <div class="locker-details">
            <div class="locker"><label for="">01.</label></div>
            <div class="article">
                <img src="<?php echo URLROOT ?>/img/nati-melnychuk-Ki7TPcA9204-unsplash.jpg" alt="" class="article-pic">
                
            </div>
            <div class="article">
                <img src="<?php echo URLROOT ?>/img/nati-melnychuk-oO0JAOJhquk-unsplash.jpg" alt="" class="article-pic">
                
            </div>
        </div>
        <div class="res-details">
            <div class="card">

                <h2>Reservation</h2>
                <div class="details">
                    <label for="">Reservation No.</label>
                    <label for="">125</label>
                    <label for="">Reservation Date</label>
                    <label for="">2023 Oct 15</label>
                    <label for="">End Date</label>
                    <label for="">2024 april 15</label>
                    <label for="">Time remaining</label>
                    <label for="">4 Months</label>
                    <label for="">Key Delivery</label>
                    <div><label for="" class="tag black">Deliverd</label></div>
                </div>


            </div>
            <div class="card">
                <h2>Customer Details</h2>
                <div class="details">
                    <label for="">Customer Id</label>
                    <label for="">CU001</label>
                    <label for="">Customer Name</label>
                    <label for="">Sandalika Chamari</label>
                    <label for="">Phone Number</label>
                    <label for="">0714456490</label> 
                </div>
            </div>
            <div class="card">
                <h2>Payment Details</h2>
                <div class="details">
                    <label for="">Last Payment</label>
                    <label for="">2024 nov 16</label>
                    <label for="">Next Payment</label>
                    <label for="">2024 dec 15</label>
                    <label for="">Pay Amount</label>
                    <label for="">Rs. 2000.00</label>
                </div>
            </div>
        </div>
        
        <div class="nxt">
            <a href="<?php echo URLROOT ?>/Reservations/releaseLocker"><button>Release Locker</button></a>
            <a href="<?php echo URLROOT ?>/Reservations/makePayment"><button>Make Payment</button></a>
            

        </div>
    </div>
    <?php require APPROOT . "/views/inc/footer.php" ?>