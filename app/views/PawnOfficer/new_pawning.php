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
            <div class="form-container">
                <div class="left-wrapper">
                    <img src="<?php echo URLROOT?>/img/alex-azabache-y2ErhoE92KA-unsplash.jpg">
                </div>

                <div class="right-wrapper">
                    <form action="<?php echo URLROOT; ?>/pawnings/new_pawning" method="POST" enctype="multipart/form-data">
                        <div class="title">
                            <h2>Customer Details</h2>
                        </div>
                        <div class="field-container">
                            <label for="nic">NIC<sup>*</sup></label>
                            <div>
                                <input type="text" name="nic" id="nic" placeholder="Enter customer NIC" class="<?php echo (!empty($data['nic_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['nic']; ?>">
                                <span class="invalid-feedback"><?php echo $data['nic_err']; ?></span> 
                            </div>  
                        </div>
                        <div class="field-container div-email">
                            <label for="email">Email<sup>*</sup></label>
                            <div>
                                <input type="text" name="email" id="email" placeholder="Enter customer email" class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['email']; ?>">
                                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>   
                            </div>
                        </div>

                        <div class="title">
                            <h2>Article Details</h2>
                        </div>
                        <div class="field-container">
                            <label for="type">Article Type<sup>*</sup></label>
                            <div>
                                <select name="type" id="type" class="<?php echo (!empty($data['type_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['type']; ?>">
                                    <option selected disabled>Choose a type</option>
                                    <option value="Gold Bar">Gold Bar</option>
                                    <option value="Necklace">Necklace</option>
                                    <option value="Earings">Earings</option>
                                    <option value="Bracelet">Bracelet</option>
                                    <option value="Ring">Ring</option>
                                    <option value="Other">Other</option>
                                </select>
                                <span class="invalid-feedback"><?php echo $data['type_err']; ?></span>   
                            </div>                            
                        </div>

                        <div class="field-container">
                            <label for="article-image">Article Image<sup>*</sup></label>
                            <div>
                                <div class="choose-image">
                                    <input type="file" name="image-file" id="image-file" hidden>
                                    <input type="hidden" id="imageData" name="image">
                                    <span id="img-name" >Choose an image</span>
                                    <button type="button" id="choose">Choose</button>                                
                                </div class="<?php echo (!empty($data['image_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['image']; ?>">
                                <span class="invalid-feedback"><?php echo $data['image_err']; ?></span> 
                            </div>                                                
                        </div>

                        <div class="div-submit">
                            <input type="submit" id="submit-button" class="btn-submit" value="Send to Validate">
                        </div>
                        
                    </form>
                </div>
            </div>
        </main>
                  
    </div>
    
    <script type="text/javascript">
        let realFileBtn = document.getElementById('image-file');
        const customBtn = document.getElementById("choose");
        const customTxt = document.getElementById("img-name");
        let save = document.getElementById('submit-button');
        let image = '';

        customBtn.addEventListener('click', function() {
            realFileBtn.click();
        });

        realFileBtn.addEventListener("change", () => {
            file = realFileBtn.files[0];
            if(file) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(file);
                fileReader.addEventListener('load', () => {
                    image = fileReader.result;
                    document.getElementById('imageData').value = image;
                });
            }
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