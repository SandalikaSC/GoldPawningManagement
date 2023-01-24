<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/contact_us.css'>
<title>Vogue | Contact Us</title>
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
                    <h1 id="title">Contact Us</h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="inside-page">
                <div class="top"> <?php flash('complaint'); ?></div>
                <div class="bottom">
                    <div class="bottom-left">

                        <form action="<?php echo URLROOT ?>/complaints/addComplaint" class="form" method="post">
                            <h2>Get In Touch</h2>
                            <h4>Our team is happy to answer your questions.</h4>
                            <div class="form-name">
                                <label for="" class="label"><strong>First name</strong></label>
                                <label for="" class="label"> <strong>Last name</strong></label>
                                <input id="Fname" name="Fname" type="text" class="name-input"
                                    value="<?php echo $_SESSION['user_fname']; ?>" disabled>
                                <input id="lname" name="lname" type="text" class="name-input"
                                    value="<?php echo $_SESSION['user_lname']; ?>" disabled>
                            </div>
                            <div class="phone">
                                <label for="" class="label"><strong>Email</strong></label>
                                <input id="Fname" name="Fname" type="email" class="name-input"
                                    value="<?php echo $_SESSION['user_email']; ?>" disabled>

                            </div>
                            <div class="phone">
                                <label for="" class="label"><strong>Message</strong></label>
                                <span><?php echo $data['compalint_err'] ?></span>
                                <textarea rows="4" cols="50" name="msg" class="name-input"
                                    placeholder=" Your messege here">
</textarea>
                                

                            </div>
                            <div class="phone">
                                <button class="submit-btn" > Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="bottom-right">
                        <div class="info">
                            <strong>Address</strong>
                            <label class="info-lablel">
                                No.528 Galle Road,
                                Colombo 03.
                                Sri Lanka.
                            </label>
                            <strong>Call Us</strong>
                            <label class="info-lablel">
                                +94 112 414 414 <br> +94 112 129 329
                            </label>
                            <strong>Email Us</strong>
                            <label class="info-lablel">
                                VoguePawn@gmail.com
                            </label>
                        </div>
                        <img class="contactUS" src="<?php echo URLROOT ?>/img/undraw_agreement_re_d4dv.svg" alt="logo">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require APPROOT . "/views/inc/footer.php" ?>