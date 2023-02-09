<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/Reservations.css'>
<title>Vogue | Lockers</title>
</head>

<body>
    <div class="page">
        <?php require APPROOT . "/views/VaultKeeper/components/sideMenu.php" ?>
        <div class="right">
            <div class="right-heading">
                <div class="right-side">
                    <div class="bars" id="bars">
                        <img src="<?php echo URLROOT ?>/img/icons8-bars-48.png" alt="bars">
                    </div>
                    <h1 id="title">Reservations</h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="inside-page">



                <div class="search-container">
                    <input type="text" placeholder="Search...">
                    <span class="search-icon"></span>
                </div>



                <div class="reservations">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th> Locker</th>
                                <th>Customer ID</th>
                                <th>Customer</th>
                                <th>Articles</th>
                                <th>Key Delivery</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="data">
                                <td> 05</td>
                                <td>CU001</td>
                                <td>
                                    Sandalika Chamari
                                </td>

                                <td>02</td>
                                <td><label class="tag-del black" for="">Deliverd</label></td>
                                <td><a href="<?php echo URLROOT ?>/Reservations/ViewReservation">
                                        <button class="view">View</button>
                                    </a></td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="res-info">
                        <h2>Locker Information</h2>
                        <div class="section">
                            <label for="">Locker Count</label>
                            <label for="">50</label>
                        </div>
                        <div class="section">
                            <label for="">Available </label>
                            <label for="">15</label>
                        </div>
                        <div class="section">
                            <label for="">Reserved </label>
                            <label for="">35</label>
                        </div>
                        <h2>Article Information</h2>
                        <div class="section">
                            <label for="">Total Articles </label>
                            <label for="">18</label>
                        </div>
                        <h2>Key Information</h2>
                        <div class="section">
                            <label for="">Deliverd </label>
                            <label for="">12</label>
                        </div>
                        <div class="section">
                            <label for="">Tobe Deliverd </label>
                            <label for="">2</label>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="<?php echo URLROOT ?>/js/vksideMenu.js"></script>

    <?php require APPROOT . "/views/inc/footer.php" ?>