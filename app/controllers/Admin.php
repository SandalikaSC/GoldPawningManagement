<?php
    class Admin extends Controller {
        public function __construct(){
            if(!isLoggedIn()) {
                redirect('employees');
            }
        }

        public function AdminDash(){
            $gold_rates = $this->model('adminModel')->getGoldRates();
            $interest = $this->model('adminModel')->getInterestRates();

            $data = [
                'title' => 'Dashboard',
                'gold_rates' => $gold_rates,
                'interest' => $interest
            ];

            $this->view('Admin/adminDash_1', $data);
        }
    }