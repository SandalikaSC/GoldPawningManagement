<?php
class customerDashboard extends Controller
{
        public function dashboard()
        { 
                $data = [];
                $this->view('Customer/customerDash');
        }
        public function appointment()
        { 
                $data = [];
                $this->view('Customer/appointments');
        }
} 
?>