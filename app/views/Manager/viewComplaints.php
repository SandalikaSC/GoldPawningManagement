<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .complaint-table{
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            margin:auto;
        }

        .complaint-set{
            display: flex;
            flex-direction: column;
            min-width: 500px;
            /* align-items: center;
            justify-content: center; */
            border:1px solid black;
            border-radius: 10px;
            padding:10px;
            margin: 6px 0;
           box-shadow: 5px 5px #888888;
        }

        .cus-details{
            display: flex;
            /* align-items: center; */
            flex-wrap: wrap;
            justify-content: space-between;
            /* border:1px solid black; */
            float: left;
            padding:5px 0;
        }
        .cus-name{
            display: flex;
            font-weight: bold;

            justify-content: space-between;
            /* margin-right: 100px; */

        }
        .cus-name .from{
            margin-right:5px;
        }
        
        .cus-name .name{
            margin-right:5px;
        }

       
        .date-time{
            display: flex;
            font-style: oblique;
        }

        .complaint{
            display: flex;
            float: left;
        }
        
        .btns{
            display: flex;
            flex-direction: row;
        }

        .btns .reply-btn{
            padding:3px 10px;
            margin-left: 0px;
        }

        .btns .delete-btn{
            padding:3px 6px;
            margin-left:10px;
        }
    </style>
</head>
<body>
    <?php 
     if($data[2]!=0){
    ?>
    <div class="complaint-table">
         <?php
            foreach($data[2] as $row){      
         ?>
        <div class="complaint-set">
            <div class="cus-details">
               <div class="cus-name">
                   <div class="name"><?php echo $row->CID?>)</div>
                  <div class="from">From:</div>
                  <div class="cus_id"><?php echo $row->UserID?></div>
               </div>
               <div class="date-time"><?php echo $row->Date?></div>
            </div>
            <div class="complaint">
               <?php echo $row->Description?>
            </div>
            <div class="btns">
                <div>
                    <button type="button" class="reply-btn" id="reply-btn" onclick="popup()">Reply</button>
                </div>
                <div>
                    <button type="button" class="delete-btn" id="delete-btn">Remove</button>
                </div>
            </div>
        </div>
            
         <?php  }
     }else{
        echo "No Complaints";
     }
        ?>
      

    </div>
</body>
<script>


    function popup(){
        document.getElementById("manual-password-change-form").style.display = "flex";
    }

let cancelwindow=document.getElementById("cancelButton");
cancelwindow.addEventListener('click',()=>{
   location.reload(true)
})


</script>
</html>