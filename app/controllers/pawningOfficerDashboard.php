<?php
    class pawningOfficerDashboard extends Controller {
        public function __construct(){
            if(!isLoggedIn()) {
                redirect('employees');
            }
        }

        public function dashboard(){
            $gold_rates = $this->model('pawningOfficer')->getGoldRates();
            $interest = $this->model('pawningOfficer')->getInterestRates();                ;

            $data = [
                'title' => 'Dashboard',
                'gold_rates' => $gold_rates,
                'interest' => $interest
            ];

            $this->view('PawnOfficer/pawnofficerDash', $data);
        }
    }