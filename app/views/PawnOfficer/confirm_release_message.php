<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vogue Pawn | Confirm Release Message</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_confirm_message.css">
</head>
<body>
    <div class="wrapper">
        <div class="message-wrapper">            
            <form action="<?php echo URLROOT . '/Pawnings/confirm_release/' . $data['pawn_item']->Pawn_Id; ?>" method="post">                
                <div class="div-message">
                    Confirm releasing pawned item?
                </div>
                <div class="div-buttons">
                    <input type="submit" name="confirm" value="Confirm" class="button btn-confirm">
                    <input type="submit" name="cancel" value="Cancel" class="button btn-cancel">
                </div>
            </form>            
        </div>
    </div>
</body>

