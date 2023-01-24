<?php
class mgLocker extends controller{
    
     public function index(){

        isLoggedIn();
        $this->view("/Manager/locker_dashboard");
     }
}
?>