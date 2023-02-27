<?php
class adDashboard extends Controller
{

     


        public function index()
        {
            isLoggedIn();
            $this->view('Admin/adminDash');

        }
      
        
}
?>
