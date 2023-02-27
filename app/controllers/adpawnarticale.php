<?php
class adpawnarticale extends Controller
{

     


        public function index()
        {
            isLoggedIn();
            $this->view('Admin/pawnarticales');

        }
      
        
}
?>