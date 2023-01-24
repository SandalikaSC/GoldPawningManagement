<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../view/css/header.css'>
    
</head>

<body>
<div class="all">
        <img class="vogue" src="assets/logo.png" alt="logo">
        <div class="toggler" id="toggler">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <nav class="nav" id="nav">
            <div class="old">
                <div class="profile">
                    <img class="profileImg center" src="assets/pp.png" alt="pp">
                    <h4 class="user-name">Nirmani Abesinghe</h4>
                </div>

                <?php include 'components/dashboardContainer.html' ?>

                <div class="logout-btn inactive-btn center ">
                    <h4 class="page-btn-text gold-text">Logout</h4>
                </div>
            </div>
        </nav>
        
    </div>
    <script src='js/header.js'></script>
</body>

</html>