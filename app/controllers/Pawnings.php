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
            $payment_history = $this->pawningModel->getPaymentsByPawnID($id);

            $paid_loan = 0.00;

            $data = [
                'pawn_item' => $pawned_item,
                'payment_history' => $payment_history,
                'remaining_loan' => '',
            ];

            if(!empty($data['payment_history'])) {
                foreach($data['payment_history'] as $payment_record) {
                    $paid_loan = $paid_loan + $payment_record->Principle_Amount;
                }
            }

            $this->view('PawnOfficer/payment_details', $data);
        }

        public function make_payments($id) {
            // Get pawned item
            $pawned_item = $this->pawningModel->getPawnItemById($id);
            $payment_history = $this->pawningModel->getPaymentsByPawnID($id);

            $data = [
                'pawn_item' => $pawned_item,
                'payment_history' => $payment_history
            ];

            $this->view('PawnOfficer/make_payments', $data);
        }

        public function release_pawn($id) {
            // Get pawned item
            $pawned_item = $this->pawningModel->getPawnItemById($id);

            $data = [
                'pawn_item' => $pawned_item
            ];

            $this->view('PawnOfficer/release_pawn', $data);
        }

        public function renew_pawn($id) {
            // Get pawned item
            $pawned_item = $this->pawningModel->getPawnItemById($id);

            $data = [
                'pawn_item' => $pawned_item
            ];

            $this->view('PawnOfficer/renew_pawn', $data);
        }

        // public function showConfirmMessage($validation_id, $full_loan, $payment_method) {
        //     $validation_details = $this->pawningModel->getValidationDetailsByID($validation_id);
        //     $customer = $this->pawningModel->getCustomerByID($validation_details->customer);

        //     $data = [
        //         'validation_details' => $validation_details,
        //         'customer_details' => $customer,
        //         'full_loan' => $full_loan,
        //         'payment_method' => $payment_method,
        //         'pawn_officer' => $_SESSION['user_id']
        //     ];

        //     // $this->view('PawnOfficer/confirm_pawn_message', $data);
        //     if($_SERVER['REQUEST_METHOD'] == 'POST') {                
        //         // Sanitize POST data
        //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //         if(isset($_POST['confirm'])) {
        //             $pawn_article = $this->pawningModel->pawnArticle($data);
    
        //             if($pawn_article) {
        //                 redirect('/pawningOfficerDashboard/dashboard');
        //             } else {
        //                 flash('register', 'Something went wrong. Please try again.', 'invalid');
        //                 $this->view('PawnOfficer/confirmPawn', $data); 
        //             }
        //         }
                
        //     } else {
        //         $this->view('PawnOfficer/confirm_pawn_message', $data);
        //     }
        // }

        public function confirm_pawn($id) {
            // Get validation details of the article
            $validation_details = $this->pawningModel->getValidationDetailsByID($id);
            $customer = $this->pawningModel->getCustomerByID($validation_details->customer);

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'validation_details' => $validation_details,
                    'customer_details' => $customer,
                    'full_loan' => trim($_POST['full-loan']),
                    'payment_method' => trim($_POST['payment-method']),
                    'pawn_officer' => $_SESSION['user_id'],
                    'full_loan_err' => ''
                ];

                if(empty($data['full_loan'])) {
                    $data['full_loan_err'] = "Please enter the full loan amount customer decided";
                }                

                if(($data['full_loan']) > ($data['validation_details']->estimated_value)) {
                    $data['full_loan_err'] = "Full loan must not exceed the estimated value of the article";
                }
                
                if(empty($data['full_loan_err'])) {
                    if(isset($_POST['pawn'])) {
                        $pawn_article = $this->pawningModel->pawnArticle($data);

                        if($pawn_article) {
                            redirect('/pawningOfficerDashboard/dashboard');
                        } else {
                            flash('register', 'Something went wrong. Please try again.', 'invalid');
                            $this->view('PawnOfficer/confirmPawn', $data); 
                        }
                    }
                } else {
                    if(isset($_POST['dismiss'])) {
                        $dismiss_success = $this->pawningModel->deleteValidatedArticle($id);
    
                        if($dismiss_success) {
                            redirect('/pawningOfficerDashboard/dashboard');
                        } else {
                            flash('register', 'Something went wrong. Please try again.', 'invalid');
                            $this->view('PawnOfficer/confirmPawn', $data); 
                        }
                    } elseif(isset($_POST['cancel'])) {
                        redirect('/pawningOfficerDashboard/dashboard');
                    } else {
                        $this->view('PawnOfficer/confirmPawn', $data);
                    }
                }

                // if(isset($_POST['dismiss'])) {
                //     $dismiss_success = $this->pawningModel->deleteValidatedArticle($id);

                //     if($dismiss_success) {
                //         redirect('/pawningOfficerDashboard/dashboard');
                //     } else {
                //         flash('register', 'Something went wrong. Please try again.', 'invalid');
                //         $this->view('PawnOfficer/confirmPawn', $data); 
                //     }
                // }
              
            } else {
                $data = [
                    'validation_details' => $validation_details,
                    'customer_details' => $customer,
                    'full_loan' => '',
                    'payment_method' => '',
                    'pawn_officer' => $_SESSION['user_id'],
                    'full_loan_err' => ''
                ];
    
                $this->view('PawnOfficer/confirmPawn', $data);
            }           
        }

        public function new_pawning() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'nic' => trim($_POST['nic']),
                    'email' => trim($_POST['email']),
                    'type' => trim($_POST['type']),
                    'image' => trim($_POST['image']),
                    'customer' => '',
                    'pawn_officer' => $_SESSION['user_id'],
                    'type_err' => '',
                    'image_err' => '',
                    'nic_err' => '',
                    'email_err' => ''
                ];

                

                if(empty($data['nic'])) {
                    $data['nic_err'] = 'Please enter customer NIC';
                } else {
                    $customer = $this->pawningModel->getCustomerByNIC($data['nic']);

                    if($customer) {
                        if(($customer->email) != ($data['email'])) {
                            $data['email_err'] = 'Customer does not have an account for this email';
                        } else {
                            $data['customer'] = $customer->UserId;
                        }
                    } else {
                        $data['nic_err'] = 'A customer with this NIC has not registered with us'; 
                    }
                }

                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter customer email';
                }

                if(empty($data['type'])) {
                    $data['type_err'] = 'Please choose a type';
                }

                if(empty($data['image'])) {
                    $data['image_err'] = 'Please insert the article image';
                }

                if(empty($data['type_err']) && empty($data['image_err']) && empty($data['nic_err']) && empty($data['email_err'])) {
                    $success = $this->pawningModel->addArticleToValidate($data);

                    if($success) {
                        // Redirect to successful message                        
                        flash('register', 'Article added successfully', 'success');
                        redirect('/pawnings/new_pawning');
                        // $this->view('PawnOfficer/register_customer', $data);
                    } else {
                        flash('register', 'Something went wrong', 'invalid');
                        $this->view('PawnOfficer/new_pawning', $data);                        
                    }
                } else {
                    $this->view('PawnOfficer/new_pawning', $data);
                }

            } else {
                //Init data
                $data = [
                    'nic' => '',
                    'email' => '',
                    'type' => '',
                    'image' => '',
                    'customer' => '',
                    'pawn_officer' => '',
                    'type_err' => '',
                    'image_err' => '',
                    'nic_err' => '',
                    'email_err' => ''
                ];

                // Load view
                $this->view('PawnOfficer/new_pawning', $data);
            }
        }        
    }