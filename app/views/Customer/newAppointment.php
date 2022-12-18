<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/appointment.css'>
<title>Vogue | Make Appointment</title>
</head>

<body class="wrapper">

    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/customerDashboard/appointment" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">Make Appointment</h1>
            </div>
            <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
        </div>

    </div>
    <div class="content">
        <form action="<?php echo URLROOT ?>/appointments/loadTimeSlots" method="POST" class="addForm">
            <label for="Reason" class="label">Reason</label>
            <div class="form-input">
                <!-- <input type="text" class="input"> -->
                <select name="reason" id="Reason" class="input">
                    <option class="input" value="1">Pawn Article</option>
                    <option class="input" value="2">Make payment</option>
                    <option class="input" value="3">Reserve Locker</option>
                    <option class="input" value="4">Renew pawning</option>
                    <option class="input" value="5">Retrieve article</option>

                </select>
                <span></span>
            </div>
            <label class="label">Choose Date</label>
            <div class="form-input ">
                <div class=" search-div">
                    <input type="date" name="date" class="input" value="<?php echo $data['date']; ?>">
                    <button name="search" class="search">Search</button>


                </div>
                <span></span>
            </div>
            <label class="label">Choose Time slot</label>
            <div class="form-input">
                <!-- <input type="text" class="input"> -->
                <?php
            foreach ($data['time_slots'] as $timeslot): ?>
                <div class=" selecotr-item">
                    <input type="radio" id=<?php echo $timeslot->slotID ?> name="selector" class="selector-item_radio"
                    checked>
                    <label for=<?php echo $timeslot->slotID ?> class="selector-item_label">
                        <?php echo $timeslot->time ?>
                    </label>
                </div>
                <?php endforeach; ?>

                <span></span>

            </div>
            <div></div>
            <!--          
            <a id="dashboard" class="cancel-btn" href="<?php echo URLROOT ?>/customerDashboard/appointment"> 
            Cancel
        </a>  -->
            <div>
                <input type="button" class="button submit" value="Submit">
            </div>

        </form>
        <div class="dbload">
            <img src="<?php echo URLROOT ?>/img/Calendar-amico.png" alt="" class="appointment">
        </div>
    </div>
    <?php require APPROOT . "/views/inc/footer.php" ?>