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
                    <h1 id="title">Dashboard</h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div> 
            
        </div>
    </div>
    <?php require APPROOT."/views/inc/footer.php"?>