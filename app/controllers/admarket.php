<?php
class admarket extends Controller
{

     


        public function index()
        {
            isLoggedIn();
            $this->view('Admin/market');

        }
      
        
}
?>