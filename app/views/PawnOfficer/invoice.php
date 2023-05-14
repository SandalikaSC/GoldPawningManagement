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

    <main>
        <div class="div-receipt">
            <div class="div-title">
                <div class="div-logo">
                    <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>" alt="logo_name">
                </div>
                <div class="receipt-name">
                    <h1>Invoice</h1>
                </div>
            </div>
            <div class="div-detail-container">
                <div class="company-details">
                    <div class="field-container">
                        <h2>Vogue Pawn</h2>                    
                    </div>
                    <div class="field-container">
                        <span>No.528 Galle Road, Colombo 03</span>                 
                    </div>
                    <div class="field-container">
                        <span class="contact">voguepawners@gmail.com</span>
                    </div> 
                    <div class="field-container">
                        <span class="contact">0112 414 414</span>
                    </div>
                    <div class="field-container">
                        <span class="contact">0112 129 329</span>
                    </div>
                </div>
                <div class="customer-details">
                    Bill for:
                    <div class="field-container">
                        <span><?php echo $data['customer']->First_Name . ' ' . $data['customer']->Last_Name; ?></span>
                    </div>
                    <div class="field-container">
                        <span>
                        <?php if(($data['customer']->Line1 != "Empty") || (!empty($data['customer']->Line1))) { echo $data['customer']->Line1 . ', '; } ?>
                            <?php if(($data['customer']->Line2 != "Empty") || (!empty($data['customer']->Line2))) { echo $data['customer']->Line2 . ', '; } ?>
                            <?php if(($data['customer']->Line3 != "Empty") || (!empty($data['customer']->Line3))) { echo $data['customer']->Line3; } ?>
                        </span>
                    </div>
                    <div class="field-container">
                        <span class="contact"><?php echo $data['customer']->email; ?></span>
                    </div>
                    <div class="field-container">
                        <span class="contact"><?php echo $data['customer']->phone; ?></span>
                    </div>    
                </div>
            </div>
                    
            <div class="article-details">
                <div class="div-image">
                    <img src="<?php echo $data['pawn_item']->image; ?>">
                </div>
                <div class="div-details">
                    <div class="field">
                        <label>Article Type:</label>
                        <div><?php echo $data['pawn_item']->Type; ?></div>
                    </div>
                    <div class="field">
                        <label>Article ID:</label>
                        <div><?php echo $data['pawn_item']->Article_Id; ?></div>
                    </div>
                    <div class="field">
                        <label>Pawn ID:</label>
                        <div><?php echo $data['pawn_item']->Pawn_Id; ?></div>
                    </div>
                    <div class="field">
                        <label>Pawned Date:</label>
                        <div><?php echo date('Y-m-d', strtotime($data['pawn_item']->Pawn_Date)); ?></div>
                    </div>
                    <div class="field">
                        <label>End Date:</label>
                        <div><?php echo $data['pawn_item']->End_Date; ?></div>
                    </div>
                </div>                
            </div>

            <div class="payment-details">
                <div class="div-title">
                    <h2>Payment Details</h2>
                </div>
                <div class="div-details">
                    <div class="div-container">
                        <div class="field">
                            <label>Payment ID</label>
                            <div><?php echo $data['payment_details']->PID; ?></div>
                        </div>
                        <div class="field">
                            <label>Payment No</label>
                            <div><?php echo $data['payment_no']; ?></div>
                        </div>
                        <div class="field">
                            <label>Paid Full Amount</label>
                            <div><?php echo 'Rs. ' . $data['payment_details']->Amount; ?></div>
                        </div>
                        <div class="field">
                            <label>Paid Amount from Loan</label>
                            <div><?php echo 'Rs. ' . $data['payment_details']->Principle_Amount; ?></div>
                        </div>
                        <div class="field">
                            <label>Date</label>
                            <div><?php echo date('Y-m-d', strtotime($data['payment_details']->Date)); ?></div>
                        </div>
                        <div class="field">
                            <label>Time</label>
                            <div><?php echo date('H:i:s', strtotime($data['payment_details']->Date)); ?></div>
                        </div>
                    </div>                    
                </div>
            </div>

            
            <?php if($data['payment_no'] > 1) : ?>
                <div class="payment-history">
                    <div class="div-title">
                        <h2>Payment History</h2>
                    </div>
                    <div class="div-table">
                        <table cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Payment ID</th>
                                    <th>Payment No</th>
                                    <th>Full Amount (Rs.)</th>
                                    <th>Covered Loan Amount (Rs.)</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                                    $payment_no = 0;
                                    foreach ($data['payment_history'] as $payment) :
                                ?>
                                    <?php if($payment->PID != $data['payment_details']->PID) : ?>
                                        <tr>
                                            <td><?php echo $payment->PID; ?></td>
                                            <td><?php echo ++$payment_no; ?></td>
                                            <td><?php echo $payment->Amount; ?></td>
                                            <td class="loan-amount"><?php echo $payment->Principle_Amount; ?></td>
                                            <td><?php echo date('Y-m-d', strtotime($payment->Date)); ?></td>
                                        </tr>
                                    <?php endif; ?>                                    
                                <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>

            <div class="loan-details">
                <div class="field">
                    <label>Full Loan Amount</label>
                    <div><?php echo 'Rs. ' . $data['pawn_item']->Amount; ?></div>
                </div>
                <div class="field">
                    <label>Remaining Loan Amount</label>
                    <div><?php echo 'Rs. ' . sprintf('%.2f', $data['remaining_loan']); ?></div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
