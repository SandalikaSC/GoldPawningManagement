<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/ReleaseLocker.css'>
<!-- <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/article_pawn.css'> -->
<title>Vogue | Release Locker</title>
</head>

<body class="wrapper">

    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/VKDashboard/Reservations" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">Release Locker </h1>
            </div>
            <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
        </div>

    </div>
    <div class="content">
        <form class="article-details">
            <h2>Ready for release</h2>
            <h4>Choose items</h4>
            <div class="item">
                <label for="">
                    Choose
                </label>
                <label for="">
                    Article
                </label>
                <label for="">
                    Locker
                </label>
                <label for="">
                    full payment
                </label>
                <label for="">
                    Paid Date
                </label>
                <label for="">
                    Status
                </label>

            </div>

            <div class="item">
                <div><input type="checkbox" id="1" name="vehicle1" value="Bike">
                    <label for="">
                        #0090
                    </label>
                </div>
                <div class="Img">
                    <img class="" src="<?php echo URLROOT ?>/img/nati-melnychuk-Ki7TPcA9204-unsplash.jpg" alt="logo">
                </div>
                <label for="">
                    01
                </label>
                <label for="">
                    Rs.15000
                </label>
                <label for="">
                    2022 Oct 05
                </label>
                <div><label class="tag-gold">
                        Approved
                    </label></div>

            </div>
            <div class="item">
                <div><input type="checkbox" id="1" name="vehicle1" value="Bike">
                    <label for="">
                        #0114
                    </label>
                </div>
                <div class="Img">
                    <img class="vogue" src="<?php echo URLROOT ?>/img/nati-melnychuk-oO0JAOJhquk-unsplash.jpg"
                        alt="logo">
                </div>
                <label for="">
                    08
                </label>
                <label for="">
                    Rs.10000
                </label>
                <label for="">
                    2022 Oct 05
                </label>
                <div><label class="tag-gold">
                        Approved
                    </label></div>
            </div>
        </form>
        <div class="flex-2">
            <div class="release-info">
            <h2>Release confirmation</h2> 
            <label for="empID"> Employee ID </label>
            <input type="text" name="empID" id="empID" value="<?=$_SESSION['user_id']?>" disabled>
            <label for="empID"> Date time</label>
            <input type="text" name="empID" id="empID" value="<?= date("Y-m-d H:i")?>" disabled>  
           <div class="btn-sec">
<a href=""><button class=" btn cancel">Cancel</button></a>
<a href=""><button class="btn  Release">Release</button></a>
           </div>

            </div>
           
        </div>

    </div>
    <?php require APPROOT . "/views/inc/footer.php" ?>