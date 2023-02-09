<?php
    class Customers extends Controller {
        public function __construct() {
            if(!isLoggedIn()) {
                redirect('employees');
            }

            $this->customerModel = $this->model('Customer');
        }

        public function index() {
            $data = [];

            // $this->view('customers/index', $data);
        }

        // Function to generate a random password
        function randomPassword() {
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array();
            $alphaLength = strlen($alphabet) - 1;
            for($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass);
        }

        public function register_customer() {
            $pass = $this->randomPassword();

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'first_name' => trim($_POST['first_name']),
                    'last_name' => trim($_POST['last_name']),
                    'line1' => trim($_POST['line1']),
                    'line2' => trim($_POST['line2']),
                    'line3' => trim($_POST['line3']),
                    'nic' => trim($_POST['nic']),
                    'dob' => trim($_POST['dob']),
                    'password' => $pass,
                    'gender' => trim($_POST['gender']),
                    'phone' => trim($_POST['phone']),
                    'email' => trim($_POST['email']),
                    'created_by' => $_SESSION['user_id'],
                    'first_name_err' => '',
                    'line1_err' => '',
                    'nic_err' => '',
                    'dob_err' => '',
                    'phone_err' => '',
                    'email_err' => ''
                ];

                // Validate email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } else {
                    // Check for email
                    if($this->customerModel->findUserByEmail($data['email'])) {
                        // User found
                        $data['email_err'] = 'Customer already exist';
                    } else {
                        // User not found
                    }
                }

                // Validate name
                if(empty($data['first_name'])) {
                    $data['first_name_err'] = 'Please enter name';
                }

                // Validate NIC
                if(empty($data['nic'])) {
                    $data['nic_err'] = 'Please enter NIC';
                } else {
                    if($this->customerModel->findUserByNic($data['nic'])) {
                        $data['nic_err'] = 'Customer has already registered with the NIC';
                    }
                }

                // Validate Date of Birth
                if(empty($data['dob'])) {
                    $data['dob_err'] = 'Please enter date of birth';
                }

                // Validate phone
                if(empty($data['phone'])) {
                    $data['phone_err'] = 'Please enter a working phone number';
                }

                // Validate address
                if(empty($data['line1'])) {
                    $data['line1_err'] = 'Please enter address';
                }

                // When there are no errors
                if(empty($data['email_err']) && empty($data['first_name_err']) && empty($data['line1_err']) && empty($data['nic_err']) && empty($data['dob_err']) && empty($data['phone_err'])) {
                    // Register customer
                    $reg_success = $this->model("Customer")->registerCustomer($data);
                    
                    if($reg_success) {
                        sendMail($_POST['email'], 'customer_reg', $pass, $_POST['first_name']." ".$_POST['last_name']);

                        // Redirect to successful message                        
                        flash('register', 'Customer registered successfully', 'success');
                        // redirect('customers/register_customer');
                        $this->view('PawnOfficer/register_customer');
                    } else {
                        flash('register', 'Registration failed. Something went wrong', 'invalid');
                        $this->view('PawnOfficer/register_customer');
                    }
                } else {
                    // Load view with errors
                    $this->view('PawnOfficer/register_customer', $data);
                }

            } else {
                //Init data
                $data = [
                    'first_name' => '',
                    'last_name' => '',
                    'line1' => '',
                    'line2' => '',
                    'line3' => '',
                    'nic' => '',
                    'dob' => '',
                    'password' => '',
                    'gender' => '',
                    'phone' => '',
                    'email' => '',
                    'first_name_err' => '',
                    'line1_err' => '',
                    'nic_err' => '',
                    'dob_err' => '',
                    'phone_err' => '',
                    'email_err' => ''
                ];

                // Load view
                $this->view('PawnOfficer/register_customer', $data);
            }
        }

        public function view_customers() {
            // Get customer
            $customers = $this->customerModel->getCustomer();

            $data = [
                'customers' => $customers
            ];

            $this->view('PawnOfficer/view_customer', $data);
        }

        public function customer_view_more($id) {
            // Get customer
            $customers = $this->customerModel->getCustomerById($id);

            $data = [
                'customers' => $customers
            ];

            $this->view('PawnOfficer/customer_view_more', $data);
        }


        public function getCustomer($id){

            $customers = $this->customerModel->getCustomerById($id);

            $data = [
                'customer' =>  $customers
            ];
              $this->view('VaultKeeper/viewCustomer',$data);
        }



    }