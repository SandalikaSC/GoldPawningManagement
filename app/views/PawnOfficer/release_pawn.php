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
                        <img src="<?php echo $data['pawn_item']->image; ?>" alt="">
                    </div>
                    
                    <div class="article-details">
                        <div class="field">
                            <label>Article ID</label>
                            <div><?php echo $data['pawn_item']->Article_Id; ?></div>
                        </div>
                        <div class="field">
                            <label>Article Type</label>
                            <div><?php echo $data['pawn_item']->Type; ?></div>
                        </div>
                    </div>
                    <div class="pawning-details">
                        <div class="field">
                            <label>Pawned Date</label>
                            <div><?php echo date('Y-m-d', strtotime($data['pawn_item']->Pawn_Date)); ?></div>
                        </div>
                        <div class="field">
                            <label>End Date</label>
                            <div><?php echo $data['pawn_item']->End_Date; ?></div>
                        </div>
                    </div>
                    <div class="loan-details">
                        <div class="field">
                            <label>Full Loan Amount</label>
                            <div><?php echo 'Rs. ' . $data['pawn_item']->Amount; ?></div>
                        </div>
                        <div class="field">
                            <label>Remaining Loan Amount</label>
                            <div><?php echo 'Rs. ' . sprintf("%.2f", $data['remaining_loan']); ?></div>
                        </div>
                    </div>

                    <div class="div-buttons">
                        <a href="">Release</a>
                        <!-- <a href="">Cancel</a> -->
                    </div>
                </div>
            </div>            
        </main>        
    </div>
        
    
    <script type="text/javascript">
        
    </script>

</body>
</html>