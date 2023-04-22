<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vogue Pawn | Confirm Pawn</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_confirm_pawn.css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="title">
                <a href="<?php echo URLROOT; ?>/pawningOfficerDashboard/dashboard">
                    <img src="<?php echo URLROOT . '/img/back-arrow.png'; ?>">
                </a>
                
                <h1>Confirm Pawning</h1>
            </div>
            
            <div class="logo">
                <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
            </div>
        </div>

        <main>
            <div class="main-div-container">
                <div class="validation-details">
                    <div class="article-img">
                        <img src="<?php echo $data['validation_details']->image; ?>" alt="Article Image">
                    </div>
                    <div class="div-details">
                        <div class="div-field left-field">
                            <label>ARTICLE TYPE</label>
                            <div><?php echo $data['validation_details']->article_type; ?></div>
                        </div>
                        <div class="div-field right-field">
                            <label>WEIGHT</label>
                            <div><?php echo $data['validation_details']->weight . 'g'; ?></div>
                        </div>
                        <div class="div-field left-field">
                            <label>CARATS</label>
                            <div><?php echo $data['validation_details']->karatage; ?></div>
                        </div>
                        <div class="div-field right-field">
                            <label>VALIDATION STATUS</label>
                            <div><?php echo ($data['validation_details']->validation_status) ? "Valid" : "Invalid" ; ?></div>
                        </div>
                        <div class="estimated-value">
                            <div class="div-field">
                                <label>ESTIMATED VALUE</label>
                                <div><?php echo 'Rs. ' . $data['validation_details']->estimated_value; ?></div>
                            </div>                            
                        </div>
                    </div>
                </div>

                <div class="pawning-details">
                    <form action="">
                        <div class="div-title">
                            <h2>Details for Pawning</h2>
                        </div>

                        <div class="main-input-container">
                            <div class="input-container">
                                <label>Customer Name<sup>*</sup></label>
                                <div>
                                    <input type="text" name="name" class="input-field <?php echo (!empty($data['customer_name_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['customer_name']; ?>" placeholder="Name">                                      
                                </div> 
                                <span class="invalid-feedback"><?php echo $data['customer_name_err']; ?></span>                            
                            </div>

                            <div class="input-container">
                                <label>NIC<sup>*</sup></label>
                                <div>
                                    <input type="text" name="nic" class="input-field <?php echo (!empty($data['nic_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['nic']; ?>" placeholder="NIC"> 
                                </div>    
                                <span class="invalid-feedback"><?php echo $data['nic_err']; ?></span>                         
                            </div>

                            <div class="input-container">
                                <label>Email<sup>*</sup></label>
                                <div>
                                    <input type="text" name="email" class="input-field <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['email']; ?>" placeholder="Email">
                                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>  
                                </div>                            
                            </div>

                            <div class="input-container">
                                <label>Phone Number</label>
                                <div>
                                    <input type="text" name="phone" class="input-field" placeholder="Phone Number">
                                </div>                            
                            </div>

                            <div class="input-container">
                                <label>Full Loan Amount (Rs. )<sup>*</sup></label>
                                <div>
                                    <input type="text" name="full-loan" class="input-field <?php echo (!empty($data['full_loan_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['full_loan']; ?>" placeholder="Full Loan Amount">
                                </div>   
                                <span class="invalid-feedback"><?php echo $data['full_loan_err']; ?></span>                          
                            </div>

                            <div class="input-container">
                                <label>Loan Payment Method</label>
                                <div class="payment-method">                        
                                    <label>
                                        <input type="radio" name="payment-method" value="Fixed" checked> Fixed
                                    </label>
                                    <label>
                                        <input type="radio" name="payment-method" value="Diminishing"> Diminishing
                                    </label>
                                </div>                            
                            </div>
                        </div>  

                        <div class="div-buttons">
                            <input type="submit" value="Pawn">
                            <!-- <input type="submit" value="Cancel"> -->
                        </div>
                    </form>
                </div>
            </div>
            
        </main>

        <!-- <div class="form-container">
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
        </div>           -->
    </div>

    <script type="text/javascript">
        
    </script>

</body>
</html>