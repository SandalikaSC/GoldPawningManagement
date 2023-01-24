<?php
    class Employees extends Controller {
        public function __construct() {
            $this->employeeModel = $this->model('Employee');
        }

        public function index() {
            // $this->view('PawnOfficer/VogueLanding');
        }

        public function login() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Validate email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } else {
                    // Check for email
                    if($this->employeeModel->findUserByEmail($data['email'])) {
                        // User found
                    } else {
                        // User not found
                        $data['email_err'] = 'User not found';
                    }
                }

                // Validate password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }

                

                // When there are no errors
                if(empty($data['email_err']) && empty($data['password_err'])) {
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this->employeeModel->login($data['email'], $data['password']);

                    if($loggedInUser) {
                        // Create session
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['password_err'] = 'Incorrect password';

                        $this->view('PawnOfficer/login', $data);
                    }
                } else {
                    // Load view with errors
                    $this->view('employees/login', $data);
                }

            } else {
                //Init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Load view
                $this->view('employees/login', $data);
            }
        }

        public function createUserSession($user) {
            $_SESSION['user_id'] = $user->UserId;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->First_Name . ' ' . $user->Last_Name;

            // switch ($user->type) {
            //     case 1:
            //         if ($user->verification_status==="1") {
            //             $this->view('Customer/customerDash');
            //         }else{
            //             flash('register', 'Your email has not been validated', 'invalid');
            //             redirect('/Login');
            //         }
                    
            //         break;
            //     case 2:
            //         $this->view('Admin/adminDash');
            //         break;
            //     case 3:
            //         $this->view('Manager/managerDash');
            //         break;
            //     case 4:
            //         $this->view('GoldAppraiser/goldappDash');
            //         break;
            //     case 5:
            //         $this->view('VaultKeeper/vaultkeeperDash');
            //         break;
            //     case 6:
            //         $this->view('PawnOfficer/pawnofficerDash');
            //         break;
            //     default:
            //         $this->view('Owner/ownerDash');
            // }
            
            redirect('pawningOfficerDashboard/dashboard');
        }

        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();
            redirect('/Users');
        }

        
    }