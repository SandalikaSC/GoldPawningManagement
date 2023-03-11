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
            <div class="left-content">
                <div class="article-details">
                    <div class="div-img">
                        <img src="<?php echo $data['article_details']->image; ?>">
                    </div>
                    <div class="div-details">
                        <div class="field">
                            <label>Validation ID</label>
                            <div><?php echo $data['article_details']->id; ?></div>
                        </div>
                        <div class="field">
                            <label>Customer ID</label>
                            <div><?php echo $data['article_details']->customer; ?></div>
                        </div>
                        <div class="field">
                            <label>Type</label>
                            <div><?php echo $data['article_details']->article_type; ?></div>
                        </div>
                    </div>
                </div>

                
            </div>
            <div class="right-content">                
                <div class="form-wrapper">
                    <div class="form-title">
                        <h2>Validation Details</h2>
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
                            <label>Karats<sup>*</sup></label>
                            <div class="input-wrapper">
                                <input type="text" name="karats" id="karats" class="<?php echo (!empty($data['karats_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['karats']; ?>" placeholder="Karats">
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
                var weight = parseFloat($('#weight').val());
                var karats = parseFloat($('#karats').val());
                var unit = $('#unit').val();
                var gold_price = 0.00;
                var estimated_value = 0.00;
                
                var gold_rates = <?php echo json_encode($data['gold_rates'])?>;
                if(karats) {
                    for(var i = 0; i < gold_rates.length; i++){
                        if(gold_rates[i]['Karatage'] == karats) {
                            gold_price = gold_rates[i]['Price'];
                        }
                    }
                }

                if(unit) {
                    var gram_price = gold_price / 8;
                    if(unit === "ounce") {
                        weight = weight * 31;
                    }

                    var pure_gold_price = weight * gram_price;
                    estimated_value = (pure_gold_price * karats / 24).toFixed(2);
                }

                if(weight && karats && unit) {
                    $('#estimated-value').attr('value', estimated_value);
                }                
            });
        });
    </script>
 
</html>