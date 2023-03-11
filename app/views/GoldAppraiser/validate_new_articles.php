<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_validate_articles.css">
    <title>Vogue Pawn | Validate Article</title>
    <script src="<?php echo URLROOT . '/js/jquery.min.js'; ?>"></script>
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
            <div class="div-validation">
                <div class="article-details">
                    <div class="div-img">
                        <img src="<?php echo $data['article_details']->image; ?>">
                    </div>
                    <div class="div-details">
                        <div class="field">
                            <h1 class="type"><?php echo $data['article_details']->article_type; ?></h1>
                        </div>
                        <div class="field">
                            <div>
                                <label>Validation ID</label>
                                <div><?php echo $data['article_details']->id; ?></div>
                            </div>
                            <div>
                                <label>Customer ID</label>
                                <div><?php echo $data['article_details']->customer; ?></div>
                            </div>                            
                        </div>
                        
                    </div>
                </div>

                <div class="form-wrapper">
                    <div class="form-title">
                        <h1>Validation Details</h1>
                    </div>
                    <form action="<?php echo URLROOT; ?>/goldAppraiser/validate_articles/<?php echo $data['article_details']->id; ?>" method="post">
                        <div class="field-wrapper">
                            <label>Weight<sup>*</sup></label>
                            <div class="input-wrapper wrapper-weight">
                                <input type="text" name="weight" id="weight" class="<?php echo (!empty($data['weight_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['weight']; ?>" placeholder="Weight">                                

                                <select name="unit" id="unit">
                                    <option value="" class="default">Choose weight unit</option>
                                    <option value="ounce">Troy ounce</option>
                                    <option value="gram">gram</option>
                                </select>
                                
                            </div>
                            <div class="div-error">
                                <span class="invalid-feedback"><?php echo $data['weight_err']; ?></span>                               
                            </div>                            
                        </div>
                        <div class="field-wrapper">
                            <label>Carats<sup>*</sup></label>
                            <div class="input-wrapper">
                                <input type="text" name="carats" id="carats" class="<?php echo (!empty($data['karats_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['karats']; ?>" placeholder="Carats">
                            </div>
                            <span class="invalid-feedback"><?php echo $data['karats_err']; ?></span>
                        </div>
                        <div class="field-wrapper">
                            <label>Estimated Value (Rs.)<sup>*</sup></label>
                            <div class="input-wrapper">
                                <input type="text" name="estimated-value" id="estimated-value" placeholder="Estimated Value" disabled />
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
                            <input type="submit" class="btn-submit" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('input').keyup(function() {
                // Get input weight of the article
                var weight = parseFloat($('#weight').val());
                // Get input carat value of the article
                var carats = parseFloat($('#carats').val());
                // the unit of weight
                var unit = $('#unit').val();

                // Variable to store the gold price per 8g according to the carat value that retrieved from the db 
                var gold_price = 0.00;
                // Final value of the article
                var estimated_value = 0.00;
                
                // Get the gold rates array retrieved from db using PHP
                var gold_rates = <?php echo json_encode($data['gold_rates'])?>;

                // When the carat value is entered
                if(carats) {
                    for(var i = 0; i < gold_rates.length; i++){
                        // Get gold price according to carat value
                        if(gold_rates[i]['Karatage'] == carats) {
                            gold_price = gold_rates[i]['Price'];
                        }
                    }
                }

                // When the weight unit has chosen
                if(unit) {
                    // Get the gold price of 1g of the given caratage
                    var gram_price = gold_price / 8;

                    /* If the weight unit is 'Troy ounce'.
                       1 Troy ounce is approximately equal to 31g
                       Here the troy ounce value will be converted into grams*/
                    if(unit === "ounce") {
                        weight = weight * 31;
                    }

                    var pure_gold_price = weight * gram_price;

                    // Calculate the value of the gold article
                    estimated_value = (pure_gold_price * carats / 24).toFixed(2);
                }

                if(weight && carats && unit) {
                    $('#estimated-value').attr('value', estimated_value);
                }                
            });
        });
    </script>
 
</html>