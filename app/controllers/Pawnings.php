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

            $this->view('PawnOfficer/payment_details', $data);
        }

        public function make_payments($id) {
            // Get pawned item
            $pawned_item = $this->pawningModel->getPawnItemById($id);

            $data = [
                'pawn_item' => $pawned_item
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

        public function new_pawning() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $type = '';
                if(isset($_POST['Type'])) {
                     $type = ($_POST['Type']);
                }
                
                // Init data
                $data = [
                    'full_name' => '',
                    'nic' => '',
                    'phone_no' => '',
                    'email' => '',
                    'file' => trim($_POST['file']),
                    'type' => $type,
                    'payment_method' => trim($_POST['pay-method']),
                    'file_err' => '',
                    'type_err' => '',
                ];


                if(!empty($data['file'])) {
                    if(!empty($_FILES['file']['name'])) {
                        $fileName = basename($_FILES['file']['name']);
                        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    
                        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                        if(in_array($fileType, $allowTypes)) {
                            $image = $_FILES['file']['tmp_name'];
                            $imgContent = addslashes(file_get_contents($image));
                            $data['file'] = $imgContent;
                        } else {
                            $data['file_err'] = 'Only JPG, JPEG, PNG & GIF files are allowed';
                        }
                    }
                } else {
                    $data['file_err'] = 'Please insert the article image';
                } 

                if(empty($data['type']) || ($data['type'] == 'Choose a type')) {
                    $data['type_err'] = 'Please choose an article type';
                }


                // When there are no errors
                if(empty($data['file_err']) && empty($data['type_err'])) {
                    // Save article details
                    $success = $this->model("Pawning")->addArticle($data);

                    if($success) {
                        flash('register', 'Article details have saved successfully. Article will be sent to validate.', 'success');
                        redirect('/pawnings/new_pawning');
                    } else {
                        flash('register', 'Article details have saved successfully. Article will be sent to validate.', 'invalid');
                        $this->view('PawnOfficer/new_pawning', $data);    
                    }
                    
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
                    'type' => '',
                    'payment_method' => '',
                    'file_err' => '',
                    'type_err' => '',
                ];

                // Load view
                $this->view('PawnOfficer/new_pawning', $data);
            }
        }        
    }