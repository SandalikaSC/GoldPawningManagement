<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_make_payments.css">
    <title>Vogue Pawn | Make Payments</title>
</head>
<body> 
    
    <div class="wrapper">
        <div class="header">
            <div class="title">
                <a href="<?php echo URLROOT; ?>/pawnings/payment_details/<?php echo $data['pawn_item']->Pawn_Id; ?>">
                    <img src="<?php echo URLROOT . '/img/back-arrow.png'; ?>">
                </a>
                
                <h1>Payments</h1>
            </div>
            
            <div class="logo">
                <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
            </div>
        </div>

        <div class="form-container">
            <div class="article-details">
                <div>
                    <h4 class="form-header">Customer ID</h4>
                    <p><?php echo $data['pawn_item']->userId; ?></p>
                </div>
                <div>
                    <h4 class="form-header">Article ID</h4>
                    <p><?php echo $data['pawn_item']->Article_Id; ?></p>
                </div>
                <div>
                    <h4 class="form-header">Pawned Date</h4>
                    <p><?php echo date('Y/m/d', strtotime($data['pawn_item']->Pawn_Date)); ?></p>
                </div>
                <div>
                    <img src="<?php echo URLROOT . '/img/bracelet_01.jpg'; ?>">
                </div>
            </div>
        </div>
        <div class="form-container">
            <div class="payment-details">
                <h2 class="form-header">Payment Details</h2>
                
                <form action="" method="post">
                    <div class="field-wrapper">
                        <label>Amount<sup>*</sup></label>
                        <div class="input-wrapper">
                            <input type="text" name="amount" placeholder="Amount">
                        </div>
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="field-wrapper">
                        <label>Date<sup>*</sup></label>
                        <div class="input-wrapper">
                            <input type="date" name="date">
                        </div>
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="field-wrapper">
                        <label>Fine</label>
                        <div class="input-wrapper">
                            <input type="text" name="fine" placeholder="Fine">
                        </div>
                        <span class="invalid-feedback"></span>
                    </div>
                </form>                
            </div>

            <div class="payment-details">
                <h2 class="form-header">Remaining Loan Amount</h2>
                <div class="remaining-amount">Rs. 100000.00</div>
            </div>
        </div>

        <div class="form-container">
            <a href="" class="btn save">Save</a>
            <a href="" class="btn cancel">Cancel</a>
        </div>
                   
    </div>
    
    <script type="text/javascript">
        const realFileBtn = document.getElementById("real-file");
        const customBtn = document.getElementById("custom-button");
        const customTxt = document.getElementById("custom-text");

        customBtn.addEventListener("click", function() {
            realFileBtn.click();
        });

        realFileBtn.addEventListener("change", function() {
            if(realFileBtn.value) {
                customTxt.innerHTML = realFileBtn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
            } else {
                  customTxt.innerHTML = "Image";
            }
        });
    </script>

</body>
</html>