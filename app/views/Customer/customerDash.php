<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/customerDash.css'>
<title>Vogue | DashBoard</title>
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
                    <h1 id="title">Dashboard</h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="inside-page">
                <div class="top">
                    <div class="col1">
                        <div class="gold-rate-card">
                            <label for="">24K</label>
                            <p>Rs.100,000/=</p>
                        </div>
                        <div class="gold-rate-card">
                            <label for="">22K</label>
                            <p>Rs.87,000/=</p>
                        </div>
                    </div>
                    <div class="col3">
                        <div class="loan-interest">
                            <label for="">27%</label>
                            <p>Interest</p>
                        </div>
                    </div>
                    <div class="col1">
                        <div class="gold-rate-card">
                            <label for="">21K</label>
                            <p>Rs.83,000/=</p>
                        </div>
                        <div class="gold-rate-card">
                            <label for="">20K</label>
                            <p>Rs.80,000/=</p>
                        </div>
                    </div>

                </div>
                <div class="bottom">
                    <div class="bottom-right">
                        <label class="quote"><i>We are friends in need <br> when
                                you’re in urgent financial difficulties indeed.</i></label>
                        <img src="<?php echo URLROOT ?>/img/Business solution-amico.png" alt="" class="dash-pic">
                    </div>
                    <div class="bottom-left">
                        <label class="appointment-title"><i>Up coming appointments</i></label>
                        <?php $i = 0;
                            if(empty($data['appointments'])):?>
                        <div class="no-app"><label>No Appointments</label></div>
                        <?php else:?>
                        <?php foreach ($data['appointments'] as $appointment):?>
                        <?php if($i<2) :?>
                        <?php ++$i?>
                        <div class="appointment">
                            <label> <?php echo $appointment->Appointment_Id ;?></label>
                            <label><?php echo $appointment->appointment_date;?></label>
                            <label> <?php echo $appointment->time ;?></label>
                            <label> <?php echo $appointment->reason ;?></label>

                        </div>
                        <?php endif ;?>
                        <?php endforeach ;?>
                        <?php endif ;?>


                    </div>

                </div>




            </div>
        </div> 
    </div>
    <script src="<?php echo URLROOT ?>/js/sideMenu.js"></script>

    <?php require APPROOT . "/views/inc/footer.php" ?>