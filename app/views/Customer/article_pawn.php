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
    <?php notification("Pawn")?>
    <div class="content">

        <div class="article">

            <div class="jewellery-img">

                <img class="jw-img" src="<?php if (!empty($data['goldLoan']->image)) {
                                                echo $data['goldLoan']->image;
                                            } else {
                                                echo URLROOT . "/img/lum3n-esAis38NHT8-unsplash.jpg";
                                            } ?>" alt="">


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
                            <label class="jw-dt"><?= "Rs " . $data['goldLoan']->Estimated_Value ?> </label>
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
                    <?php if ($data['status'] == "Retrieved") : ?>
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Redeemed Date Date</label>
                                <label class="jw-dt"><?= date("d M Y", strtotime($data['goldLoan']->Redeemed_Date)) ?></label>
                            </div>

                        </div>
                    <?php endif; ?>
                    <div class="jw-date-name">

                        <label>Status</label>
                        <label class="status <?php if ($data['status'] == 'Pawned') {
                                                    echo "tag-pending";
                                                } elseif ($data['status'] == 'Overdue') {
                                                    echo "tag-overdue";
                                                } elseif ($data['status'] == 'Completed') {
                                                    echo "tag-completed";
                                                } elseif ($data['status'] == 'Retrieved') {
                                                    echo "tag-retrieved";
                                                } else if ($data['status'] == 'Auctioned') {
                                                    echo "tag-auctioned";
                                                }  else if ($data['status'] == 'Repawn') {
                                                    echo "tag-repawn";
                                                } ?>"> <?= $data['status'] ?> </label>


                    </div>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label> </label>
                            <?php if ($data['goldLoan']->WarningOne == 1 && $data['goldLoan']->WarningTwo == 1) : ?>
                                <label class="status tag-warn">Warning 1 </label>
                                <label class="status tag-warn">Warning 2 </label>
                            <?php elseif ($data['goldLoan']->WarningOne == 1) : ?>
                                <label class="status tag-warn">Warning 1 </label>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="due-payment info-div">
                    <h2 class="sub-title">
                        Loan Details
                    </h2>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Pay Method</label>
                            <label class="jw-dt"><?= $data['goldLoan']->Repay_Method ?></label>
                        </div>

                    </div>
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



                    <?php if ($data['goldLoan']->Repay_Method == 'Fixed') : ?>
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Interest amount</label>
                                <label class="jw-dt"><?= 'Rs ' . number_format($data['interestAmount'], 2) ?></label>
                            </div>

                        </div>

                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Installement</label>
                                <label class="jw-dt"><?= 'Rs ' . number_format(ceil($data['goldLoan']->monthly_installment), 2) ?></label>
                            </div>

                        </div>
                    <?php else : ?>
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Paid Principle</label>
                                <label class="jw-dt"><?= 'Rs ' . number_format(ceil($data['paidPrinciple']), 2) ?></label>
                            </div>

                        </div>


                    <?php endif; ?>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Paid Amount</label>
                            <label class="jw-dt"><?= 'Rs ' . number_format($data['paid'], 2)  ?></label>
                        </div>

                    </div>



                </div>
            </div>
        </div>
        <div class="payment-history">


                    <?php if ($data['status'] != 'Auctioned' && $data['status'] != 'Retrieved' && $data['status'] != 'Completed' && $data['status'] != 'Repawn') : ?>

                <a class="a-pay" href="<?php echo URLROOT ?>/CustomerPawn/makePayment/<?= $data['goldLoan']->Pawn_Id ?>">

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