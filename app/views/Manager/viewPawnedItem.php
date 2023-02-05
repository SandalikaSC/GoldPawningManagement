<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/viewPawnedItem.css">
</head>

<body>
    <div class="page">
        <div class="right">
            <div class="right-heading">
                <div class="right-side">
                    <!-- <div class="bars" id="bars">
                         <img src="./img/icons8-bars-48.png" alt="bars">
                    </div> -->
                    <a href="<?php echo URLROOT ?>/mgPawnArticles" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>

                    <h1>
                        Article ID
                    </h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="content-add-new-page">
                <div class="three-boxes">
                    <div class="left-box">
                        <div class="article-details-topic">
                            Article Details
                        </div>
                        <div class="article-image">
                            <img src="<?php echo URLROOT ?>/img/bracelet.png" alt="">
                        </div>
                        <div class="article-des">
                            <div class="article-info">
                                <div class="field-name">Customer ID</div>
                                <div class="field-value">CU002</div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Article ID</div>
                                <div class="field-value">A006</div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Pawned Date</div>
                                <div class="field-value">2022/11/03</div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Due Date</div>
                                <div class="field-value">2023/11/03</div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Full Loan Amount</div>
                                <div class="field-value">Rs.120,000/=</div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Registerd By</div>
                                <div class="field-value">PO008</div>
                            </div>
                            <div class="article-info">
                                <div class="field-name">Validated By</div>
                                <div class="field-value">VK010</div>
                            </div>
                        </div>
                    </div>
                    <div class="right-box">
                        <div class="top-box-of-right-box">
                            <div class="payment-history-topic">
                                Payment History
                            </div>
                            <div class="table">
                                <div class="table-section">
                                  
                                        <table id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>Payment ID</th>
                                                    <th>Installment</th>
                                                    <th>Paid Date</th>
                                                    <th>Paid Amount</th>
                                
                                                </tr>
                                            </thead>
                                            <tbody>
            
                                          
                                                <tr>
                                                    <td>PD1956</td>
                                                    <td>03</td>
                                                    <td>2022/09/30</td>
                                                    <td>Rs.5,000.00</td>
                                                
                                                </tr>
                                                <tr>
                                                    <td>PD1956</td>
                                                    <td>03</td>
                                                    <td>2022/09/30</td>
                                                    <td>Rs.5,000.00</td>
                                                
                                                </tr>
                                                <tr>
                                                    <td>PD1956</td>
                                                    <td>03</td>
                                                    <td>2022/09/30</td>
                                                    <td>Rs.5,000.00</td>
                                                
                                                </tr>
                                                <tr>
                                                    <td>PD1956</td>
                                                    <td>03</td>
                                                    <td>2022/09/30</td>
                                                    <td>Rs.5,000.00</td>
                                                
                                                </tr>
                                                <tr>
                                                    <td>PD1956</td>
                                                    <td>03</td>
                                                    <td>2022/09/30</td>
                                                    <td>Rs.5,000.00</td>
                                                
                                                </tr>
                                                <tr>
                                                    <td>PD1956</td>
                                                    <td>03</td>
                                                    <td>2022/09/30</td>
                                                    <td>Rs.5,000.00</td>
                                                
                                                </tr>
                                                <tr>
                                                    <td>PD1956</td>
                                                    <td>03</td>
                                                    <td>2022/09/30</td>
                                                    <td>Rs.5,000.00</td>
                                                
                                                </tr>
                                                <tr>
                                                    <td>PD1956</td>
                                                    <td>03</td>
                                                    <td>2022/09/30</td>
                                                    <td>Rs.5,000.00</td>
                                                
                                                </tr>
                                            </tbody>
                                        </table>
                        
                                </div>
                            </div>
                        </div>
                        <div class="bottom-box-of-right-box">
                            <div class="due-payments-topic">
                                Due Payments
                            </div>
                            <div class="amount-and-due-date">
                                <div class="data-field">
                                    <div class="field">Amount :</div>
                                    <div class="value">Rs.5,000.00</div>
                                </div>
                                <div class="data-field">
                                    <div class="field">Due Date :</div>
                                    <div class="value">2022/10/31</div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="twobtns">
                        <div class="auction-btn" id="auction-btn" ><button type="button">Add to Auction</button></div>
                        <div class="email-btn" id="email-btn"><button type="button">Send Email</button></div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</body>



</html>