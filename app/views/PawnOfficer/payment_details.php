<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_payment_details.css">
    <title>Vogue Pawn | Payment Details</title>
</head>
<body> 
    
    <div class="wrapper">
        <div class="header">
            <div class="title">
                <a href="<?php echo URLROOT; ?>/pawnings/pawned_items">
                    <img src="<?php echo URLROOT . '/img/back-arrow.png'; ?>">
                </a>
                
                <h1>Payment Details</h1>
            </div>
            
            <div class="logo">
                <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
            </div>
        </div>

        <main>
            <div class="main-wrapper">

                <div class="div-article-details">
                    <div class="div-img">
                        <img src="<?php echo URLROOT . '/img/1.png'; ?>" alt="article image">
                    </div>
                    <div class="field-container">
                        <label>ARTICLE ID</label>
                        <div><?php echo $data['pawn_item']->Article_Id; ?></div>
                    </div>
                    <div class="field-container">
                        <label>CUSTOMER ID</label>
                        <div><?php echo $data['pawn_item']->userId; ?></div>
                    </div>
                    <div class="field-container">
                        <label>PAWNED DATE</label>
                        <div><?php echo date('Y-m-d', strtotime($data['pawn_item']->Pawn_Date)); ?></div>
                    </div>
                    <div class="field-container">
                        <label>END DATE</label>
                        <div><?php echo $data['pawn_item']->End_Date; ?></div>
                    </div>
                </div>
                
                <div class="div-payment-details">
                    <h2>Payment History</h2>

                    <div class="div-no-history">
                        <div class="no-history-img">
                            <img src="<?php echo URLROOT . '/img/no-payment-history.svg'; ?>" alt="No Payment History">
                        </div>
                        
                        <div class="no-history-msg">
                            No Payment History
                        </div>
                    </div>

                    <!-- <div class="div-history-details">
                        <div class="payment-history">
                            <span>PD001</span>
                            <span>1</span>
                            <span>2023-04-13</span>
                            <span>Rs. 5000.00</span>
                        </div>

                        <div class="payment-history">
                            <span>PD001</span>
                            <span>1</span>
                            <span>2023-04-13</span>
                            <span>Rs. 5000.00</span>
                        </div>

                        <div class="payment-history">
                            <span>PD001</span>
                            <span>1</span>
                            <span>2023-04-13</span>
                            <span>Rs. 5000.00</span>
                        </div>

                        <div class="payment-history">
                            <span>PD001</span>
                            <span>1</span>
                            <span>2023-04-13</span>
                            <span>Rs. 5000.00</span>
                        </div>
                    </div> -->

                    <h2>Due Payments</h2>

                    <!-- <div class="div-no-due">
                        No Due Payments
                    </div> -->

                    <div class="div-due">
                        <div class="div-container">
                            <label>AMOUNT TO PAY</label>
                            <div>Rs. 5000.00</div>
                        </div>

                        <div class="div-container">
                            <label>BEFORE</label>
                            <div>2023/04/11</div>
                        </div>
                    </div>
                </div>

                <div class="div-buttons">
                    <h2>Full Loan Amount</h2>

                    <div class="div-full-loan">
                        <?php echo 'Rs. ' . $data['pawn_item']->Amount; ?>
                    </div>

                    <div class="navigate-btns">
                        <ul>
                            <li>
                                <a href="<?php echo URLROOT; ?>/pawnings/make_payments/<?php echo $data['pawn_item']->Pawn_Id; ?>">
                                    <span>Make Payments</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/pawnings/release_pawn/<?php echo $data['pawn_item']->Pawn_Id; ?>">
                                    <span>Release Pawn</span>
                                </a>
                            </li>
                            <li>
                                <a href = "<?php echo URLROOT; ?>/pawnings/renew_pawn/<?php echo $data['pawn_item']->Pawn_Id; ?>">
                                    <span>Renew Pawn</span>
                                </a>
                            </li>
                        </ul>                        
                    </div>

                </div>

            </div>
            
        </main>        
    </div>        
    
    <script type="text/javascript">
        
    </script>

</body>
</html>