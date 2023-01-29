<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/error.css">
</head>
<body>
    <div class="error-set">
        <div class="error-msg-main" id="errorMain">
            <div class="error-close" id="closeBtn">X</div>
            <div class="error-msg text-red" id="error-msg"></div>
        </div>
    </div>


</body>
<script>
    let errorSet = document.getElementById("error-set");
    let errorMain = document.getElementById('errorMain');
    let closeBtn = document.getElementById('closeBtn');

    closeBtn.addEventListener('click',()=>{
        errorMain.classList.add('hide-msg');
    });

    setTimeout(()=>{
        errorMain.classList.add('hide-msg');
    }, 5000)

</script>
</html>

