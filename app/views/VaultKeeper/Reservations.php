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
                    <h1 id="title">Lockers</h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="inside-page">


                <div class="search-container">
                    <input type="text" id="locker-search" placeholder="Search by Locker Number......" oninput="searchLocker()">
                    <span class="search-icon"></span>
                </div>

                <div class="reservations" id="reservations">
                    <!-- <div class="lockers" id="lockers-container">
                        <?php foreach ($data['lockers'] as $locker) : ?>
                            <a href="<?= URLROOT ?>/Reservations/ViewReservation/<?= $locker->lockerNo ?>" class="locker ">
                                <div class="lockerno <?php echo ($locker->Status == "Not Available") ? "gray" : ""; ?>"><?php echo $locker->lockerNo ?></div>
                                <div><label class="label <?php echo ($locker->Status == "Available") ? "green" : ""; ?>"><?php echo $locker->Status ?></label> </div>
                            </a>

                        <?php endforeach; ?> 

                    </div> -->
                    <div class="lockers" id="lockers-container">
                        <?php foreach ($data['lockers'] as $locker) : ?>
                            <a href="<?= URLROOT ?>/Reservations/ViewReservation/<?= $locker->lockerNo ?>" class="locker">
                                <div class="lockerno <?php echo ($locker->Status == "Not Available") ? "gray" : ""; ?>"><?php echo $locker->lockerNo ?></div>
                                <div><label class="label <?php echo ($locker->Status == "Available") ? "green" : ""; ?>"><?php echo $locker->Status ?></label> </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div id="search-results" class="empty-div">No result found</div>
                    <div class="res-info">
                        <h2>Locker Information</h2>
                        <div class="section">
                            <label for="">Locker Count</label>
                            <label for=""><?= $data['lockerCount'] ?></label>
                        </div>
                        <div class="section">
                            <label for="">Available </label>
                            <label for=""><?= $data['available'] ?></label>
                        </div>
                        <div class="section">
                            <label for="">Reserved </label>
                            <label for=""><?= $data['reserverd'] ?></label>
                        </div>
                        <h2>Article Information</h2>
                        <div class="section">
                            <label for="">Total Articles </label>
                            <label for=""><?= $data['CurrentArticles'] ?></label>
                        </div>
                        <h2>Key Information</h2>
                        <div class="section">
                            <label for="">Deliverd </label>
                            <label for=""><?= $data['keyDeliverd'] ?></label>
                        </div>
                        <div class="section">
                            <label for="">Tobe Deliverd </label>
                            <label for=""><?= $data['notDeliverd'] ?></label>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="<?php echo URLROOT ?>/js/vksideMenu.js"></script>
    <script>
        function searchLocker() {
            const searchInput = document.getElementById('locker-search');
            const searchQuery = searchInput.value.toLowerCase();
            const lockerItems = document.getElementsByClassName('locker');
            let foundResults = false; // Flag to track if any results are found

            Array.from(lockerItems).forEach((item) => {
                const lockerNumber = item.querySelector('.lockerno').textContent.toLowerCase();

                if (lockerNumber.includes(searchQuery)) {
                    item.style.display = 'block'; // Show the locker item
                    foundResults = true; // Set the flag to true if a match is found
                } else {
                    item.style.display = 'none'; // Hide the locker item
                }
            });

            const searchResultsContainer = document.getElementById('search-results');

            if (!foundResults) {
                // If no results are found, display the "No Results Found" message
                searchResultsContainer.style.display = 'flex';
            } else {
                // If results are found, clear the "No Results Found" message
                searchResultsContainer.style.display = 'none';
            }
        }
    </script>

    <?php require APPROOT . "/views/inc/footer.php" ?>