<?php require APPROOT . "/views/inc/header.php" ?>

<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/allocateLocker.css'>

<!-- <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/article_pawn.css'> -->
<title>Vogue | Allocate</title>
</head>

<body class="wrapper">

    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/VKDashboard/" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">Allocate Locker </h1>
            </div>
            <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
        </div>

    </div>
    <div class="content">
        <div class="item-details">
            <!-- <div class="article-details"> -->
            <div class="info-div">
                <h2 class="sub-title">
                    Customer Details
                </h2>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Customer Id</label>
                        <label class="jw-dt"><?= $data['customer']->UserId ?></label>
                    </div>

                </div>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Customer Name</label>
                        <label class="jw-dt"><?= $data['customer']->First_Name . " " . $data['customer']->Last_Name ?></label>
                    </div>

                </div>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>NIC</label>
                        <label class="jw-dt"><?= $data['customer']->NIC ?></label>
                    </div>

                </div>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Phone</label>
                        <label class="jw-dt"><?= $data['customer']->phone ?></label>
                    </div>

                </div>



            </div>



            <!-- </div> -->

        </div>
        <div class="item-payments">

            <div class="payments his-div">
                <h2 class="sub-title">
                    Invalid Articles </h2>
                <?php
                if (empty($data['invalidArticles'])) : ?>
                    <div class=" article_display">
                        <label>No Invalid Articles</label>
                    </div>

                <?php else : ?>
                    <div class=" article_display title">

                        <label>Article</label>
                        <label>Type</label>

                    </div>
                    <?php foreach ($data['invalidArticles'] as $article) : ?>
                        <div class=" article_display">

                            <div class="jewellery-img">


                                <img class="jw-img" src="<?php if (!empty($article->image)) {
                                                                echo $article->image;
                                                            } else {
                                                                echo URLROOT . "/img/images.jpg";
                                                            } ?>" alt="">

                            </div>
                            <label><?= $article->article_type ?></label>

                        </div>
                <?php endforeach;
                endif; ?>
            </div>


        </div>
    </div>
    <?php if (!empty($data['validArticles'])) : ?>
        <div class="row info-div">
            <h2 class="topic">
                Allocation information
            </h2>
            <h3 class="">
                Available Lockers of <?= $data['customer']->UserId ?>
            </h3>
            <?php if (empty($data['CustomerLockers'])) : ?>

                <label>Not Available</label>
            <?php else : ?>
                <div class="Locker_Allocation jw-dt">
                  
                    <label>Article</label>
                    <label>Type</label>
                    <label>Estimate Value</label>
                    <label>Karatage</label>
                    <label>Weight</label>
                    <label>Locker</label>

                </div>
                <div class="Locker_Allocation">
                  

                    <div class="jewellery-img">
                        <img class="jw-img" src="<?php if (!empty($data['AllocateMy']->image)) {
                                                        echo $data['AllocateMy']->image;
                                                    } else {
                                                        echo URLROOT . "/img/images.jpg";
                                                    } ?>" alt="">
                    </div>

                    <label><?= $data['AllocateMy']->article_type ?></label>
                    <label> <?= $data['AllocateMy']->estimated_value ?></label>
                    <label><?= $data['AllocateMy']->karatage . "K" ?></label>
                    <label><?= $data['AllocateMy']->weight . "g" ?></label>
                    <label class="locker_no"><?= $data['CustomerLockers']->lockerNo ?></label>

                </div>

            <?php endif; ?>
            <h3 class="">
                Other Lockers
            </h3>
            <?php if (empty($data['AvailableLockers'])) : ?>

                <label>Not Available</label>
            <?php else : ?>
                 
                <div class="Locker_Allocation">
                  // foreach

                    <div class="jewellery-img">
                        <img class="jw-img" src="<?php if (!empty($data['validArticles']->image)) {
                                                        echo $data['validArticles']->image;
                                                    } else {
                                                        echo URLROOT . "/img/images.jpg";
                                                    } ?>" alt="">
                    </div>

                    <label><?= $data['validArticles']->article_type ?></label>
                    <label> <?= $data['validArticles']->estimated_value ?></label>
                    <label><?= $data['validArticles']->karatage . "K" ?></label>
                    <label><?= $data['validArticles']->weight . "g" ?></label>
                    <label class="locker_no"><?= $data['CustomerLockers']->lockerNo ?></label>

                </div>

            <?php endif; ?>

        </div>
    <?php endif; ?>
    <div class="row info-div">
        <h2 class="topic">
            Payment
        </h2>
    </div>
    <?php require APPROOT . "/views/inc/footer.php" ?>