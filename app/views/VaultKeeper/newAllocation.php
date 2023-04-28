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
        <div class="validation-img">
            <div class="search-container" method="post" action="<?php echo URLROOT ?>/LockerValidation/getCustomer">
                <input type="text" name="" id="search" placeholder="Enter CustomerId or NIC">
                <button  class="search-icon" id="searchbtn"></button>
            </div>
            <img src="<?php echo URLROOT ?>/img/Web search-cuate.svg" alt="">
        </div>
        <div class="cus-details">
            <h2>Customer Details</h2>
            <div class="info-section">
                <label for="id">Customer Id</label>
                <input type="text" name="id" id="id" readonly>
            </div>
            <div class="info-section">
                <label for="fname">Name</label>
                <input type="text" name="fname" id="fname" readonly>
            </div>
            <div class="info-section">
                <label for="Phone">Phone Number</label>
                <input type="text" name="Phone" id="Phone" readonly>
            </div>
            <div class="info-section">
                <label for="NIC">NIC</label>
                <input type="text" name="NIC" id="NIC" readonly>
            </div>
        </div>
        <div class="article-details">
            <h2>Article Details</h2>
            <div class="info-section">
                <label for="">Article type</label>
                <select name="article_type">
                    <option value="option1" selected>Ring</option>
                    <option value="option2">Necklace</option>
                    <option value="option3">Earing</option>
                    <option value="option4">Gold Bar</option>
                    <option value="option5">Biscuit</option>
                    <option value="option6">Bracelet</option>
                    <option value="option7">Anklet</option>
                    <option value="option8">Brooche</option>

                </select>
            </div>
            <div class="info-section">
                <label for="img">Article Image</label>
                <input type="file" name="img" id="img">
            </div>
            <!-- <div class="info-section" > -->
            <a href="" id="validation_btn" class="btn">Validation</a>

            <!-- </div> -->

        </div>

    </form>




    </div>
    <script src='<?php echo URLROOT ?>/js/Vk_newallocation.js'></script>
    <?php require APPROOT . "/views/inc/footer.php" ?>