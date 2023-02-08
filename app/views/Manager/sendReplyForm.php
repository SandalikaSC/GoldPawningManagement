<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

.page-manual-password-enter{
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

.entire-password-form{
    display: flex;
    flex-direction: column;
    width: 100%;
}

.content-manual-password-enter{
    background-color: white;
    display: flex;
    border: 2px solid goldenrod;
    padding:20px;
    border-radius: 20px;
}


.password-form-group{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.password-form-group input{
    width: 100%;
    border:none;
    outline: none;
    border-radius: 10px;
    padding: 10px 30px;
    margin: 10px;
    background-color: blanchedalmond;
}

.password-form-group textarea{
    /* width: 100%; */
    border:none;
    outline: none;
    border-radius: 10px;
    padding: 5px 10px;
    /* margin: 10px; */
    background-color: blanchedalmond;
}

.password-form-group label{
    font-size: medium;
}

.twoButtons{
    display: flex;
    flex-direction: column;

}

.twoButtons .ok-btn{
    width:100%;
     border: 2px solid rgb(32, 218, 60);
     padding: 10px 100px;
     font-size: medium;
     color:black;
     /* background-color: rgb(32, 218, 60); */
     border-radius: 20px;
     text-decoration: none;
     margin-top: 10px;
     width: 300px;
    
}

.twoButtons .cancel-btn{  
    width:100%;
    border: 2px solid red;
    padding: 10px 40px;
    font-size: large;
    color:red;
    border-radius: 20px;
    /* background-color: red; */
    margin-top: 10px;
    width: 300px;

} 
     
</style>


<div style="display:none;" class="page-manual-password-enter" id="send-reply-form">
                <div class="content-manual-password-enter">
                        <form action="<?php echo URLROOT ?>/mgDashboard/sendReplyForComplaints" method="POST" class="entire-password-form" id="password-popup-form">
                           <div class="password-form-group">
                                <label><b>Reply Message</b></label>
                                <textarea id="text-area" name="text-area" rows="4" cols="35"></textarea>
                            </div>
                           
                            <div class="twoButtons">
                                <button type="submit" id="ok-btn" class="ok-btn">Reply</button>
                                <button type="button" id="cancelButton" class="cancel-btn">Cancel</button>
                            </div>
                            <input type="hidden" value="" name="cusId" id="cusId"/>
                        </form>
                   
                </div>
    </div>

   