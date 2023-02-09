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
                            <label for="">Available Lockers</label>

                            <div class="info">
                                <img src="<?php echo URLROOT ?>/img/icons8-locker-64.png" alt="">
                                <label for="">15</label>
                            </div>
                        </div>
                        <div class="info-section">

                            <label for="">Today Allocation</label>
                            <div class="info">
                                <img src="<?php echo URLROOT ?>/img/icons8-lockers-64.png" alt="">
                                <label for="">05</label>
                            </div>
                        </div>
                        <div class="info-section">

                            <label for="">Today Appointments</label>
                            <div class="info">
                                <img src="<?php echo URLROOT ?>/img/icons8-appointment-64.png" alt="">
                                <label for="">11</label>
                            </div>
                        </div>
                    </div>
                    <div class="botton-section">
                        <h2>Validation Responses</h2>
                        <!-- <div class="header">
                            <label for="">Article</label>
                            <label for="">Estimate</label>
                            <label for="">Status</label>
                        </div> -->
                        <div class="validated-article">
                            <label for="">AR002</label>
                            <label for="">Rs. 25000</label>
                            <label class="tag validA" for="">Valid</label>
                            <div class="action">
                                <button class="cancel">cancel</button>
                                <a href="<?php echo URLROOT ?>/Reservations/AllocateLocker"><button class="Allocate">Allocate</button></a>
                            
                            </div>
                        </div>
                        <div class="validated-article">
                            <label for="">AR002</label>
                            <label for="">Rs. 25000</label>
                            <label class="tag invalidA" for="">Invalid</label>
                            <div class="action">
                                <button class="cancel">cancel</button>
                                <a href="<?php echo URLROOT ?>/Reservations/AllocateLocker"><button class="Allocate">Allocate</button></a>
                            
                            </div>
                        </div>
                        <div class="validated-article">
                            <label for="">AR002</label>
                            <label for="">Rs. 25000</label>
                            <label class="tag validA" for="">Valid</label>
                            <div class="action">
                                <button class="cancel">cancel</button>
                                <a href="<?php echo URLROOT ?>/Reservations/AllocateLocker"><button class="Allocate">Allocate</button></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="appo-info">
                    <a href="<?php echo URLROOT ?>/Reservations"><button class="allocate">+ New Allocation</button></a> 
                    <div class="app-list">
                        <h2> Today Appointments</h2>
                        <div class="appointment">

                            <label class="time" for="">9:00 - 9:15 A.M.</label>
                            <div class="appo-content">
                                <label for="">AP005</label>
                                <label for=""> Mr.Lankshan Gamage</label>
                                <button class="Allocate">Take</button>
                            </div>

                        </div>
                        <div class="appointment">

                            <label class="time" for="">9:00 - 9:15 A.M.</label>
                            <div class="appo-content">
                                <label for="">AP005</label>
                                <label for=""> Mr.Lankshan Gamage</label>
                                <button class="Allocate">Take</button>
                            </div>

                        </div>
                        <div class="appointment">

                            <label  class="time" for="">9:00 - 9:15 A.M.</label>
                            <div class="appo-content">
                                <label for="">AP005</label>
                                <label for=""> Mr.Lankshan Gamage</label>
                                <button class="Allocate">Take</button>
                            </div>

                        </div>
                        <div class="appointment">

                            <label class="time" for="">9:00 - 9:15 A.M.</label>
                            <div class="appo-content">
                                <label for="">AP005</label>
                                <label for=""> Mr.Lankshan Gamage</label>
                                <button class="Allocate">Take</button>
                            </div>

                        </div>
                        <div class="appointment">

                            <label class="time" for="">9:00 - 9:15 A.M.</label>
                            <div class="appo-content">
                                <label for="">AP005</label>
                                <label for=""> Mr.Lankshan Gamage</label>
                                <button class="Allocate">Take</button>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo URLROOT ?>/js/vksideMenu.js"></script>

    <?php require APPROOT . "/views/inc/footer.php" ?>