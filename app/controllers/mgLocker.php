<?php
class mgLocker extends controller{
    
     public function index(){

        isLoggedIn();
        
        $this->view("/Manager/locker_dashboard");
     }

     public function viewLockerItems(){
      isLoggedIn();
        $this->view("/Manager/viewLockerItems");
     }
}
?>