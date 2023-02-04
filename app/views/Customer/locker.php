<?php require APPROOT."/views/inc/header.php"?>
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

            <div class="jewellery-card">
                    <div class="jewellery-img">
                        <img class="jw-img" src="<?php echo URLROOT ?>/img/imam-kurniawan-qoGdi3R3ekQ-unsplash.jpg">
                    </div>
                    <div class="jw-details">
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Due Date</label>
                                <label class="jw-dt"><?php echo date("d M Y", strtotime("2023/10/05"))?></label>
                            </div>

                        </div>
                        <div class="jw-date-name">

                            <label>Status</label>
                            <label class="status tag-auctioned">Auction</label>
                        </div>

                       
                        
                        
                    </div>
                    <button class="v-btn">View</button>
                </div>



            </div>
        </div>
    </div>
    <?php require APPROOT."/views/inc/footer.php"?>