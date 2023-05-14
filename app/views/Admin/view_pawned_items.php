<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_ad_view_pawned_items.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/css/viewPawnedItem.css">
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/js/simple-datatables/style.css'>
    <title>Vogue Pawn | Payment Details</title>
</head>
<body> 
    
    <div class="wrapper">
        <div class="header">
            <div class="title">
                <a href="<?php echo URLROOT?>/admin/pawned_items">
                    <img src="<?php echo URLROOT . '/img/back-arrow.png'; ?>">
                </a>
                
                <h1>Payments</h1>
            </div>
            
            <div class="logo">
                <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
            </div>
        </div>

        <main>
            <div class="left-wrapper">
                <div class="article-details">
                    <div class="title">
                        <h2>Article Details</h2>
                    </div>
                    <div class="div-image">
                    <?php if(!empty( $data['pawn_item']->image)){ ?>
                        <img style="width: 227px;height: 162px;" src="<?php echo $data['pawn_item']->image;?>">
                        <?php } else { ?>
                        <img src="<?php echo URLROOT?>/img/gold_bracelet.jpg">
                        <?php } ?>
                    </div>
                    <div class="div-details">
                        <div class="field">
                            <label>Customer ID</label>
                            <div><?php echo $data['pawn_item']->userId; ?></div>
                        </div>
                        <div class="field">
                            <label>Article ID</label>
                            <div><?php echo $data['pawn_item']->Article_Id; ?></div>
                        </div>
                        <div class="field">
                            <label>Pawned Date</label>
                            <div><?php echo $data['pawn_item']->Pawn_Date; ?></div>
                        </div>
                        <div class="field">
                            <label>Due Date</label>
                            <div><?php echo $data['pawn_item']->End_Date; ?></div>
                        </div>
                        <div class="field">
                            <label>Full Loan Amount</label>
                            <div>Rs.<?php echo $data['pawn_item']->Amount;?></div>
                        </div>
                        <div class="field">
                            <label>Registered By</label>
                            <div><?php echo $data['pawn_item']->Officer_Id;?></div>
                        </div>
                        <div class="field">
                            <label>Validated By</label>
                            <div><?php echo $data['pawn_item']->Appraiser_Id;?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="right-box">
                        <div class="top-box-of-right-box">
                            <div class="payment-history-topic">
                                Payment History
                    <div class="twobtns">
                         <a href="<?php echo URLROOT; ?>/Admin/download_pdf/<?php echo $data['pawn_item']->Pawn_Id;?>" > <div class="auction-btn" id="auction-btn" ><button  style="padding: 6px 35px; margin-bottom: 0;" type="button">Print PDF</button></div> </a>
                    </div>
                            </div>
                    
                            <div class="table">
                                <div class="table-section">
                                  
                                        <table >
                                            <thead>
                                                <tr>
                                                    <th>Payment ID</th>
                                                    <th>Paid Date</th>
                                                    <th>Amount</th>
                                                    <th>Type</th>
                                
                                                </tr>
                                            </thead>
                                            <tbody>
            
                                            <?php foreach($data['getPawnItemPaymentById'] as $key => $item){ ?>
                                                <tr>
                                                    <td><?php echo $item->PID;?></td>
                                                    <td><?php echo $item->Date;?></td>
                                                    <td>Rs.<?php echo $item->Amount;?></td>
                                                    <td><?php echo $item->Type;?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                        
                                </div>
                            </div>
                        </div>

                       
                       
            <div class="right-wrapper">
                <div class="due-payments">
                    <div class="title">
                        <h2>Due Payments</h2>
                    </div>
                    <div class="div-details">
                        <div class="field">
                            <label>Amount</label>
                            <div>Rs. <?php echo $data['pawn_item']->Amount;?></div>
                        </div>
                        <div class="field">
                            <label>Due Date</label>
                            <div><?php echo $data['pawn_item']->End_Date;?></div>
                        </div>
                    </div>
                </div>

                <!-- <div class="payment-history">
                    <div class="table-wrapper">
                        <div class="title">
                            <h2>Payment History</h2>
                        </div>
                        <div class="div-table">
                            <table id="table1">
                                <thead>
                                    <tr>
                                        <th>Payment ID</th>
                                        <th>Installment No</th>
                                        <th>Paid Date</th>
                                        <th>Paid Account</th>
                                    </tr> 
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>2022/12/28</td>
                                        <td>Rs. 5000.00</td>
                                    </tr>  
                                    <tr>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>2022/12/28</td>
                                        <td>Rs. 5000.00</td>
                                    </tr>  
                                    <tr>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>2022/12/28</td>
                                        <td>Rs. 5000.00</td>
                                    </tr>  
                                    <tr>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>2022/12/28</td>
                                        <td>Rs. 5000.00</td>
                                    </tr>  
                                    <tr>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>2022/12/28</td>
                                        <td>Rs. 5000.00</td>
                                    </tr>  
                                    <tr>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>2022/12/28</td>
                                        <td>Rs. 5000.00</td>
                                    </tr>  
                                    <tr>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>2022/12/28</td>
                                        <td>Rs. 5000.00</td>
                                    </tr>  
                                    <tr>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>2022/12/28</td>
                                        <td>Rs. 5000.00</td>
                                    </tr>  
                                    <tr>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>2022/12/28</td>
                                        <td>Rs. 5000.00</td>
                                    </tr>  
                                    <tr>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>2022/12/28</td>
                                        <td>Rs. 5000.00</td>
                                    </tr>

                                    <tr>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>2022/12/28</td>
                                        <td>Rs. 5000.00</td>
                                    </tr>  
                                    <tr>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>2022/12/28</td>
                                        <td>Rs. 5000.00</td>
                                    </tr>  
                                                                     
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->
            </div>
        </main>
        
    </div>
        
    <script src='<?php echo URLROOT ?>/js/simple-datatables/simple-datatables.js'></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
</script>
    <script type="text/javascript">
        
    </script>

</body>
</html>