<title><?php echo SITENAME ?></title>
<link rel="stylesheet" href="<?php echo URLROOT ?>/css/mgSendReplyForm.css">


<div style="display:none;" class="page-reply-complaint" id="send-reply-form">
    <div class="content-reply-complaint">
        <form action="<?php echo URLROOT ?>/mgDashboard/sendReplyForComplaints" method="POST" class="entire-complaint-reply" id="password-popup-form">
            <div class="complaint-reply-group">
                <label><b>Reply Message</b></label>
                <p id="to" class="msg"></p>
                <p id="msg" value="" class="msg"></p>
                <textarea id="text-area" placeholder="Type Your Reply Here.." name="text-area" rows="6" cols="35"></textarea>
            </div>

            <div class="twoButtons">
                <button type="submit" id="ok-btn" class="ok-btn">Reply</button>
                <button type="button" id="cancelButton" class="cancel-btn">Cancel</button>
            </div>
            <input type="hidden" value="" name="cusId" id="cusId" />
        </form>

    </div>
</div>


<script>
    const URL = "<?php echo URLROOT ?>";
    let okBtn = document.getElementById("ok-btn");
    let pleaseWait = document.getElementById("pleaseWait");
    let sendReplyForm = document.getElementById('send-reply-form');
    okBtn.onclick = () => {
        sendReplyForm.style.display = "none";
        pleaseWait.style.display = "block";
        fetch(`${URL}/mgDashboard/sendReplyForComplaints`)
            .then(response => response.text())
            .then(data => {

                location.reload(true);
            })
            .catch(e => {

                console.log(e);
                location.reload(true);
            });
    }
</script>