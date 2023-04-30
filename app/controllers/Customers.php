<?php
    class Customers extends Controller {
        public function __construct() {
            if(!isLoggedIn()) {
                redirect('employees');
            }

            $this->customerModel = $this->model('Customer');
            $this->pawningModel = $this->model('Pawning');
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


        public function calculateDOB($data) {
            $nic = $data['nic'];
            $dayText = 0;
            $year = "";
            $month = "";
            $day = "";

            $valid = $this->checkNICValidity($nic);

            if($valid) {
                // Find Year
                if(strlen($nic) == 10) {
                    $year = "19" . substr($nic, 0, 2);
                    $dayText = number_format(substr($nic, 2, 3));
                } else {
                    $year = substr($nic, 0, 4);
                    $dayText = number_format(substr($nic, 4, 3));
                }

                // Day digit validation
                if ($dayText > 500) {
                    $dayText = $dayText - 500;
                }
                if($dayText < 1 || $dayText > 366) {
                    return false;
                } else {
                    if($dayText > 335) {
                        $day = $dayText - 335;
                        $month = "12";
                    } elseif($dayText > 305) {
                        $day = $dayText - 305;
                        $month = "11";
                    } elseif($dayText > 274) {
                        $day = $dayText - 274;
                        $month = "10";
                    } elseif($dayText > 244) {
                        $day = $dayText - 244;
                        $month = "09";
                    } elseif($dayText > 213) {
                        $day = $dayText - 213;
                        $month = "08";
                    } elseif($dayText > 182) {
                        $day = $dayText - 182;
                        $month = "07";
                    } elseif($dayText > 152) {
                        $day = $dayText - 152;
                        $month = "06";
                    } elseif($dayText > 121) {
                        $day = $dayText - 121;
                        $month = "05";
                    } elseif($dayText > 91) {
                        $day = $dayText - 91;
                        $month = "04";
                    } elseif($dayText > 60) {
                        $day = $dayText - 60;
                        $month = "03";
                    } elseif($dayText < 32) {
                        $day = $dayText;
                        $month = "01";
                    } elseif($dayText > 31) {
                        $day = $dayText - 31;
                        $month = "02";
                    }

                    return "$year-$month-$day";
                }
            } else {
                return false;
            }
        }

        public function checkNICValidity($nic) {            
            if(strlen($nic) == 10) {
                $nic_substr = substr($nic, 0, 9);
                if(!(is_numeric($nic_substr))) {
                    return false;
                } else {
                    if($nic[-1] != 'V' || $nic[-1] != 'v') {
                        return false;
                    } else {
                        return true;
                    }
                }
            } elseif(strlen($nic) == 12) {
                $nic_substr = substr($nic, 0, 12);
                if(!(is_numeric($nic_substr))) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
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
                    // 'dob' => trim($_POST['dob']),
                    'dob' => '',
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
                    } elseif(!($this->checkNICValidity($data['nic'])) || !($this->calculateDOB($data))) {
                        $data['nic_err'] = 'Invalid NIC';
                    } else {
                        $data['dob'] = $this->calculateDOB($data);
                    }
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
                if(empty($data['email_err']) && empty($data['first_name_err']) && empty($data['line1_err']) && empty($data['nic_err']) && empty($data['phone_err'])) {
                    // Register customer
                    $reg_success = $this->model("Customer")->registerCustomer($data);
                    
                    if($reg_success) {
                        sendMail($_POST['email'], 'customer_reg', $pass, $_POST['first_name']." ".$_POST['last_name']);

                        // Redirect to successful message                        
                        flash('register', 'Customer registered successfully', 'success');
                        redirect('/customers/register_customer');
                        // $this->view('PawnOfficer/register_customer', $data);
                    } else {
                        flash('register', 'Registration failed. Something went wrong', 'invalid');
                        $this->view('PawnOfficer/register_customer', $data);                        
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
            $pawned_items = $this->pawningModel->getPawnByUserID($id);

            $data = [
                'customers' => $customers,
                'pawns' => $pawned_items
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