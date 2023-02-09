<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT?>/Img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .whole {
            /* margin-top: 0; */
            z-index: 20;
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            /* background-color: transparent; */
            backdrop-filter: blur(5px);

        }

        .password-changed-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex-wrap: wrap;
            background-color: white;
            max-width: 350px;
            margin: 200px auto;
            padding: 50px;
            border: 2px solid #BB8A04;
            border-radius: 20px;
            /* outline: black; */
        }

        .password-changed-box .done-btn {
            border: 2px solid #BB8A04;
            color: white;
            background-color: #BB8A04;
            border-radius: 20px;
            padding: 2px 40px;
            text-decoration: none;

        }

        .password-changed-box .done-btn:hover {
            opacity: 0.8;
        }

        .password-changed-box p {
            font-size: x-large;
            font-weight: 900;
            padding-bottom: 60px;
        }

        @media screen and (max-width:355px) {
            .password-changed-box {
                max-width: 300px;
                padding: 20px;

            }
        }

        @media screen and (max-width:300px) {
            .password-changed-box {
                max-width: fit-content;
            }
        }
    </style>
</head>

<body>
    <section class="whole">
        <div class="password-changed-box">
            <p>Email Already Exists</p>
            <a class="done-btn" href="<?php echo URLROOT ?>/mgEditProfile">Done</a>
        </div>
    </section>


</body>

</html>