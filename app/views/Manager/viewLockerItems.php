<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/Img/logo.png">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/viewLockerItems.css">
</head>

<body>
    <div class="page">
        <div class="right">
            <div class="right-heading">
                <div class="right-side">

                    <a href="<?php echo URLROOT ?>/mgLocker" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>

                    <h1>
                        Viewing Locker No: <i>LC00<?php echo $data[0][0]->lockerNo ?></i>
                    </h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="content-page">
                <div class="three-sets">
                    <div class="left-set">

                        <div class="locker-des-with-header">
                            <div class="locker-des-header">
                                <label><b>locker Details</b></label>
                            </div>
                            <div class="locker-des">
                                <div class="left-of-des-box">
                                    <div class="locker-info">
                                        <div class="field-name">Locker No</div>
                                        <div class="field-value"><?php echo $data[0][0]->lockerNo ?></div>
                                    </div>
                                    <div class="locker-info">
                                        <div class="field-name">Locker Status</div>
                                        <div class="field-value"><?php echo $data[0][0]->Status ?></div>
                                    </div>
                                    <div class="locker-info">
                                        <div class="field-name">Key Status</div>
                                        <div class="field-value change-color"><?php if ($data[0][0]->Key_Status == 1) echo "Delivered";
                                                                                else echo "Not Delivered"; ?></div>
                                    </div>



                                </div>
                                <div class="right-of-des-box">
                                    <div class="locker-info">
                                        <div class="field-name">Customer</div>
                                        <div class="field-value "><?php echo $data[0][0]->UserID ?></div>
                                    </div>

                                    <div class="locker-info">
                                        <div class="field-name">No Of Articles</div>
                                        <div class="field-value"><?php echo $data[0][0]->No_of_Articles ?></div>
                                    </div>
                                    <div class="locker-info">
                                        <div class="field-name">Key Rele Date</div>
                                        <div class="field-value"><?php echo $data[0][0]->Key_released_Date ?></div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="Articles">
                            <div class="lock-items">
                                <div class="top"><b>Articles</b></div>
                                <div class="arti-log">
                                    <?php if ($data[0][0]->No_of_Articles == 2) { ?>
                                        <div class="arti">
                                            <a href="<?php echo URLROOT ?>/mgLocker/viewLockerArticles/<?php echo $data[0][0]->lockerNo ?>/<?php echo $data[0][0]->Article_Id ?>"><img src="<?php if(!empty($data[2][0]->image)) echo $data[2][0]->image; else echo URLROOT."/img/2.png"; ?>" alt="Jewelry"></a>
                                        </div>
                                        <div class="arti">
                                            <a href="<?php echo URLROOT ?>/mgLocker/viewLockerArticles/<?php echo $data[0][0]->lockerNo ?>/<?php echo $data[0][1]->Article_Id ?>"><img src="<?php if(!empty($data[2][1]->image)) echo $data[2][1]->image; else echo URLROOT."/img/2.png"; ?>" alt="Jewelry"></a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="arti">
                                            <a href="<?php echo URLROOT ?>/mgLocker/viewLockerArticles/<?php echo $data[0][0]->lockerNo ?>/<?php echo $data[0][0]->Article_Id ?>"><img src="<?php if(!empty($data[2][0]->image)) echo $data[2][0]->image; else echo URLROOT."/img/2.png"; ?>" alt="Jewelry"></a>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="right-set">
                        <div class="payment-history-topic">
                            Payment History
                        </div>
                        <?php if (!empty($data[1])) { ?>
                            <div class="table-sec">

                                <table id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Payment ID</th>
                                            <th>Type</th>
                                            <th>Principal</th>
                                            <th>Amount</th>
                                            <th>Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data[1] as $row) { ?>
                                            <tr>
                                                <td><?php echo $row->PID ?></td>
                                                <td><?php echo $row->Type ?></td>
                                                <td>Rs.<?php echo $row->Principle_Amount ?>/=</td>
                                                <td>Rs.<?php echo $row->Amount ?>/=</td>
                                                <td><?php echo $row->Date ?></td>

                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>

                            </div>
                        <?php } else {
                            echo "<center>Not Available</center>";
                        } ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</body>



</html>