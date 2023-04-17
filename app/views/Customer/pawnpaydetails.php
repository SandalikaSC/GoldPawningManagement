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
                        <input type="date" name="date" id="date" class="datechooser" value="">
                    </div>

                </div>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Extend payment</label>
                        <label class="jw-dt"><?= $data['reservationId'] ?></label>
                    </div>

                </div>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label class="err" id=extend-err"> fefew</label>
                        <button type="button" name="date" id="date" class="btn-extend" value="Extend">Extend</button>
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
                        <label class="err" id=extend-err"> </label>
                        <button type="button" name="date" id="date" class="btn-extend" value="Extend" onclick="updatePaymnet()">Add</button>
                    </div>

                </div>


            </div>

            <div class="payment">
                <h2>
                    Payment Details
                </h2>
                <div class="sec">
                    <label for="Due">Due Pay</label>
                    <label class="Due-pay" id="fine_pay" for="Total"> Rs. <?= number_format($data['duedays'] * $data['fineRate']->Interest_Rate, 2); ?></label>
                </div>
                <div class="sec">
                    <label for="Total">Extend Pay</label>
                    <label class="Tot-pay" id="extend_pay" for="Total">Rs. 00.00</label>
                </div>
                <div class="sec">
                    <label for="Total">Total Pay</label>
                    <label class="Tot-pay"  id="total_pay" for="Total">Rs. 6200.00</label>
                </div>
                <div class=" sec-btn">
                    <a class="p-btn ">Cancel</button></a>
                    <a class="p-btn ">Pay</button></a>
                </div>
            </div>

        </div>
        <script src="<?php echo URLROOT ?>/js/jquery.min.js"></script>
        <script>
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
                document.getElementById("extend").classList.add("flexbutton");
                document.getElementById("extend").classList.remove("disabledbutton");
                document.getElementById("appointment").classList.add("disabledbutton");
                document.getElementById("appointment").classList.remove("flexbutton");
            });

            no.addEventListener("click", function(event) {
                document.getElementById("appointment").classList.add("flexbutton");
                document.getElementById("appointment").classList.remove("disabledbutton");
                document.getElementById("extend").classList.add("disabledbutton");
                document.getElementById("extend").classList.remove("flexbutton");
            });


            function handleDateSelection() {

                var selectedDate = document.getElementById("appointment_date").value;

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

            function updatePaymnet() {
                var selectedDate = document.getElementById("appointment_date").value;
                var today = new Date();

                // create a Date object for a specific date
                var otherDate = new Date(selectedDate);

                // calculate the difference in milliseconds
                var differenceMs = otherDate.getTime() - today.getTime();

                // convert the difference to days
                var differenceDays = Math.ceil(differenceMs / (1000 * 60 * 60 * 24));


                

            }
        </script>
        <?php require APPROOT . "/views/inc/footer.php" ?>