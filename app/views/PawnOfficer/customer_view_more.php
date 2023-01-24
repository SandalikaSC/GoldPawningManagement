<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_customer_more.css">
    <title>Vogue Pawn | Customer Details</title>
</head>
<body>
   
    <div class="wrapper">
        <div class="header">
            <div class="title">
                <a href="<?php echo URLROOT; ?>/customers/view_customers">
                    <img src="<?php echo URLROOT . '/img/back-arrow.png'; ?>">
                </a>
            </div>
            
            <div class="logo">
                <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
            </div>
        </div>
        <div class="customer-details">
            <h2>Customer Details</h2>

            <div class="content">
                <div class="div-details">
                    <div class="sub-details">
                        
                        <div class="row">
                            <div class="label">CustomerID</div>
                            <input type="text" class="input-details" placeholder="<?php echo $data['customers']->UserId; ?>">
                        </div>
                        <div class="row">
                            <div class="label">Name</div>
                            <input type="text" class="input-details" placeholder="<?php echo $data['customers']->First_Name . ' ' . $data['customers']->Last_Name; ?>">
                        </div>
                        <div class="row">
                            <div class="label">Address</div>
                            <!-- <textarea class="input-details" placeholder="<?php echo $data['customers']->Line1 . ', ' . $data['customers']->Line2 . ', ' . $data['customers']->Line3; ?>"></textarea> -->
                            <textarea class="input-details" placeholder="<?php if(strcmp($data['customers']->Line1, "Empty") AND !empty($data['customers']->Line1)) {echo $data['customers']->Line1;}  if(strcmp($data['customers']->Line2, "Empty") AND !empty($data['customers']->Line2)) {echo ', ' . $data['customers']->Line2;} if(strcmp($data['customers']->Line3, "Empty") AND !empty($data['customers']->Line3)) {echo ', ' . $data['customers']->Line3;} ?>"></textarea>
                        </div>
                        <div class="row">
                            <div class="label">NIC</div>
                            <input type="text" class="input-details" placeholder="<?php echo $data['customers']->NIC; ?>">
                        </div>
                    </div>
                    <div class="sub-details">
                        <div class="row">
                            <div class="label">Date of Birth</div>
                            <input type="text" class="input-details" placeholder="<?php echo $data['customers']->DOB; ?>">
                        </div>
                        <div class="row">
                            <div class="label">Gender</div>
                            <input type="text" class="input-details"  placeholder="<?php echo $data['customers']->Gender; ?>">
                        </div>
                        <div class="row">
                            <div class="label">Phone Number</div>
                            <input type="text" class="input-details" placeholder="<?php echo $data['customers']->phone; ?>">
                        </div>
                        <div class="row">
                            <div class="label">Email</div>
                            <input type="text" class="input-details" placeholder="<?php echo $data['customers']->email; ?>">
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="article-details">
            <div class="sub-details">
                <div class="title">
                    <h3>Pawned Articles</h3>
                </div>                
            </div>

            <div class="sub-details">
                <div class="title">
                    <h3>Articles in Lockers</h3>
                </div>                
            </div>
        </div>
    </div>
    <script>

    </script>
 
</html>