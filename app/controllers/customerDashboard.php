<?php
class customerDashboard extends Controller
{
        public function __construct()
        {
                if (!isLoggedIn()) {
                        redirect('/Users');
                }
        }

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
        public function locker()
        { 
                $data = [];
                $this->view('Customer/locker');
        }
        public function pawnArticles()
        { 
                $data = [];
                $this->view('Customer/pawnArticles');
        }
        public function ContactUs()
        { 
                $data = [];
                $this->view('Customer/ContactUs');
        }
        public function About()
        { 
                $data = [];
                $this->view('Customer/about');
        }

} 
?>