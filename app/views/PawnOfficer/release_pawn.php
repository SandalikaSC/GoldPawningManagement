<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_release_pawn.css">
    <title>Vogue Pawn | Release Pawn</title>
</head>
<body> 
    
    <div class="wrapper">
        <div class="header">
            <div class="title">
                <a href="<?php echo URLROOT; ?>/pawnings/payment_details/<?php echo $data['pawn_item']->Pawn_Id; ?>">
                    <img src="<?php echo URLROOT . '/img/back-arrow.png'; ?>">
                </a>
                
                <h1>Release Pawn</h1>
            </div>
            
            <div class="logo">
                <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
            </div>
        </div>

        <main>
            <div class="main-content">
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
                    </div>
                    <div class="pawning-details">
                        <div class="field">
                            <label>Pawned Date</label>
                            <div>2022/06/20</div>
                        </div>
                        <div class="field">
                            <label>End Date</label>
                            <div>2023/02/20</div>
                        </div>
                    </div>
                    <div class="loan-details">
                        <div class="field">
                            <label>Full Loan Amount</label>
                            <div>Rs. 102000.00</div>
                        </div>
                        <div class="field">
                            <label>Remaining Loan Amount</label>
                            <div>Rs. 0.00</div>
                        </div>
                        <div class="field">
                            <label>Due Payments</label>
                            <div>Rs. 0.00</div>
                        </div>
                    </div>

                    <div class="div-buttons">
                        <a href="">Confirm Release</a>
                        <a href="">Cancel</a>
                    </div>
                </div>
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