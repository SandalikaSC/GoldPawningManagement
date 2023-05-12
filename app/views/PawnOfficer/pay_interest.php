<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_pay_interest.css">
    <title>Vogue Pawn | Renew Pawn</title>
</head>
<body> 
    
    <div class="wrapper">
        <div class="header">
            <div class="title">
                <a href="<?php echo URLROOT; ?>/pawnings/renew_pawn/<?php echo $data['pawn_item']->Pawn_Id; ?>">
                    <img src="<?php echo URLROOT . '/img/back-arrow.png'; ?>">
                </a>
                
                <h1>Pay Interest</h1>
            </div>
            
            <div class="logo">
                <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
            </div>
        </div>

        <main>
            <div class="main-container">
                <div class="msg-flash"><?php echo flash('notification'); ?></div>
                <div class="loan-details">
                    <div class="amount">
                        <label>FULL LOAN AMOUNT</label>
                        <div><?php echo 'Rs. ' . $data['pawn_item']->Amount; ?></div>
                    </div>
                    <div class="amount">
                        <label>REMAINING LOAN</label>
                        <div><?php echo 'Rs. ' . sprintf('%.2f', $data['remaining_loan']); ?></div>
                    </div>
                    <div class="div-form">
                        <div class="title">
                            <h2>Payment Details</h2>
                        </div>
                        <form action="" method="post">
                            <div class="input-container">
                                <label>Interest Amount (Rs.)</label>
                                <input type="text" name="paying-amount" value="<?php echo sprintf('%.2f', ceil($data['remaining_loan'] * $data['pawn_item']->Interest / 100)); ?>" placeholder="Interest Amount" readonly>
                            </div>
                            <div class="input-container">
                                <label>Date</label>
                                <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
                            </div>
                            <div class="input-container div-btn">
                                <input type="submit" name="pay" value="Pay">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>        
    </div>
        
    
    <script type="text/javascript">
        
    </script>

</body>
</html>