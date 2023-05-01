<?php
    class pawningOfficerDashboard extends Controller {
        public function __construct(){
            if(!isLoggedIn()) {
                redirect('employees');
            }
        }

        public function dashboard(){
            $gold_rates = $this->model('pawningOfficer')->getGoldRates();
            $interest = $this->model('pawningOfficer')->getInterestRates();           
            $appointments = $this->model('pawningOfficer')->getAppointments();
            $validated_articles = $this->model('pawningOfficer')->getValidatedArticles();
            $no_of_customers = $this->model('pawningOfficer')->getRegisteredCustomers();
            $pawned_items_count = $this->model('pawningOfficer')->getPawnedItemsCount();

            $data = [
                'title' => 'Dashboard',
                'gold_rates' => $gold_rates,
                'interest' => $interest,
                'appointments' => $appointments,
                'validated_articles' => $validated_articles,
                'no_of_customers' => $no_of_customers,
                'pawned_items' => $pawned_items_count
            ];

            $this->view('PawnOfficer/pawnofficerDash', $data);
        }
    }