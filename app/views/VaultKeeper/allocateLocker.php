<?php require APPROOT . "/views/inc/header.php" ?>

<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/allocateLocker.css'>

<!-- <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/article_pawn.css'> -->
<title>Vogue | Allocate</title>
</head>

<body class="wrapper">

    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/VKDashboard/" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">Allocate Locker </h1>
            </div>
            <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
        </div>

    </div>
    <div class="content">
        <div class="locker-item">
            <div class="jewellery-card">
                <div class="jewellery-img">

                    <img class="jw-img" src="<?php echo URLROOT ?>/img/harper-sunday-I89WziXZdVc-unsplash.jpg">
                </div>
                <div class="jw-details">
                    
                    <div class="jw-date-name">

                        <label>Status</label>
                        <label class="status tag-pending">Valid</label>
                    </div>

                </div>

            </div>

        </div>
        <div class="item-payments">
            <!-- <div class="payment-history"> -->
            <div class="payments his-div">
            <h2 class="sub-title">
                    Article Details </h2>
                <div class="payments">

                    <div class="payment-content">
                        <label>Karats</label>
                        <label>22</label>


                    </div>
                    <div class="payment-content">
                        <label>Weight</label>
                        <label>0.500g</label>


                    </div>
                    <div class="payment-content">
                        
                        <label>Estimated Value</label>
                            <label class="">Rs. 50000</label>

                    </div>


                </div>
                <h2 class="sub-title">
                    Locker Details </h2>
                <div class="payments">

                    <div class="payment-content">
                        <label>Locker</label>
                        <label>03</label>


                    </div>
                    <div class="payment-content">
                        <label>No of Articles</label>
                        <label>01</label>


                    </div>


                </div>

                <button class="pay-btn">Allocate</button>
            </div>


        </div>
        <div class="item-details">
            <!-- <div class="article-details"> -->
            <div class="info-div">
                <h2 class="sub-title">
                    Customer Details
                </h2>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Customer Id</label>
                        <label class="jw-dt">CU001</label>
                    </div>

                </div>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Customer Name</label>
                        <label class="jw-dt">Sandalika Chamari</label>
                    </div>

                </div>



            </div>
            <div class="due-payment info-div">
                <h2 class="sub-title">
                    Reservation Details
                </h2>


                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Reservation Date</label>
                        <label class="jw-dt"><?= date("Y-m-d H:i")?></label>
                    </div>

                </div>

                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Payment Amount</label>
                        <label class="jw-dt">Rs 1500</label>
                    </div>

                </div>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>next pay date</label>
                        <label class="jw-dt">10 feb 2023</label>
                    </div>

                </div>



            </div>



            <!-- </div> -->

        </div>

    </div>
    <?php require APPROOT . "/views/inc/footer.php" ?>