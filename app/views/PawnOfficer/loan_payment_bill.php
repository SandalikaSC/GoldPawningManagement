<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vogue Pawn | Payment Receipt</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_payment_receipt.css">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
</head>
<body>
    <header>
        <div class="button-container">
            <button type="submit" class="main-btn">Print</button>
            <button type="submit" class="main-btn">Cancel</button>
        </div>
    </header>

    <main>
        <div class="div-receipt">
            <div class="div-title">
                <div class="div-logo">
                    <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>" alt="logo_name">
                </div>
                <div class="receipt-name">
                    <h2>Pawning Installment Payment Receipt</h2>
                </div>
            </div>
            <div class="div-container">
                <div class="customer-details">
                    <div class="field-container">
                        <label>Customer ID : </label>
                        <span><?php echo $data['pawn_item']->userId; ?></span>
                    </div>
                    <div class="field-container">
                        <label>Name : </label>
                        <span><?php echo $data['customer']->First_Name . ' ' . $data['customer']->Last_Name; ?></span>
                    </div>
                    <div class="field-container">
                        <label>NIC : </label>
                        <span><?php echo $data['customer']->NIC; ?></span>
                    </div>
                    <div class="field-container">
                        <label>Phone Number : </label>
                        <span><?php echo $data['customer']->phone; ?></span>
                    </div>
                    <div class="field-container">
                        <label>Email : </label>
                        <span><?php echo $data['customer']->email; ?></span>
                    </div>
                    <div class="field-container">
                        <label>Home Address : </label>
                        <span>
                            <?php if(($data['customer']->Line1 != "Empty") || (!empty($data['customer']->Line1))) { echo $data['customer']->Line1 . ', '; } ?>
                            <?php if(($data['customer']->Line2 != "Empty") || (!empty($data['customer']->Line2))) { echo $data['customer']->Line2 . ', '; } ?>
                            <?php if(($data['customer']->Line3 != "Empty") || (!empty($data['customer']->Line3))) { echo $data['customer']->Line3; } ?>
                        </span>
                    </div>
                </div>

                <div class="payment-details">
                    
                </div>
            </div>
        </div>
    </main>
</body>
</html>