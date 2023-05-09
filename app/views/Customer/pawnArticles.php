<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/pawnArticles.css'>
<title>Vogue | Pawn Articles</title>
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
                    <h1 id="title">Pawn Articles</h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="pawn-page">
                <?php foreach ($data['pawnings'] as $pawn) : ?>


                    <a href="<?php echo URLROOT ?>/CustomerPawn/viewPawnArticle/<?= $pawn->Pawn_Id ?>" class="jewellery-card">
                        <div class="jewellery-img">

                            <img class="jw-img" src="<?php if (!empty($pawn->image)) {
                                                            echo $pawn->image;
                                                        } else {
                                                            echo URLROOT . "/img/images.jpg";
                                                        } ?>" alt="">

                        </div>
                        <div class="jw-details">

                            <?php if ($pawn->updated_status == "Pawned" || $pawn->updated_status == "Overdue" || $pawn->updated_status == "Completed") : ?>
                                <div class="jw-date">
                                    <div class="jw-date-name">
                                        <label>Due Date</label>
                                        <label class="jw-dt"><?php echo date("d M Y", strtotime($pawn->End_Date)) ?></label>
                                    </div>

                                </div>
                            <?php elseif ($pawn->updated_status == "Auctioned") : ?>
                                <div class="jw-date">
                                    <div class="jw-date-name">
                                        <label>Auctioned Date</label>
                                        <label class="jw-dt"><?php echo date("d M Y", strtotime($pawn->auctioned_date)) ?></label>
                                    </div>

                                </div>
                            <?php elseif ($pawn->updated_status == "Retrieved") : ?>
                                <div class="jw-date">
                                    <div class="jw-date-name">
                                        <label>Retrieved Date</label>
                                        <label class="jw-dt"><?php echo date("d M Y", strtotime($pawn->Redeemed_Date)) ?></label>
                                    </div>

                                </div>

                            <?php endif; ?>
                            <div class="jw-date-name">

                                <label>Status</label>
                                <label class="status <?php 
                                
                                if ($pawn->updated_status == "Pawned") {
                                   echo "tag-pending";
                                } elseif($pawn->updated_status == "Completed") {
                                    echo "tag-completed";
                                }elseif($pawn->updated_status == "Auctioned") {
                                    echo "tag-auctioned";
                                }elseif($pawn->updated_status == "Overdue") {
                                    echo "tag-overdue";
                                }elseif($pawn->updated_status == "Retrieved") {
                                    echo "tag-retrieved";
                                }    
                                ?>"><?=$pawn->updated_status?></label>
                            </div>




                        </div>
                        <!-- <a href="<?php echo URLROOT ?>/CustomerPawn/viewPawnArticle/<?= $pawn->Pawn_Id ?>"> <button class="v-btn">View</button></a> -->

                    </a>


                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <script src="<?php echo URLROOT ?>/js/sideMenu.js"></script>

    <?php require APPROOT . "/views/inc/footer.php" ?>