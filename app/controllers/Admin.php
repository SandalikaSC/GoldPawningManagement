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

        public function pawned_items() {
            // Get pawned items
            $pawned_items = $this->model('adminModel')->getPawnedItems();

            $data = [
                'pawned_items' => $pawned_items
            ];

            $this->view('Admin/pawnedItems_Admin', $data);
        }
    }