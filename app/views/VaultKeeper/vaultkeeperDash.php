<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/vkdash.css'>
<title>Vogue | DashBoard</title>
</head>

<body>
    <div class="page">
        <?php require APPROOT . "/views/VaultKeeper/components/sideMenu.php";
        notification('VkDash');

        ?>
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
                                <label for=""><?php echo $data['lockers'] ?></label>
                            </div>
                        </div>
                        <div class="info-section">

                            <label for="">Today Allocation</label>
                            <div class="info">
                                <img src="<?php echo URLROOT ?>/img/icons8-lockers-64.png" alt="">
                                <label for=""><?php echo $data['todayAllocation'] ?></label>
                            </div>
                        </div>
                        <div class="info-section">

                            <label for="">Today Appointments</label>
                            <div class="info">
                                <img src="<?php echo URLROOT ?>/img/icons8-appointment-64.png" alt="">
                                <label for=""><?= $data['countAppointment'] ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="botton-section">
                        <h2>Validation Responses</h2>
                        <?php if (empty($data['validations'])) : ?>
                            <div class="centerLbl">
                                <label class="">No Validated Articles</label>
                            </div>
                            <?php else :?>
                               

                            <?php foreach ($data['validations'] as $validation) : ?>
                                <div class="validated-article">
                                    <label for=""><?php echo $validation->customer ?></label>
                                    <label for=""><?php echo $validation->gold_appraiser ?></label>
                                    <label for=""><?php echo $validation->pawn_officer_or_vault_keeper ?></label>

                                    <div class="action">
                                        <a class="Allocate" href="<?php echo URLROOT ?>/Reservations/AllocateLocker/<?php echo $validation->id ?>">View </a>

                                    </div>
                                </div>

                        <?php
                            endforeach;
                        endif; ?>




                    </div>

                </div>
                <div class="appo-info">
                    <form action="<?php echo URLROOT ?>/LockerValidation" method="post"><button type="submit" name="new_allocation" class="allocate">+ New Allocation</button></form>
                    <div class="app-list">
                        <h2> Today Appointments</h2>
                        <?php if (empty($data['appointments'])) : ?>
                            <label for="">No appointments Today</label>
                        <?php else : ?>
                            <?php $id = 1; ?>
                            <?php foreach ($data['appointments'] as $appointment) : ?>
                                <form action="<?php echo URLROOT ?>/LockerValidation" method="Post" class="appointment">

                                    <label class="time" for=""><?= $appointment->time; ?></label>
                                    <div class="appo-content">
                                        <input type="text" name="appointment_id" readonly value="<?= $appointment->Appointment_Id; ?>" class="readonly"></input>
                                        <label for=""> <?= $appointment->First_Name . " " . $appointment->Last_Name; ?></label>
                                        <button type="submit" name="appointment_allocation" class="Allocate">Take</button>
                                    </div>

                                </form>

                            <?php endforeach; ?>
                        <?php endif; ?>

                        <!-- <div class="appointment">

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

                        </div> -->

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo URLROOT ?>/js/vksideMenu.js"></script>

    <?php require APPROOT . "/views/inc/footer.php" ?>