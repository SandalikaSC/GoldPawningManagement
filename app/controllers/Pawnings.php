<?php
    class Pawnings extends Controller {
        public function __construct() {
            if(!isLoggedIn()) {
                redirect('employees');
            }

            $this->pawningModel = $this->model('Pawning');
        }

        public function pawned_items() {
            // Get pawned items
            $pawned_items = $this->pawningModel->getPawnedItems();

            $data = [
                'pawned_items' => $pawned_items
            ];

            $this->view('PawnOfficer/pawnedItems', $data);
        }

        public function payment_details($id) {
            // Get pawned item
            $pawned_item = $this->pawningModel->getPawnItemById($id);

            $data = [
                'pawn_item' => $pawned_item
            ];

            $this->view('pawning/payment_details', $data);
        }

        public function new_pawning() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'full_name' => trim($_POST['full_name']),
                    'nic' => trim($_POST['nic']),
                    'phone_no' => trim($_POST['phone_no']),
                    'email' => trim($_POST['email']),
                    'file' => trim($_POST['file']),
                    'full_name_err' => '',
                    'nic_err' => '',
                    'phone_no_err' => '',
                    'email_err' => '',
                    'file_err' => '',
                ];

                // Validate email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } else {

                }

                // Validate name
                if(empty($data['first_name'])) {
                    $data['first_name_err'] = 'Please enter name';
                }

                // Validate NIC
                if(empty($data['nic'])) {
                    $data['nic_err'] = 'Please enter NIC';
                } else {
                    
                }

                // Validate phone
                if(empty($data['phone_no'])) {
                    $data['phone_no_err'] = 'Please enter a working phone number';
                }

                // When there are no errors
                if(empty($data['email_err']) && empty($data['full_name_err']) && empty($data['nic_err']) && empty($data['phone_no_err'])) {
                    // Register customer
                    // redirect('pawnings/new_pawning');                   
                    
                } else {
                    // Load view with errors
                    $this->view('PawnOfficer/new_pawning', $data);
                }

            } else {
                //Init data
                $data = [
                    'full_name' => '',
                    'nic' => '',
                    'phone_no' => '',
                    'email' => '',
                    'file' => '',
                    'full_name_err' => '',
                    'nic_err' => '',
                    'phone_no_err' => '',
                    'email_err' => '',
                    'file_err' => '',
                ];

                // Load view
                $this->view('PawnOfficer/new_pawning', $data);
            }
        }

        
    }