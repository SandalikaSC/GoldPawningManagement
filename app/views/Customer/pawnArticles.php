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
                <div class="jewellery-card">
                    <div class="jewellery-img">
                        <img class="jw-img" src="<?php echo URLROOT ?>/img/images.jpg">
                    </div>
                    <div class="jw-details">
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Due Date</label>
                                <label class="jw-dt"><?php echo date("d M Y", strtotime("2024/01/03"))?></label>
                            </div>

                        </div>
                        <div class="jw-date-name">

                            <label>Status</label>
                            <label class="status tag-pending">Pending</label>
                        </div>

                         
                          
                         
                    </div>
                    <button class="v-btn">View</button>
                </div>
                <div class="jewellery-card">
                    <div class="jewellery-img">
                        <img class="jw-img" src="<?php echo URLROOT ?>/img/sabrianna-WAbhmJQbnCA-unsplash.jpg">
                    </div>
                    <div class="jw-details">
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Due Date</label>
                                <label class="jw-dt"><?php echo date("d M Y", strtotime("2023/12/03"))?></label>
                            </div>

                        </div>
                        <div class="jw-date-name">

                            <label>Status</label>
                            <label class="status tag-overdue">Overdue</label>
                        </div>

                       
                           
                    </div>
                    <button class="v-btn">View</button>
                        
                </div>
                
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
                <div class="jewellery-card">
                    <div class="jewellery-img">
                        <img class="jw-img" src="<?php echo URLROOT ?>/img/lum3n-esAis38NHT8-unsplash.jpg">
                    </div>
                    <div class="jw-details">
                        <div class="jw-date">
                            <div class="jw-date-name">
                                <label>Due Date</label>
                                <label class="jw-dt"><?php echo date("d M Y", strtotime("2023/11/03"))?></label>
                            </div>

                        </div>
                        <div class="jw-date-name">

                            <label>Status</label>
                            <label class="status tag-overdue">Overdue</label>
                        </div>

                       
                          
                        
                    </div>
                    <button class="v-btn">View</button>
                </div>
            </div>
        </div>
    </div>
        <?php require APPROOT . "/views/inc/footer.php" ?>