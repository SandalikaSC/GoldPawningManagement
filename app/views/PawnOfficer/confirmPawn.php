<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_confirm_pawn.css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="title">
                <a href="<?php echo URLROOT; ?>/pawningOfficerDashboard/dashboard">
                    <img src="<?php echo URLROOT . '/img/back-arrow.png'; ?>">
                </a>
                
                <h1>New Pawning</h1>
            </div>
            
            <div class="logo">
                <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
            </div>
        </div>
        <div class="form-container">
            <div class="payment-validate">
                <div class="customer-details form-wrapper">
                    <h2 class="form-header">Customer Details</h2>
                    <form action="" method="post">
                        <div class="fields-container">
                            <label for="full-name">Full Name<sup>*</sup></label>
                            <div class="div-input">                        
                                <input type="text" placeholder="Full Name">
                            </div> 
                        </div> 
    
                        <div class="fields-container">
                            <label for="full-name">NIC<sup>*</sup></label>
                            <div class="div-input">                        
                                <input type="text" placeholder="NIC">
                            </div> 
                        </div> 
    
                        <div class="fields-container">
                            <label for="full-name">Phone Number<sup>*</sup></label>
                            <div class="div-input">                        
                                <input type="text" placeholder="Phone Number">
                            </div> 
                        </div>
    
                        <div class="fields-container">
                            <label for="full-name">Email<sup>*</sup></label>
                            <div class="div-input">                        
                                <input type="text" placeholder="Email">
                            </div> 
                        </div>                    
                    </form>
                </div>

                <div class="article-details form-wrapper">
                    <h2 class="form-header">Article Details</h2>
                    <form action="" method="post">
                        <div class="fields-container">
                            <label for="type">Type<sup>*</sup></label>
                            <div class="div-input">                        
                                <select name="type" id="type">
                                    <option selected disabled>Choose a type</option>
                                    <option name="jewelry">Jewelry</option>
                                </select>
                            </div>                        
                        </div>
                        <div class="fields-container">
                            <label for="image">Image<sup>*</sup></label>
                            <div class="file-container">
                                <input type="file" id="real-file" hidden="hidden">
                                <span id="custom-text">Image</span>
                                <button type="button" id="custom-button">Choose</button>
                            </div>                        
                        </div>
                    </form>
                </div>
            </div>
            

            <div class="payment-validate">
                <div class="payment-method">
                    <h2 class="form-header">Payment Method</h2>
                    <form action="" method="post">
                        <div class="fields-container">                        
                            <label for="method">
                                <input type="radio" name="method" value="Fixed" checked> Fixed
                            </label>
                            <label for="method">
                                <input type="radio" name="method" value="Partial"> Partial
                            </label>                        
                        </div>
                    </form>
                </div>

                <div class="validation-details">
                    <h2 class="form-header">Validation Details</h2>
                    <form action="" method="post">
                        <div class="fields-container">
                            <label for="full-name">Weight<sup>*</sup></label>
                            <div class="div-input">                        
                                <input type="text" placeholder="Weight">
                            </div> 
                        </div> 
    
                        <div class="fields-container">
                            <label for="full-name">Karats<sup>*</sup></label>
                            <div class="div-input">                        
                                <input type="text" placeholder="Karats">
                            </div> 
                        </div> 
    
                        <div class="fields-container">
                            <label for="full-name">Estimated Value<sup>*</sup></label>
                            <div class="div-input">                        
                                <input type="text" placeholder="Estimated Value">
                            </div> 
                        </div>                   
                    </form>
                </div>      
                
                <div class="payment-method">
                    <h2 class="form-header">Validation Status</h2>
                    <form action="" method="post">
                        <div class="fields-container">                        
                            <label for="method">
                                <input type="radio" name="method" value="Valid" checked> Valid
                            </label>
                            <label for="method">
                                <input type="radio" name="method" value="Invalid"> Invalid
                            </label>                        
                        </div>
                    </form>
                </div>
    
                <div class="buttons-container">
                    <a href="#" class="pawn">Pawn</a>
                    <a href="#" class="cancel">Cancel</a>
                </div>
            </div>            
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