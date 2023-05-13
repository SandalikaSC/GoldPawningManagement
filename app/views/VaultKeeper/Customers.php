<?php require APPROOT . "/views/inc/header.php" ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT ?>/css/customers.css'>
<title>Vogue | Customers</title>
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
                    <h1 id="title">Customers</h1>
                </div>
                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
            </div>
            <div class="inside-page">
                <div class="search-container">
                    <input type="text" placeholder="Search with Customer Name  Name" id="customer-search" oninput="searchCusstomer()">
                    <span class="search-icon"></span>
                </div>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th> </th>
                            <th>Customer ID</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Phone</th>
                            <th>Date Joined</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($data['customers'])) : ?>
                            <label for="">No Customers yet</label>
                        <?php else : ?>
                            <?php $id = 1; ?>
                            <?php foreach ($data['customers'] as $customer) : ?>

                                <tr class="data">
                                    <td><?= $id++; ?></td>
                                    <td><?= $customer->UserId; ?></td>
                                    <td class="name">
                                        <!-- <div class="profile-div"> -->
                                        <!-- <img src="<?php echo URLROOT ?>/img/profile_pic.png" alt="" class="pro-pic"> -->
                                        <img src="<?php if (empty($customer->image)) {
                                                        echo URLROOT . "/img/profile_pic.png";
                                                    } else {
                                                        echo  $customer->image;
                                                    } ?>
                                    " alt="" class="pro-pic">

                                        <div class="pro-details">
                                            <label><?= $customer->First_Name . " " . $customer->Last_Name; ?></label>
                                            <label class="email"><?= $customer->email; ?></label>
                                        </div>
                                    </td>
                                    <td><label class="tag green" for="">
                                            <?= ($customer->Status == 1) ? "Active" : "Blocked"; ?> </label> </td>
                                    <td><?= $customer->phone; ?></td>
                                    <td><?= date("d M Y", strtotime($customer->Created_date)) ?></td>
                                    <td><a href="<?php echo URLROOT ?>/LockerCustomer/getCustomer/<?= $customer->UserId; ?>" class="view">View</a></td>
                                </tr>

                            <?php endforeach; ?>
                            <tr id="no-results-row" style="display: none;">
    <td colspan="7">No results found</td>
</tr>
                        <?php endif; ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="<?php echo URLROOT ?>/js/vksideMenu.js"></script>
    <script>
        function searchCusstomer() {
            const searchInput = document.getElementById('customer-search');
            const searchQuery = searchInput.value.toLowerCase();
            const rows = document.querySelectorAll('.data');
            const noResultsRow = document.getElementById('no-results-row');

            let resultsFound = false;

            rows.forEach((row) => {
                const customerId = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const customerName = row.querySelector('.name label:first-child').textContent.toLowerCase();
                const customerEmail = row.querySelector('.name .email').textContent.toLowerCase();

                if (customerId.includes(searchQuery) || customerName.includes(searchQuery) || customerEmail.includes(searchQuery)) {
                    row.style.display = 'table-row'; // Show the row
                    resultsFound = true;
                } else {
                    row.style.display = 'none'; // Hide the row
                }
            });

            if (!resultsFound) {
                noResultsRow.style.display = 'table-row'; // Show "No results found" message
            } else {
                noResultsRow.style.display = 'none'; // Hide "No results found" message
            }
        }
    </script>

    <?php require APPROOT . "/views/inc/footer.php" ?>














    <!-- <table class="customer-tbl">
                    <tr>
                        <th> </th>
                        <th>Customer ID</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Locker</th>
                        <th>Key Delivery</th>
                        <th> </th>

                    </tr>
                    <tr class="data">
                        <td> 254</td>
                        <td>CU001</td>
                        <td class="name">
                            <div class="profile">
                                <img src="<?php echo URLROOT ?>/img/profile_pic.png" alt="" class="pro-pic">
                            </div>
                            <div class="pro-details">
                                <label>Sandalika Chamari</label>
                                <label class="email">SandalikaChamari@gmail.com</label>
                            </div>
                        </td>
                        <td>Active</td>
                        <td>01</td>
                        <td>Deliverd</td>
                    </tr>

                </table> -->