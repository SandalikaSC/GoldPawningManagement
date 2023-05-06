<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/LockerDetails.css'>
<!-- <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/article_pawn.css'> -->
<title>Vogue | Locker</title>
</head>

<body class="wrapper">

    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/VKDashboard/Reservations" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">Locker </h1>
            </div>
            <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
        </div>

    </div>
    <div class="content">
        <div class="nxt">
            <?php if (!empty($data['currentReservations'])) : ?>

                <a href="<?php echo URLROOT ?>/Reservations/releaseLocker/<?php echo $data['locker'] ?>">Release articles</a>

                <?php if ($data['extend'] == 1) : ?>

                    <a href="<?php echo URLROOT ?>/Reservations/extend/<?php echo $data['locker'] ?>">Extend Duration</a>

                <?php endif;
            endif ?>

        </div>
        <div class="page-nxt">

            <div class="locker-details">
                <div class="locker"><label for=""><?php echo "Locker " . $data['locker'] ?></label></div>
                <div class="locker-articles">

                    <?php
                    if (empty($data['currentReservations'])) : ?>

                        <label for="">Locker is empty</label>

                        <?php else :
                        foreach ($data['currentReservations'] as $reservation) : ?>
                            <div class="article">
                                <img src="<?php echo  $reservation->articleIMG ?>" alt="" class="article-pic">

                            </div>
                    <?php endforeach;
                    endif ?>
                </div>

            </div>


            <div class="res-details">
                <div class="card">
                    <h2>Customer Details</h2>
                    <?php
                    if (empty($data['currentReservations'])) : ?>
                        <label for="">Not allocated for a customer</label>


                    <?php else : ?>
                        <div class="details">
                            <label for="">Customer Id</label>
                            <label for=""><?php echo  $data['customer']->UserId ?></label>
                            <label for="">Customer Name</label>
                            <label for=""><?php echo  $data['customer']->First_Name . " " . $data['customer']->Last_Name ?></label>
                            <label for="">Phone Number</label>
                            <label for=""><?php echo  $data['customer']->phone ?></label>
                        </div>
                    <?php endif ?>


                </div>
                <div class="card">

                    <h2>Reservation</h2>
                    <?php
                    if (empty($data['currentReservations'])) : ?>
                        <!-- <div class="details"> -->
                        <label for="">No reservations</label>
                        <!-- </div> -->
                    <?php else :
                        // $interval = date_diff(date_create($data['currentReservations'][0]->Retrieve_Date), date_create());
                        // $date1 = $data['currentReservations'][0]->Retrieve_Date; // the date to check
                        // $current_date = date('Y-m-d'); // the current date
                        // $timeremain = $date1 < $current_date ? "Overdue" : $interval->format('%m months  %d days');
                        // $tag = $timeremain == "Overdue" ? "tag red" : "";



                    ?>
                        <div class="details">
                            <label for="">Reservation Date</label>
                            <label for=""><?php echo  date("Y M d", strtotime($data['currentReservations'][0]->Date)); ?></label>
                            <label for="">End Date</label>
                            <label for=""><?php echo  date("Y M d", strtotime($data['currentReservations'][0]->Retrieve_Date)); ?></label>
                            <label for="">Time remaining</label>
                            <label for="" class="<?php echo   $data['tag'] ?>"><?php echo $data['timeremain'] ?></label>
                            <label for="">Key Status</label>
                            <div><label for="" class="tag black"><?php if ($data['currentReservations'][0]->Key_Status == 1) {
                                                                        echo "Released";
                                                                    } elseif ($data['currentReservations'][0]->Key_Status == 0) {
                                                                        if ($data['delivery'][0]->Status = 1) {
                                                                            echo "Deliverd";
                                                                        } else {
                                                                            echo "Not Deliverd";
                                                                        }
                                                                    } ?></label></div>
                            <label for="">Key Released</label>
                            <div><label for="" class=""><?php echo  date("Y M d", strtotime($data['currentReservations'][0]->Key_released_Date)); ?></label></div>
                        </div>
                    <?php endif ?>



                </div>
                <div class="card last">
                    <h2>
                        <?= !empty($data['currentReservations'])?$data['customer']->UserId."'s ":"" ?>Payments for Locker <?= $data['locker'] ?></h2>
                    <div class="payments">
                        <div class="pay-header">
                            <label>Pay ID</label>
                            <label>Paid Date</label>
                            <label> Amount</label>
                            <label> Type</label>

                        </div>
                        <?php if (empty($data['currentReservations'])) : ?>
                            <!-- <div class="details"> -->
                            <label for="">No reservations</label>
                            <!-- </div> -->
                            <?php else :
                            foreach ($data['currentpayment'] as $payment) : ?>
                                <div class="payment-content">

                                    <label><?= $payment->PID ?></label>
                                    <label><?= $payment->pdate ?></label>
                                    <label> <?= "Rs " . $payment->Amount ?></label>
                                    <label> <?= $payment->Type ?></label>
                                </div>

                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>

            </div>

        </div>

        <div class="card">
            <h1>
                Reservation History</h1>
            <div class="payments">
                <div class="previous">
                    <label>Artricle</label>
                    <label>Customer ID</label>
                    <label> Name</label>
                    <label> Allocated</label>
                    <label> Retrieved</label>

                </div>
                <?php if (empty($data['previous_reservations'])) : ?>
                    <!-- <div class="details"> -->
                    <label for="">No reservations</label>
                    <!-- </div> -->
                    <?php else :
                    foreach ($data['previous_reservations'] as $reservation) : ?>
                        <div class="previous div-border">

                            <div class="pre-div ">
                                <img src="<?= $reservation->articleIMG ?>" alt="" class="pre-article">
                            </div>
                            <label><?= $reservation->UserID ?></label>
                            <label> <?= $reservation->First_Name . " " . $reservation->Last_Name ?></label>
                            <label> <?= date("Y-m-d", strtotime($reservation->Date)) ?></label>
                            <label> <?= $reservation->Retrieve_Date ?></label>
                        </div>

                <?php endforeach;
                endif; ?>
            </div>
        </div>


    </div>
    <?php require APPROOT . "/views/inc/footer.php" ?>