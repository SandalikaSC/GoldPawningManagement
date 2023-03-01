<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/nav-bar.css'>

<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/Pawn-pay.css'>
<title>Vogue | Payment</title>
</head>

<body class="wrapper">

    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/CustomerPawn" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">Payment</h1>
            </div>
            <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
        </div>

    </div>
    <div class="page">

        <div class="payment-invoice">
            <div class="payment-info">
                <h2 class="h2-txt amount">Rs. 5600.00</h2>
                <div class="info-section">
                    <label for="">Interest amount</label>
                    <label for="">Rs. 1600.00</label>
                </div>
                <div class="info-section">
                    <label for="">Loan Amount</label>
                    <label for="">Rs. 4000.00</label>
                </div>
                <div class="info-section">
                    <hr>
                </div>
                <div class="info-section">
                    <div><img src="<?php echo URLROOT ?>/img/calender-white.png"" alt="" class=" icon">
                        <label for="">Next Pay Date</label>
                    </div>
                    <label for="" class="icon-label"><?php echo date("d M Y", strtotime("2024/01/03"))?></label>
                </div>
            </div>
            <form class="card-info">
                <h2>
                    Payment Details
                </h2>
                <label for="">
                    Credit Card
                </label>
                <input type="text" class="card-no">
                <div class="card-grid">
                    <label for="">
                        Expiration Date
                    </label>
                    <label for="">
                        Code CVV
                    </label>
                    <input type="date" class="card-no">
                    <input type="password" class="card-no">
                </div>
                <label for="">
                    Name
                </label>
                <input type="text" class="card-no">
                <button class="pay">Pay Rs. 5600</button>
            </form>
        </div>
    </div>
    <script>

    </script>
    <?php require APPROOT . "/views/inc/footer.php" ?>