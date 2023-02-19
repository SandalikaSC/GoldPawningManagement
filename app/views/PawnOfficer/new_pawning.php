<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_new_pawn.css">
    <title>Vogue Pawn | New Pawning</title>
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

        <div class="msg-flash"><?php echo flash('register'); ?></div>
        
        <main>
            <div class="details-container">
                <div class="left-wrapper">               
                    <div>
                        <form action = "<?php echo URLROOT; ?>/pawnings/find_customer" method = "POST">
                            <div class="div-search">
                                <input type="text" name="nic" placeholder="Enter Customer NIC">
                                <input type="submit" value="Search">
                            </div>  
                            <div class="form-title">
                                <h2>Customer Details</h2>
                            </div>
                            <div class="field-container">
                                <label>Full Name</label>
                                <div>Anjalee Neelika</div>
                            </div>
                            <div class="field-container">
                                <label>NIC</label>
                                <div>199985510370</div>
                            </div>
                            <div class="field-container">
                                <label>Phone Number</label>
                                <div>0713577800</div>
                            </div>
                            <div class="field-container">
                                <label>Email</label>
                                <div>anjaleeneelika456@gmail.com</div>
                            </div>                          
                        </form> 
                        
                    </div>                    
                </div>
                <div class="right-wrapper">
                    <form action="<?php echo URLROOT; ?>/pawnings/new_pawning" method="post">
                        <div class="form-divider article-details">
                            <div class="form-title">
                                <h2>Article Details</h2>
                            </div>
                            <div class="field-container">
                                <label for="article-type">Article Type<sup>*</sup></label>
                                <div>
                                    <select name="Type" id="type">
                                        <option selected disabled>Choose a type</option>
                                        <option name="Gold Bar">Gold Bar</option>
                                        <option name="Necklace">Necklace</option>
                                        <option name="Earings">Earings</option>
                                        <option name="Bracelet">Bracelet</option>
                                        <option name="Ring">Ring</option>
                                        <option name="Other">Other</option>
                                    </select class="<?php echo (!empty($data['type_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['type']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['type_err']; ?></span>     
                                </div>
                            </div>
                            <div class="field-container">
                                <label for="article-image">Image of the Article<sup>*</sup></label>
                                <div class="file-container">
                                    <input type="file" name="file" class="<?php echo (!empty($data['file_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['file']; ?>"  id="real-file" hidden="hidden">
                                    <span id="custom-text" name="custom-text">Image</span>
                                    <button type="button" id="custom-button">Choose</button>
                                </div>   
                                <span class="invalid-feedback"><?php echo $data['file_err']; ?></span>                      
                            </div>
                        </div>
                        
                        <div class="form-divider loan-details">
                            <div class="form-title">
                                <h2>Loan Details</h2>
                            </div>
                            <div class="field-container">
                                <label>Payment Method</label>
                                <div class="pay-method">                        
                                    <label>
                                        <input type="radio" name="pay-method" value="Fixed" checked> Fixed
                                    </label>
                                    <label>
                                        <input type="radio" name="pay-method" value="Partial"> Partial
                                    </label>
                                </div>  
                            </div>
                        </div>

                        <div class="div-btn">
                            <input type="submit" name="submit" value="Send to Validate">
                        </div>
                    </form>
                </div>
            </div>
        </main>
                  
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