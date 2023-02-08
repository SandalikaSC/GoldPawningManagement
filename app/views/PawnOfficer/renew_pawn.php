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
            <div class="left-wrapper">
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
                                <div class="div-radio">
                                    <div>
                                        <input type="radio">
                                        <label>Fixed</label>
                                    </div>
                                    <div>
                                        <input type="radio">
                                        <label>Partial</label>
                                    </div>
                                </div>  
                                <span class="invalid-feedback"></span>
                            </div>
                            
                            <div class="field-wrapper">
                                <a href="" class="btn-renew">Save</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- <div class="div-form">
                    <div class="form-wrapper">
                        <div class="form-title">
                            <h2>New Pawning Details</h2>
                        </div>
                        <form action="">
                            <div class="field">
                                <label>Loan Amount (Rs.)</label>
                                <input type="text" placeholder="Loan Amount">
                            </div>
                            <div class="field">
                                <label>End Date</label>
                                <input type="date" placeholder="End Date">
                            </div>
                            <div class="field">
                                <label>Payment Method</label>
                                <div class="div-radio">
                                    <div>
                                        <input type="radio">
                                        <label>Fixed</label>
                                    </div>
                                    <div>
                                        <input type="radio">
                                        <label>Partial</label>
                                    </div>
                                </div>                                
                            </div>
                            <div class="div-btn">
                                <a href="">Renew Pawn</a>
                            </div>
                        </form>
                    </div>
                    
                </div> -->
            </div>          
        </main>        
    </div>
        
    
    <script type="text/javascript">
        // const realFileBtn = document.getElementById("real-file");
        // const customBtn = document.getElementById("custom-button");
        // const customTxt = document.getElementById("custom-text");

        // customBtn.addEventListener("click", function() {
        //     realFileBtn.click();
        // });

        // realFileBtn.addEventListener("change", function() {
        //     if(realFileBtn.value) {
        //         customTxt.innerHTML = realFileBtn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
        //     } else {
        //           customTxt.innerHTML = "Image";
        //     }
        // });
    </script>

</body>
</html>