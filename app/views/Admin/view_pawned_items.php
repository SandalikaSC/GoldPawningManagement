<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_ad_view_pawned_items.css">
    <title>Vogue Pawn | Payment Details</title>
</head>
<body> 
    
    <div class="wrapper">
        <div class="header">
            <div class="title">
                <a href="<?php echo URLROOT; ?>/admin/pawned_items">
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
                        <img src="<?php echo URLROOT?>/img/gold_bracelet.jpg">
                    </div>
                    <div class="div-details">
                        <div class="field">
                            <label>Customer ID</label>
                            <div>CS0021</div>
                        </div>
                        <div class="field">
                            <label>Article ID</label>
                            <div>AR1067</div>
                        </div>
                        <div class="field">
                            <label>Pawned Date</label>
                            <div>2022/11/03</div>
                        </div>
                        <div class="field">
                            <label>Due Date</label>
                            <div>2023/11/03</div>
                        </div>
                        <div class="field">
                            <label>Full Loan Amount</label>
                            <div>Rs. 120000.00</div>
                        </div>
                        <div class="field">
                            <label>Registered By</label>
                            <div>PO001</div>
                        </div>
                        <div class="field">
                            <label>Validated By</label>
                            <div>GA0012</div>
                        </div>
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
                            <div>Rs. 5000.00</div>
                        </div>
                        <div class="field">
                            <label>Due Date</label>
                            <div>2023/01/28</div>
                        </div>
                    </div>
                </div>

                <div class="payment-history">
                    <div class="table-wrapper">
                        <div class="title">
                            <h2>Payment History</h2>
                        </div>
                        <div class="div-table">
                            <table>
                                <thead>
                                    <tr>
                                        <td>Payment ID</td>
                                        <td>Installment No</td>
                                        <td>Paid Date</td>
                                        <td>Paid Account</td>
                                    </tr> 
                                </thead>
                                <tbody>
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
                </div>
            </div>
        </main>
        
    </div>
        
    
    <script type="text/javascript">
        
    </script>

</body>
</html>