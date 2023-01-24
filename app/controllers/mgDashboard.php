<?php
class mgDashboard extends controller{  
    
     //for displaying manager dashboard
     public function index(){
        
        isLoggedIn();
        $dash = $this->model('mgDashboardModel');
        $result = $dash->loadGoldRates();
        $this->view("/Manager/managerDash",$result);
     }
}
?>