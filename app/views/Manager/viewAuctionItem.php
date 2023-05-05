<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo SITENAME ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/viewAuctionItem.css">
</head>

<body>
    <div class="page">
        <div class="right">
            <div class="right-heading">
                <div class="right-side">

                    <a href="<?php echo URLROOT ?>/mgAuction" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>

                    <h1>
                        Viewing Article:<i><?php if (!empty($data[0]->Article_Id)) echo $data[0]->Article_Id;
                                            else echo "A__"; ?></i>
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
                                            echo URLROOT . "/img/2.png";
                                        } ?>" alt="">
                        </div>
                        <div class="article-des">
                            <div class="article-info">
                                <div class="field-name">Customer ID</div>
                                <div class="field-value"><?php if (!empty($data[0]->userId)) echo $data[0]->userId;
                                                            else echo "Not Available"; ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Article ID</div>
                                <div class="field-value"><?php if (!empty($data[0]->Article_Id)) echo $data[0]->Article_Id;
                                                            else echo "Not Available"; ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Pawn ID</div>
                                <div class="field-value"><?php if (!empty($data[0]->Pawn_Id)) echo $data[0]->Pawn_Id;
                                                            else echo "Not Available"; ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Loan ID</div>
                                <div class="field-value"><?php if (!empty($data[0]->Loan_Id)) echo $data[0]->Loan_Id;
                                                            else echo "Not Available"; ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Karatage</div>
                                <div class="field-value"><?php if (!empty($data[0]->Karatage)) echo $data[0]->Karatage . 'k';
                                                            else echo "Not Available"; ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Weight</div>
                                <div class="field-value"><?php if (!empty($data[0]->Weight)) echo $data[0]->Weight . 'g';
                                                            else echo "Not Available"; ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Type</div>
                                <div class="field-value"><?php if (!empty($data[0]->Type)) echo $data[0]->Type;
                                                            else echo "Not Available"; ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Karatage Price</div>
                                <div class="field-value"><?php if (!empty($data[0]->Karatage_Price)) echo 'Rs. ' . $data[0]->Karatage_Price . '/=';
                                                            else echo "Not Available"; ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Loan Interest</div>
                                <div class="field-value"><?php if (!empty($data[0]->Interest)) echo $data[0]->Interest . '%';
                                                            else echo "Not Available"; ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Pawned Date</div>
                                <div class="field-value"><?php if (!empty($data[0]->Pawn_Date)) echo $data[0]->Pawn_Date;
                                                            else echo "Not Available"; ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Auctioned Date</div>
                                <div class="field-value"><?php if (!empty($data[0]->auctioned_date)) echo $data[0]->auctioned_date;
                                                            else echo "Not Available"; ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Auctioned Time</div>
                                <div class="field-value"><?php if (!empty($data[0]->auctioned_time)) echo $data[0]->auctioned_time;
                                                            else echo "Not Available"; ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Repay Method</div>
                                <div class="field-value"><?php if (!empty($data[0]->Repay_Method)) echo $data[0]->Repay_Method;
                                                            else echo "Not Available"; ?></div>
                            </div>

                            <div class="article-info">
                                <div class="field-name">Full Loan Amount</div>
                                <div class="field-value"><?php if (!empty($data[0]->Estimated_Value)) echo 'Rs. ' . $data[0]->Estimated_Value . '/=';
                                                            else echo "Not Available"; ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Registerd By</div>
                                <div class="field-value"><?php if (!empty($data[0]->Officer_Id)) echo $data[0]->Officer_Id;
                                                            else echo "Not Available"; ?></div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Validated By</div>
                                <div class="field-value"><?php if (!empty($data[0]->Appraiser_Id)) echo $data[0]->Appraiser_Id;
                                                            else echo "Not Available"; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="right-box">
                        <div class="top-box-of-right-box">
                            <div class="history-search-bar">
                                <div class="payment-history-topic">
                                    Payment History
                                </div>
                                <div class="search-bar">
                                    <input type="text" name="search_input" id="search_input" onkeyup="searchPayment()" placeholder="Search.." />
                                </div>

                            </div>
                            <div class="table">
                                <div class="table-section">
                                    <?php if (!empty($data[1])) { ?>
                                        <table id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>Payment ID</th>
                                                    <?php if ($data[0]->Repay_Method == 'Fixed') { ?> <th>Installment</th><?php } else { ?><th>Principal</th><?php } ?>
                                                    <th>Type</th>
                                                    <th>Paid Date/Time</th>
                                                    <th>Paid Amount</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data[1] as $row) { ?>

                                                    <tr>
                                                        <td><?php echo $row->PID ?></td>
                                                        <?php if ($data[0]->Repay_Method == 'Fixed') { ?> <td>Rs. <?php echo $data[0]->monthly_installment ?>/=</td><?php } else { ?><td>Rs. <?php echo $row->Principle_Amount ?>/=</td><?php } ?>
                                                        <td><?php echo $row->Type ?></td>
                                                        <td><?php echo $row->Date ?></td>
                                                        <td>Rs. <?php echo $row->Amount ?>/=</td>

                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <div id="tfoot"></div>

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
                            <div class="amount-and-due-date">
                                <div class="data-field">
                                    <div class="field">Paid Amount :</div>
                                    <div class="value"><?php if (!empty($data[0])) { ?> Rs.<?php echo $data[2] ?>/=<?php } else echo "Not Available"; ?></div>
                                </div>
                                <div class="data-field">
                                    <div class="field">Due Amount to Pay :</div>
                                    <div class="value"><?php if (!empty($data[0])) { ?> Rs.<?php echo $data[0]->Estimated_Value - $data[2] ?>/=<?php } else echo "Not Available"; ?></div>
                                </div>
                                <div class="data-field">
                                    <div class="field">Due Date :</div>
                                    <div class="value"><?php if (!empty($data[0]->End_Date)) echo $data[0]->End_Date;
                                                        else echo "Not Available"; ?></div>
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
    function searchPayment() {
        var input, filter, table, tr, td1, td2, td3, td4, td5, i, nonCount, txtValue1, txtValue2, txtValue3, txtValue4, txtValue5;
        input = document.getElementById("search_input");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        nonCount = 0;
        for (i = 0; i < tr.length; i++) {
            td1 = tr[i].getElementsByTagName("td")[0];
            td2 = tr[i].getElementsByTagName("td")[1];
            td3 = tr[i].getElementsByTagName("td")[2];
            td4 = tr[i].getElementsByTagName("td")[3];

            if (td1 || td2 || td3 || td4) {
                txtValue1 = td1.textContent || td1.innerText;
                txtValue2 = td2.textContent || td2.innerText;
                txtValue3 = td3.textContent || td3.innerText;
                txtValue4 = td4.textContent || td4.innerText;
                if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                    nonCount++;
                }
            }
        }
        if (nonCount == tr.length - 1) {
            document.getElementById('tfoot').innerHTML = "<div style='text-align:center; margin-top:50px;'>No Matched Data </div>";
            nonCount = 0;
        } else {
            document.getElementById('tfoot').innerHTML = "";
        }
    }
</script>


</html>