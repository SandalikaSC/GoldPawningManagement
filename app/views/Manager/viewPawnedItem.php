<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/Img/logo.png">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/viewPawnedItem.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/loading.css">
</head>

<body>

    <div id="pleaseWait" style="display:none;position:absolute;left:0;right:0;top:0;bottom:0;padding:20px 40px;z-index:99;">
        <section class="whole">
            <div class="loading-box">
                <p>please Wait...</p>
                <img src="<?php echo URLROOT ?>/img/loading.gif" alt="">
            </div>
        </section>
    </div>

    <div class="page">
        <?php include_once 'sendWarningForm.php'; ?>


        <?php
        if (!empty($_SESSION['message'])) {

            include_once 'error.php';
        }
        ?>

        <div class="right">
            <div class="right-heading">
                <div class="right-side">
                    <!-- <div class="bars" id="bars">
                         <img src="./img/icons8-bars-48.png" alt="bars">
                    </div> -->
                    <a href="<?php echo URLROOT ?>/mgPawnArticles" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>

                    <h1>
                        Viewing Article: <?php echo $data[0]->Article_Id ?>
                    </h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="content-add-new-page">
                <div class="three-boxes">
                    <div class="left-box">
                        <div class="article-details-topic">
                            Article Details
                        </div>
                        <div class="article-image">
                            <img src="<?php if (!empty($data[0]->image)) {
                                            echo $data[0]->image;
                                        } else {
                                            echo URLROOT . "//img/image 1.png";
                                        } ?>" alt="">
                        </div>
                        <div class="article-des">
                            <div class="article-info">
                                <div class="field-name">Customer ID</div>
                                <div class="field-value"><?php echo $data[0]->userId ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Article ID</div>
                                <div class="field-value"><?php echo $data[0]->Article_Id ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Karatage</div>
                                <div class="field-value"><?php echo $data[0]->Karatage ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Pawned Date</div>
                                <div class="field-value"><?php echo $data[0]->Pawn_Date ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Due Date</div>
                                <div class="field-value"><?php echo $data[0]->End_Date ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Full Loan Amount</div>
                                <div class="field-value">Rs. <?php echo $data[0]->Estimated_Value ?>/=</div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Registerd By</div>
                                <div class="field-value"><?php echo $data[0]->Officer_Id ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Validated By</div>
                                <div class="field-value"><?php echo $data[0]->Appraiser_Id ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="right-box">
                        <div class="top-box-of-right-box">
                            <div class="payment-history-topic">
                                Payment History
                            </div>
                            <div class="table">
                                <div class="table-section">
                                    <?php if (!empty($data[1])) { ?>
                                        <table id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>Payment ID</th>
                                                    <th>Installment</th>
                                                    <th>Paid Date</th>
                                                    <th>Paid Amount</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($data[1] as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $row->PID ?></td>
                                                        <td><?php echo $data[0]->monthly_installment ?></td>
                                                        <td><?php echo $row->Date ?></td>
                                                        <td><?php echo $row->Amount ?></td>

                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } else {
                                        echo "<p style='display:flex;justify-content:center; margin-top:20px;'>Not Available</P>";
                                    } ?>

                                </div>
                            </div>
                        </div>
                        <div class="bottom-box-of-right-box">
                            <div class="due-payments-topic">
                                Due Payments
                            </div>
                            <div class="with-two-btns">
                                <div class="amount-and-due-date">
                                    <div class="data-field">
                                        <div class="field">Amount :</div>
                                        <div class="value"><?php if (!empty($data[0])) { ?> Rs.<?php echo $data[0]->Estimated_Value - $data[2] ?>/=<?php } else echo "Not Available"; ?></div>
                                    </div>
                                    <div class="data-field">
                                        <div class="field">Due Date :</div>
                                        <div class="value"><?php echo $data[0]->End_Date ?></div>
                                    </div>
                                </div>
                                <div class="twobtns">
                                    <div class="auction-btn"><button type="button" id="auction-btn">Add to Auction</button></div>
                                    <div class="email-btn"><button type="button" id="warning-btn">Send Warning</button></div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</body>

<script>
    let auctionBtn = document.getElementById("auction-btn");
    let wait = document.getElementById("pleaseWait");
    const URL = "<?php echo URLROOT ?>";

    auctionBtn.addEventListener('click', () => {
        wait.style.display = "block";
        let pawnId = '<?php echo $data[1]->Pawn_Id ?>';
        let endDate = '<?php echo $data[1]->End_Date ?>';
        let articleId = '<?php echo $data[0]->Article_Id ?>';
        let userId = '<?php echo $data[1]->userId ?>';

        fetch(`${URL}/mgPawnArticles/addOneByOneToAuction/${pawnId}/${endDate}/${userId}`)
            .then(response => response.text())
            .then(response => {
                console.log(response);

                window.location.href = `${URL}/mgPawnArticles/viewPawnedItem/${articleId}`;
            })
            .catch(e => {
                console.log(e);
                window.location.href = `${URL}/mgPawnArticles/viewPawnedItem/${articleId}`;
                // location.reload(true);
            });

    })



    let warningBtn = document.getElementById("warning-btn");
    warningBtn.onclick = () => {
        wait.style.display = "block";
        let endDate = '<?php echo $data[1]->End_Date ?>';
        let articleId = '<?php echo $data[0]->Article_Id ?>';
        let userId = '<?php echo $data[1]->userId ?>';
        let pawn_id = '<?php echo $data[1]->Pawn_Id ?>';
        let warning1 = '<?php echo $data[1]->WarningOne ?>';
        let warning2 = '<?php echo $data[1]->WarningTwo ?>';

        fetch(`${URL}/mgPawnArticles/sendOneByOneWarning/${userId}/${endDate}/${pawn_id}/${warning1}/${warning2}`)
            .then(response => response.text())
            .then(data => {
                console.log(data);
                // location.reload(`${URL}/mgPawnArticles`);
                window.location.href = `${URL}/mgPawnArticles/viewPawnedItem/${articleId}`;
            })
            .catch(e => {
                console.log(e);
                window.location.href = `${URL}/mgPawnArticles/viewPawnedItem/${articleId}`;
                // location.reload(true);
            });
    }
</script>

</html>