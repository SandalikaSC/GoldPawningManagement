<link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/Img/logo.png">
<title><?php echo SITENAME?></title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

.page-reply{
    font-family: 'Poppins',sans-serif;
    position: absolute;
    top:0;
    display:flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height:100%; 
    backdrop-filter: blur(10px);
    z-index: 10;
    
    
}

.entire-reply-form{
    display: flex;
    flex-direction: column;
    width: 100%;
}

.content-reply{
    background-color: white;
    display: flex;
    /* border: 2px solid goldenrod; */
    padding:20px;
    border-radius: 20px;
    box-shadow: 0 4px 8px 4px rgba(0,0,0,0.2);  

}


.reply-form-group{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.reply-form-group label{
    font-size: x-large;
    margin-bottom: 5px;
}

.reply-form-group input{
    width: 100%;
    border:none;
    outline: none;
    border-radius: 10px;
    padding: 10px 30px;
    margin: 10px;
    background-color: blanchedalmond;
}

.reply-form-group textarea{
    width: 100%;
    border:none;
    outline: none;
    border-radius: 10px;
    padding: 5px 10px;
    /* margin: 10px; */
    background-color: blanchedalmond;
}



.twoButtons{
    display: flex;
    margin-top: 20px;
}

.twoButtons .ok-btn{
    width:100%;
     border:none;
     cursor: pointer;
     padding: 10px 50px;
     font-size: medium;
     color:white;
     border-radius: 20px;
     text-decoration: none;
     margin-right: 5px;
     /* width: 300px; */
     background-color: #bb8a04;
    
}

.twoButtons .cancel-btn{  
    width:100%;
    cursor:pointer;
    border: 2px solid #bb8a04;
    padding: 10px 45px;
    font-size: large;
    color:#bb8a04;
    background-color: white;
    border-radius: 20px;
    /* width: 300px; */

} 
     
</style>


<div style="display:none;" class="page-reply" id="send-reply-form">
                <div class="content-reply">
                        <form action="#" method="POST" class="entire-reply-form" id="password-popup-form">
                           <div class="reply-form-group">
                                <label><b>Reply Message</b></label>
                                <textarea id="text-area" name="text-area" rows="10" cols="15"></textarea>
                            </div>
                           
                            <div class="twoButtons">
                                <button type="submit" id="ok-btn" class="ok-btn">Reply</button>
                                <button type="button" id="cancelButton" class="cancel-btn">Cancel</button>
                            </div>
                            <input type="hidden" value="" name="cusId" id="cusId"/>
                        </form>
                   
                </div>
    </div>

   