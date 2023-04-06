<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/VKPayment.css'>
<!-- <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/article_pawn.css'> -->
<title>Vogue | Payment</title>
</head>

<body class="wrapper">

    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/VKDashboard/Reservations" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">Make Payment </h1>
            </div>
            <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
        </div>

    </div>
    <div class="content">
        <div class="pay-details">
            <div class="card">
                <h2>Customer Details</h2>
                <div class="details">
                    <label for="">Customer Id</label>
                    <label for="">CU001</label>
                    <label for="">Customer Name</label>
                    <label for="">Sandalika Chamari</label>
                </div>
            </div>
            <form class="article-details">
                <h2>This payment is for</h2>
                <h4>Choose items</h4>
                <div class="item">
                    <label for="">
                        Choose
                    </label>
                    <label for="">
                        Article
                    </label>
                    <label for="">
                        Installment
                    </label>
                    <label for="">
                        Due Pay
                    </label>
                    <label for="">
                        Total
                    </label>
                </div>

                <div class="item">
                    <div><input type="checkbox" id="1" name="vehicle1" value="Bike">
                    </div>
                    <div class="Img">
                        <img class="vogue" src="<?php echo URLROOT ?>/img/nati-melnychuk-Ki7TPcA9204-unsplash.jpg"
                            alt="logo">
                    </div>
                    <label for="">
                        Rs.5000
                    </label>
                    <label for="">
                        Rs.1200
                    </label>
                    <label for="">
                        Rs.6200
                    </label>
                </div>
                <div class="item">
                    <div><input type="checkbox" id="1" name="vehicle1" value="Bike">
                    </div>
                    <div class="Img">
                        <img class="vogue" src="<?php echo URLROOT ?>/img/nati-melnychuk-oO0JAOJhquk-unsplash.jpg"
                            alt="logo">
                    </div>
                    <label for="">
                        Rs.5000
                    </label>
                    <label for="">
                        Rs.1200
                    </label>
                    <label for="">
                        Rs.6200
                    </label>
                </div>
            </form>
        </div>
        <div class="payment">
            <h2>
                Payment Details
            </h2>
            <div class="sec">
                <label for="Due">Due Pay</label>
                <label class="Due-pay" for="Total">Rs. 1200.00</label>
            </div>
            <div class="sec">
                <label for="Total">Total Pay</label>
                <label class="Tot-pay" for="Total">Rs. 6200.00</label>
            </div>
            <div class=" sec-btn">
                <a class="p-btn cancel">Cancel</button></a>
                <a class="p-btn pay">Pay</button></a>
            </div>
        </div>

    </div>
    <?php require APPROOT . "/views/inc/footer.php" ?>