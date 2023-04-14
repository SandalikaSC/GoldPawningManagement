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
                            <input type="radio" name="accept-offers" id="yes-button" class="hidden radio-label">
                            <label for="yes-button" class="button-label">
                                <h1>Yes</h1>
                            </label>
                            <input type="radio" name="accept-offers" id="no-button" class="hidden radio-label" checked>
                            <label for="no-button" class="button-label">
                                <h1>No</h1>
                            </label>
                        </div>



                    </div>
                </div>
            </div>
            <div class="details">
                <div class="info-div">
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
                            <label> </label>
                            <button type="button" name="date" id="date" class="btn-extend" value="Extend">Extend</button>
                        </div>

                    </div>
                     

                </div>
                <div class="info-div">
                    <h2 class="sub-title">
                       Retrive Appointment
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

                </div>
            </div>
            <div class="payment">
                <h2>
                    Payment Details
                </h2>
                <div class="sec">
                    <label for="Due">Due Pay</label>
                    <label class="Due-pay" for="Total">Rs. 1200.00</label>
                </div>
                <div class="sec">
                    <label for="Total">Total Pay</label>
                    <label class="Tot-pay" for="Total">Rs. 6200.00</label>
                </div>
                <div class=" sec-btn">
                    <a class="p-btn cancel">Cancel</button></a>
                    <a class="p-btn pay">Pay</button></a>
                </div>
            </div>

        </div>
        <?php require APPROOT . "/views/inc/footer.php" ?>