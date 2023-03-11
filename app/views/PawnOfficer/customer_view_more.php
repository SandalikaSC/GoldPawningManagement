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
                <h1>Customer Details : <?php echo $data['customers']->UserId; ?></h1>
            </div>
            
            <div class="logo">
                <img src="<?php echo URLROOT . '/img/logo_name.png'; ?>">
            </div>
        </div>

        <main>
            <div class="main-wrapper">
                <div class="left-wrapper">
                    <div class="customer-details">
                        <h2>Customer Details</h2>
                        
                        <div class="div-details">                        
                            <div class="field">
                                <div class="label">CustomerID</div>
                                <div class="input-details"><?php echo $data['customers']->UserId; ?></div>
                            </div>
                            <div class="field">
                                <div class="label">Name</div>
                                <div class="input-details"><?php echo $data['customers']->First_Name . ' ' . $data['customers']->Last_Name; ?></div>
                            </div>
                            <div class="field">
                                <div class="label">Address</div>                            
                                <div class="input-details"><?php if(strcmp($data['customers']->Line1, "Empty") AND !empty($data['customers']->Line1)) {echo $data['customers']->Line1;}  if(strcmp($data['customers']->Line2, "Empty") AND !empty($data['customers']->Line2)) {echo ', ' . $data['customers']->Line2;} if(strcmp($data['customers']->Line3, "Empty") AND !empty($data['customers']->Line3)) {echo ', ' . $data['customers']->Line3;} ?></div>
                            </div>
                            <div class="field">
                                <div class="label">NIC</div>
                                <div class="input-details"><?php echo $data['customers']->NIC; ?></div>
                            </div>
                            <div class="field">
                                <div class="label">DOB</div>
                                <div class="input-details"><?php echo $data['customers']->DOB; ?></div>
                            </div>
                            <div class="field">
                                <div class="label">Gender</div>
                                <div class="input-details"><?php echo $data['customers']->Gender; ?></div>
                            </div>
                            <div class="field">
                                <div class="label">Phone Number</div>
                                <div class="input-details"><?php echo $data['customers']->phone; ?></div>
                            </div>
                            <div class="field">
                                <div class="label">Email</div>
                                <div class="input-details"><?php echo $data['customers']->email; ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="right-wrapper">
                    <div class="div-articles">
                        <div class="sub-details">
                            <div class="title">
                                <h2>Pawned Articles</h2>
                            </div>   
                            <div class="article-details">
                                <div class="article-details-card">
                                    <img src="<?php echo URLROOT?>/img/ring1.jpg">
                                    <div><label>Article ID: </label>AR001</div>
                                    <div><label>Customer ID: </label>CS0021</div>
                                    <div><label>Type: </label>Jewelry</div>
                                </div> 
                                <div class="article-details-card">
                                    <img src="<?php echo URLROOT?>/img/ring1.jpg">
                                    <div><label>Article ID: </label>AR001</div>
                                    <div><label>Customer ID: </label>CS0021</div>
                                    <div><label>Type: </label>Jewelry</div>
                                </div> 
                            </div>             
                        </div>

                        <div class="sub-details">
                            <div class="title">
                                <h2>Articles in Lockers</h2>
                            </div>     
                            <div class="article-details">
                                <div class="article-details-card">
                                    <img src="<?php echo URLROOT?>/img/ring1.jpg">
                                    <div><label>Article ID: </label>AR001</div>
                                    <div><label>Customer ID: </label>CS0021</div>
                                    <div><label>Type: </label>Jewelry</div>
                                </div> 
                                <div class="article-details-card">
                                    <img src="<?php echo URLROOT?>/img/ring1.jpg">
                                    <div><label>Article ID: </label>AR001</div>
                                    <div><label>Customer ID: </label>CS0021</div>
                                    <div><label>Type: </label>Jewelry</div>
                                </div> 
                            </div>            
                        </div>
                    </div>

                    
                </div>
            </div>
        </main>
        <!-- <div class="customer-details">
            <h2>Customer Details</h2>

            <div class="content">
                <div class="div-details">
                    <div class="sub-details">
                        
                        <div class="field">
                            <div class="label">CustomerID</div>
                            <input type="text" class="input-details" placeholder="<?php echo $data['customers']->UserId; ?>">
                        </div>
                        <div class="field">
                            <div class="label">Name</div>
                            <input type="text" class="input-details" placeholder="<?php echo $data['customers']->First_Name . ' ' . $data['customers']->Last_Name; ?>">
                        </div>
                        <div class="field">
                            <div class="label">Address</div>                            
                            <textarea class="input-details" placeholder="<?php if(strcmp($data['customers']->Line1, "Empty") AND !empty($data['customers']->Line1)) {echo $data['customers']->Line1;}  if(strcmp($data['customers']->Line2, "Empty") AND !empty($data['customers']->Line2)) {echo ', ' . $data['customers']->Line2;} if(strcmp($data['customers']->Line3, "Empty") AND !empty($data['customers']->Line3)) {echo ', ' . $data['customers']->Line3;} ?>"></textarea>
                        </div>
                        <div class="field">
                            <div class="label">NIC</div>
                            <input type="text" class="input-details" placeholder="<?php echo $data['customers']->NIC; ?>">
                        </div>
                    </div>
                    <div class="sub-details">
                        <div class="field">
                            <div class="label">Date of Birth</div>
                            <input type="text" class="input-details" placeholder="<?php echo $data['customers']->DOB; ?>">
                        </div>
                        <div class="field">
                            <div class="label">Gender</div>
                            <input type="text" class="input-details"  placeholder="<?php echo $data['customers']->Gender; ?>">
                        </div>
                        <div class="field">
                            <div class="label">Phone Number</div>
                            <input type="text" class="input-details" placeholder="<?php echo $data['customers']->phone; ?>">
                        </div>
                        <div class="field">
                            <div class="label">Email</div>
                            <input type="text" class="input-details" placeholder="<?php echo $data['customers']->email; ?>">
                        </div>
                    </div>
                </div>
            </div>
            
        </div> -->

        <!-- <div class="article-details">
            <div class="sub-details">
                <div class="title">
                    <h3>Pawned Articles</h3>
                </div>   
                <div class="article-details">
                    <div class="article-details-card">
                        <img src="<?php echo URLROOT?>/img/ring1.jpg">
                        <div><label>Article ID: </label>AR001</div>
                        <div><label>Customer ID: </label>CS0021</div>
                        <div><label>Type: </label>Jewelry</div>
                    </div> 
                    <div class="article-details-card">
                        <img src="<?php echo URLROOT?>/img/ring1.jpg">
                        <div><label>Article ID: </label>AR001</div>
                        <div><label>Customer ID: </label>CS0021</div>
                        <div><label>Type: </label>Jewelry</div>
                    </div> 
                </div>             
            </div>

            <div class="sub-details">
                <div class="title">
                    <h3>Articles in Lockers</h3>
                </div>     
                <div class="article-details">
                    <div class="article-details-card">
                        <img src="<?php echo URLROOT?>/img/ring1.jpg">
                        <div><label>Article ID: </label>AR001</div>
                        <div><label>Customer ID: </label>CS0021</div>
                        <div><label>Type: </label>Jewelry</div>
                    </div> 
                    <div class="article-details-card">
                        <img src="<?php echo URLROOT?>/img/ring1.jpg">
                        <div><label>Article ID: </label>AR001</div>
                        <div><label>Customer ID: </label>CS0021</div>
                        <div><label>Type: </label>Jewelry</div>
                    </div> 
                </div>            
            </div>
        </div> -->
    </div>
    
    <script>

    </script>
 
</html>