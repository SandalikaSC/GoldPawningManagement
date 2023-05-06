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
        
        <div class="article-details">
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
                    Allocated
                </label>

            </div>
            <?php $i = 1;
            foreach ($data['currentReservations'] as $reservation) : ?>
                <div class="item">
                    <div>
                        <input type="checkbox" id="<?php echo $i ?>" name="article" value=" <?php echo $reservation->Allocate_Id ?>" class="check">
                        <label for="<?php echo $i++ ?>" id="">
                            <?php echo $reservation->Allocate_Id ?>
                        </label>
                    </div>
                    <div class="Img">
                        <img class="" src="<?php echo $reservation->articleIMG ?>" alt="logo">
                    </div>

                    <label for="">
                        <?php echo date("Y M d", strtotime($reservation->Date)) ?>
                    </label>

                    <!-- <div><label class="tag-gold">
                        Approved
                    </label></div> -->

                </div>

            <?php endforeach; ?>

        </div>
        <div class="flex-2">
        <div class="msg" id="msg">
           No article selected for release
        </div>
            <div class="release-info">
                <h2>Release Information</h2>
                <label for="empID"> To be released </label>
                <input type="text" name="empID" id="empID" value="<?php echo $data['currentReservations'][0]->Retrieve_Date ?>" disabled>
                <label for="empID"> Employee ID </label>
                <input type="text" name="empID" id="empID" value="<?= $_SESSION['user_id'] ?>" disabled>
                <label for="empID"> Date time</label>
                <input type="text" name="empID" id="empID" value="<?= date("Y-m-d") ?>" disabled>


            </div>
            <div class="release-info">
                <div class="sec title">
                    <h2>Payment</h2>
                    <h2 for="fine"> <?php echo $data['overdue'] * $data['fine'] ?> </h2>
                </div>

                <div class="sec">
                    <label for="empID">Overdue By</label>
                    <label id="days"> <?php echo $data['overdue'] . " days" ?> </label>
                </div>
                <div class="sec">
                    <label for="empID"> Per day </label>
                    <label class="interest"> <?php echo "Rs " . $data['fine'] ?> </label>
                </div>
                <div class="btn-sec">

                    <button type="button" onclick="Release()" class="btn  Release"><?php echo $data['overdue'] == 0 ? "Release" : "Pay" ?></button>
                </div>

            </div>

        </div>

    </div>

    <!-- popup -->

    <script>
        let fine = <?php echo $data['overdue'] * $data['fine'] ?>; 
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].addEventListener('change', function() {
                 
                for (var j = 0; j < checkboxes.length; j++) {
                    if (checkboxes[j].checked) {
                         document.getElementById('msg').style.display="none";
                    }
                }
            });
        }

        function Release() {
            let releasing = [];
           
            let allReservations = <?php echo count($data['currentReservations']) ?>;
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    releasing.push(checkboxes[i].value);
                }
            }
            if (releasing.length==0) {
                document.getElementById('msg').style.display="block";
            }else{
                
            }
        }
    </script>
    <?php require APPROOT . "/views/inc/footer.php" ?>