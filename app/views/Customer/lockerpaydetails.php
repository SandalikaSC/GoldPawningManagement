<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/CustomerPayment.css'>
<!-- <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/article_pawn.css'> -->
<title>Vogue | Payment</title>
</head>

<body class="wrapper">

    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/CustomerLocker/viewLockerArticle/<?= $data['reservationId'] ?>" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">Make Payment </h1>
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
                        $imageType = finfo_buffer($finfo, $data['articleImg'], FILEINFO_MIME_TYPE);
                        finfo_close($finfo);

                        ?>
                        <img src="<?php if (empty($data['articleImg'])) {
                                        echo URLROOT . "/img/harper-sunday-I89WziXZdVc-unsplash.jpg";
                                    } else {
                                        echo  "data:image/.'$imageType'.;charset=utf8;base64," . base64_encode($data['articleImg']);
                                    } ?>
                                    " alt="" class="jw-img">
                        <!-- <img src="<?php echo URLROOT . "/img/harper-sunday-I89WziXZdVc-unsplash.jpg"; ?> " alt="" class="jw-img"> -->
                    </div>
                    <div class="info-div info-div-pay-info ">
                        <h2 class="sub-title">
                            Article Details
                        </h2>
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Reservation Id</label>
                                <label class="jw-dt"><?= $data['reservationId'] ?></label>
                            </div>

                        </div>
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Article Id</label>
                                <label class="jw-dt"><?= $data['articleId'] ?></label>
                            </div>

                        </div>
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Reserved interest</label>
                                <label class="jw-dt"><?= $data['interest']->Interest_Rate . '%' ?></label>
                            </div>

                        </div>
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Monthly installement</label>
                                <label class="jw-dt"><?= 'Rs. ' . $data['installement'] ?></label>
                            </div>

                        </div>

                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Fine Rate</label>
                                <label class="jw-dt"><?= 'Rs. ' . $data['fineRate']->Interest_Rate . ' per day' ?></label>
                            </div>

                        </div>
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Fine Paid till</label>
                                <label class="jw-dt"><?php echo $data['finePaidTill'] ?></label>
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

            <div class="info-div choise-div" id="extend">
                <h2 class="sub-title">
                    Extend Duration
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
            <div class="info-div choise-div" id="appointment">
                <h2 class="sub-title">
                    Retrive Appointment
                </h2>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Appointment Date</label>
                        <input type="date" name="date" id="appointment_date" class="datechooser" value="" onchange="handleDateSelection()">
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
                        <!-- <button type="button" name="date" id="addAppointment" class="btn-extend" value="Extend" onclick="updatefinePaymnet()">Add</button> -->
                    </div>

                </div>


            </div>

            <div class="payment">
                <h2>
                    Payment Details
                </h2>
                <div class="sec">
                    <label for="Due">Due Pay</label>
                    <label class="Due-pay" id="fine_pay" for="Total">
                        <?php
                        if (empty($data['finePaidTill'])) {
                            echo 'Rs.' . number_format($data['duedays'] * $data['fineRate']->Interest_Rate, 2);
                        } else {
                            $date1 = new DateTime('today');
                            $date2 = DateTime::createFromFormat('Y-m-d', $data['finePaidTill']);
                            $interval = $date2->diff($date1);
                            $fineAmount = $interval->days * $data['fineRate']->Interest_Rate;
                            echo 'Rs. ' . number_format($fineAmount, 2);
                        }
                        ?>
                    </label>
                </div>
                <div class="sec">
                    <label for="Total">Extend Pay</label>
                    <label class="Tot-pay" id="extend_pay" for="Total">Rs. 00.00</label>
                </div>
                <div class="sec">
                    <label for="Total">Total Pay</label>
                    <label class="Tot-pay" id="total_pay" for="Total"> <?php
                                                                        if (empty($data['finePaidTill'])) {
                                                                            echo 'Rs.' . number_format($data['duedays'] * $data['fineRate']->Interest_Rate, 2);
                                                                        } else {
                                                                            $date1 = new DateTime('today');
                                                                            $date2 = DateTime::createFromFormat('Y-m-d', $data['finePaidTill']);
                                                                            $interval = $date2->diff($date1);
                                                                            $fineAmount = $interval->days * $data['fineRate']->Interest_Rate;
                                                                            echo 'Rs. ' . number_format($fineAmount, 2);
                                                                        }
                                                                        ?> </label>
                </div>
                <div class=" sec-btn">
                    <a class="p-btn " href="">Cancel </a>
                    <button class="p-btn " id="btn" onclick="paymentGatway()">Pay</button>
                </div>
            </div>

        </div>
        <script src="<?php echo URLROOT ?>/js/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script>
            document.getElementById("btn").style.display = 'none';
            let extend = 0;
            var payment_status = false;
            let fine = <?php
                        if (empty($data['finePaidTill'])) {
                            echo number_format($data['duedays'] * $data['fineRate']->Interest_Rate, 2);
                        } else {
                            $date1 = new DateTime('today');
                            $date2 = DateTime::createFromFormat('Y-m-d', $data['finePaidTill']);
                            $interval = $date2->diff($date1);
                            $fineAmount = $interval->days * $data['fineRate']->Interest_Rate;
                            echo number_format($fineAmount, 2);
                        }
                        ?>;
            let paidfine = <?php
                            if (empty($data['finePaidTill'])) {
                                echo 0;
                            } else {
                                $date1 = new DateTime('today');
                                $date2 = DateTime::createFromFormat('Y-m-d', $data['finePaidTill']);
                                $interval = $date2->diff($date1);
                                $fineAmount = $interval->days * $data['fineRate']->Interest_Rate;
                                echo number_format($fineAmount, 2);
                            }
                            ?>;
            var total = document.getElementById("total_pay").textContent.trim();

            var today = new Date();
            var tomorrow = new Date(today.getTime() + (24 * 60 * 60 * 1000));
            var year = tomorrow.getFullYear();
            var month = (tomorrow.getMonth() + 1).toString().padStart(2, "0");
            var day = tomorrow.getDate().toString().padStart(2, "0");
            var tomorrowFormatted = year + "-" + month + "-" + day;

            document.getElementById("appointment_date").value = tomorrowFormatted;

            const yes = document.getElementById("yes-button");
            const no = document.getElementById("no-button");


            document.getElementById("extend").classList.add("disabledbutton");
            yes.addEventListener("click", function(event) {
                document.getElementById("btn").style.display = 'none';
                document.getElementById("extend").classList.add("flexbutton");
                document.getElementById("extend").classList.remove("disabledbutton");
                document.getElementById("appointment").classList.add("disabledbutton");
                document.getElementById("appointment").classList.remove("flexbutton");
            });

            no.addEventListener("click", function(event) {
                document.getElementById("btn").style.display = 'none';
                document.getElementById("appointment").classList.add("flexbutton");
                document.getElementById("appointment").classList.remove("disabledbutton");
                document.getElementById("extend").classList.add("disabledbutton");
                document.getElementById("extend").classList.remove("flexbutton");
            });

            function checkDate() {
                document.getElementById("appointment-err").textContent = "";
                document.getElementById("extend-err").textContent = "";
                document.getElementById("btn").style.display = 'none';
                var selectedDate = document.getElementById("extenddate").value;
                selectedDate = new Date(selectedDate);
                const currentDate = new Date();

                // Compare the two dates
                if (selectedDate <= currentDate) {
                    document.getElementById("extend-err").textContent = "Invalid Date selected";
                    document.getElementById("extend-payment-box").textContent = "Rs . 00.00";
                    document.getElementById("fine_pay").textContent = "Rs .00.00";
                    document.getElementById("total_pay").textContent = "Rs .00.00";
                    document.getElementById("extend_pay").textContent = "Rs .00.00";
                } else {

                    document.getElementById("extend-err").textContent = "";
                    // document.getElementById("btnExtend").disabled = false;
                    var retrieve = '<?= $data['retrieve_Date'] ?>';
                    var result = getMonthsAndDays(retrieve, selectedDate);
                    extend = result.months * <?= $data['installement'] ?> + <?= $data['installement'] / 30.44 ?> * result.days;
                    document.getElementById("extend-payment-box").textContent = "Rs ." + extend.toFixed(2);
                    fine = 0;
                    total = fine + extend;
                    document.getElementById("fine_pay").textContent = "Rs ." + fine.toFixed(2);
                    document.getElementById("total_pay").textContent = "Rs ." + total.toFixed(2);
                    document.getElementById("extend_pay").textContent = "Rs ." + extend.toFixed(2);
                    document.getElementById("btn").style.display = 'flex';

                }

            }

            function handleDateSelection() {
                document.getElementById("appointment-err").textContent = "";
                document.getElementById("extend-err").textContent = "";
                var selectedDate = document.getElementById("appointment_date").value;
                selectedDate = new Date(selectedDate);
                const currentDate = new Date();

                // Compare the two dates
                if (selectedDate <= currentDate) {
                    var parentElement = document.getElementById("time-slots");
                    while (parentElement.firstChild) {
                        parentElement.removeChild(parentElement.firstChild);
                    }
                    document.getElementById("appointment-err").textContent = "Invalid Date selected";
                    document.getElementById("btn").style.display = 'none';
                    document.getElementById("fine_pay").textContent = "Rs .00.00";
                    document.getElementById("total_pay").textContent = "Rs .00.00";
                    document.getElementById("extend_pay").textContent = "Rs .00.00";
                } else {
                    updatefinePaymnet();
                    document.getElementById("appointment-err").textContent = "";
                    document.getElementById("btn").style.display = 'flex';
                    $.ajax({
                        type: "POST",
                        url: "<?= URLROOT ?>/CustomerLocker/getTimeSlots",
                        data: {
                            date: selectedDate
                        },
                        dataType: "JSON",
                        success: function(response) {
                            var parentElement = document.getElementById("time-slots");
                            while (parentElement.firstChild) {
                                parentElement.removeChild(parentElement.firstChild);
                            }
                            response.forEach(function(item) {

                                var newElement = '<div class="selector-item">' +
                                    '<input type="radio" value="' + item.slotID + ' "id="' + item.slotID + '" name="selector" class="selector-item_radio" checked>' +
                                    '<label  for="' + item.slotID + '" class="selector-item_label">' + item.time + '</label>' +
                                    '</div>';
                                $("#time-slots").append(newElement);
                            });


                        },
                        error: function(xhr, status, error) {
                            console.log("Error: " + error);
                        }
                    });
                }


            }

            function updatefinePaymnet() {
                var selectedDate = document.getElementById("appointment_date").value;
                var today = new Date();

                // create a Date object for a specific date
                var otherDate = new Date(selectedDate);

                // calculate the difference in milliseconds
                var differenceMs = otherDate.getTime() - today.getTime();

                // convert the difference to days
                var differenceDays = Math.ceil(differenceMs / (1000 * 60 * 60 * 24));


                fine = (differenceDays + <?= $data['duedays'] ?>) * <?= $data['fineRate']->Interest_Rate ?> - paidfine;
                extend = 0;


                total = fine + extend;



                document.getElementById("fine_pay").textContent = "Rs ." + fine.toFixed(2);
                document.getElementById("total_pay").textContent = "Rs ." + total.toFixed(2);
                document.getElementById("extend_pay").textContent = "Rs ." + extend.toFixed(2);

            }

            // function updateExtendPaymnet() {
            //     var selectedDate = document.getElementById("extenddate").value;
            //     var retrieve = '<?= $data['retrieve_Date'] ?>';

            //     var result = getMonthsAndDays(retrieve, selectedDate);
            //     extend = result.months * <?= $data['installement'] ?> + <?= $data['installement'] / 30.44 ?> * result.days;
            //     fine = 0;
            //     total = fine + extend;
            //     document.getElementById("fine_pay").textContent = "Rs ." + fine.toFixed(2);
            //     document.getElementById("total_pay").textContent = "Rs ." + total.toFixed(2);
            //     document.getElementById("extend_pay").textContent = "Rs ." + extend.toFixed(2);

            // }

            function getMonthsAndDays(start, end) {
                const date1 = new Date(start);
                const date2 = new Date(end);

                // Get the number of milliseconds between the two dates
                const diffInMs = Math.abs(date2 - date1);

                // Convert milliseconds to months and remaining days
                const months = Math.floor(diffInMs / (1000 * 60 * 60 * 24 * 30.44));
                const days = Math.floor(Math.floor(diffInMs / (1000 * 60 * 60 * 24)) % 30.44);
                // Return the result as an object
                return {
                    months,
                    days
                };
            }
            // payment



            async function paymentGatway() {
                payment_status = false;
                var extenddate;
                var appointment;
                let appointment_id;
                let allocate_Id = <?= $data['reservationId'] ?>;


                const selected = document.querySelector('input[name="accept-offers"]:checked').value;
                if (selected == 2) {
                    extenddate = null;
                    var appointment_date = document.getElementById("appointment_date").value;
                    const slotId = document.querySelector('input[name="selector"]:checked').value;
                    appointment = {
                        appointment_Date: appointment_date,
                        slot_Id: slotId
                    };
                } else {
                    appointment = null;
                    payment_status = true;
                    extenddate = document.getElementById("extenddate").value;

                }

                if (selected == 2) {
                    await $.ajax({
                        type: "GET",
                        url: "<?= URLROOT ?>/PaymentGateway/addAppointment",
                        data: {
                            appointment: appointment
                        },
                        dataType: "JSON",
                        success: function(response) {
                            if (response != false) {
                                appointment_id = response; // assign appointment_id value
                                payment_status = true;

                            } else {
                                document.getElementById("appointment-err").textContent = "Appointment Date and time is not available";
                                payment_status = false;
                                document.getElementById("btn").style.display = 'none';

                            }

                        },
                        error: function(xhr, status, error) {
                            console.log("Error: " + error);
                        }
                    });
                }
                // alert(payment_status);

                if (payment_status) {
                    var xhr = new XMLHttpRequest(); // create a new XMLHttpRequest object 
                    xhr.onreadystatechange = function() { // set the callback function
                        if (xhr.readyState == 4) {
                            // handle the response

                            var obj = xhr.responseText;

                            object = JSON.parse(obj);
                            var payment = {
                                amount: object['amount'],
                                order_id: object['order_id']
                            };

                            // Payment completed.It can be a successful failure.
                            payhere.onCompleted = function onCompleted(orderId) {
                                //    alert("Payment completed. OrderID:" + object["order_id"]);
                                // Note: validate the payment and show success or failure page to the customer
                                saveDetails(payment, extenddate, appointment, allocate_Id);
                            };

                            // Payment window closed
                            payhere.onDismissed = function onDismissed() {
                                // Note: Prompt user to pay again or show an error page
                                // alert("Payment dismissed");
                                DeleteAppointment(appointment_id);
                            };

                            // Error occurred
                            payhere.onError = function onError(error) {
                                // Note: show an error page
                                DeleteAppointment(appointment_id);
                            };

                            // Put the payment variables here
                            var payment = {
                                "sandbox": true,
                                "merchant_id": object['merchant_id'], // Replace your Merchant ID
                                "return_url": "<?= URLROOT ?>/CustomerLocker/viewLockerPay/<?= $data['reservationId'] ?>", // Important
                                "cancel_url": "<?= URLROOT ?>/CustomerLocker/viewLockerPay/<?= $data['reservationId'] ?>", // Important
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

                    xhr.open("POST", "<?= URLROOT ?>/PaymentGateway/pay/<?= $data['reservationId'] ?>/" + total, true); // set the request method and URL
                    xhr.send();

                }
            }

            function saveDetails(payment, extenddate, appointment, allocate_Id) {
                $.ajax({
                    type: "GET",
                    url: "<?= URLROOT ?>/PaymentGateway/AddDetails",
                    data: {
                        payment: payment,
                        appointment: appointment,
                        extend: extenddate,
                        allocate_Id: allocate_Id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        // alert('<?= URLROOT ?> / CustomerLocker / viewLockerArticle / ' + response);

                        window.location = '<?= URLROOT ?>/CustomerLocker/viewLockerArticle/' + response;
                    }
                });


                // 
            }

            function DeleteAppointment(appointment) {


                $.ajax({
                    type: "GET",
                    url: "<?= URLROOT ?>/PaymentGateway/deleteAppointment",
                    data: {
                        appointment: appointment
                    },
                    dataType: "JSON"
                });


            }
        </script>
        <?php require APPROOT . "/views/inc/footer.php" ?>