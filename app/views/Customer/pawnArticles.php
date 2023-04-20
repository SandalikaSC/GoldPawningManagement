<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/pawnArticles.css'>
<title>Vogue | Pawn Articles</title>
</head>

<body>
    <div class="page">
        <?php require APPROOT . "/views/Customer/components/sideMenu.php" ?>
        <div class="right">
            <div class="right-heading">
                <div class="right-side">
                    <div class="bars" id="bars">
                        <img src="<?php echo URLROOT ?>/img/icons8-bars-48.png" alt="bars">
                    </div>
                    <h1 id="title">Pawn Articles</h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="pawn-page">
                <?php foreach ($data['pawnings'] as $pawn) : ?>


                    <div class="jewellery-card">
                        <div class="jewellery-img">
                             <?php 
                             $finfo = finfo_open();
                             $imageType = finfo_buffer($finfo, $pawn->image, FILEINFO_MIME_TYPE);
                             finfo_close($finfo);
                             
                             // Set header as image type 
                             
                             
                             ?>

                        
                            <img src="<?php if(empty($pawn->image)){
                                    echo URLROOT . "/img/images.jpg" ;
                                }else{
                                  echo  "data:image/.'$imageType'.;charset=utf8;base64,".base64_encode($pawn->image);
                                    }?>
                                    " alt="" class="jw-img">
                        </div>
                        <div class="jw-details">
                            <div class="jw-date">
                                <div class="jw-date-name">
                                    <label>Due Date</label>
                                    <label class="jw-dt"><?php echo date("d M Y", strtotime($pawn->End_Date)) ?></label>
                                </div>

                            </div>
                            <div class="jw-date-name">

                                <label>Status</label>
                                <label class="status 
                                <?php if($pawn->Status=='Pawned'){
                                     echo "tag-pending";
                                    }elseif ($pawn->Status=='Overdue') {
                                        echo "tag-overdue";
                                    }else{
                                        echo "tag-auctioned";

                                    }?>"><?= $pawn->Status?></label>
                            </div>




                        </div>
                        <a href="<?php echo URLROOT ?>/CustomerPawn/viewPawnArticle/<?= $pawn->Pawn_Id?>"> <button class="v-btn">View</button></a>

                    </div>


                <?php endforeach; ?>
                
            </div>
        </div>
    </div>
    <script src="<?php echo URLROOT ?>/js/sideMenu.js"></script>

    <?php require APPROOT . "/views/inc/footer.php" ?>