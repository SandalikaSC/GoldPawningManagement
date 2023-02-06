<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/article_pawn.css'>
<title>Vogue | Pawn Article</title>
</head>

<body class="wrapper">

    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/CustomerPawn" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">Article</h1>
            </div>
            <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
        </div>

    </div>
    <div class="content">

        <!-- <div class="jewellery-card">
            <div class="jewellery-img">
                <img class="jw-img" src="<?php echo URLROOT ?>/img/lum3n-esAis38NHT8-unsplash.jpg">
            </div>
            <div class="pawn-info" >
                
            </div>
        </div> -->
        <div class="article">

            <div class="jewellery-img">
                <img class="jw-img" src="<?php echo URLROOT ?>/img/images.jpg">


            </div>
            <div class="article-info">
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
                    <!-- <label>Article Id</label> -->
                </div>
                <div class="payment-content">
                    <label>PD1956</label>
                    <label>03</label>
                    <label>2022/09/30 09:53 A.M.</label>
                    <label>Rs. 5000</label>
                    <!-- <label>sdfsdfsdfsdf Id</label> -->
                </div>
                <div class="payment-content">
                    <label>PD1866</label>
                    <label>02</label>
                    <label>2022/09/30 09:53 A.M.</label>
                    <label>Rs.25000</label>
                    <!-- <label>sdfsdfsdfsdf Id</label> -->
                </div>
                <div class="payment-content">
                    <label>PD1096</label>
                    <label>01</label>
                    <label>2022/09/30 09:53 A.M.</label>
                    <label>Rs. 15000</label>
                    <!-- <label>sdfsdfsdfsdf Id</label> -->
                </div>

            </div>
            </div>
           
                <form action="<?php echo URLROOT ?>/CustomerPawn/makePayment" method="get">
                <button class="pay-btn">Pay</button>

                </form>
           

        </div>
    </div>
    <script>

    </script>
    <?php require APPROOT . "/views/inc/footer.php" ?>