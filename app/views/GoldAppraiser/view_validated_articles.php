<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/img/logo_1.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_view_validated_articles.css">
    <title>Vogue Pawn | Validated Articles</title>
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
                    <a href="<?php echo URLROOT; ?>/goldAppraiser/dashboard">
                        <span>
                            <img src="<?php echo URLROOT?>/img/white_dashboard.png">
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="active">
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
                <h1>Validated Articles</h1> 
            </div>
                    
            <img src="<?php echo URLROOT?>/img/logo_name.png">
        </header>

        <main> 
            <div class="right-content">
                <div class="div-search">
                    <div>
                        <input type="text" placeholder="Enter validation ID or article type">
                        <a href="#">
                            <img src="<?php echo URLROOT . '/img/search_icon.png'?>">
                        </a> 
                    </div>
                                   
                </div>
                <div class="tbl-details">
                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Validation ID</th>
                                <th>Type</th>
                                <th>Weight (g)</th>
                                <th>Carats</th>
                                <th>Estimated Value (Rs.)</th>
                                <th>Validation Status</th>
                                <th>Gold Appraiser ID</th>
                            </tr>
                        </thead>                            
                            
                        <tbody>
                            <?php foreach ($data['validated_articles'] as $validated_article) : ?>
                                <tr class="table-body">
                                    <td><img src="<?php echo $validated_article->image; ?>"></td>
                                    <td><?php echo $validated_article->id; ?></td>
                                    <td><?php echo $validated_article->article_type; ?></td>
                                    <td><?php echo $validated_article->weight; ?></td>
                                    <td><?php echo $validated_article->karatage; ?></td>
                                    <td><?php echo $validated_article->estimated_value; ?></td>
                                    <td><?php echo $validated_article->validation_status; ?></td>
                                    <td><?php echo $validated_article->gold_appraiser; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr class="table-body">
                                    <td><img src=""></td>
                                    <td><?php echo 465; ?></td>
                                    <td><?php echo "earings"; ?></td>
                                    <td><?php echo 356; ?></td>
                                    <td><?php echo 13; ?></td>
                                    <td><?php echo 35; ?></td>
                                    <td><?php echo 37; ?></td>
                                    <td><?php echo "ge87"; ?></td>
                                </tr>
                        </tbody>
                    </table>
                </div>                
            </div>
            
        </main>

    </div>
</body>
</html>




