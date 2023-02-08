<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_validate_articles.css">
    <title>Vogue Pawn | Validate Article</title>
</head>
<body>
   
    <div class="wrapper">
        <div class="header">
            <div class="title">
                <a href="<?php echo URLROOT; ?>/goldAppraiser/dashboard">
                    <img src="<?php echo URLROOT . '/img/back-arrow.png'; ?>">
                </a>
                <div><h1>Validate Article</h1></div>
            </div>
            
            <div class="logo">
                <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
            </div>
        </div>

        <main>
            <div class="left-content">
                <div class="article-details">
                    <div class="div-img">
                        <img src="<?php echo URLROOT?>/img/ring1.jpg">
                    </div>
                    <div class="div-details">
                        <div class="field">
                            <label>Article ID</label>
                            <div>AR001</div>
                        </div>
                        <div class="field">
                            <label>Customer ID</label>
                            <div>C0001</div>
                        </div>
                        <div class="field">
                            <label>Type</label>
                            <div>Jewelry</div>
                        </div>
                    </div>
                </div>

                
            </div>
            <div class="right-content">                
                <div class="form-wrapper">
                    <div class="form-title">
                        <h2>Validation Details</h2>
                    </div>
                    <form action="" method="post">
                        <div class="field-wrapper">
                            <label>Weight (g)<sup>*</sup></label>
                            <div class="input-wrapper">
                                <input type="text" name="amount" placeholder="Weight">
                            </div>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="field-wrapper">
                            <label>Karats<sup>*</sup></label>
                            <div class="input-wrapper">
                                <input type="text" name="karats" placeholder="Karats">
                            </div>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="field-wrapper">
                            <label>Estimated Value (Rs.)<sup>*</sup></label>
                            <div class="input-wrapper">
                                <input type="text" name="estimated-value" placeholder="Estimated Value">
                            </div>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="field-wrapper">
                            <label>Validation Status</label>
                            <div class="status">                        
                                <label>
                                    <input type="radio" name="status" value="Valid" checked> Valid
                                </label>
                                <label>
                                    <input type="radio" name="status" value="Invalid"> Invalid
                                </label>
                            </div> 
                        </div>                         
                        <div class="btn-container">
                            <a href="" class="btn-submit">Submit</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    
    <script>

    </script>
 
</html>