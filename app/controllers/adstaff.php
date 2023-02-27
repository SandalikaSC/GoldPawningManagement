<?php
class adstaff extends Controller
{

     


        public function index()
        {
            isLoggedIn();
            $this->view('Admin/staff');

        }
      
        
}
?>