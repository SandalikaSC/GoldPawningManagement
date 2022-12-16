<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/appointment.css'>
<title>Vogue | Appointments</title>
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
                    <h1 id="title">Appointments</h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="inside-page">
                <div class="top">
                    <form class="form-search" action="">
                        <div class="date-div">
                            <label>From Date :</label>
                            <input class="date-input" type="date" placeholder="From Date" name="fromdate">
                        </div>
                        <div class="date-div">
                            <label>To Date :</label>
                            <input class="date-input" type="date" placeholder="To Date" name="todate">
                        </div>
                        <div class="div-search">
                            <input class="search-btn" value="Search" type="submit"> 
                        </div>


                    </form>
                    <div class="div-btn">
                        <a href="<?php echo URLROOT?>/appointments"><input  type="button" name="newAppointment"  class="add-new-btn" value="+ New Appointment"> </a>
                    </div>

                </div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
        </div>
    </div>
    <?php require APPROOT . "/views/inc/footer.php" ?>