<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_dashboard_ga.css">
    <title>Vogue Pawn | Dashboard</title>
</head>
<body>
    <input type="checkbox" id="side-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="<?php echo URLROOT?>/img/profile_pic.png">
            <h3><?php echo $_SESSION['user_name']; ?></h3>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active">
                        <span>
                            <img src="<?php echo URLROOT?>/img/white_dashboard.png">
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/goldAppraiser/view_validated_articles">
                        <span>
                            <img src="<?php echo URLROOT?>/img/white_pawn_items.png">
                        </span>
                        <span>Validated Articles</span>
                    </a>
                </li>
            </ul>

            <div class="btn-logout">
                <a href="<?php echo URLROOT; ?>/employees/logout" class="logout">Logout</a>
            </div>
            
        </div>
    </div>

    <div class="main-content">
        <header>
            <div class="page-title">
                <label for="side-toggle">
                    <span class="menu-bar">
                        <img src="<?php echo URLROOT?>/img/menu_bar_black.png">
                    </span>
                </label>   
                <h1>Dashboard</h1> 
            </div>
                    
            <img src="<?php echo URLROOT?>/img/logo_name.png">
        </header>

        <main> 
            <div class="page-wrapper">
                <div class="top-div">
                    <div class="cards">                    
                        <div class="gold-rates">
                            <div class="icon-case">
                                <img src="<?php echo URLROOT?>/img/gold-gold-rates.png" alt="">
                            </div>
                            <div class="box">
                                <h4>24 CARATS</h4>
                                <h2>Rs. 102000.00</h2>
                            </div>                                
                        </div>
    
                        <div class="gold-rates">
                            <div class="icon-case">
                                <img src="<?php echo URLROOT?>/img/gold-gold-rates.png" alt="">
                            </div>
                            <div class="box">
                                <h4>22 CARATS</h4>
                                <h2>Rs. 90000.00</h2>
                            </div>                                
                        </div>
    
                        <div class="gold-rates">
                            <div class="icon-case">
                                <img src="<?php echo URLROOT?>/img/gold-gold-rates.png" alt="">
                            </div>
                            <div class="box">
                                <h4>20 CARATS</h4>
                                <h2>Rs. 78000.00</h2>
                            </div>                                
                        </div>
    
                        <div class="gold-rates">
                            <div class="icon-case">
                                <img src="<?php echo URLROOT?>/img/gold-gold-rates.png" alt="">
                            </div>
                            <div class="box">
                                <h4>18 CARATS</h4>
                                <h2>Rs. 66000.00</h2>
                            </div>                                
                        </div>                        
                    </div> 

                    
                </div>
                   
                <div class="bottom-div">
                    <h2>Articles to be Validated</h2>
                    <div class="article-details">
                        <?php foreach($data['articles_to_validate'] as $article_to_validate) : ?>
                            <div class="article-details-card">
                                <img src="<?php echo $article_to_validate->image; ?>">
                                <div><label>Validation ID: </label><?php echo $article_to_validate->id; ?></div>
                                <div><label>Customer ID: </label><?php echo $article_to_validate->customer; ?></div>
                                <div><label>Type: </label><?php echo $article_to_validate->article_type; ?></div>
                                <div class="div-btn">
                                    <a href="<?php echo URLROOT; ?>/goldAppraiser/validate_articles/<?php echo $article_to_validate->id; ?>">Validate</a>
                                </div>
                            </div>
                        <?php endforeach; ?>                     
                    </div>
                </div>

            </div>
            
        </main>
    </div>
</body>
</html>




