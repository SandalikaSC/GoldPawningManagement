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
                        <img src="<?php if (empty($data['customer']->image)) {
                                        echo URLROOT . "/img/profile_pic.png";
                                    } else {
                                        echo  $data['customer']->image;
                                    } ?>" alt="" class="profile-pic">

                    </div>
                    <h2 class="h2-txt amount"><?= $data['customer']->First_Name . " " . $data['customer']->Last_Name; ?></h2>
                    <div class="info-section">
                        <label for=""><?= $data['customer']->email; ?></label>

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
                        <label for="" class="icon-label"><?php echo date("d M Y", strtotime($data['customer']->Created_date)) ?></label>
                    </div>
                </div>
                <form class="card-info">
                    <h2>
                        CU001
                    </h2>


                    <div class="card-grid">
                        <label for=""> Full Name</label>
                        <label for=""><?= $data['customer']->First_Name . " " . $data['customer']->Last_Name; ?></label>

                        <label for=""> NIC</label>
                        <label for=""><?= $data['customer']->NIC; ?></label>
                        <label for="">Phone No.</label>
                        <label for=""><?= $data['customer']->phone; ?></label>
                        <label for="">Address</label>
                        <div>
                            <label for=""> <?= $data['customer']->Line1; ?></label>
                            <label for=""> <?= ($data['customer']->Line2 === null || strtolower($data['customer']->Line2) == "null") ? "" : $data['customer']->Line2; ?></label>
                            <label for=""> <?= ($data['customer']->Line3 == null || strtolower($data['customer']->Line3) == "null") ? " " : $data['customer']->Line3; ?></label>
                        </div>
                        <label for=""> Gender</label>
                        <label for=""><?= $data['customer']->Gender; ?></label>

                    </div>
                    <hr>
                    <div class="card-grid">
                        <label for=""> Status</label>
                        <div> <label class="tag green" for=""> <?= ($data['customer']->Status == 1) ? "Active" : "Blocked"; ?></label></div>
                        <label for=""> Account Verification</label>
                        <div> <label class="tag gold" for=""> <?= ($data['customer']->verification_status == 1) ? "Verified" : "Not verified"; ?></label></div>
                    </div>


                </form>
            </div>

            <div class="reservation">
                <h1 class="title">Locker Allocation History</h1>
                <div class="reserve">
                    <label for="">Locker</label>
                    <label for="">Reserve Id</label>
                    <label for="">Article</label>
                    <label for="">Allocated</label>
                    <label for="">Retrieve Date</label>
                    <label for="">Released</label>
                    <label for="">Allocated By</label>
                </div>
                <?php foreach ($data['reservations'] as $article) : ?>
                    <div class="reserve square">
                        <label for="" class="locker"><?php echo "Locker ".$article->lockerNo ?></label>
                        <div class="img-div">
                            <img src="<?php echo $article->image ?>" class="img" alt="">
                        </div>
                        <label for=""><?php echo $article->Allocate_Id ?></label>
                        <label for=""><?php echo $article->Date ?></label>
                        <label for=""><?php echo $article->Retrieve_Date ?></label>


                        <label for=""><?php echo empty($article->Deallocated_Date)?"-":$article->Deallocated_Date ?></label>
                        <label for=""><?php echo $article->Keeper_Id ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>



    </div>
    <?php require APPROOT . "/views/inc/footer.php" ?>