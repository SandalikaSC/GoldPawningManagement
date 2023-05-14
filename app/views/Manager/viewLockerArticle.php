<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/Img/logo.png">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/viewLockerArticle.css">
</head>

<body>
    <div class="page">
        <div class="right">
            <div class="right-heading">
                <div class="right-side">

                    <a href="<?php echo URLROOT ?>/mgLocker/viewLockerItems/<?php echo $data[2]?>" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>

                    <h1>
                        <i class="<?php echo ($data[0]->Retrive_status==0 and $this->dateComp($data[0]->Retrieve_Date,0)) ? 'red-article-topic':''?>"><?php echo $data[0]->Article_Id . "  "?></i>In<i><?php echo " LC".$data[2]?></i>
                    </h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="content-page">
                <div class="two-sets">
                    <div class="left-set">

                        <div class="left-box">
                            <div class="article-details-topic">
                                Article Details
                            </div>
                            <div class="article-image">
                                <img src="<?php if(!empty($data[0]->image)) echo $data[0]->image; else echo URLROOT."/img/2.png?";?>" alt="">
                            </div>
                            <div class="article-des">
                                <div class="article-info">
                                    <div class="field-name">Article ID</div>
                                    <div class="field-value"><?php if(!empty($data[0]->Article_Id)) echo $data[0]->Article_Id; else "";?></div>
                                </div>
                                <div class="article-info">
                                    <div class="field-name">Estimated Value</div>
                                    <div class="field-value"><?php if(!empty($data[0]->Estimated_Value)) echo 'Rs. '.$data[0]->Estimated_Value.'/='; else echo '';?></div>
                                </div>
                                <div class="article-info">
                                    <div class="field-name">Karatage</div>
                                    <div class="field-value"><?php if(!empty($data[0]->Karatage)) echo $data[0]->Karatage.'k'; else echo "";?></div>
                                </div>
                                <div class="article-info">
                                    <div class="field-name">Weight</div>
                                    <div class="field-value"><?php if(!empty($data[0]->Weight)) echo $data[0]->Weight.'g'; else echo '';?></div>
                                </div>
                                <div class="article-info">
                                    <div class="field-name">Type</div>
                                    <div class="field-value"><?php if(!empty($data[0]->Type)) echo $data[0]->Type; else echo '';?></div>
                                </div>
                                <div class="article-info">
                                    <div class="field-name">Allocate Id</div>
                                    <div class="field-value"><?php if(!empty($data[0]->Allocate_Id)) echo $data[0]->Allocate_Id; else echo '';?></div>
                                </div>
                                <div class="article-info">
                                    <div class="field-name">Allocated Date</div>
                                    <div class="field-value"><?php if(!empty($data[0]->Date)) echo $data[0]->Date; else echo '';?></div>
                                </div>
                                <div class="article-info">
                                    <div class="<?php echo ($data[0]->Retrive_status==0 and $this->dateComp($data[0]->Retrieve_Date,0)) ? 'red-date':'field-name'?>">Retrieve Date</div>
                                    <div class="<?php echo ($data[0]->Retrive_status==0 and $this->dateComp($data[0]->Retrieve_Date,0)) ? 'red-date':'field-value'?>"><?php if(!empty($data[0]->Retrieve_Date)) echo $data[0]->Retrieve_Date; else echo '';?></div>
                                </div>
                                <div class="article-info">
                                    <div class="field-name">Allocation Fee</div>
                                    <div class="field-value"><?php if(!empty($data[0]->allocation_fee)) echo 'Rs. '.$data[0]->allocation_fee.'/='; else echo '';?></div>
                                </div>
                                <div class="article-info">
                                    <div class="field-name">User ID</div>
                                    <div class="field-value"><?php if(!empty($data[0]->UserID)) echo $data[0]->UserID; else echo '';?></div>
                                </div>
                                <div class="article-info">
                                    <div class="field-name">Vault Keeper ID</div>
                                    <div class="field-value"><?php if(!empty($data[0]->Keeper_Id)) echo $data[0]->Keeper_Id; else echo '';?></div>
                                </div>
                                <div class="article-info">
                                    <div class="field-name">Gold Appraiser ID</div>
                                    <div class="field-value"><?php if(!empty($data[0]->appraiser_Id)) echo $data[0]->appraiser_Id; else echo '';?></div>
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