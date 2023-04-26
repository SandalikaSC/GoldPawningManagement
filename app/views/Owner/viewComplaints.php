<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/ownerViewComplaints.css">
    
</head>

<body>
    <div id="myDiv" class="complaint-table">
        <?php
        if ($data[2] != 0) {
        ?>
            <?php
            foreach ($data[2] as $row) {
            ?>
                <section class="complaint-set">
                    <div class="cus-details">
                        <div class="cus-name">
                            <div class="name"><?php echo $row->CID ?>)</div>
                            <?php if (!empty($row->image)) { ?> <div><img class="from" src="<?php echo $row->image ?>" alt=""></div><?php } ?>
                            <div class="cus_id"><?php echo $row->Name ?></div>
                            <div class="check-box"><input type="checkbox" <?php echo !empty($row->Status) ? "checked" : "" ?> disabled></div>
                        </div>
                        <section class="date-time"><?php echo $row->Date ?></section>
                    </div>
                    <div class="complaint">
                        <?php echo $row->Description ?>
                    </div>
                  
                </section>

            <?php  }

            ?>
            <div id="tfoot"></div>

        <?php
        } else {
            echo "<p style=`display:flex; align-items:center;justify-content:center;margin:0 1000px;`>No Complaints</P>";
        }
        ?>
    </div>


</body>


</html>