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
                                    <label class="jw-dt"><?= 'Rs ' . number_format($data['loan']->monthly_installement, 2)     ?></label>
                                </div>

                            </div>

                        <?php endif; ?>

                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Paid Amount</label>
                                <label class="jw-dt"><?php echo 'Rs ' . $data['paid'] ?></label>
                            </div>

                        </div>

                        <?php if ($data['status'] == 'Overdue') : ?>

                            <h2 class="sub-title">
                                Want to Renew pawn ?
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
                        <?php else : ?>
                            <h2 class="sub-title">
                                Calculate Payment
                            </h2>
                            <?php if ($data['loan']->Repay_Method == 'fixed') : ?>
                                <?php
                                $toPayInst = 12 - $data['paid'] / $data['loan']->monthly_installement;
                                ?>

                                <div class="jw-date">
                                    <div class="jw-date-name">
                                        <label>Number of installment</label>
                                        <input type="number" id="noInstallments" onchange="installmentPay()" class="jw-dt inputf" min="1" max="<?= $toPayInst ?>" value="1">
                                    </div>

                                </div>
                                <div class="jw-date">
                                    <div class="jw-date-name">
                                        <label>Paying Amount</label>
                                        <label id="amountInstallment" class="jw-dt"><?= 'Rs ' .  $data['loan']->monthly_installement  ?></label>
                                    </div>

                                </div>

                            <?php else : ?>

                                <div class="jw-date">
                                    <div class="jw-date-name">
                                        <label>Enter Amount</label>
                                        <input type="text" id="diminishing_amount" class="jw-dt inputf">
                                    </div>

                                </div>
                                <div class="jw-date">
                                    <div class="jw-date-name">
                                        <label>Interest Amount</label>
                                        <label id="diminishingInstallment" class="jw-dt">Rs </label>
                                    </div>

                                </div>
                                <div class="jw-date">
                                    <div class="jw-date-name">
                                        <label>Full Amount</label>
                                        <label id="diminishingFull" class="jw-dt">Rs </label>
                                    </div>

                                </div>
                                <div class="jw-date">
                                    <div class="jw-date-name">
                                        <label class="err" id="dim_err"> </label>
                                        <!-- <button type="button" name="date" id="btnExtend" class="btn-extend" onclick="updateExtendPaymnet()" value="Extend">Extend</button> -->
                                    </div>
                                </div>
                            <?php endif; ?>


                        <?php endif; ?>
                        <div class="jw-date" id="retrieveRadio">

                            <label class=" ">
                                Method of retrieval
                            </label>

                            <div class="jw-date-name">
                                <div><input type="radio" name="retrieval" id="visit-button" value="1" class=" ">
                                    <label for="yes-button" class=" ">
                                        Visit Shop
                                    </label>
                                </div>
                                <div><input type="radio" name="retrieval" id="locker-button" value="2" class=" " checked>
                                    <label for="no-button" class=" ">
                                        Safe Locker
                                    </label>
                                </div>


                            </div>
                        </div>
                        <!-- <div id="retrieveRadio" class="jw-date-name option-radio">
                            <label class=" ">
                                Method of retrieval ?
                            </label>
                            <input type="radio" name="retrieval" id="visit-button" value="1" class=" ">
                            <label for="yes-button" class=" ">
                                Visit Shop
                            </label>
                            <input type="radio" name="retrieval" id="locker-button" value="2" class=" " checked>
                            <label for="no-button" class=" ">
                                Safe Locker
                            </label>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="info-div choise-div" id="extend">
                <h2 class="sub-title">
                    Article Retrieval
                </h2>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Reserve locker till</label>
                        <input type="date" name="date" id="extenddate" class="datechooser" value="" onchange="checkDate()">
                    </div>
                </div>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Extend payment</label>
                        <label class="jw-dt" id="extend-payment-box">Rs. 00.00</label>
                    </div>
                </div>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label class="err" id="extend-err"> </label>
                        <!-- <button type="button" name="date" id="btnExtend" class="btn-extend" onclick="updateExtendPaymnet()" value="Extend">Extend</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let installmentPayAmount = 0;
        var retrieveRadio = document.getElementById("retrieveRadio");
        retrieveRadio.style.display = "none";

        function installmentPay() {
            // Get the value of the number input field
            var numbeinstallments = document.getElementById("noInstallments").value;
            installmentPayAmount = <?= $data['loan']->monthly_installement ?> * numbeinstallments;
            document.getElementById("amountInstallment").innerHTML = 'Rs ' + parseFloat(installmentPayAmount.toFixed(2));

            if (numbeinstallments == document.getElementById("noInstallments").max) {
                retrieveRadio.style.display = "flex";
            } else {
                retrieveRadio.style.display = "none";
            }

        }
        var numbeinstallments = document.getElementById("noInstallments")
        numbeinstallments.addEventListener("input", installmentPay());

        var diminishing_amount = document.getElementById("diminishing_amount");
        diminishing_amount.addEventListener("input", function() {
            document.getElementById("dim_err").innerHTML="";

            var dimEnterAmount = diminishing_amount.value;
            if (/^\d+$/.test(dimEnterAmount)) {

                

            } else {
                //disable pay btn

                document.getElementById("dim_err").innerHTML="Invalid Payment Amount";
            }




        });
    </script>
    <?php require APPROOT . "/views/inc/footer.php" ?>