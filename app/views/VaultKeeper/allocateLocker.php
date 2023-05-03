<?php require APPROOT . "/views/inc/header.php" ?>

<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/allocateLocker.css'>

<!-- <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/article_pawn.css'> -->
<title>Vogue | Allocate</title>
</head>

<body class="wrapper">

    <div class="">
        <div class="right-heading">
            <div class="right-side">
                <a href="<?php echo URLROOT ?>/VKDashboard/" id="back">
                    <img class="back" src="<?php echo URLROOT ?>/img/back.png" alt="back">
                </a>
                <h1 id="title">Allocate Locker </h1>
            </div>
            <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
        </div>

    </div>
    <div class="content">
        <div class="item-details">
            <!-- <div class="article-details"> -->
            <div class="info-div">
                <h2 class="sub-title">
                    Customer Details
                </h2>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Customer Id</label>
                        <label class="jw-dt"><?= $data['customer']->UserId ?></label>
                    </div>

                </div>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Customer Name</label>
                        <label class="jw-dt"><?= $data['customer']->First_Name . " " . $data['customer']->Last_Name ?></label>
                    </div>

                </div>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>NIC</label>
                        <label class="jw-dt"><?= $data['customer']->NIC ?></label>
                    </div>

                </div>
                <div class="jw-date">
                    <div class="jw-date-name">
                        <label>Phone</label>
                        <label class="jw-dt"><?= $data['customer']->phone ?></label>
                    </div>

                </div>



            </div>



            <!-- </div> -->

        </div>
        <div class="item-payments">

            <div class="payments his-div">
                <h2 class="sub-title">
                    Invalid Articles </h2>
                <?php
                if (empty($data['invalidArticles'])) : ?>
                    <div class=" article_display">
                        <label>No Invalid Articles</label>
                    </div>

                <?php else : ?>
                    <div class=" article_display title">

                        <label>Article</label>
                        <label>Type</label>

                    </div>
                    <?php foreach ($data['invalidArticles'] as $article) : ?>
                        <div class=" article_display">

                            <div class="jewellery-img">


                                <img class="jw-img" src="<?php if (!empty($article->image)) {
                                                                echo $article->image;
                                                            } else {
                                                                echo URLROOT . "/img/images.jpg";
                                                            } ?>" alt="">

                            </div>
                            <label><?= $article->article_type ?></label>

                        </div>
                <?php endforeach;
                endif; ?>
            </div>


        </div>
    </div>
    <?php if (!empty($data['validArticles'])) : ?>
        <div class="row info-div">
            <h2 class="topic">
                Allocation information
            </h2>
            <h3 class="">
                Available Lockers of <?= $data['customer']->UserId ?>
            </h3>
            <?php if (empty($data['allocateMy'])) : ?>

                <label>Not Available</label>
            <?php else : ?>
                <div class="Locker_Allocation jw-dt">
                    <label>Locker</label>
                    <label>Article</label>
                    <label>Type</label>
                    <label>Estimate Value</label>
                    <label>Karatage</label>
                    <label>Weight</label>


                </div>
                <?php foreach ($data['allocateMy'] as $allocateMy) : ?>
                    <div class="Locker_Allocation">
                        <label class="locker_no"><?= $allocateMy->lockerNo ?></label>
                        <div class="jewellery-img">
                            <img class="jw-img" src="<?php if (!empty($allocateMy->image)) {
                                                            echo $allocateMy->image;
                                                        } else {
                                                            echo URLROOT . "/img/images.jpg";
                                                        } ?>" alt="">
                        </div>

                        <label><?= $allocateMy->article_type ?></label>
                        <label> <?= $allocateMy->estimated_value ?></label>
                        <label><?= $allocateMy->karatage . "K" ?></label>
                        <label><?= $allocateMy->weight . "g" ?></label>


                    </div>


                <?php endforeach; ?>
            <?php endif; ?>
            <h3 class="">
                Other Allocations
            </h3>
            <?php if (empty($data['AvailableLockers'])) : ?>
                <div class="Locker_Allocation">
                    <label>Lockers Not Available</label>
                </div>
            <?php else : ?>
                <?php if (empty($data['reserve'])) : ?>
                    <div class="Locker_Allocation">
                        <label>No other reservations</label>
                    </div>
                    <?php else :
                    $tempreserve = $data['reserve'];
                    while (!empty($tempreserve)) :
                        $allocation = array_shift($tempreserve); ?>
                        <div class="Locker_Allocation">
                            <div class="column">
                                <label class="locker_no"><?= $allocation->lockerNo ?></label>
                                <label for="">Duration</label>
                                <select name="<?= $allocation->lockerNo ?>" class="selection" id="<?= $allocation->lockerNo ?>">
                                    <option value="6" <?php echo ($allocation->duration == 6) ? 'selected' : '' ?>>06 Months</option>
                                    <option value="12" <?php echo ($allocation->duration == 12) ? 'selected' : '' ?>>12 Months</option>


                                </select>

                            </div>

                            <div class="jewellery-img">
                                <img class="jw-img" src="<?php if (!empty($allocation->image)) {
                                                                echo $allocation->image;
                                                            } else {
                                                                echo URLROOT . "/img/images.jpg";
                                                            } ?>" alt="">
                            </div>

                            <label><?= $allocation->article_type ?></label>
                            <label> <?= $allocation->estimated_value ?></label>
                            <label><?= $allocation->karatage . "K" ?></label>
                            <label><?= $allocation->weight . "g" ?></label>
                        </div>
                        <?php if (!empty($tempreserve)) :
                            $allocation = array_shift($tempreserve);
                        ?>
                            <div class="Locker_Allocation">
                                <label class=""></label>
                                <div class="jewellery-img">
                                    <img class="jw-img" src="<?php if (!empty($allocation->image)) {
                                                                    echo $allocation->image;
                                                                } else {
                                                                    echo URLROOT . "/img/images.jpg";
                                                                } ?>" alt="">
                                </div>

                                <label><?= $allocation->article_type ?></label>
                                <label> <?= $allocation->estimated_value ?></label>
                                <label><?= $allocation->karatage . "K" ?></label>
                                <label><?= $allocation->weight . "g" ?></label>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>

            <?php endif; ?>
            <h3 class="">
                Lockers not Available for
            </h3>
            <?php
            if (!empty($data['notreserve'])) :

                foreach ($data['notreserve'] as $allocate) : ?>
                    <div class="Locker_Allocation">
                        <label class="locker_no"> </label>
                        <div class="jewellery-img">
                            <img class="jw-img" src="<?php if (!empty($allocate->image)) {
                                                            echo $allocate->image;
                                                        } else {
                                                            echo URLROOT . "/img/images.jpg";
                                                        } ?>" alt="">
                        </div>

                        <label><?= $allocate->article_type ?></label>
                        <label> <?= $allocate->estimated_value ?></label>
                        <label><?= $allocate->karatage . "K" ?></label>
                        <label><?= $allocate->weight . "g" ?></label>


                    </div>

                <?php endforeach; ?>
            <?php else : ?>
                <div class="Locker_Allocation">
                    <label>Allocated All Articles</label>
                </div>
            <?php endif;
            ?>
        </div>
    <?php endif; ?>
    <div class="row info-div payment">
        <div class="sec pay">
            <label class="pay_title">
                Payment Details
            </label>
            <label class="pay_title amount" id="total_pay">
                00.00
            </label>
        </div>

        <div class="sec">
            <label for="Total"> Already allocated Lockers</label>
            <label class="Tot-pay" id="Total"> 0 </label>
        </div>
        <div class="sec">
            <label for="Total">6 Months Allocations</label>
            <label class="Tot-pay" id="6" for="Total"> 00.00 </label>
        </div>
        <div class="sec">
            <label for="Total">12 Months Allocations</label>
            <label class="Tot-pay" id="12" for="Total"> 00.00 </label>
        </div>
        <div class=" sec-btn">
            <button class="p-btn " id="cancel" href="">Cancel </button>
            <button class="p-btn " id="p-btn" onclick="">Pay</button>
        </div>
    </div>

    <div class="popup" id="popup">
        <h2 class="sub-title">
            Quit from locker allocation?</h2>
        <div class="jw-date-name option-radio">
            <input type="radio" name="accept-offers" id="yes-button" value="1" class="hidden radio-label">
            <label for="yes-button" class="button-label">
                <h1>Yes</h1>
            </label>
            <input type="radio" name="accept-offers" id="no-button" value="2" class="hidden radio-label" checked>
            <label for="no-button" class="button-label">
                <h1>No</h1>
            </label>
        </div>
        <span>Warning: All validatated Article will be lost</span>
    </div>
    <div class="popup" id="payConfirmation">
        <h2 class="sub-title">Reservation Confirmation
        </h2>

        <div class="">
            <label class="">
                Confirm Payment amount of
            </label>
            <label class=" amount" id="amount">
                00.00
            </label>
        </div>



        <button class="btn-confirm" id="confirmPay" onclick="">Confirm</button>
        <button class="btn-confirm btn-cancel" id="cancelPay" href="">Cancel </button>

    </div>
    <?php $duration_json = json_encode($data['duration']); ?>
    <script>
        var duration = <?php echo $duration_json; ?>;
        let selectors = document.getElementsByClassName('selection');
        let selectorArray = Array.from(selectors);

        let annualPay = <?php echo $data['allocationFee']; ?>;

        // payment variables

        let monthPay6 = duration.length * annualPay / 2.0;
        let monthPay12 = 0;
        let total = monthPay6 + monthPay12;
        document.getElementById('6').innerHTML = monthPay6;
        document.getElementById('12').innerHTML = monthPay12;
        document.getElementById('total_pay').innerHTML = "Rs " + total;
        document.getElementById('amount').innerHTML = "Rs " + total;

        // Add a change event listener to each selector element
        selectorArray.forEach(function(selector) {
            selector.addEventListener('change', function(event) {
                // Get the locker number and selected duration value
                var month6 = 0;
                var month12 = 0;

                for (let i = 0; i < duration.length; i++) {
                    if (duration[i].locker == selector.id) {
                        duration[i].duration = selector.value;
                    }
                    if (duration[i].duration == 6) {
                        month6++;
                    } else {
                        month12++;
                    }
                    monthPay6 = month6 * annualPay / 2.0;
                    monthPay12 = month12 * annualPay;
                    total = monthPay6 + monthPay12;
                    document.getElementById('6').innerHTML = monthPay6;
                    document.getElementById('12').innerHTML = monthPay12;
                    document.getElementById('total_pay').innerHTML = "Rs " + total;
                    document.getElementById('amount').innerHTML = "Rs " + total;

                }

            });
        });
        const cancelBtn = document.getElementById('cancel');
        const paybtn = document.getElementById('p-btn');
        const popup = document.getElementById('popup');
        const confirmbox = document.getElementById('payConfirmation');
        const cancelpay = document.getElementById('cancelPay');
        const confirmPay = document.getElementById('confirmPay');
        // var pageElements = document.querySelectorAll("body > *:not(#popup)");

        cancelBtn.addEventListener('click', function() {
            popup.classList.add('show-popup');

            blurDOM(popup, 1);
            AllDOM(popup, 'none');

        });
        paybtn.addEventListener('click', function() {
            confirmbox.classList.add('show-popup');
            blurDOM(confirmbox, 1);
            AllDOM(confirmbox, 'none');
        });
        cancelpay.addEventListener('click', function() {
            confirmbox.classList.remove('show-popup');
            blurDOM(confirmbox, 0);
            AllDOM(confirmbox, 'auto');
        });
        const yes = document.getElementById("yes-button");
        const no = document.getElementById("no-button");


        yes.addEventListener("click", function(event) {


        });

        no.addEventListener("click", function(event) {
            popup.classList.remove('show-popup');
            blurDOM(popup, 0);
            AllDOM(popup, 'auto');
        });
        confirmPay.addEventListener('click', function() {


            $.ajax({
                type: "POST",
                url: "<?= URLROOT ?>/AllocateLocker/AllocateLocker",
                data: {
                    allocatemy: <?= json_encode($data['allocateMy']) ?>,
                    reserved: <?= json_encode($data['reserve']) ?>,
                    notreserve: <?= json_encode($data['notreserve']) ?>,
                    invalidArticles: <?= json_encode($data['invalidArticles']) ?>,
                    duration: duration
                    // ,
                    // payment: payment

                },
                dataType: "JSON",
                success: function(response) {
                    console.log(response);

                },
                error: function(xhr, status, error) {
                    console.log("Error: " + error);
                }
            });




        });

        function blurDOM(enable, action) {
            const bodyChildren = Array.from(document.body.children).filter(child => child !== enable);
            if (action == 0) {
                bodyChildren.forEach(child => child.classList.remove('blur'));
            } else {
                bodyChildren.forEach(child => child.classList.add('blur'));
            }

        }

        function AllDOM(enable, event) {
            const bodyChildren = Array.from(document.body.children).filter(child => child !== enable);
            bodyChildren.forEach(child => {
                child.style.pointerEvents = event;
            });
        }
    </script>
    <?php require APPROOT . "/views/inc/footer.php" ?>