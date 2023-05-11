<link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/Img/logo.png">
<title><?php echo SITENAME?></title>

<style>
    .side-message {
        position: absolute;
        right: 20px;
        display: flex;
        flex-direction: column-reverse;
        top: 100px;
        border-radius: 5px;
        transition: all 2s ease-out;
    }

    .message-content {
        position: relative;
        right: 0;
        top: 0;
        min-width: 300px;
        max-width: 500px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        padding: 10px;
        margin: 3px 0;
        font-size: large;
        background-color: rgba(255, 255, 255, 0.178);
        backdrop-filter: blur(5px);
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
        border: 1px solid #057001;
    }

    .message-cont-btn {
        flex: 1;
        background-color: transparent;
        border: none;
        margin: 0 5px;
        cursor: pointer;
        align-self: center;
        font-size: large;
        color: #057001;
        /* background-color: rgba(255, 0, 0, 0.116); */
        border-radius: 5px;
        padding: 5px 10px;
    }

    .message-cont-text {
        flex: 50;
        text-align: justify;
        margin: 0 10px;
    }

    .message-hide {
        right: -600px !important;
        transition: all 2s ease-out;
    }
</style>


<div style="overflow-x: hidden; z-index: 30;">
    <section class="side-message" id="message-main">
        <div class="message-content" id="message-content">
            <button type="button" class="message-cont-btn" id="close-btn">
                <img style="width: 25px;margin-top: 5px;" src="<?php echo URLROOT ?>/img/success_mark.png" alt="">
            </button>
            <div class="message-cont-text" style="color:#057001;" id="right-alert-text">
                <?php echo $_SESSION['message'] ?>
            </div>
        </div>
    </section>
</div>

<script>
    let msgMain = document.getElementById("message-main");
    let messageContent = document.getElementById("message-content");
    let closeBtn = document.getElementById("close-btn");

    closeBtn.addEventListener("click", () => {
        messageContent.classList.add("message-hide");
    });

    setTimeout(() => {
        messageContent.classList.add('message-hide');
    }, 5000)
</script>