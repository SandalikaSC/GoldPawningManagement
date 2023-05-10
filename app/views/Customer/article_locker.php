<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/article_locker.css'>
<title>Vogue | Locker Article</title>
</head>

<body class="wrapper">
    <?php notification("extend");
    notification("appointment"); ?>
    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/CustomerLocker" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">Locker 1</h1>
            </div>
            <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
        </div>

    </div>
    <div class="content">
        <div class="nxt">
            <?php if (!empty($data['currentReservations'])) : ?> 

                <?php if ($data['extend'] == 1) : ?>

                    <a href="<?php echo URLROOT ?>/CustomerLocker/viewExtend/<?php echo $data['locker'] ?>">Extend Duration</a>

            <?php endif;
            endif ?>

        </div>
        <div class="nxt-page">
            <div class="locker-item">
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
                <div class="card">

                    <h2>Reservation</h2>
                    <?php
                    if (empty($data['currentReservations'])) : ?>

                        <label for="">No reservations</label>

                    <?php else :  ?>
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
            </div>

            <div class="history-card">
                <h2 class="sub-title">
                    Payment History </h2>

                <div class="tble-row">
                    <label>Pay ID</label>
                    <label>Paid Date</label>
                    <label> Amount</label>
                    <label> Type</label>

                </div>
                <?php foreach ($data['currentpayment'] as $paymnet) : ?>
                    <div class="tble-row ">
                        <label><?= $paymnet->PID ?></label>
                        <label><?= date("Y-m-d", strtotime($paymnet->Date)) ?></label>
                        <label><?= 'Rs. ' . $paymnet->Amount ?></label>
                        <label><?= trim($paymnet->Type) ?></label>

                    </div>
                <?php endforeach; ?>

            </div>
            <!-- <div class="payments his-div">
                <h2 class="sub-title">
                    Payment History </h2>
                <div class="payments">
                    <div class="pay-header">
                        <label>Pay ID</label>
                        <label>Paid Date</label>
                        <label> Amount</label>
                        <label> Type</label>

                    </div>
                    <?php foreach ($data['currentpayment'] as $paymnet) : ?>
                        <div class="payment-content">
                            <label><?= $paymnet->PID ?></label>
                            <label><?= date("Y-m-d", strtotime($paymnet->Date)) ?></label>
                            <label><?= 'Rs. ' . $paymnet->Amount ?></label>
                            <label><?= trim($paymnet->Type) ?></label>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div> -->


        </div>
        <div class="card">
            <h1 class="div-border">
                Reservation History</h1>
            <div class="payments">
                <div class="previous">
                    <label>Artricle</label>
                    <label>Reserve Id</label>
                    <label> Allocated</label>
                    <label> Retrieved</label> 
                    <label> Allocated By</label>

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
                            <label><?= $reservation->Allocate_Id ?></label>
                            <label> <?= date("Y-m-d", strtotime($reservation->Date)) ?></label>
                            <label> <?= $reservation->Deallocated_Date ?></label>
                            
                            <label> <?= $reservation->Keeper_Id?></label>
                        </div>

                <?php endforeach;
                endif; ?>
            </div>
        </div>


    </div>

    </div>

    <!-- </div> -->

    <script>

    </script>
    <?php require APPROOT . "/views/inc/footer.php" ?>