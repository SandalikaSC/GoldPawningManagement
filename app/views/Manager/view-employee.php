<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> <?php echo SITENAME ?></title>
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/view_employee.css">
</head>

<body>
  <div class="page">
    <div class="left" id="panel">
      <div class="profile">
        <div class="profile-pic">
          <a href="<?php echo URLROOT ?>/mgEditProfile"><img src="<?php if(!empty($_SESSION['image'])){echo $_SESSION['image'];}else{echo URLROOT . "//img/image 1.png";} ?>" id="profileImg" alt=""></a>
          <div style="color:brown; position:absolute; font-weight:1000;" class="change-btn hidden" id="change-btn">Edit Profile</div>

        </div>
        <div class="name">
          <p><?php echo $_SESSION['user_name'] ?></p>
        </div>
      </div>
      <div class="btn-set">
        <a href="<?php echo URLROOT ?>/mgDashboard">
          <img src="<?php echo URLROOT ?>/img/dashboard.png" alt="">
          <p>Dashboard</p>
        </a>
        <a href="<?php echo URLROOT ?>/mgLocker">
          <img src="<?php echo URLROOT ?>/img/locker.png" alt="">
          <p>Locker</p>
        </a>
        <a href="<?php echo URLROOT ?>/mgPawnArticles">
          <img src="<?php echo URLROOT ?>/img/pawned.png" alt="">
          <p>Pawned Articles</p>
        </a>
        <a href="<?php echo URLROOT ?>/mgAuction">
          <img src="<?php echo URLROOT ?>/img/auction.png" alt="">
          <p>Auction</p>
        </a>
        <a class="staf" href="<?php echo URLROOT ?>/staff">
          <img src="<?php echo URLROOT ?>/img/golden_staff.png" alt="">
          <p>Staff</p>
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
        <img class="vogue" src="<?php echo URLROOT ?>/img/Panem Finance Inc 3.png" alt="logo">
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
                <input disabled value="<?php echo $data[0]->Line2 ?>" type="text" name="lane2" id="lane2">
                <span class="tooltiptext"><?php echo $data[0]->Line2 ?></span>
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
                <label for="home-no"><b>Extra Number:</b></label>
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
              </div>
              <div class="single-btn">
                <a href="<?php echo URLROOT ?>/staff/index" class="backbtn">Back</a>
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