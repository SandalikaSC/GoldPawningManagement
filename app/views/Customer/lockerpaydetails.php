<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/CustomerPayment.css'>
<!-- <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/article_pawn.css'> -->
<title>Vogue | Payment</title>
</head>

<body class="wrapper">

    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/CustomerLocker/viewLockerArticle/<?= $data['lockerid'] ?>" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">Extend Duration </h1>
            </div>
            <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
        </div>

    </div>
    <div class="content">

        <div class="extend-info">


            <div class="info">
                <h2 class="sub-title">
                    <?= "Locker No. " . $data['currentReservations'][0]->lockerNo ?>
                </h2>



                <div class="sec">
                    <label>Number of Articles</label>
                    <label class="jw-dt" id=" "><?= $data['allocations'] ?></label>
                </div>


                <div class="sec">
                    <label>Allocated By</label>
                    <label class="jw-dt" id=" "><?= $data['currentReservations'][0]->Keeper_Id ?></label>
                </div>
                <div class="sec">
                    <label>OverDue By</label>
                    <label class="jw-dt" id=" "><?= $data['overdue'] . " Days" ?></label>
                </div>

                <div class="sec">
                    <label>Allocated Date</label>
                    <label class="jw-dt" id=" "><?= date("Y M d", strtotime($data['currentReservations'][0]->Date)); ?></label>
                </div>
                <div class="sec">
                    <label>Allocated till</label>
                    <label class="jw-dt" id=" "><?= date("Y M d", strtotime($data['currentReservations'][0]->Retrieve_Date)); ?></label>
                </div>



            </div>



            <div class="info " id="extend">
                <h2 class="sub-title">
                    Duration
                </h2>
                <?php if ($data['periodof6'] >= 0) : ?>
                    <div class="sec">
                        <label>Overdue 6 months Periods</label>
                        <label class=" " id="overdueperiods"><?= $data['periodof6'] . " periods" ?> </label>
                    </div>
                    <div class="sec">
                        <label>Due period payment</label>
                        <label class=" " id="overdue"> <?= "Rs " . $data['overduepay'] ?></label>
                    </div>
                <?php endif; ?>

                <div class="sec">
                    <label>Reserve period</label>
                    <select name="duration" class="datechooser" id="duration">
                        <option value="6" selected>06 Months</option>
                        <option value="12">12 Months</option>
                    </select>
                </div>
                <div class="sec">
                    <label>Extend to</label>
                    <label class=" " id="extendto"><?= $data['extendTo'] ?></label>
                </div>
                <div class="sec">
                    <label>Extend payment</label>
                    <label class=" " id="extendfee"><?= "Rs " . $data['allocationFee'] / 2 ?></label>
                </div>
                <?php if ($data['overdue'] > 0) : ?>

                    <div class="sec">
                        <span class="err">*Extend date calculate from Overdue 6 months Periods</span>

                    </div>
                <?php endif; ?>




            </div>

        </div>




        <div class="payment">
            <div class="sec">
                <h2>
                    Payment
                </h2>
                <h2 id="total">
                   
                </h2>
            </div>
            <div class=" sec-btn">
                <button class="p-btn " id="btn" onclick="paymentGatway()">Pay</button>
            </div>
        </div>



        <script src="<?php echo URLROOT ?>/js/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script>
            let fixedAllocatePay = parseFloat('<?= $data['allocationFee'] ?>');
            let Locker = <?= $data['lockerid'] ?>;

            let allocationpay = parseFloat('<?= $data['allocationFee'] / 2 ?>');;
            let overduepay = parseFloat('<?= $data['overduepay'] ?>');
            let total = allocationpay + overduepay;
            let finalExtend = '<?= $data['extendTo'] ?>';
                    
            //payment elements
            let lblExtendTo = document.getElementById('extendto');
            let lblextendfee = document.getElementById('extendfee');
            let lblAllocatefee = document.getElementById('allocatefee');
            let lblTotal = document.getElementById('total');
            lblTotal.textContent = "Rs " + total;

            let currentEnd = new Date('<?php echo $data['extendStart'];  ?>');

            const durationSelect = document.getElementById("duration");
            durationSelect.addEventListener("change", function() {
                months = parseInt(durationSelect.value);
                const outputDate = new Date(currentEnd.getFullYear(), currentEnd.getMonth() + months, currentEnd.getDate() + 1);
                finalExtend = outputDate.toISOString().slice(0, 10);
                lblExtendTo.textContent = finalExtend;
                if (months == 6) {

                    total = fixedAllocatePay / 2 + overduepay;
                    lblextendfee.textContent = "Rs " + fixedAllocatePay / 2;
                } else {
                    total = fixedAllocatePay + overduepay;
                    lblextendfee.textContent = "Rs " + fixedAllocatePay;
                }
                lblTotal.textContent = "Rs " + total;

            });




            function paymentGatway() {

                // console.log(finalExtend);
                var xhr = new XMLHttpRequest(); // create a new XMLHttpRequest object 
                xhr.onreadystatechange = function() { // set the callback function
                    if (xhr.readyState == 4) {
                        // handle the response

                        var obj = xhr.responseText;

                        object = JSON.parse(obj);
                        // var payment = {
                        //     amount: object['amount'],
                        //     order_id: object['order_id']
                        // };

                        // Payment completed.It can be a successful failure.
                        payhere.onCompleted = function onCompleted(orderId) {
                            //    alert("Payment completed. OrderID:" + object["order_id"]);
                            // Note: validate the payment and show success or failure page to the customer
                            saveDetails(total, finalExtend, Locker,object['order_id']);
                            // alert("complete");
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
                            "return_url": " <?php echo URLROOT ?>/CustomerLocker/viewExtend/ <?= $data['lockerid']  ?>", // Important
                            "cancel_url": " <?php echo URLROOT ?>/CustomerLocker/viewExtend/<?= $data['lockerid'] ?>", // Important
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

                xhr.open("POST", "  <?= URLROOT ?>/PaymentGateway/pay/ <?= $data['lockerid'] ?>/" + total, true); // set the request method and URL
                xhr.send();

            }


            function saveDetails(payment, extenddate, locker,orderid) { 
                $.ajax({
                    type: "GET",
                    url: "  <?=URLROOT ?>/PaymentGateway/AddDetails",
                    data: {
                        payment: payment, 
                        extend: extenddate,
                        orderid: orderid,
                        locker: locker
                    },
                    dataType: "JSON",
                    success: function(response) {
                        // alert('  URLROOT ?> / CustomerLocker / viewLockerArticle / ' + response);
                        
                        window.location = ' <?=URLROOT ?>/CustomerLocker/viewLockerArticle/' + response;
                    }
                });
 

                // 
            }
        </script>
        <?php require APPROOT . "/views/inc/footer.php" ?>