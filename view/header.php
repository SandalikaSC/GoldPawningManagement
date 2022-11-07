<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../view/css/header.css'>
    <script src='main.js'></script>
</head>

<body>
    <img class="vogue" src="assets/af.3-removebg-preview.png">
    <nav class="nav">

        <div class="profile">
            <img class="profileImg center" src="assets/pp.png" alt="pp">
            <h4 class="user-name">Nirmani Abesinghe</h4>
        </div>

        <?php include 'view/components/dashboardContainer.html' ?>
        
        <div class="logout-btn inactive-btn center ">
        <h4 class="page-btn-text gold-text">Logout</h4>
        </div>

    </nav>
</body>

</html>