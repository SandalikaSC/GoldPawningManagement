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
                <div class="msg-flash"><?php echo flash('register'); ?></div>
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
                    <form action="<?php echo URLROOT; ?>/Pawnings/confirm_pawn/<?php echo $data['validation_details']->id; ?>" method="post">
                        <div class="div-title">
                            <h2>Details for Pawning</h2>
                        </div>

                        <div class="main-input-container">
                            <div class="input-container">
                                <label>Customer Name</label>
                                <div>
                                    <input type="text" name="name" class="input-field" placeholder="<?php echo $data['customer_details']->First_Name . ' ' . $data['customer_details']->Last_Name; ?>" disabled> 
                                    <!-- <div><?php echo $data['customer_details']->First_Name ?></div> -->
                                </div>                                                           
                            </div>

                            <div class="input-container">
                                <label>NIC</label>
                                <div>
                                    <input type="text" name="nic" class="input-field" placeholder="<?php echo $data['customer_details']->NIC; ?>" disabled> 
                                    
                                </div>                            
                            </div>

                            <div class="input-container">
                                <label>Email</label>
                                <div>
                                    <input type="text" name="email" class="input-field" placeholder="<?php echo $data['customer_details']->email; ?>" disabled>                                     
                                </div>                            
                            </div>

                            <div class="input-container">
                                <label>Phone Number</label>
                                <div>
                                    <input type="text" name="phone" class="input-field" placeholder="<?php echo $data['customer_details']->phone; ?>" disabled>
                                </div>                            
                            </div>

                            <div class="input-container" <?php if($data['validation_details']->validation_status == 0) echo 'hidden'; ?>>
                                <label>Full Loan Amount (Rs. )<sup>*</sup></label>
                                <div>
                                    <input type="text" name="full-loan" class="input-field <?php echo (!empty($data['full_loan_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['full_loan']; ?>" placeholder="Full Loan Amount">   
                                    <span class="invalid-feedback"><?php echo $data['full_loan_err']; ?></span>
                                </div>                          
                            </div>

                            <div class="input-container" <?php if($data['validation_details']->validation_status == 0) echo 'hidden'; ?>>
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

                        <!-- <div class="div-buttons">
                            <button type="submit" class="btn-pawn">Pawn</button>
                            <input type="submit" value="Pawn" onclick="openPopup()"> 
                            <input type="submit" value="Cancel">  
                        </div> -->

                        <!-- <div class="popup" id="popup">
                            <div class="div-message">
                                <div class="msg">Confirm article pawning?</div>
                                <div class="div-buttons">
                                    <div><input type="submit" class="button btn-confirm" value="Confirm"></div> 
                                    <div><a class="button btn-confirm" href="">Confirm</a></div>
                                    <div><a class="button btn-cancel" href="">Cancel</a></div>                         
                                </div>
                                
                            </div>
                        </div> -->

                        <div class="div-buttons">
                            <?php if($data['validation_details']->validation_status) : ?>
                                <input type="submit" name="pawn" value="Pawn"> 
                            <?php endif; ?>

                            <input type="submit" name="dismiss" value="Dismiss">                             
                            <input type="submit" name="cancelzsvr" value="Cancel"> 
                        </div>
                    </form>
                    
                </div>
            </div>

            
            
        </main>
    </div>

    <script type="text/javascript">
        // let popup = document.getElementById("popup");

        // function openPopup() {
        //     popup.classList.add("open-popup");
        // }
    </script>

</body>
</html>