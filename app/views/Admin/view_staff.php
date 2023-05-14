<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> <?php echo SITENAME ?></title>
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/view_view_staff_details.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles_pawned_items_admin.css">
</head>
<style>
  .sidebar-brand {
	display: block;
	text-align: center;
	margin: 40px 0px;
}

.sidebar-brand img {
	width: 140px;
	height: 140px;
	border-radius: 50%;
}

.sidebar-brand h3 {
	margin: 10px 0px 20px;
	text-align: center;
	color: #bb8a04;
}
</style>

<body>
  <div class="page">
    <div class="left" id="panel">
      <div class="profile">
         <div class="sidebar-brand">
            <img src="<?php echo URLROOT?>/img/profile.jpg">
            <h3><?php echo $_SESSION['user_name']; ?></h3>
        </div>
      </div>

      <div class="btn-set">
         <a href="<?php echo URLROOT; ?>/Admin/AdminDash">
            <img src="<?php echo URLROOT ?>/img/dashboard.png" alt="">
            <p>Dashboard</p>
          </a>
          <a href="<?php echo URLROOT; ?>/Admin/pawned_items" >
            <img src="<?php echo URLROOT ?>/img/pawned.png" alt="">
            <p>Pawn Articles</p>
          </a>
          <a href="<?php echo URLROOT; ?>/Lockers/show_lockers">
            <img src="<?php echo URLROOT ?>/img/locker-white.png" alt="">
            <p>Locker</p>
          </a>
          <a href="<?php echo URLROOT?>/Admin/view_staff" class="staf">
            <img src="<?php echo URLROOT ?>/img/staff_white.png" alt="">
            <p style="">Staff</p>
          </a>
          <a href="<?php echo URLROOT; ?>/Admin/view_gold_market">
            <img src="<?php echo URLROOT ?>/img/market_white.png" alt="">
            <p>Market</p>
          </a>
          <a href="<?php echo URLROOT ?>/Goldprices/index">
            <img src="<?php echo URLROOT ?>/img/goldprice_white.png" alt="">
            <p>Gold Prices</p>
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
          <h1>
            <?php echo $data[0]->UserId ?>
          </h1>
        </div>
        <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">
      </div>
      <div class="content-of-view-page">
        <!--  -->
        <form action="<?php echo URLROOT ?>/staff/setStaffMember" method="POST">
          <section class="section_left">
            <section class="big-form">

              <img src="<?php if (!empty($data[0]->image)) {
                          echo $data[0]->image;
                        } else {
                          echo URLROOT . "/img/image 1.png";
                        } ?>" alt="photo" />


              <div class="form-group tooltip">
                <label for="fName"><b>First Name:</b></label>
                <input disabled value="<?php echo $data[0]->First_Name ?>" type="text" name="fName" id="fName">
                <span class="tooltiptext"><?php echo $data[0]->First_Name ?></span>
              </div>
              <div class="form-group tooltip">
                <label for="lName"><b>Last Name:</b></label>
                <input disabled value="<?php echo $data[0]->Last_Name ?>" type="text" name="lName" id="lName">
                <span class="tooltiptext"><?php echo $data[0]->Last_Name ?></span>
              </div>
              <div class="form-group tooltip">
                <label for="nic"><b>NIC:</b></label>
                <input disabled value="<?php echo $data[0]->NIC ?>" type="text" name="nic" id="nic">
                <span class="tooltiptext"><?php echo $data[0]->NIC ?></span>
              </div>
              <div class="form-group tooltip">
                <label for="dob"><b>Date of Birth:</b></label>
                <input disabled value="<?php echo $data[0]->DOB ?>" type="date" name="dob" id="dob">
                <span class="tooltiptext"><?php echo $data[0]->DOB ?></span>
              </div>
              <div class="form-group tooltip">
                <label for="lane1"><b>Address Lane 1:</b></label>
                <input disabled value="<?php echo $data[0]->Line1 ?>" type="text" name="lane1" id="lane1">
                <span class="tooltiptext"><?php echo $data[0]->Line1 ?></span>
              </div>
              <div class="form-group tooltip">
                <label for="lane2"><b>Address Lane 2:</b></label>
                <input disabled value="<?php if($data[0]->Line2==null){echo "Not Available";}else{echo $data[0]->Line2;} ?>" type="text" name="lane2" id="lane2">
                <span class="tooltiptext"><?php if($data[0]->Line2==null){echo "Not Available";}else{echo $data[0]->Line2;} ?></span>
              </div>
              <div class="form-group tooltip">
                <label for="lane3"><b>Address Lane 3:</b></label>
                <input disabled value="<?php if (!empty($data[0]->Line3)) {
                                          echo $data[0]->Line3;
                                        } else {
                                          echo "Not Available";
                                        } ?>" type="text" name="lane3" id="lane3">
                <span class="tooltiptext"><?php if (!empty($data[0]->Line3)) {
                                            echo $data[0]->Line3;
                                          } else {
                                            echo "Not Available";
                                          } ?></span>
              </div>
              <div class="form-group tooltip">
                <label for="mob-no"><b>Mobile Number:</b></label>
                <input disabled value="<?php if (!empty($data[0]) && !empty($data[1])) {
                                          echo $data[1]->phone;
                                        } else if (!empty($data[0]) && empty($data[1])) {
                                          echo $data[0]->phone;
                                        } ?>" type="text" name="mob-no" id="mob-no">
                <span class="tooltiptext"><?php if (!empty($data[0]) && !empty($data[1])) {
                                            echo $data[1]->phone;
                                          } else if (!empty($data[0]) && empty($data[1])) {
                                            echo $data[0]->phone;
                                          } ?></span>
              </div>
              <div class="form-group tooltip">
                <label for="home-no"><b>Additional Number:</b></label>
                <input disabled value="<?php if (!empty($data[0]) && !empty($data[1])) {
                                          echo $data[0]->phone;
                                        } else if (!empty($data[0]) && empty($data[1])) {
                                          echo "Not Available";
                                        } ?>" type="text" name="mob-no2" id="mob-no2">

                <span class="tooltiptext"><?php if (!empty($data[0]) && !empty($data[1])) {
                                            echo $data[0]->phone;
                                          } else if (!empty($data[0]) && empty($data[1])) {
                                            echo "Not Available";
                                          } ?></span>
              </div>
              <div class="form-group tooltip">
                <label for="email"><b>Email:</b></label>
                <input disabled value="<?php echo $data[0]->email ?>" type="text" name="email" id="email">
                <span class="tooltiptext"><?php echo $data[0]->email ?></span>
              </div>

            </section>
            <section class="section_right">
              <div class="roles" style="justify-self:center;">

                <div class="form-group tooltip">
                  <label for="employee_id"><b>Employee ID:</b></label>
                  <input class="data" type="text" disabled value="<?php echo $data[0]->UserId ?>" name="employee_id" id="employee_id">
                  <span class="tooltiptext"><?php echo $data[0]->UserId ?></span>
                </div>
                <div class="form-group tooltip">
                  <label for="role"><b>Role:</b></label>
                  <input class="data" type="text" disabled value="<?php echo $data[0]->type ?>" name="role" id="role">
                  <span class="tooltiptext"><?php echo $data[0]->type ?></span>
                </div>
                <div class="form-group tooltip">
                  <label for="added_date"><b>Added date:</b></label>
                  <input class="data" type="text" disabled value="<?php echo $data[0]->Created_date ?>" name="added_date" id="added_date">
                  <span class="tooltiptext"><?php echo $data[0]->Created_date ?></span>
                </div>
                <div class="form-group tooltip">
                  <label for="created_by"><b>Created By:</b></label>
                  <input class="data" type="text" disabled value="<?php if($data[0]->Created_By==null){echo "Not Available";}else{echo $data[0]->Created_By;} ?>" name="created_by" id="created_by">
                  <span class="tooltiptext"><?php if($data[0]->Created_By==null){echo "Not Available";}else{echo $data[0]->Created_By;} ?></span>
                </div>
              </div>
              <div class="single-btn">
              <a href="<?php echo URLROOT; ?>/Admin/view_staff" class="backbtn">Back</a>
              </div>
            </section>
          </section>

        </form>

        <!--  -->
      </div>
    </div>
  </div>
</body>
<script src="<?php echo URLROOT ?>/js/sidebarHide.js"></script>
<script src="<?php echo URLROOT ?>/js/profileImageHover.js"></script>


</html>