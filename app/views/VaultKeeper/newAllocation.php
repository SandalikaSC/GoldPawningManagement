<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/nav-bar.css'>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/newAllocation.css'>
<title>Vogue | New Allocation</title>
</head>

<body class="wrapper">

    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/VKDashboard/dashboard" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">New Allocation</h1>
            </div>
            <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
        </div>

    </div>
    <form class="content">

        <div class="cus-details">
            <h2>Customer Details</h2>
            <div class="info-section">
                <label for="">First Name</label>
                <input type="text" name="fname" id="">
            </div>
            <div class="info-section">
                <label for="">Last Name</label>
                <input type="text" name="fname" id="">
            </div>
            <div class="info-section">
                <label for="">Phone Number</label>
                <input type="text" name="fname" id="">
            </div>
            <div class="info-section">
                <label for="">Email</label>
                <input type="text" name="fname" id="">
            </div>
        </div>
        <div class="article-details">
            <h2>Article Details</h2>
            <div class="info-section">
                <label for="">Article type</label>
                <input type="text" name="fname" id="">
            </div>
            <div class="info-section">
                <label for="">Article Image</label>
                <input type="file" name="fname" id="">
            </div>
            <!-- <div class="info-section" > -->
            <a class="">
                <button class="btn">Validation</button></a>
             
            <!-- </div> -->
            
        </div>
        <div class="validation-img">
            <img src="<?php echo URLROOT ?>/img/Web search-cuate.svg" alt="">
        </div>
    </form>




    </div>
    <?php require APPROOT . "/views/inc/footer.php" ?>