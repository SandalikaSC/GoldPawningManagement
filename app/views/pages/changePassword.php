<?php require APPROOT . "/views/inc/header.php" ?>
<title>Vogue | Login</title>
<!-- <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/change_password.css'> -->
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/login.css'>
</head>

<body class="wrapper">


    <div class="right-heading">
        <div class="right-side">

            <h1 id="title">Change Password</h1>
        </div>
        <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
    </div>

    <form class="set-pw center">
        <?php flash('changePw'); ?>


        <p class="p">New password</p>
        <input type="password" name="new-pw" id="new-pw" class="input" value="" />
        <span class="invalid-feedback" id="new-pw-err"> </span>
        <p class="p">Confirm password</p>
        <input type="password" name="confirm-pw" id="confirm-pw" class="input" value="" />
        <span class="invalid-feedback" id="confirm-pw-err"> </span>



        <a class="p back" href="<?php echo URLROOT ?>/Users/login">Back to login</a>
        <button type="button" name="Reset-Password" onclick="confirmPaswsword()" value="" class="button">Reset Password</button>

    </form>
    <script src="<?php echo URLROOT ?>/js/jquery.min.js"></script>
    <script>
        function confirmPaswsword() {
            document.getElementById("new-pw-err").innerHTML = "";
            document.getElementById("confirm-pw-err").innerHTML = "";
            var password = document.getElementById('new-pw').value;
            var confirmpassword = document.getElementById('confirm-pw').value;
            if (password === "") {
                document.getElementById("new-pw-err").innerHTML = "Please enter password";
            } else if (confirmpassword === "") {
                document.getElementById("confirm-pw-err").innerHTML = "Please confirm password";
            } else {
                if (password === confirmpassword) {
 
                    $.ajax({
                        type: "POST",
                        url: "<?= URLROOT ?>/Users/changepassword",
                        data: {
                            new_pw: password
                        },
                        dataType: "JSON",
                        success: function(resp) {

                        },
                        error: function(resp) {
                            //   console.log(resp.name);
                        }
                    });

                } else {
                    alert("NOT MATCH");
                    document.getElementById("confirm-pw-err").innerHTML = "Passwords do not match";
                }


            }

        }
    </script>
    <?php require APPROOT . "/views/inc/footer.php" ?>