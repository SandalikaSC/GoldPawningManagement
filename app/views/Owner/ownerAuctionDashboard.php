<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/ownerAuctionDashboard.css">
</head>

<body>

    <div class="page">
        <div class="left" id="panel">
            <div class="profile">
                <div class="profile-pic">
                    <a href="<?php echo URLROOT ?>/mgEditProfile"><img src="<?php if (!empty($_SESSION['image'])) {
                                                                                echo $_SESSION['image'];
                                                                            } else {
                                                                                echo URLROOT . "/img/image 1.png";
                                                                            } ?>" id="profileImg" alt=""></a>
                    <div style="color:brown; position:absolute; font-weight:1000;" class="change-btn hidden" id="change-btn">Edit Profile</div>

                </div>
                <div class="name">
                    <p><b>Hi...</b><?php echo $_SESSION['user_name'] ?></p>
                </div>
            </div>
            <div class="btn-set">
                <a href="<?php echo URLROOT ?>/ownerDashboard">
                    <img src="<?php echo URLROOT ?>/img/dashboard.png" alt="">
                    <p>Dashboard</p>
                </a>
                <a href="<?php echo URLROOT ?>/ownerLocker">
                    <img src="<?php echo URLROOT ?>/img/locker.png" alt="">
                    <p>Locker</p>
                </a>
                <a href="<?php echo URLROOT ?>/ownerPawnArticleDash">
                    <img src="<?php echo URLROOT ?>/img/pawned.png" alt="">
                    <p>Pawned Articles</p>
                </a>
                <a class="auc" href="<?php echo URLROOT ?>/ownerAuction">
                    <img src="<?php echo URLROOT ?>/img/golden_auction.png" alt="">
                    <p>Auction</p>
                </a>
                <a href="#">
                    <img src="<?php echo URLROOT ?>/img/staff.png" alt="">
                    <p>Market</p>
                </a>
            </div>
            <div class="lgout">
                <a href="<?php echo URLROOT ?>/Users/logout">Logout</a>
            </div>
        </div>
        <div class="right">
            <div class="right-heading">
                <div class="right-side">
                    <div class="bars" id="bars">
                        <img src="<?php echo URLROOT ?>/img/icons8-bars-48.png" alt="bars">
                    </div>
                    <div class="page-name">
                        <h1>Auction</h1>
                    </div>
                    <div class="back">
                        <a href="<?php echo URLROOT ?>/ownerDashboard" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>
                    </div>
                </div>
                <div class="search">
                    <button id="filter-popup">Filter</button>
                    <a id="filter-cancel-button" href="<?php echo URLROOT ?>/ownerAuction">Cancel</a>
                    <div class="search-bar">
                        <input type="text" name="search_input" id="search_input" onkeyup="searchItems()" placeholder="Enter Article ID..">
                        <img src="<?php echo URLROOT ?>/img/searchicon.gif" alt="search-icon">
                    </div>
                    <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
                </div>
            </div>


            <div class="inside-page">



                <div class="filter-and-article-set">
                    <?php if (!empty($data)) { ?>
                        <div id="myDiv" class="auction-page-row">
                            <?php foreach ($data as $row) { ?>
                                <section class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img src="<?php if (!empty($row->image)) {
                                                            echo $row->image;
                                                        } else {
                                                            echo URLROOT . "/img/1.png";
                                                        } ?>" alt="Jewelry">
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="arti-id">
                                                <?php echo $row->Article_Id ?>
                                            </p>
                                            <p><?php echo $row->Type ?></p>
                                            <p><?php echo $row->Karatage ?> K</p>
                                            <p><?php echo $row->Weight ?>g</p>
                                            <a href="<?php echo URLROOT ?>/ownerAuction/viewAuctionItem/<?php echo $row->Article_Id ?>">View</a>
                                        </div>
                                    </div>
                                </section>

                            <?php } ?>

                            <div id="tfoot"></div>
                        </div>
                    <?php } else {
                        echo "<p><center>No Auction Items Found</center></P>";
                    } ?>

                    <div id="outer-filter" class="outer-filter">
                        <form action="<?php echo URLROOT ?>/ownerAuction/filter" method="POST">
                            <div class="filter" id="filter-section">
                                <div class="ul">
                                    <div class="li">
                                        <label for="auction-date">Auction Date:</label>
                                        <input type="date" id="auctionDate" name="auction-date">
                                    </div>
                                    <div class="li">
                                        <label for="created-date">Min Pawned Date:</label>
                                        <input type="date" id="createdDate" name="created-date">
                                    </div>
                                    <div class="li">
                                        <label for="end-date">Max Pawned Date:</label>
                                        <input type="date" id="endDate" name="end-date">
                                    </div>
                                    <div class="li">
                                        <label for="karatage">Karatage:</label>
                                        <select id="kara" name="karatage">
                                            <option value="">Select Karatage</option>
                                            <option value="18">18k</option>
                                            <option value="19">19k</option>
                                            <option value="20">20k</option>
                                            <option value="21">21k</option>
                                            <option value="22">22k</option>
                                            <option value="24">24k</option>
                                        </select>
                                    </div>
                                    <div class="li">
                                        <label for="type">Type:</label>
                                        <select id="tp" name="type">
                                            <option value="">Select Type</option>
                                            <option value="Jewelry">Jewelry</option>
                                            <option value="ring">Ring</option>
                                            <option value="bracelet">Bracelet</option>
                                            <option value="necklace">Necklace</option>
                                            <option value="earrings">Earrings</option>
                                        </select>
                                    </div>
                                    <div class="li">
                                        <label for="min-weight">Min Weight (g):</label>
                                        <input type="number" id="minWeight" name="min-weight" step="0.01">
                                    </div>
                                    <div class="li">
                                        <label for="max-weight">Max Weight (g):</label>
                                        <input type="number" id="maxWeight" name="max-weight" step="0.01">
                                    </div>
                                </div>

                                <div class="button-set">
                                    <button type="submit" id="filter-button">Filter</button>
                                    <button type="button" id="filter-cancel-button" class="filter-cancel-button">Clear</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <!--  -->

</body>
<script src="<?php echo URLROOT ?>/js/sidebarHide.js"></script>
<script src="<?php echo URLROOT ?>/js/profileImageHover.js"></script>

<script>
    const searchInput = document.querySelector('#search_input');

    searchInput.addEventListener('input', () => {
        const regex = /^A\d{4}$/; // regular expression to match a capital A followed by 4 digits between 0 and 9
        const userInput = searchInput.value;

        if (!regex.test(userInput)) {
            searchInput.value = userInput.replace(/[^A\d]/g, ''); // replace any non-matching characters with an empty string
        }

        if (userInput.length > 5) {
            searchInput.value = userInput.slice(0, 5); // truncate the input value to a maximum length of 5 characters
        }
    });
</script>

<script>
    let inputClearBtn = document.getElementById('filter-cancel-button');
    inputClearBtn.addEventListener('click', () => {
        document.getElementById('auctionDate').value = "";
        document.getElementById('endDate').value = "";
        document.getElementById('createdDate').value = "";
        document.getElementById('kara').value = "";
        document.getElementById('tp').value = "";
        document.getElementById('minWeight').value = "";
        document.getElementById('maxWeight').value = "";
    })
</script>

<script>
    let hideBtn = document.getElementById('filter-popup');

    hideBtn.addEventListener('click', () => {
        document.getElementById("outer-filter").classList.toggle('visible');
    })
</script>


<script>
    function searchItems() {
        var input, filter, td1, td2, td3, td4, i, nonCount, txtValue1, txtValue2, txtValue3, txtValue4;
        input = document.getElementById("search_input");
        filter = input.value.toUpperCase();
        ele = document.getElementById("myDiv");
        row = ele.getElementsByTagName("section");
        nonCount = 0;
        for (i = 0; i < row.length; i++) {
            td1 = row[i].getElementsByTagName("p")[0];
            td2 = row[i].getElementsByTagName("p")[1];
            td3 = row[i].getElementsByTagName("p")[2];
            td4 = row[i].getElementsByTagName("p")[3];

            if (td1 || td2 || td3 || td4) {
                txtValue1 = td1.textContent || td1.innerText;
                txtValue2 = td2.textContent || td2.innerText;
                txtValue3 = td3.textContent || td3.innerText;
                txtValue4 = td4.textContent || td4.innerText;

                if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1) {
                    row[i].style.display = "";
                } else {
                    row[i].style.display = "none";
                    nonCount++;
                }
            }
        }
        if (nonCount == row.length) {
            document.getElementById('tfoot').innerHTML = "<div style='display:flex;justify-content:center;align-items:center;text-align:center;margin-top:30px;margin-left:100px;'>No Auction Items Found </div>";
            nonCount = 0;
        } else {
            document.getElementById('tfoot').innerHTML = "";
        }
    }
</script>

</html>