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
                <?php flash('appointment'); ?>
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
                        <a href="<?php echo URLROOT ?>/appointments/AddAppointment"><input type="button"
                                name="newAppointment" class="add-new-btn" value="+ New Appointment"> </a>
                    </div>

                </div>
                <?php if(empty($data['appointments'])):?>
                <div class="no-app">No Appointments</div>
                <?php else:?>

                <table class="middle">
                    <tr class="col-names">
                        <th class="col-label">No</th>
                        <th class="col-label">Date</th>
                        <th class="col-label">Time</th>
                        <th class="col-label">Reason</th>
                        <th class="col-label">Status</th>
                        <th class="col-label"></th> 


                    </tr>
                    <tbody>

                        <?php foreach ($data['appointments'] as $appointment): ?>
                        <form action="" method="" class="">
                            <tr class="col-names appointment-content">
                                <td class="">
                                    <?php echo $appointment->Appointment_Id ?>
                                </td>
                                <td class="">
                                    <?php echo $appointment->appointment_date ?>
                                </td>
                                <td class="">
                                    <?php echo $appointment->time ?>
                                </td>
                                <td class="">
                                    <?php echo ucfirst($appointment->reason) ?>
                                </td>
                                <td class="<?php echo ($appointment->Status==1)? 'green':'red' ?>">
                                    <?php echo ($appointment->Status==1)?'Confirmed':'canceled' ?>
                                </td>
                                <td class=""><button class="cancel" name="cancel">Cancel</button></td>
                               

                            </tr>
                        </form>
                        <?php endforeach; ?>
                        <?php endif ;?>
                    </tbody>

                </table>
                <div class="bottom"></div>
            </div>
        </div>
    </div>
    <?php require APPROOT . "/views/inc/footer.php" ?>