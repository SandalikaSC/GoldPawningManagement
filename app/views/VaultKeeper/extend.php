<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/VKPayment.css'>
<!-- <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/article_pawn.css'> -->
<title>Vogue | Payment</title>
</head>

<body class="wrapper">

    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/Reservations/ViewReservation/<?= $data['lockerid'] ?>" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">Reservation Extend </h1>
            </div>
            <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
        </div>

    </div>
    <?php notification("extend")?>
    <div class="content">
        <div class="pay-details">
            <div class="card">
                <h2>Customer Details</h2>
                <div class="details">
                    <label for="">Customer Id</label>
                    <label for=""><?= $data['customer']->UserId ?></label>
                    <label for="">Customer Name</label>
                    <label for=""><?php echo  $data['customer']->First_Name . " " . $data['customer']->Last_Name ?></label>
                </div>
            </div>
            <div class="card">
                <h2>Locker Details</h2>
                <div class="details">

                    <label for="">Allocated Date</label>
                    <label for=""><?php echo  date("Y M d", strtotime($data['currentReservations'][0]->Date)); ?></label>
                    <label for="">To be Retrieved</label>
                    <label for=""><?php echo  date("Y M d", strtotime($data['currentReservations'][0]->Retrieve_Date)); ?></label>
                    <label for="">Overdue by</label>
                    <label for=""><?php echo  $data['overdue'] . " Days" ?></label>
                </div>
            </div>
            <div class="extend-info">
                <div class="locker-details">
                    <div class="locker">
                        <label for=""><?php echo "Locker " . $data['lockerid'] ?>
                        </label>
                    </div>
                    <div class="locker-articles">

                        <?php
                        foreach ($data['currentReservations'] as $reservation) : ?>
                            <div class="article">
                                <img src="<?php echo  $reservation->articleIMG ?>" alt="" class="article-pic">

                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
                <div class="release-info">
                    <h2>Extend Information</h2>

                    <label for="">Duration</label>
                    <select name="duration" class="selection" id="duration">
                        <option value="6" selected>06 Months</option>
                        <option value="12">12 Months</option>


                    </select>
                    <label for="date"> Extend To</label>
                    <input type="text" name="date" id="date" value="<?= $data['extendTo']?>" disabled>


                </div>

            </div>
        </div>
        <div class="payment">
            <div class="sec pay">
                <h2>
                    Payment Details
                </h2>
                 
            </div>

            <div class="sec">
                <label for="Extend">Extend Pay</label>
                <label class="Tot-pay" for="Extend" id="payextend">
                    <?php echo  $data['allocationFee'] / 2.0;  ?> </label>
            </div>
            <div class=" sec-btn"> 
                <button type="button" onclick="save()" class="p-btn pay">Extend </button>
            </div>
        </div>

    </div>

    <script>
        let extendTo = document.getElementById('date');
        let paylabel = document.getElementById('payextend');
        let currentEnd =  new Date('<?php echo $data['currentReservations'][0]->Retrieve_Date;  ?>');
        const durationSelect = document.getElementById("duration"); 


        let allocationfee = <?php echo $data['allocationFee'];  ?>;
        let total = allocationfee / 2;
        let months=6;

        durationSelect.addEventListener("change",function(){
            months=parseInt(durationSelect.value); 
            const outputDate = new Date(currentEnd.getFullYear(), currentEnd.getMonth() + months, currentEnd.getDate()+1);
            const outputDateStr = outputDate.toISOString().slice(0, 10);
            extendTo.value=outputDateStr;
            if (months==6) {
                total = allocationfee / 2;
            } else {
                total = allocationfee;
            }
            paylabel.textContent="Rs "+total;
        });
        function save(){
            window.location = "<?= URLROOT ?>/Extend/SaveExtend/<?= $data['lockerid'] ?>/"+months;

        }
    </script>
    <?php require APPROOT . "/views/inc/footer.php" ?>