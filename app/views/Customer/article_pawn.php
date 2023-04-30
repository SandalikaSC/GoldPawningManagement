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
                <?php
                $finfo = finfo_open();
                $imageType = finfo_buffer($finfo, $data['goldLoan']->image, FILEINFO_MIME_TYPE);
                finfo_close($finfo);
                ?>
                <img src="<?php if (empty($data['goldLoan']->image)) {
                                echo URLROOT . "/img/lum3n-esAis38NHT8-unsplash.jpg";
                            } else {
                                echo  "data:image/.'$imageType'.;charset=utf8;base64," . base64_encode($data['goldLoan']->image);
                            } ?>
                                    " alt="" class="jw-img">

            </div>
            <div class="article-info">
                <div class="info-div">
                    <h2 class="sub-title">
                        Article Details
                    </h2>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Article Id</label>
                            <label class="jw-dt"><?= $data['goldLoan']->Article_Id ?></label>
                        </div>

                    </div>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Estimate value</label>
                            <label class="jw-dt"><?= $data['goldLoan']->Estimated_Value ?> </label>
                        </div>

                    </div>

                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Pawned Date</label>
                            <label class="jw-dt"><?= date("d M Y", strtotime($data['goldLoan']->Pawn_Date)) ?></label>
                        </div>

                    </div>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Due Date</label>
                            <label class="jw-dt"><?= date("d M Y", strtotime($data['goldLoan']->End_Date)) ?></label>
                        </div>

                    </div>

                    <div class="jw-date-name">

                        <label>Status</label>
                        <label class="status <?php if ($data['status'] == 'Pawned') {
                                                    echo "tag-pending";
                                                } elseif ($data['status'] == 'Overdue') {
                                                    echo "tag-overdue";
                                                } else {
                                                    echo "tag-auctioned";
                                                } ?>"> <?= $data['status']?></label>
                    </div>
                </div>
                <div class="due-payment info-div">
                    <h2 class="sub-title">
                        Loan Details
                    </h2>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Interest</label>
                            <label class="jw-dt"> <?= $data['goldLoan']->Interest . '%' ?></label>
                        </div>

                    </div>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Loan Amount</label>
                            <label class="jw-dt"><?= 'Rs ' . $data['goldLoan']->Amount ?></label>
                        </div>

                    </div>


                    <?php if ($data['goldLoan']->Repay_Method == 'fixed') : ?>
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Interest amount</label>
                                <label class="jw-dt"><?= 'Rs ' . number_format($data['interestAmount'], 2) ?></label>
                            </div>

                        </div>

                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Installement</label>
                                <label class="jw-dt"><?= 'Rs ' . number_format($data['goldLoan']->monthly_installement, 2) ?></label>
                            </div>

                        </div>
                        <!-- <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Due Interest</label>
                                <label class="jw-dt"><?= number_format((float) $data['goldLoan']->Amount * $data['goldLoan']->Interest / 100, 2) ?></label>
                            </div>

                        </div> -->
                    <?php endif; ?>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Paid Amount</label>
                            <label class="jw-dt"><?= 'Rs ' . $data['paid'] ?></label>
                        </div>

                    </div>



                </div>
            </div>
        </div>
        <div class="payment-history">
            <?php if ($data['goldLoan']->Status != 'Auctioned') : ?> 
                <a class="a-pay" href="<?php echo URLROOT ?>/CustomerPawn/makePayment/<?= $data['goldLoan']->Pawn_Id ?>" method="get">
                    Pay </a>
            <?php endif; ?>
            <div class="payments his-div payHistory">
                <h2 class="sub-title">
                    Payment History </h2>
                <div class="payments">
                    <div class="pay-header">
                        <label>PID</label>
                        <label>Paid Date</label>
                        <label> Amount</label>
                        <label>Type</label>

                    </div>
                    <?php foreach ($data['payment'] as $paymnet) : ?>
                        <div class="payment-content">
                            <label><?= $paymnet->PID ?></label>
                            <label><?= date("Y-m-d", strtotime($paymnet->Date)) ?></label>
                            <label><?= 'Rs. ' . $paymnet->Amount ?></label>
                            <label><?= trim($paymnet->Type) ?></label>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
    <script>

    </script>
    <?php require APPROOT . "/views/inc/footer.php" ?>