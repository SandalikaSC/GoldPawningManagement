<?php require APPROOT."/views/inc/header.php"?>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/customerDash.css'> 
    <title>Vogue | DashBoard</title>
</head>
<body>
    <div class="page">
       <?php require APPROOT."/views/Customer/components/sideMenu.php"?>
        <div class="right">
            <div class="right-heading">
                <div class="right-side">
                    <div class="bars" id="bars">
                        <img src="<?php echo URLROOT ?>/img/icons8-bars-48.png" alt="bars">
                    </div>
                    <h1>Dashboard</h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="inside-page">
                <div class="gold-rates">
                    <div class="col1">
                        <div class="gold-rate-card">
                            <label for="">24K</label>
                            <p>Rs.24,000/=</p>
                        </div>
                        <div class="gold-rate-card">
                            <label for="">24K</label>
                            <p>Rs.24,000/=</p>
                        </div>
                    </div>
                    <div class="col2">
                        <div class="gold-rate-card">
                            <label for="">24K</label>
                            <p>Rs.24,000/=</p>
                        </div>
                        <div class="gold-rate-card">
                            <label for="">24K</label>
                            <p>Rs.24,000/=</p>
                        </div>
                    </div>
                    <div class="col3">
                        <div class="loan-interest">
                            <label for="">24%</label>
                            <p>Interest</p>
                        </div>
                    </div>
                </div>
                <div>
                    
                </div>
            </div>
        </div>
    </div>
    <?php require APPROOT."/views/inc/footer.php"?>