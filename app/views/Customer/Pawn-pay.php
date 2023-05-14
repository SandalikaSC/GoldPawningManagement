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
        <div class="invalid err-msg" id="err-msg"> Exceed the maximum online payment of Rs 50000</div>

        <div class="pay-details">

            <div class="cardnew">
                <h2>Payment Details </h2>
                <div class="details">
                    <div class="jewellery-img">
                        <img class="jw-img" src="<?php if (!empty($data['article']->image)) {
                                                        echo $data['article']->image;
                                                    } else {
                                                        echo URLROOT . "/img/lum3n-esAis38NHT8-unsplash.jpg";
                                                    } ?>" alt="">
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


                        <?php if ($data['loan']->Repay_Method == 'Fixed') : ?>

                            <div class="jw-date">
                                <div class="jw-date-name">
                                    <label>Monthly installemnt</label>
                                    <label class="jw-dt"><?= 'Rs ' . number_format($data['loan']->monthly_installment, 2)     ?></label>
                                </div>

                            </div>
                        <?php elseif ($data['loan']->Repay_Method == "Diminishing") : ?>
                            <div class="jw-date">
                                <div class="jw-date-name">
                                    <label>Paid Principle</label>
                                    <label class="jw-dt"><?= 'Rs ' . number_format($data['principle'], 2)     ?></label>
                                </div>

                            </div>
                        <?php endif; ?>

                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Paid Amount</label>
                                <label class="jw-dt"><?= 'Rs ' . number_format($data['paid'], 2)     ?></label>
                            </div>

                        </div>
                        <div id="errdiv" class="errdiv">

                            <span id="paymaxerr" class="paymaxerr">Exceed Maximum payment Rs 50000</span>
                            <!-- <label class="jw-dt"><?= 'Rs ' . number_format($data['paid'], 2)     ?></label> -->


                        </div>

                        <?php if ($data['status'] == 'Overdue') : ?>

                            <h2 class="sub-title">
                                Want to Renew pawn ?
                            </h2>

                            <div class="jw-date-name option-radio">
                                <input type="radio" name="repawn" id="yes-button" value="1" class="hidden radio-label" checked>
                                <label for="yes-button" class="button-label">
                                    <h1>Yes</h1>
                                </label>
                                <input type="radio" name="repawn" id="no-button" value="2" class="hidden radio-label">
                                <label for="no-button" class="button-label">
                                    <h1>No</h1>
                                </label>
                            </div>



                        <?php else : ?>
                            <h2 class="sub-title">
                                Calculate Payment
                            </h2>
                            <?php if ($data['loan']->Repay_Method == 'Fixed') : ?>
                                <div class="jw-date">
                                    <div class="jw-date-name">
                                        <label>Number of installment</label>
                                        <input type="number" id="noInstallments" onchange="installmentPay()" class="jw-dt inputf" min="1" max="<?= $data['toPayInst'] ?>" value="1">
                                    </div>

                                </div>
                                <div class="jw-date">
                                    <div class="jw-date-name">
                                        <label>Paying Amount</label>
                                        <label id="amountInstallment" class="jw-dt"><?= 'Rs ' . number_format($data['loan']->monthly_installment, 2)     ?></label>
                                    </div>

                                </div>

                            <?php else : ?>

                                <div class="jw-date">
                                    <div class="jw-date-name">
                                        <label>Enter Amount</label>
                                        <input type="text" id="diminishing_amount" onchange="diminishpay()" class="jw-dt inputf" value="0 ">
                                    </div>

                                </div>
                                <div class="jw-date">
                                    <div class="jw-date-name">
                                        <label>Interest Amount</label>
                                        <label id="diminishingInsterest" class="jw-dt">Rs </label>
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


                        <div class="jw-date retrieveRadio" id="retrieveRadio">

                            <label class=" ">
                                Method of retrieval
                            </label>


                            <input type="radio" name="retrieval" id="visit-button" value="1" class=" " checked>
                            <label for="visit-button" class=" ">
                                Visit Shop
                            </label>

                            <input type="radio" name="retrieval" id="locker-button" value="2" class=" " <?php if (empty($data['mylockers']) && empty($data['locker'])) {
                                                                                                            echo "disabled";
                                                                                                        } ?>>
                            <label for="locker-button" class=" ">
                                Safe Locker
                            </label>


                        </div>
                        <div class="info-div " id="Repawn_details">
                            <h2 class="sub-title">
                                Pawn Renewal
                            </h2>
                            <div class="jw-date">
                                <div class="jw-date-name">
                                    <label>Pawn Renew till</label>
                                    <label id="repawnTill"><?php echo date('Y-m-d', strtotime(date('Y-m-d') . ' +1 year')) ?></label>
                                </div>
                            </div>
                            <div class="jw-date">
                                <div class="jw-date-name">
                                    <label>Interest to be paid</label>
                                    <label id="repawnTill">

                                        <?php if ($data['loan']->Repay_Method == 'Fixed') {
                                            echo 'Rs ' . $data['loan']->Amount * ($data['loan']->Interest + 100) / 100 - $data['paid'];
                                        } else {
                                            echo 'Rs ' . ($data['loan']->Amount  - $data['principle']) * $data['loan']->Interest / 100;
                                        } ?>

                                    </label>
                                </div>
                            </div>
                            <div class="jw-date">
                                <div class="jw-date-name">
                                    <label>Principle to be paid</label>
                                    <label id="repawnTill"><?php echo 'Rs ' . $data['loan']->Amount - $data['principle'] ?></label>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <div class="set-div  " id="ReserveLocker_sec">
                <h2 class="sub-title">
                    Locker Reservation
                </h2>
                <div class="set">
                    <?php if (!empty($data['mylockers'])) : ?>
                        <h3>My Available Lockers</h3>
                        <div class="jw-date-name option-radio">


                            <input type="radio" name="locker" id="<?= $data['mylockers'][0]->lockerNo ?>" value="<?= $data['mylockers'][0]->lockerNo ?>" class="hidden radio-label" selected>
                            <label for="<?= $data['mylockers'][0]->lockerNo ?>" class="button-label">
                                <h1>Locker <?= $data['mylockers'][0]->lockerNo ?></h1>
                            </label>

                        </div>

                        <div class="jw-date-name">
                            <label for="date"> Retrieve Date</label>
                            <label class="jw-dt" id="extendto" value=""><?= $data['mylockers'][0]->Retrieve_Date ?></label>

                        </div>

                    <?php else : ?>
                        <h3> Will be Assigned To</h3>
                        <div class="jw-date-name option-radio">
                            <input type="radio" name="locker" id="<?= $data['locker'][0]->lockerNo ?>" value="<?= $data['locker'][0]->lockerNo ?>" class="hidden radio-label" selected>
                            <label for="<?= $data['locker'][0]->lockerNo ?>" class="button-label">
                                <h1>Locker <?= $data['locker'][0]->lockerNo ?></h1>
                            </label>

                        </div>

                        <div class="jw-date-name">
                            <label>Reserve locker till</label>
                            <select name="duration" class="selection" id="duration" onchange="lockerpayments()">
                                <option value="6" selected>06 Months</option>
                                <option value="12">12 Months</option>
                            </select>
                        </div>
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label for="date"> Extend To</label>
                                <label class="jw-dt" id="availlextendto" value=""><?= $data['extendTo'] ?></label>

                            </div>
                        </div>


                    <?php endif; ?>
                </div>
                <!-- <?php if (empty($data['mylockers'])) : ?>
                    <div class="jw-date">
                        <div class="jw-date-name">
                            <label>Reserve locker till</label>
                            <select name="duration" class="selection" id="duration">
                                <option value="6" selected>06 Months</option>
                                <option value="12">12 Months</option>
                            </select>
                        </div>
                    </div>
                <?php endif; ?> -->
                <!-- <div class="jw-date">
                    <div class="jw-date-name">
                        <label for="date"> Extend To</label>
                        <label class="jw-dt" id="extendto" value=""><?= $data['extendTo'] ?></label>

                    </div>
                </div> -->
                <!-- <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Reservation Payment</label>
                        <label class="jw-dt" id="locker-payment">Rs. 00.00</label>
                    </div>
                </div> -->

            </div>

            <!-- <div class="set-div " id="appointment_sec">
                <h2 class="sub-title">
                    Retrive Appointment
                </h2>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label class="app-txt">Appointment Date</label>
                        <input type="date" name="date" id="appointment_date" class="datechooser" value="" onchange="appointmentDateSelection()">
                    </div>

                </div>
                <div class="jw-date">
                    <div class="jw-date-name time-slots" id="time-slots">

                        <?php foreach ($data['timeslot'] as $timeslot) : ?>
                            <div class=" selecotr-item">
                                <input type="radio" value="<?php echo $timeslot->slotID ?>" id=<?php echo $timeslot->slotID ?> name="selector" class=" selector-item_radio" checked>
                                <label for=<?php echo $timeslot->slotID ?> class="selector-item_label">
                                    <?php echo $timeslot->time ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>

                <div class="jw-date">
                    <div class="jw-date-name">
                        <label class="err" id="appointment-err"> * </label>
                     </div>

                </div>


            </div> -->



        </div>
        <div class="payment">
            <div class="sec pay">
                <label class="pay_title">
                    Payment Details
                </label>
                <label class="pay_title" id="total_pay">
                    00.00
                </label>
            </div>

            <div class="sec">
                <label for="Due">Interest Pay</label>
                <label class="Tot-pay" id="Interest_pay" for="Total">
                    <?php if ($data['status'] == 'Overdue') {
                        if ($data['loan']->Repay_Method == 'fixed') {
                            echo $data['loan']->Amount * ($data['loan']->Interest + 100) / 100 - $data['paid'];
                        } else {
                            echo ($data['loan']->Amount  - $data['principle']) * $data['loan']->Interest / 100;
                        }
                    } elseif ($data['loan']->Repay_Method == 'fixed') {
                        echo   $data['loan']->Amount * $data['loan']->Interest / 100 / 12;
                    } else {
                        echo "00.00";
                    }

                    ?>

                </label>
            </div>
            <div class="sec">
                <label for="Total">Principle Pay</label>
                <label class="Tot-pay" id="Principle_pay" for="Total">

                    <?php if ($data['loan']->Repay_Method == 'fixed'  && $data['status'] != 'Overdue') {
                        echo $data['loan']->Amount / 12;
                    } else {
                        echo '00.00';
                    } ?> </label>
            </div>
            <div class="sec">
                <label for=" ">locker Reservation Pay</label>
                <label class="Tot-pay" id="locker_pay" for=" ">0 </label>
            </div>
            <div class="sec">
                <label for=" ">Delivery Pay</label>
                <label class="Tot-pay" id="Delivery_pay" for=" ">0 </label>
            </div>
            <div class=" sec-btn">
                <!-- <a class="p-btn " href="">Cancel </a> -->
                <button class="p-btn " id="p-btn" onclick="makePayment()">Pay</button>
            </div>
        </div>

    </div>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="<?php echo URLROOT ?>/js/jquery.min.js"></script>
    <script>
        //pay btn
        let pay_btn = document.getElementById('p-btn');
        // pay_btn.style.display = 'none';
        //errer display
        let exeecderr = document.getElementById("errdiv");
 
        document.getElementById('err-msg').style.display = "none";
            
 
        function checkTotal(amount) {
            if (amount > 50000) {
                pay_btn.style.display = 'none';
                exeecderr.style.display = 'flex';
                exeecderr.innerHTML = "Exceed Maximum payment Rs 50000";
            } else if (amount < 30) {
                pay_btn.style.display = 'none';
                exeecderr.style.display = 'flex';
                exeecderr.innerHTML = "Less than Minimum payment Rs 30";
            } else {
                pay_btn.style.display = 'auto';
                exeecderr.style.display = 'none';
            }

        }

        let installmentPayAmount = 0;
        var retrieveRadio = document.getElementById("retrieveRadio");
        retrieveRadio.style.display = "none";
        let repayMethod = "<?= $data['loan']->Repay_Method ?>";


        // //radio buttions
        // //method of retrieval

        var retrieval = document.getElementById("retrieval");



        // //page sections
        let Repawn_details = document.getElementById("Repawn_details");
        Repawn_details.style.display = "none";
        // let appointment_sec = document.getElementById("appointment_sec");
        // appointment_sec.style.display = "none";
        let ReserveLocker_sec = document.getElementById("ReserveLocker_sec");
        ReserveLocker_sec.style.display = "none";

        let Repawn_date = document.getElementById("repawnTill");

        // //payment section labels

        let interest_label = document.getElementById("Interest_pay");
        let principle_label = document.getElementById("Principle_pay");
        let total_label = document.getElementById("total_pay");
        let delivery_label = document.getElementById("Delivery_pay");
        let locker_label = document.getElementById("locker_pay");

        let interestPresentage = <?= $data['pawnInterest'] ?>;
        let loanAmount = <?= $data['loan']->Amount ?>;

        // //payment categories

        let interestpayment = 0;
        let principlepayment = 0;
        let deliverypayment = 0;
        let lockerpayment = 0;

        // // set payment values
        interestpayment =
            <?php if ($data['status'] == 'Overdue') {
                if ($data['loan']->Repay_Method == 'Fixed') {
                    echo $data['loan']->Amount * ($data['loan']->Interest + 100) / 100 - $data['paid'];
                } else {
                    echo ($data['loan']->Amount  - $data['principle']) * $data['loan']->Interest / 100;
                }
            } elseif ($data['loan']->Repay_Method == 'Fixed') {
                echo   $data['loan']->Amount * $data['loan']->Interest / 100 / 12;
            } else {
                echo 0;
            }

            ?>;

        principlepayment =
            <?php if ($data['status'] != 'Overdue') {
                if ($data['loan']->Repay_Method == 'Fixed') {
                    echo $data['loan']->Amount / 12;
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
            ?>;

        // //set payment labels

        interest_label.innerHTML = interestpayment;
        principle_label.innerHTML = principlepayment;


        //set total paymnt
        let total_payment = (interestpayment + principlepayment + deliverypayment + lockerpayment).toFixed(2);
        total_label.innerHTML = 'Rs ' + total_payment;

        let pwnStatus = '<?php echo $data['status'] ?>';
        // if (pwnStatus != 'Overdue') {
        //     pay_btn.style.display = 'none';
        // }

        if ('<?= $data['status'] ?>' != 'Overdue') {

            if (repayMethod == 'fixed') {
                var numbeinstallments = document.getElementById("noInstallments")
                numbeinstallments.addEventListener("input", installmentPay());
            }
        } else {
            Repawn_details.style.display = "flex";

        }


        function diminishpay() {
            pay_btn.style.display = 'flex';
            retrieveRadio.style.display = "none";
            var diminishing_amount = document.getElementById("diminishing_amount");
            document.getElementById("dim_err").innerHTML = "";
            var topayPrinciple;
            var dimEnterAmount = diminishing_amount.value;
            if (/^\d+$/.test(dimEnterAmount) && dimEnterAmount > 0) {
                var topayprinciple = <?= $data['topayPrinciple'] ?>;
                if (dimEnterAmount > topayprinciple) {
                    pay_btn.style.display = 'none';
                    document.getElementById("dim_err").innerHTML = "Entered Amount is higher than the principle amount to be paid";

                } else {
                    if (dimEnterAmount == topayprinciple) {
                        retrieveRadio.style.display = "flex";
                    } else {
                        retrieveRadio.style.display = "none";
                    }
                    DiminishigPaymentSet(dimEnterAmount);
                }

            } else {
                //disable pay btn

                document.getElementById("dim_err").innerHTML = "Invalid Payment Amount";
            }
        }

        function DiminishigPaymentSet(amount) {

            interestpayment = (parseFloat('<?= $data['topayPrinciple'] ?>') - amount) * interestPresentage / 100;
            principlepayment = parseFloat(amount);
            var total = interestpayment + principlepayment;

            //calculate payment box labels set
            document.getElementById('diminishingFull').textContent = "Rs " + total;
            document.getElementById('diminishingInsterest').textContent = "Rs " + interestpayment;



            //set payment labels 
            interest_label.innerHTML = interestpayment;
            principle_label.innerHTML = principlepayment;

            total_payment = (interestpayment + principlepayment + deliverypayment + lockerpayment).toFixed(2);
            total_label.textContent = 'Rs ' + total_payment;
        }


        // set appointment date input default

        var tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);

        // // Format the date as yyyy-mm-dd (required by the date input)
        var formattedDate = tomorrow.toISOString().substring(0, 10);

        // Set the date input value to tomorrow's date
        // document.getElementById("appointment_date").value = formattedDate;
        if ('<?= $data['status'] ?>' == 'Overdue') {
            //overdue repawn option choosen
            const yes = document.getElementById("yes-button");
            const no = document.getElementById("no-button");
            yes.addEventListener("click", function(event) {
                // pay_btn.style.display = 'flex'; // pay btn 
                RenewPay();
                retrieveRadio.style.display = "none";
                Repawn_details.style.display = "flex";
                // appointment_sec.style.display = "none";
                ReserveLocker_sec.style.display = "none";
                repawnTill.innerHTML = "Invalid Payment Amount";

            });

            no.addEventListener("click", function(event) {

                notRepawnPay();
                if (lockerReserve.checked) {

                }

                retrieveRadio.style.display = "flex";
                Repawn_details.style.display = "none";
                var radio = document.getElementById("locker-button");
                if (radio.checked) {
                    ReserveLocker_sec.style.display = "flex";
                    // pay_btn.style.display = 'none'; //disable pay btn
                } else {
                    // appointment_sec.style.display = "flex";
                    // pay_btn.style.display = 'flex';
                }



            });


        }

        //method of retrieval
        const app = document.getElementById("visit-button");
        const lockerReserve = document.getElementById("locker-button");

        //appointment clicked
        app.addEventListener("click", function(event) {
            pay_btn.style.display = 'flex'; // pay btn 
            if (pwnStatus == "Pawned") {

                deliverypayment = 0;
                lockerpayment = 0;
                locker_label.innerHTML = lockerpayment;
                delivery_label.innerHTML = deliverypayment;
                interest_label.innerHTML = interestpayment;
                principle_label.innerHTML = principlepayment;

                total_payment = (interestpayment + principlepayment + deliverypayment + lockerpayment).toFixed(2);
                total_label.innerHTML = 'Rs ' + total_payment;

            } else if (pwnStatus == "Overdue") {
                RenewPay();
            }

            ReserveLocker_sec.style.display = "none";
            deliverypayment = 0;
            lockerpayment = 0;
            // appointment_sec.style.display = "flex";
        });
        //lockerReserve clicked
        lockerReserve.addEventListener("click", function(event) {
            // pay_btn.style.display = 'none'; //disable pay btn 
            lockerpayments();
            // appointment_sec.style.display = "none";
            ReserveLocker_sec.style.display = "flex";

        });
        var myLockers = <?= json_encode($data['mylockers']) ?>;
        // if (Array.isArray(myLockers) && myLockers.length == 0 ) {
        //     var selectElement = document.getElementById("duration");
        //     selectElement.addEventListener("changed",function(){
        //         console.log(selectElement.value);
        //     });
        //     console.log(1);
        // }



        // //reservev a locker
        function lockerpayments() {
            if (Array.isArray(myLockers) && myLockers.length != 0) {
                deliverypayment = 0;
                lockerpayment = 0;
            } else {
                deliverypayment = <?= $data['delivery'] ?>;
                var selectElement = document.getElementById("duration");
                var today = new Date();
                if (selectElement.value == 12) {
                    lockerpayment = <?= $data['reserveInterest'] ?>;

                    var sixMonthsLater = new Date(today.getFullYear() + 1, today.getMonth(), today.getDate());
                    var formattedDate = sixMonthsLater.toISOString().slice(0, 10);
                } else {
                    lockerpayment = <?= $data['reserveInterest'] ?> / 2;
                    var sixMonthsLater = new Date(today.getFullYear(), today.getMonth() + 6, today.getDate());
                    var formattedDate = sixMonthsLater.toISOString().slice(0, 10);
                }
                document.getElementById('availlextendto').textContent = formattedDate;

            }



            locker_label.innerHTML = lockerpayment;
            delivery_label.innerHTML = deliverypayment;
            total_payment = (interestpayment + principlepayment + deliverypayment + lockerpayment).toFixed(2);
            total_label.innerHTML = 'Rs ' + total_payment;

        }
        // //set payment laybels when ourdue
        function notRepawnPay() {
            interestpayment = parseFloat(
                <?php
                if ($data['loan']->Repay_Method == 'Fixed') {
                    echo $data['loan']->Amount * $data['loan']->Interest / 100 - ($data['paid'] - $data['principle']);
                } else {
                    echo ($data['loan']->Amount  - $data['principle']) * $data['loan']->Interest / 100;
                }

                ?>);
            principlepayment = parseFloat(<?php echo $data['loan']->Amount - $data['principle'] ?>);

            //set payment labels 
            interest_label.innerHTML = interestpayment;
            principle_label.innerHTML = principlepayment;

            if (app.checked) {
                deliverypayment = 0;
                lockerpayment = 0;
            } else {
                deliverypayment = <?= $data['delivery'] ?>;
                var selectElement = document.getElementById("duration");

                if (selectElement.value == 12) {
                    lockerpayment = <?= $data['reserveInterest'] ?>;
                } else {
                    lockerpayment = <?= $data['reserveInterest'] ?> / 2;
                }

            }
            locker_label.innerHTML = lockerpayment;
            delivery_label.innerHTML = deliverypayment;
            //set total paymnt
            total_payment = (interestpayment + principlepayment + deliverypayment + lockerpayment).toFixed(2);
            total_label.innerHTML = 'Rs ' + total_payment;


        }

        function RenewPay() {
            interestpayment =
                <?php if ($data['status'] == 'Overdue') {
                    if ($data['loan']->Repay_Method == 'Fixed') {
                        echo $data['loan']->Amount * ($data['loan']->Interest + 100) / 100 - $data['paid'];
                    } else {
                        echo ($data['loan']->Amount  - $data['principle']) * $data['loan']->Interest / 100;
                    }
                } else {
                    echo 0;
                }
                ?>;
            deliverypayment = 0;
            lockerpayment = 0;
            locker_label.innerHTML = 0;
            delivery_label.innerHTML = 0;
            //set payment labels
            principlepayment = 0
            interest_label.innerHTML = interestpayment;
            principle_label.innerHTML = principlepayment;


            //     //set total paymnt
            total_payment = (interestpayment + principlepayment + deliverypayment + lockerpayment).toFixed(2);
            total_label.innerHTML = 'Rs ' + total_payment;

        }






        function installmentPay() {
            // Get the value of the number input field
            var numbeinstallments = document.getElementById("noInstallments").value;
            installmentPayAmount = parseFloat('<?php echo $data['loan']->monthly_installment; ?>') * numbeinstallments;
            document.getElementById("amountInstallment").innerHTML = 'Rs ' + parseFloat(installmentPayAmount).toFixed(2);



            principlepayment = numbeinstallments * loanAmount / 12;
            interestpayment = installmentPayAmount - principlepayment;

            interest_label.innerHTML = interestpayment;
            principle_label.innerHTML = principlepayment;

            total_payment = (interestpayment + principlepayment + deliverypayment + lockerpayment).toFixed(2);
            total_label.innerHTML = 'Rs ' + total_payment;


            if (numbeinstallments == document.getElementById("noInstallments").max) {
                retrieveRadio.style.display = "flex";
            } else {
                retrieveRadio.style.display = "none";
            }

        }

        function makePayment() {

            var payment = null;
            var repawnStatus = 0;
            var myLocker = null;
            var lockerAllocation = null;
            var pawnProcess = null;
            const selectedRadio = document.querySelector('input[name="repawn"]:checked');
            document.getElementById('err-msg').style.display = "none";

            if (interestpayment + principlepayment == 0) {

                document.getElementById("dim_err").innerHTML = "Invalid Payment amount";


                } else if (total_payment >= 50000) {

                    document.getElementById('err-msg').style.display = "flex";
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
 


            } else {
                if (pwnStatus == "Pawned") {


                    if (<?= $data['topayPrinciple'] ?> == principlepayment) {
                        // console.log("completed");
                        // payment = {
                        //     "amount": total_payment,
                        //     "Principle": principlepayment,
                        //     "PawnId": <?= $data['pawning']->Pawn_Id ?>
                        // };
                        const retrival = document.querySelector('input[name="retrieval"]:checked');
                        const method = retrival.value;
                        if (method == 1) {
                            // console.log(" Visit Shop");
                            payment = {
                                "amount": total_payment,
                                "Principle": principlepayment,
                                "interest": interestpayment,
                                "PrincipletobePaid": <?= $data['topayPrinciple'] ?>,
                                "PawnId": <?= $data['pawning']->Pawn_Id ?>
                            };
                            pawnProcess = {
                                "pawnStatus": pwnStatus,
                                "Repawn": 0,
                                "loanPay": "Full",
                                "retrieve": "Visit"
                            };
                            myLocker = null;
                            lockerAllocation = null;
                        } else {

                            // console.log("Safe Locker");
                            pawnProcess = {
                                "pawnStatus": pwnStatus,
                                "Repawn": 0,
                                "loanPay": "Full",
                                "retrieve": "Locker"
                            };
                            var myLockers = <?= json_encode($data['mylockers']) ?>;


                            if (Array.isArray(myLockers) && myLockers.length != 0) {
                                // console.log(" mylocker");
                                payment = {
                                    "amount": total_payment,
                                    "Principle": principlepayment,
                                    "interest": interestpayment,
                                    "PrincipletobePaid": <?= $data['topayPrinciple'] ?>,
                                    "PawnId": <?= $data['pawning']->Pawn_Id ?>
                                };

                                myLocker = {
                                    "locker": myLockers[0].lockerNo,
                                    "retrieve_date": myLockers[0].Retrieve_Date
                                };
                                lockerAllocation = null;

                            } else {

                                // console.log(" available locker");
                                var selectElement = document.getElementById("duration");
                                const selectedDuration = selectElement.value;
                                var today = new Date();
                                if (selectedDuration == 12) {
                                    lockerpayment = <?= $data['reserveInterest'] ?>;
                                    var sixMonthsLater = new Date(today.getFullYear() + 1, today.getMonth(), today.getDate() + 1);
                                    var formattedDate = sixMonthsLater.toISOString().slice(0, 10);
                                } else {
                                    lockerpayment = <?= $data['reserveInterest'] ?> / 2;
                                    var sixMonthsLater = new Date(today.getFullYear(), today.getMonth() + 6, today.getDate() + 1);
                                    var formattedDate = sixMonthsLater.toISOString().slice(0, 10);
                                }
                                payment = {
                                    "amount": total_payment - (deliverypayment + lockerpayment),
                                    "Principle": principlepayment,
                                    "interest": interestpayment,
                                    "PrincipletobePaid": <?= $data['topayPrinciple'] ?>,
                                    "PawnId": <?= $data['pawning']->Pawn_Id ?>
                                };
                                lockerAllocation = {
                                    "locker": <?= $data['locker'][0]->lockerNo ?>,
                                    "retrieve_date": formattedDate,
                                    "duration": selectedDuration,
                                    "payment": lockerpayment,
                                    "delivery": deliverypayment
                                };
                                myLocker = null;



                            }
                        }



                    } else {
                        // console.log("not");

                        payment = {
                            "amount": total_payment,
                            "Principle": principlepayment,
                            "interest": interestpayment,
                            "PrincipletobePaid": <?= $data['topayPrinciple'] ?>,
                            "PawnId": <?= $data['pawning']->Pawn_Id ?>
                        };
                        pawnProcess = {
                            "pawnStatus": pwnStatus,
                            "Repawn": 0,
                            "loanPay": "Half",
                            "retrieve": null
                        };
                        repawnStatus = 0;
                        myLocker = null;
                        lockerAllocation = null;
                    }



                } else if (pwnStatus == "Overdue") {
                    // Get the value of the selected radio button
                    const repawn = selectedRadio.value;
                    if (repawn == 1) {
                        // console.log("Repawn");
                        repawnStatus = 1;
                        payment = {
                            "amount": total_payment,
                            "Principle": 0,
                            "interest": interestpayment,
                            "PrincipletobePaid": <?= $data['topayPrinciple'] ?>,
                            "PawnId": <?= $data['pawning']->Pawn_Id ?>
                        };
                        myLocker = null;
                        lockerAllocation = null;
                        pawnProcess = {
                            "pawnStatus": pwnStatus,
                            "Repawn": 1,
                            "loanPay": null,
                            "retrieve": null
                        };

                    } else {
                        // console.log(" not Repawn");
                        var repawnStatus = 0;
                        const retrival = document.querySelector('input[name="retrieval"]:checked');
                        const method = retrival.value;
                        if (method == 1) {
                            // console.log(" Visit Shop");
                            payment = {
                                "amount": total_payment,
                                "Principle": principlepayment,
                                "interest": interestpayment,
                                "PrincipletobePaid": <?= $data['topayPrinciple'] ?>,
                                "PawnId": <?= $data['pawning']->Pawn_Id ?>
                            };
                            myLocker = null;
                            lockerAllocation = null;
                            pawnProcess = {
                                "pawnStatus": pwnStatus,
                                "Repawn": 0,
                                "loanPay": "Full",
                                "retrieve": "Visit"
                            };

                        } else {

                            // console.log("Safe Locker");
                            pawnProcess = {
                                "pawnStatus": pwnStatus,
                                "Repawn": 0,
                                "loanPay": "Full",
                                "retrieve": "Locker"
                            };
                            var myLockers = <?= json_encode($data['mylockers']) ?>;


                            if (Array.isArray(myLockers) && myLockers.length != 0) {
                                // console.log(" mylocker");
                                payment = {
                                    "amount": total_payment,
                                    "Principle": principlepayment,
                                    "interest": interestpayment,
                                    "PrincipletobePaid": <?= $data['topayPrinciple'] ?>,
                                    "PawnId": <?= $data['pawning']->Pawn_Id ?>
                                };
                                myLocker = {
                                    "locker": myLockers[0].lockerNo,
                                    "retrieve_date": myLockers[0].Retrieve_Date
                                };

                                lockerAllocation = null;

                            } else {

                                // console.log(" available locker");
                                var selectElement = document.getElementById("duration");
                                const selectedDuration = selectElement.value;
                                var today = new Date();
                                if (selectedDuration == 12) {
                                    lockerpayment = <?= $data['reserveInterest'] ?>;
                                    var sixMonthsLater = new Date(today.getFullYear() + 1, today.getMonth(), today.getDate() + 1);
                                    var formattedDate = sixMonthsLater.toISOString().slice(0, 10);
                                } else {
                                    lockerpayment = <?= $data['reserveInterest'] ?> / 2;
                                    var sixMonthsLater = new Date(today.getFullYear(), today.getMonth() + 6, today.getDate() + 1);
                                    var formattedDate = sixMonthsLater.toISOString().slice(0, 10);
                                }
                                payment = {
                                    "amount": total_payment - (deliverypayment + lockerpayment),
                                    "Principle": principlepayment,
                                    "interest": interestpayment,
                                    "PrincipletobePaid": <?= $data['topayPrinciple'] ?>,
                                    "PawnId": <?= $data['pawning']->Pawn_Id ?>
                                };
                                myLocker = null;
                                lockerAllocation = {
                                    "locker": <?= $data['locker'][0]->lockerNo ?>,
                                    "retrieve_date": formattedDate,
                                    "duration": selectedDuration,
                                    "payment": lockerpayment,
                                    "delivery": deliverypayment
                                };



                            }
                        }

                    }

                }


                OnlinePayment(<?= $data['pawning']->Pawn_Id ?>, pawnProcess, payment, myLocker, lockerAllocation, total_payment);
                // saveDetails(<?= $data['pawning']->Pawn_Id ?>, pawnProcess, payment, myLocker, lockerAllocation, 5);

            }



        }

        function OnlinePayment(pawnId, pawnprocess, paymentinfo, myLocker, availableLocker, total) {

            var xhr = new XMLHttpRequest(); // create a new XMLHttpRequest object 
            xhr.onreadystatechange = function() { // set the callback function
                if (xhr.readyState == 4) {
                    // handle the response

                    var obj = xhr.responseText;

                    object = JSON.parse(obj);

                    // Payment completed.It can be a successful failure.
                    payhere.onCompleted = function onCompleted(orderId) {
                        //    alert("Payment completed. OrderID:" + object["order_id"]);
                        // Note: validate the payment and show success or failure page to the customer
                        saveDetails(pawnId, pawnprocess, paymentinfo, myLocker, availableLocker, object['order_id']);
                        // alert("complete");
                        // window.location.href ='<?php echo URLROOT ?>/CustomerPawn/makePayment';
                    };

                    // Payment window closed
                    payhere.onDismissed = function onDismissed() {
                        // Note: Prompt user to pay again or show an error page
                        // alert("Payment dismissed");

                    };

                    // Error occurred
                    payhere.onError = function onError(error) {
                        // Note: show an error page

                    };

                    // Put the payment variables here
                    var payment = {
                        "sandbox": true,
                        "merchant_id": object['merchant_id'], // Replace your Merchant ID
                        "return_url": " <?php echo URLROOT ?>/CustomerPawn/makePayment/ <?= $data['pawning']->Pawn_Id  ?>", // Important
                        "cancel_url": " <?php echo URLROOT ?>/CustomerPawn/makePayment/<?= $data['pawning']->Pawn_Id ?>", // Important
                        "notify_url": "",
                        "order_id": object['order_id'],
                        "items": object['items'],
                        "amount": object['amount'],
                        "currency": object['currency'],
                        "hash": object['hash'], // *Replace with generated hash retrieved from backend
                        "first_name": object['first_name'],
                        "last_name": object['last_name'],
                        "email": object['email'],
                        "phone": object['phone'],
                        "address": object['address'],
                        "city": "Colombo",
                        "country": "Sri Lanka",
                        "delivery_address": "No. 46, Galle road, Kalutara South",
                        "delivery_city": "Kalutara",
                        "delivery_country": "Sri Lanka",
                        "custom_1": "",
                        "custom_2": ""
                    };

                    // Show the payhere.js popup, when "PayHere Pay" is clicked

                    payhere.startPayment(payment);

                }
            };

            xhr.open("POST", "  <?= URLROOT ?>/CustomerPawn/PawnOnlinePay/ <?= $data['pawning']->Pawn_Id ?>/" + total, true); // set the request method and URL
            xhr.send();







        }

        function saveDetails(pawnId, pawnProcess, payment, myLocker, availableLocker, orderId) {
            $.ajax({
                type: "GET",
                url: "  <?= URLROOT ?>/CustomerPawn/savePawnPayment",
                data: {
                    pawnId: pawnId,
                    pawnProcess: pawnProcess,
                    payment: payment,
                    myLocker: myLocker,
                    availableLocker: availableLocker,
                    orderid: orderId
                },
                success: function(response) { 


                    // window.location = '<?= URLROOT ?>/CustomerPawn/geneartePdf'; 
                    window.location = '<?= URLROOT ?>/CustomerPawn/viewPawnArticle/' + response;

                    // window.open('<?= URLROOT ?>/CustomerPawn/geneartePdf/'+response, "_blank");


                },
                error: function(xhr, status, error) {
                    // handle errors here
                    window.location = '<?= URLROOT ?>/CustomerPawn/viewPawnArticle/' + pawnId;
                }
            });


            // 
        }

        // function appointmentDateSelection() {
        //     document.getElementById("appointment-err").textContent = "";
        //     // document.getElementById("extend-err").textContent = "";
        //     var selectedDate = document.getElementById("appointment_date").value;
        //     selectedDate = new Date(selectedDate);
        //     const currentDate = new Date();

        //     //     // Compare the two dates
        //     if (selectedDate <= currentDate) {
        //         var parentElement = document.getElementById("time-slots");
        //         while (parentElement.firstChild) {
        //             parentElement.removeChild(parentElement.firstChild);
        //         }
        //         document.getElementById("appointment-err").textContent = "Invalid Date selected";
        //         pay_btn.style.display = 'none';
        //         // set payment labels to 0

        //     } else {

        //         document.getElementById("appointment-err").textContent = "";
        //         pay_btn.style.display = 'flex';
        //         $.ajax({
        //             type: "POST",
        //             url: "<?= URLROOT ?>/CustomerPawn/getTimeSlots",
        //             data: {
        //                 date: selectedDate
        //             },
        //             dataType: "JSON",
        //             success: function(response) {
        // var parentElement = document.getElementById("time-slots");
        // while (parentElement.firstChild) {
        //     parentElement.removeChild(parentElement.firstChild);
        // }
        // response.forEach(function(item) {

        //     var newElement = '<div class="selector-item">' +
        //         '<input type="radio" value="' + item.slotID + ' "id="' + item.slotID + '" name="selector" class="selector-item_radio" checked>' +
        //         '<label  for="' + item.slotID + '" class="selector-item_label">' + item.time + '</label>' +
        //         '</div>';
        //     $("#time-slots").append(newElement);
        // });


        //             },
        //             error: function(xhr, status, error) {
        //                 console.log("Error: " + error);
        //             }
        //         });
        //     }


        // }
    </script>
    <?php require APPROOT . "/views/inc/footer.php" ?>