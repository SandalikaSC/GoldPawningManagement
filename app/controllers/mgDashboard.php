<?php
class mgDashboard extends controller{  
    
     //for displaying manager dashboard
     public function index(){
        
        isLoggedIn();
        $staff=$this->model("staffModel");
        $result=$staff->loadProfilePicture($_SESSION['user_email']);
        $_SESSION['profile_pic']=$result->image;
        $_SESSION['mg_name']=$result->Name;

        $goldRates = $this->model('mgDashboardModel');
        $result1 = $goldRates->loadGoldRates();

        $interest=$this->model('mgDashboardModel');
        $result2=$interest->loadInterest();

        $complaint=$this->model('mgDashboardModel');
        $result3=$complaint->loadComplaints();

        $this->view("/Manager/managerDash",array($result1,$result2,$result3));



     }
}
?>