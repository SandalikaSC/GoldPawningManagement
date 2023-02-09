<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/VKviewCustomer.css'>
<!-- <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/article_pawn.css'> -->
<title>Vogue | Customer</title>
</head>

<body class="wrapper">

    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/VKDashboard/Customers" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">Customer </h1>
            </div>
            <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
        </div>

    </div>
    <div class="content">
        <div class="page">

            <div class="payment-invoice">
                <div class="payment-info">
                    <div class="div-img">
                        <img src="<?php if(empty($data['customer']->image)){
                                    echo URLROOT . "/img/profile_pic.png" ;
                                }else{
                                  echo  $data['customer']->image;
                                    }?>" alt="" class="profile-pic">

                    </div>
                    <h2 class="h2-txt amount"><?= $data['customer']->First_Name." ".$data['customer']->Last_Name ;?></h2>
                    <div class="info-section">
                        <label for=""><?= $data['customer']->email;?></label>

                    </div>
                    <!-- <div class="info-section">
                        <label for="">Loan Amount</label>
                        <label for="">Rs. 4000.00</label>
                    </div> -->
                    <div class="info-section">
                        <hr>
                    </div>
                    <div class="info-section">
                        <div><img src="<?php echo URLROOT ?>/img/calender-white.png"" alt="" class=" icon">
                            <label for="">Date Joined</label>
                        </div>
                        <label for="" class="icon-label"><?php echo date("d M Y", strtotime($data['customer']->Created_date))?></label>
                    </div>
                </div>
                <form class="card-info">
                    <h2>
                        CU001
                    </h2>


                    <div class="card-grid">
                        <label for=""> Full Name</label>
                        <label for=""> Sandalika Chamari</label>

                        <label for=""> NIC</label>
                        <label for=""> 200064703151</label>
                        <label for="">Phone No.</label>
                        <label for="">0714456490</label>
                        <label for="">Address</label>
                        <div>
                            <label for=""> Welladeniya</label>
                            <label for=""> Midigama</label>
                            <label for=""> Ahangama</label>
                        </div>
                        <label for=""> Gender</label>
                        <label for=""> Female</label>

                    </div>
                    <hr>
                    <div class="card-grid">
                        <label for=""> Status</label>
                        <div> <label class="tag green" for="">Active</label></div>
                        <label for=""> Account Verification</label>
                        <div> <label class="tag gold" for="">Verified</label></div>
                    </div>
                    

                </form>
            </div>
        </div>



    </div>
    <?php require APPROOT . "/views/inc/footer.php" ?>