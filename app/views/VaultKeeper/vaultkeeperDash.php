<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/vkdash.css'>
<title>Vogue | DashBoard</title>
</head>

<body>
    <div class="page">
        <?php require APPROOT . "/views/VaultKeeper/components/sideMenu.php" ?>
        <div class="right">
            <div class="right-heading">
                <div class="right-side">
                    <div class="bars" id="bars">
                        <img src="<?php echo URLROOT ?>/img/icons8-bars-48.png" alt="bars">
                    </div>
                    <h1 id="title">Dashboard</h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="inside-page">
                <div class="dash-info">
                    <div class="top-section">
                        <div class="info-section">
                        <img src="<?php echo URLROOT ?>/img/locker-white.png" alt="">
                            <div class="info">
                                <label for="">Available Lockers</label>
                                <label for="">10</label>
                            </div>
                        </div>
                        <div class="info-section">
                            <img  class="icon"></img>
                            <div class="info">
                                <label for="">Available Lockers</label>
                                <label for="">10</label>
                            </div>
                        </div>
                        <div class="info-section">
                            <img  class="icon"></img>
                            <div class="info">
                                <label for="">Available Lockers</label>
                                <label for="">10</label>
                            </div>
                        </div>
                    </div>
                    <div class="botton-section">

                    </div>

                </div>
                <div class="appo-info"></div>
            </div>
        </div>
    </div>
    <script src="<?php echo URLROOT ?>/js/vksideMenu.js"></script>

    <?php require APPROOT . "/views/inc/footer.php" ?>