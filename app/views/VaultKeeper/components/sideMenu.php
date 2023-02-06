
<div class="left" id="panel">
    <div class="profile">
        <div class="profile-pic">
            <a href="<?php echo URLROOT ?>editprofile/viewEditProfile"><img class="profileImg"
                    src="<?php if(!empty($_SESSION['image'])){echo $_SESSION['image'];}else{echo URLROOT . "/public/img/image 1.png";} ?>" alt=""></a>
        </div>
        <div class="name">
            <p class="profile_name">
                <?php echo $_SESSION['user_name'] ?>
            </p>
        </div>
    </div>
    <div class="btn-set">
        <a id="dashboard" class="" href="<?php echo URLROOT ?>/VKDashboard/dashboard">
            <img src="<?php echo URLROOT ?>/img/home.png" alt="">
            <p>Dashboard</p>
        </a>
         
        <a id="locker" class="dash-btn" href="<?php echo URLROOT ?>/VKDashboard/lockers">
            <img src="<?php echo URLROOT ?>/img/locker-white.png" alt="">
            <p>Lockers</p>
        </a>
        <a id="Customers"  class="dash-btn" href="<?php echo URLROOT; ?>/VKDashboard/Customers">
            <img id="Customers-Img" src="<?php echo URLROOT ?>/img/white_customers.png" alt="">
            <p >Customers</p>
        </a>
 
    </div>
    <div class="lgout">
        <a href="<?php echo URLROOT ?>/Users/logout">Logout</a>
    </div>
</div>


<!-- <script>
    let bars = document.getElementById("bars");
let panel = document.getElementById("panel");

bars.addEventListener("click", () => {
    panel.classList.toggle("hide");
})

window.onload = function () {
    func();
};
function func() {
    let dashboard_btn = document.getElementById("title");
    var txt = dashboard_btn.innerHTML;
    console.log(txt);
    switch (txt) {
        
        case "Dashboard":
            document.getElementById("dashboard").classList.add("dash");
            break;
        case "Lockers":
            document.getElementById("locker").classList.add("dash");
            document.getElementById("dashboard").classList.remove("dash");
            break;
         
        case "Customers":
            document.getElementById("Customers").classList.add("dash");
            document.getElementById("dashboard").classList.remove("dash");
            break;
        default:
            statementDefault;
    }
}

</script> -->