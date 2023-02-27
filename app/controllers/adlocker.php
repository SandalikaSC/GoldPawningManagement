<?php
class adlocker extends Controller
{

     


        public function index()
        {
            isLoggedIn();
            $this->view('Admin/locker');

        }
      
        
}
?>
