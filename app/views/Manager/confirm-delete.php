<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .confirm-delete-box {
            display: flex;
            flex-direction: column;
            /* align-items: center; */
            flex-wrap: wrap;
            background-color: white;
            max-width: 350px;
            margin: 200px auto;
            padding: 50px;
            border: 2px solid #BB8A04;
            border-radius: 20px;
        }

        .no-yes-btns {
            display: flex;
            margin-top: 60px;
            padding-bottom: 20px;

        }

        .no-yes-btns .no-btn {
            border: 2px solid #BB8A04;
            border-radius: 20px;
            color: #BB8A04;
            padding: 2px 42px;
            margin-right: 20px;
            text-decoration: none;
        }

        .no-yes-btns .no-btn:hover {
            opacity: 0.8;
        }

        .no-yes-btns .yes-btn {
            border: 2px solid #BB8A04;
            color: white;
            background-color: #BB8A04;
            border-radius: 20px;
            padding: 2px 40px;
            text-decoration: none;
        }

        .no-yes-btns .yes-btn:hover {
            opacity: 0.8;
        }

        .confirm-delete-box p {
            font-weight: 900;
            font-size: xx-large;
        }

        @media screen and (max-width:368px) {
            .confirm-delete-box {
                max-width: 300px;
            }

            .confirm-delete-box p {
                font-weight: 600;
                font-size: x-large;
            }

            .no-yes-btns .yes-btn {
                padding: 2px 35px;
            }

            .no-yes-btns .no-btn {
                padding: 2px 35px;
            }
        }

        @media screen and (max-width: 312px) {
            .confirm-delete-box {
                max-width: 275px;
            }

            .confirm-delete-box p {
                padding: 0 10px;
                font-weight: 900;
                font-size: large;
            }

            .no-yes-btns .yes-btn {
                padding: 2px 30px;
                /* margin-right: 10px; */
            }

            .no-yes-btns .no-btn {
                padding: 2px 30px;
            }
        }
    </style>
</head>

<body>
    <div class="confirm-delete-box">
        <p>Confirm Delete?</p>
        <div class="no-yes-btns">
            <a href="<?php echo URLROOT ?>/staff_dashboard" class="no-btn">No</a>
            <a href="<?php echo URLROOT ?>/staff_dashboard" class="yes-btn">Yes</a>
        </div>

    </div>
</body>

</html>