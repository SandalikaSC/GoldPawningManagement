<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/nav-bar.css'>

<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/Pawn-pay.css'>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/CustomerPayment.css'>
<title>Vogue | Payment</title>
</head>

<body class="wrapper">

    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/CustomerPawn/viewPawnArticle/<?= $data['pawning']->Pawn_Id ?>" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">Payment</h1>
            </div>
            <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
        </div>

    </div>
    <div class="content">
        <div class="pay-details">
            <div class="card">
                <h2>Payment Details </h2>
                <div class="details">
                    <div class="jewellery-img">

                        <?php
                        $finfo = finfo_open();
                        $imageType = finfo_buffer($finfo, $data['article']->image, FILEINFO_MIME_TYPE);
                        finfo_close($finfo);

                        ?>
                        <img src="<?php if (empty($data['article']->image)) {
                                        echo URLROOT . "/img/harper-sunday-I89WziXZdVc-unsplash.jpg";
                                    } else {
                                        echo  "data:image/.'$imageType'.;charset=utf8;base64," . base64_encode($data['article']->image);
                                    } ?>
                                    " alt="" class="jw-img">
                        <!-- <img src="<?php echo URLROOT . "/img/harper-sunday-I89WziXZdVc-unsplash.jpg"; ?> " alt="" class="jw-img"> -->
                    </div>
                    <div class="info-div info-div-pay-info ">
                        
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Pawn Id</label>
                                <label class="jw-dt"><?= $data['pawning']->Pawn_Id ?></label>
                            </div>

                        </div>
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Loan Amount</label>
                                <label class="jw-dt"><?= 'Rs ' . $data['loan']->Amount ?></label>
                            </div>

                        </div>
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Interest </label>
                                <label class="jw-dt"><?= $data['loan']->Interest . '%' ?></label>
                            </div>

                        </div>
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Pay Method</label>
                                <label class="jw-dt"><?= $data['loan']->Repay_Method ?></label>
                            </div>

                        </div>


                        <?php if ($data['loan']->Repay_Method == 'fixed') : ?>

                            <div class="jw-date">
                                <div class="jw-date-name">
                                    <label>Monthly installemnt</label>
                                    <label class="jw-dt"><?= 'Rs ' . $data['loan']->monthly_installement     ?></label>
                                </div>

                            </div>

                        <?php endif; ?>
                        
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Paid Amount</label>
                                <label class="jw-dt"><?php echo 'Rs ' .$data['paid'] ?></label>
                            </div>

                        </div>
                        <h2 class="sub-title">
                            Want to extend reservation ?
                        </h2>

                        <div class="jw-date-name option-radio">
                            <input type="radio" name="accept-offers" id="yes-button" value="1" class="hidden radio-label">
                            <label for="yes-button" class="button-label">
                                <h1>Yes</h1>
                            </label>
                            <input type="radio" name="accept-offers" id="no-button" value="2" class="hidden radio-label" checked>
                            <label for="no-button" class="button-label">
                                <h1>No</h1>
                            </label>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
    <?php require APPROOT . "/views/inc/footer.php" ?>