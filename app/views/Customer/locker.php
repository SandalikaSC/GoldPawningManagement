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
                <?php 
                    
                foreach ($data['reservation'] as $reservation) : ?>


                    <a href="<?php echo URLROOT ?>/CustomerLocker/viewLockerArticle/<?= $reservation->lockerNo ?>" class="lockercard no-link-style ">

                        <div class="locker-no">
                            <h2 class=" "><?= "Locker ".str_pad($reservation->lockerNo, 2, '0', STR_PAD_LEFT) ?></h2>
                        </div>
                        <?php if ($reservation->Retrive_status==0):?>
                        <div class="sec">
                            <label for="">Allocated till</label>
                            <label for=""><?= date("Y M d",strtotime($reservation->Retrieve_Date))?></label>
                        </div>
                        <?php endif;?>
                        <div class="sec">
                            <label for="">Allocated</label>
                            <label for=""><?= date("Y M d",strtotime($reservation->Date))?></label>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>


        </div>

    </div>
    <script src="<?php echo URLROOT ?>/js/sideMenu.js"></script>

    <?php require APPROOT . "/views/inc/footer.php" ?>