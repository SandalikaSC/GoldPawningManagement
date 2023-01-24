<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <div class="payment-history">
                    <h2 class="form-header">Payment History</h2>
                    <table>
                        <tr>
                            <th>Payment ID</th>
                            <th>Installments</th>
                            <th>Paid Date</th>
                            <th>Paid Amount</th> 
                        </tr>
                        <tr>
                            <td>PD1956</td>
                            <td>03</td>
                            <td>2022/09/30</td>
                            <td>RS. 5000.00</td> 
                        </tr>
                    </table>
                </div>
                <div class="payments-amount">
                    <div class="due-loan due-pay">
                        <h2 class="form-header">Due Payments</h2>
                        <div class="content">Amount: <p>Rs. 5000.00</p></div>
                        <div class="content">Due Date: <p>2022/10/31</p></div>
                    </div>
                    <div class="due-loan">
                        <h2 class="form-header">Full Loan Amount</h2>
                        <div class="content"><?php echo 'Rs. ' . $data['pawn_item']->Amount; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-container btn-container">
            <a href="#" class="button">Make Payments</a>
            <a href="#" class="button">Release Pawn</a>
            <a href="#" class="button">Renew Pawn</a>
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