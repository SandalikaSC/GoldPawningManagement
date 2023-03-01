<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/article_locker.css'>
<!-- <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/article_pawn.css'> -->
<title>Vogue | Locker Article</title>
</head>

<body class="wrapper">

    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/CustomerLocker" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">Article</h1>
            </div>
            <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
        </div>

    </div>
    <div class="content">
        <div class="locker-item">
            <div class="jewellery-card">
                <div class="jewellery-img">
                    <div class="locker-no">
                        <h2 class="no">01</h2>
                    </div>
                    <img class="jw-img" src="<?php echo URLROOT ?>/img/harper-sunday-I89WziXZdVc-unsplash.jpg">
                </div>
                <div class="jw-details">
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Due Date</label>
                            <label class="jw-dt"><?php echo date("d M Y", strtotime("2023/10/05")) ?></label>
                        </div>

                    </div>
                    <div class="jw-date-name">

                        <label>Status</label>
                        <label class="status tag-pending">Pending</label>
                    </div>
                </div>

            </div>

        </div>
        <div class="item-details">
            <!-- <div class="article-details"> -->
            <div class="info-div">
                <h2 class="sub-title">
                    Article Details
                </h2>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Article Id</label>
                        <label class="jw-dt">AR1125</label>
                    </div>

                </div>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Estimate value</label>
                        <label class="jw-dt">Rs 150,000</label>
                    </div>

                </div>



            </div>
            <div class="due-payment info-div">
                <h2 class="sub-title">
                    Reservation Details
                </h2>


                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Reservatoin Date</label>
                        <label class="jw-dt">2022/11/03</label>
                    </div>

                </div>

                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Installment</label>
                        <label class="jw-dt">Rs 12,500</label>
                    </div>

                </div>



            </div>
            <a class="a-pay" href="<?php echo URLROOT ?>/CustomerLocker/viewLockerPay" method="get">
                <button class="pay-btn">Pay</button>

            </a>

            <!-- </div> -->

        </div>
        <div class="item-payments">
            <!-- <div class="payment-history"> -->
            <div class="payments his-div">
                <h2 class="sub-title">
                    Payment History </h2>
                <div class="payments">
                    <div class="pay-header">
                        <label>Pay ID</label>
                        <label>Inst No</label>
                        <label>Paid Date</label>
                        <label> Amount</label>

                    </div>
                    <div class="payment-content">
                        <label>PD1956</label>
                        <label>03</label>
                        <label>2022/09/30 09:53 A.M.</label>
                        <label>Rs. 5000</label>

                    </div>
                    <div class="payment-content">
                        <label>PD1866</label>
                        <label>02</label>
                        <label>2022/09/30 09:53 A.M.</label>
                        <label>Rs.25000</label>

                    </div>
                    <div class="payment-content">
                        <label>PD1096</label>
                        <label>01</label>
                        <label>2022/09/30 09:53 A.M.</label>
                        <label>Rs. 15000</label>

                    </div>

                </div>
            </div>


        </div>
    </div>

    <!-- </div> -->

    <script>

    </script>
    <?php require APPROOT . "/views/inc/footer.php" ?>













    <!-- 

    <div>
            <div class="jewellery-card">
                <div class="jewellery-img">
                    <div class="locker-no">
                        <h2 class="no">01</h2>
                    </div>
                    <img class="jw-img" src="<?php echo URLROOT ?>/img/harper-sunday-I89WziXZdVc-unsplash.jpg">
                </div>
                <div class="jw-details">
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Due Date</label>
                            <label class="jw-dt"><?php echo date("d M Y", strtotime("2023/10/05")) ?></label>
                        </div>

                    </div>
                    <div class="jw-date-name">

                        <label>Status</label>
                        <label class="status tag-pending">Pending</label>
                    </div>
                </div>

            </div>
        </div>
        <div>
            <div class="article-details">
                <div class="info-div">
                    <h2 class="sub-title">
                        Article Details
                    </h2>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Article Id</label>
                            <label class="jw-dt">AR1125</label>
                        </div>

                    </div>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Estimate value</label>
                            <label class="jw-dt">Rs 150,000</label>
                        </div>

                    </div>

                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Pawned Date</label>
                            <label class="jw-dt">2022/11/03</label>
                        </div>

                    </div>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Due Date</label>
                            <label class="jw-dt">2023/11/03</label>
                        </div>

                    </div>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Loan Amount</label>
                            <label class="jw-dt">Rs 112,500</label>
                        </div>

                    </div>
                    <div class="jw-date-name">

                        <label>Status</label>
                        <label class="status tag-pending">Pending</label>
                    </div>
                </div>
                <div class="due-payment info-div">
                    <h2 class="sub-title">
                        Loan Details
                    </h2>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Interest</label>
                            <label class="jw-dt">27%</label>
                        </div>

                    </div>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Interest Amount</label>
                            <label class="jw-dt">Rs 22,250</label>
                        </div>

                    </div>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Due Interest</label>
                            <label class="jw-dt">Rs 10,250</label>
                        </div>

                    </div>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Due Loan</label>
                            <label class="jw-dt">Rs 84,350</label>
                        </div>

                    </div>



                </div>
            </div>
        </div>
        <div>
            <div class="payment-history">
                <div class="payments his-div">
                    <h2 class="sub-title">
                        Payment History </h2>
                    <div class="payments">
                        <div class="pay-header">
                            <label>Payment ID</label>
                            <label>Inst No</label>
                            <label>Paid Date</label>
                            <label> Amount</label>
                            
                        </div>
                        <div class="payment-content">
                            <label>PD1956</label>
                            <label>03</label>
                            <label>2022/09/30 09:53 A.M.</label>
                            <label>Rs. 5000</label>
                            
                        </div>
                        <div class="payment-content">
                            <label>PD1866</label>
                            <label>02</label>
                            <label>2022/09/30 09:53 A.M.</label>
                            <label>Rs.25000</label>
                            
                        </div>
                        <div class="payment-content">
                            <label>PD1096</label>
                            <label>01</label>
                            <label>2022/09/30 09:53 A.M.</label>
                            <label>Rs. 15000</label>
                            
                        </div>

                    </div>
                </div>


                <button class="pay-btn">Pay</button>


            </div>
        </div> -->