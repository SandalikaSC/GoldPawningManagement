<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/locker.css'>
<title>Vogue | My Locker</title>
</head>

<body>
    <div class="page">
        <?php require APPROOT . "/views/Customer/components/sideMenu.php" ?>
        <div class="right">
            <div class="right-heading">
                <div class="right-side">
                    <div class="bars" id="bars">
                        <img src="<?php echo URLROOT ?>/img/icons8-bars-48.png" alt="bars">
                    </div>
                    <h1 id="title">Locker</h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="locker-page">
                <?php foreach ($data['reservation'] as $reservation) : ?>


                    <a href="<?php echo URLROOT ?>/CustomerLocker/viewLockerArticle/<?= $reservation->Allocate_Id ?>" class="jewellery-card no-link-style ">
                        <div class="jewellery-img">
                            <div class="locker-no">
                                <h2 class="no"><?= str_pad($reservation->lockerNo, 2, '0', STR_PAD_LEFT) ?></h2>
                            </div>

                            <?php
                            $finfo = finfo_open();
                            $imageType = finfo_buffer($finfo, $reservation->image, FILEINFO_MIME_TYPE);
                            finfo_close($finfo);

                            ?>


                            <img src="<?php if (empty($reservation->image)) {
                                            echo URLROOT . "/img/harper-sunday-I89WziXZdVc-unsplash.jpg";
                                        } else {
                                            echo  "data:image/.'$imageType'.;charset=utf8;base64," . base64_encode($reservation->image);
                                        } ?>
                                    " alt="" class="jw-img">


                        </div>
                        <div class="jw-details">
                            <div class="jw-date">

                                <?php if ($reservation->Retrive_status !== 1) : ?>


                                    <?php $interval = date_diff(date_create($reservation->Retrieve_Date), date_create());
                                    $days_diff = $interval->days * ($interval->invert ? -1 : 1);

                                    ?>
                                    <div class="jw-date-name">
                                        <label>Reserved till</label>
                                        <label class="jw-dt"><?php echo date("d M Y", strtotime($reservation->Retrieve_Date)) ?></label>
                                    </div>
                                    <div class="jw-date-name">

                                        <label>Remaining</label>
                                        <label class="jw-dt">
                                            <?php echo ($days_diff < 0 ? -1 * $days_diff . " days"  : $days_diff . " days ago"); ?>

                                        </label>
                                    </div>
                                    <?php if ($days_diff > 0) : ?>
                                        <div class="jw-date-name">
                                            <label class="status tag-overdue">Overdue</label>
                                        </div>

                                    <?php endif; ?>
                                <?php else : ?>
                                    <div class="jw-date-name">
                                        <label>Reserved</label>
                                        <label class="jw-dt"><?php echo date("d M Y", strtotime($reservation->Date)) ?></label>
                                    </div>
                                    <div class="jw-date-name">
                                        <label>Retrieved </label>
                                        <label class="jw-dt"><?php echo date("d M Y", strtotime($reservation->Deallocated_Date)) ?></label>
                                    </div>


                                    <div class="jw-date-name">
                                        <label class="status tag-retrieved">Retrieved</label>
                                    </div>




                                <?php endif; ?>


                            </div>
                        </div>
                        <!-- <form action="<?php echo URLROOT ?>/CustomerLocker/viewLockerArticle" method="POST"> <button  class="v-btn">View</button>
                        </form> -->
                    </a>
                <?php endforeach; ?>
                <!-- <div class="jewellery-card">
                    <div class="jewellery-img">
                        <div class="locker-no">
                            <h2 class="no">08</h2>
                        </div>
                        <img class="jw-img" src="<?php echo URLROOT ?>/img/nati-melnychuk-oO0JAOJhquk-unsplash.jpg">
                    </div>
                    <div class="jw-details">
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Due Date</label>
                                <label class="jw-dt"><?php echo date("d M Y", strtotime("2023/10/05")) ?></label>
                            </div>

                        </div>
                        <div class="jw-date-name">

                            <label>Status</label>
                            <label class="status tag-overdue">Overdue</label>
                        </div>




                    </div>
                    <button class="v-btn">View</button>
                </div> -->



            </div>


        </div>

    </div>
    <script src="<?php echo URLROOT ?>/js/sideMenu.js"></script>

    <?php require APPROOT . "/views/inc/footer.php" ?>