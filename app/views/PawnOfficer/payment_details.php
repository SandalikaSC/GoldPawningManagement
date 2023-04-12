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
                <div class="left-wrapper">

                    <h2>Article Details</h2>
                    <div class="div-details"> 
                        <div class="article-image">
                            <img src="<?php echo URLROOT . '/img/bracelet_01.jpg'; ?>" alt="">
                        </div>
                        <div class="article-details">  
                            <div class="div-row">
                                <div class="field-container">
                                    <label>ARTICLE ID</label>
                                    <div><?php echo $data['pawn_item']->Article_Id; ?></div>
                                </div>
                                <div class="field-container">
                                    <label>CUSTOMER ID</label>
                                    <div><?php echo $data['pawn_item']->userId; ?></div>
                                </div>
                            </div>
                            <div class="div-row">
                                <div class="field-container">
                                    <label>PAWNED DATE</label>
                                    <div><?php echo date('Y-m-d', strtotime($data['pawn_item']->Pawn_Date)); ?></div>
                                </div>
                                <div class="field-container">
                                    <label>END DATE</label>
                                    <div><?php echo $data['pawn_item']->End_Date; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="due-payments">
                        <h2>Due Payments</h2>             
                        <div>
                            <label>Due Amount</label>
                            <div class="amount"><?php echo 'Rs. 5000.00'; ?></div>
                        </div>
                        <div>
                            <label>Due Date</label>
                            <div class="due-date warning"><?php echo '2023/01/31'; ?></div>
                        </div>
                    </div>

                </div>

                <div class="right-wrapper">

                </div>

                <!-- <div class="left-wrapper">   
                    <div class="div-details">
                        <div class="article-details">
                            <div class="article-image">
                                <img src="<?php echo URLROOT . '/img/bracelet_01.jpg'; ?>" alt="">
                            </div>
                            <div class="field-wrapper">
                                <div class="field-container">
                                    <label>Article ID</label>
                                    <div><?php echo $data['pawn_item']->Article_Id; ?></div>
                                </div>
                                <div class="field-container">
                                    <label>Customer ID</label>
                                    <div><?php echo $data['pawn_item']->userId; ?></div>
                                </div>
                                <div class="field-container">
                                    <label>Pawned Date</label>
                                    <div><?php echo date('Y-m-d', strtotime($data['pawn_item']->Pawn_Date)); ?></div>
                                </div>
                                <div class="field-container">
                                    <label>End Date</label>
                                    <div><?php echo $data['pawn_item']->End_Date; ?></div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="due-payment">       
                            <h2>Due Payments</h2>             
                            <div>
                                <label>Due Amount</label>
                                <div class="amount"><?php echo 'Rs. 5000.00'; ?></div>
                            </div>
                            <div>
                                <label>Due Date</label>
                                <div class="due-date warning"><?php echo '2023/01/31'; ?></div>
                            </div>
                        </div> 
                    </div>                                      
                </div>

                <div class="right-wrapper">
                    <div class="full-amount">
                        <label>Full Loan Amount:</label>
                        <div class="amount"><?php echo 'Rs. 120000.00'; ?></div>
                    </div>
                    <div class="table-container">
                        <div class="table-title">
                            <h2>Payment History</h2>
                        </div>
                        <div class="div-table-appointments">
                            <table>
                                <thead>
                                    <tr>
                                        <td>Payment ID</td>
                                        <td>Installment</td>
                                        <td>Paid Date</td>
                                        <td>Paid Amount</td>
                                    </tr> 
                                </thead>
                                <tbody>

                                    <?php foreach ($data['appointments'] as $appointment) : ?>
                                        <tr>
                                            <td><?php echo $appointment->Appointment_Id;?></td>
                                            <td><?php echo $appointment->appointment_date;?></td>
                                            <td><?php echo $appointment->time;?></td>
                                            <td><?php echo $appointment->description;?></td>
                                        </tr>
                                    <?php endforeach; ?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="btn-container">
                        <a href="<?php echo URLROOT; ?>/pawnings/make_payments/<?php echo $data['pawn_item']->Pawn_Id; ?>" class="button">Make Payments</a>
                        <a href="<?php echo URLROOT; ?>/pawnings/release_pawn/<?php echo $data['pawn_item']->Pawn_Id; ?>" class="button">Release Pawn</a>
                        <a href="<?php echo URLROOT; ?>/pawnings/renew_pawn/<?php echo $data['pawn_item']->Pawn_Id; ?>" class="button">Renew Pawn</a>
                    </div>
                </div> -->
            </div>
            
        </main>        
    </div>
        
    
    <script type="text/javascript">
        
    </script>

</body>
</html>