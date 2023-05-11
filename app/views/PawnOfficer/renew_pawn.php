<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_renew_pawn.css">
    <title>Vogue Pawn | Renew Pawn</title>
</head>
<body> 
    
    <div class="wrapper">
        <div class="header">
            <div class="title">
                <a href="<?php echo URLROOT; ?>/pawnings/payment_details/<?php echo $data['pawn_item']->Pawn_Id; ?>">
                    <img src="<?php echo URLROOT . '/img/back-arrow.png'; ?>">
                </a>
                
                <h1>Renew Pawn</h1>
            </div>
            
            <div class="logo">
                <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
            </div>
        </div>

        <main>
            <div class="main-container">
                
                <div class="pawn-details">
                    <div class="div-image">
                        <img src="<?php echo $data['pawn_item']->image; ?>" alt="">
                    </div>
                    <div class="div-details">
                        <div class="div-field">
                            <label>Article ID</label>
                            <div><?php echo $data['pawn_item']->Article_Id;?></div>
                        </div>
                        <div class="div-field">
                            <label>Current Pawn ID</label>
                            <div><?php echo $data['pawn_item']->Pawn_Id;?></div>
                        </div>
                        <div class="div-field">
                            <label>Article Type</label>
                            <div><?php echo $data['pawn_item']->Type;?></div>
                        </div>
                        <div class="div-field">
                            <label>Current Pawn Date</label>
                            <div><?php echo date('Y-m-d', strtotime($data['pawn_item']->Pawn_Date));?></div>
                        </div>
                        <div class="div-field">
                            <label>Current End Date</label>
                            <div><?php echo date('Y-m-d', strtotime($data['pawn_item']->End_Date));?></div>
                        </div>
                        <div class="loan-details">
                            <label>Full Loan Amount</label>
                            <div><?php echo 'Rs. ' . $data['pawn_item']->Amount;?></div>
                        </div>
                        <div class="loan-details">
                            <label>Remaining Loan Amount</label>
                            <div><?php echo 'Rs. ' . sprintf('%.2f', $data['remaining_loan']);?></div>
                        </div>
                    </div>                                   
                </div>

                <form action="<?php echo URLROOT . '/pawnings/renew_pawn/' . $data['pawn_item']->Pawn_Id; ?>" method="post">
                    <div class="div-button">
                        <button type="submit" class="main-button">Re-pawn</button>
                    </div> 
                </form>
                 
                <!-- <div class="div-payment">
                    <div class="form-title">
                        Payment Details
                    </div>
                    <div class="div-form">
                        <form action="" method="post">
                            <div class="input-container">
                                <label>Interest Amount</label>
                                <input type="text" name="amount" class="input-field" value="" placeholder="Interest Amount">
                            </div>
                            <div class="input-container">
                                <label>Date</label>
                                <input type="date" name="date" class="input-field" value="" placeholder="Date">
                            </div>
                        </form>
                    </div>
                </div> -->
            </div>
            
            <!-- <div class="left-wrapper">
                <div class="div-details">
                    <div class="div-img">
                        <img src="<?php echo URLROOT . '/img/bracelet_01.jpg'; ?>" alt="">
                    </div>
                    
                    <div class="article-details">
                        <div class="field">
                            <label>Article ID</label>
                            <div>A001</div>
                        </div>
                        <div class="field">
                            <label>Article Type</label>
                            <div>Jewelry</div>
                        </div>
                        <div class="field">
                            <label>Current Pawned Date</label>
                            <div>2022/06/27</div>
                        </div>
                        <div class="field">
                            <label>Current End Date</label>
                            <div>2023/02/27</div>
                        </div>
                    </div>

                    <div class="loan-details">
                        <div class="field">
                            <label>Remaining Loan Amount</label>
                            <div>Rs. 30000.00</div>
                        </div>
                        <div class="field">
                            <label>Interest for Remaining Loan Amount</label>
                            <div>Rs. 9000.00</div>
                        </div>
                        <div class="btn-pay">
                            <a href="<?php echo URLROOT; ?>/pawnings/make_payments/<?php echo $data['pawn_item']->Pawn_Id; ?>">Pay Interest</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-wrapper">
                <div class="form-wrapper">
                    <div class="div-form">
                        <div class="form-title">
                            <h2>New Pawning Details</h2>
                        </div>
                    
                        <form action="" method="post">
                            <div class="field-wrapper">
                                <label>Loan Amount (Rs.)<sup>*</sup></label>
                                <div class="input-wrapper">
                                    <input type="text" name="amount" placeholder="Amount">
                                </div>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="field-wrapper">
                                <label>End Date<sup>*</sup></label>
                                <div class="input-wrapper">
                                    <input type="date" name="date">
                                </div>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="field-wrapper">
                                <label>Payment Method</label>
                                <div class="payment-method">                        
                                    <label>
                                        <input type="radio" name="method" value="Fixed" checked> Fixed
                                    </label>
                                    <label>
                                        <input type="radio" name="method" value="Partial"> Partial
                                    </label>
                                </div> 
                            </div>                             
                            
                            <div class="div-button">
                                <a href="" class="btn-renew">Save</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>           -->
        </main>        
    </div>
        
    
    <script type="text/javascript">
        
    </script>

</body>
</html>