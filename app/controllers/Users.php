<?php
class Users extends Controller
{
  public function __construct()
  {

    $this->userModel = $this->model('Customer');
  }

  public function index()
  {
    // $this->login();
    $this->view('pages/VogueLanding');
  }


  public function login()
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',
      ];

      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter email';
      } else {
        // Check for user/email
        if ($this->userModel->findUserByEmail($data['email'])) {
          // User found
        } else {
          // User not found
          flash('register', 'You are not registered with Us', 'invalid');
          $data['email_err'] = 'No user found';
        }
      }

      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter password';
      }



      // Make sure errors are empty
      if (empty($data['email_err']) && empty($data['password_err'])) {
        // Validated
        // Check and set logged in user
        $loggedInUser = $this->userModel->login($data['email'], $data['password']);

        if ($loggedInUser) {
          // Create Session
          $this->createUserSession($loggedInUser);
        } else {
          $data['password_err'] = 'Password incorrect';

          $this->view('pages/userLogin', $data);
        }
        // die('SUCCESS');
      } else {
        // Load view with errors
        $this->view('pages/userLogin', $data);
      }
    } else {
      // Init data
      $data = [
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',
      ];

      // Load view
      $this->view('pages/userLogin', $data);
    }
  }


  public function signUp()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form 
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'fname' => trim($_POST['Fname']),
        'lname' => trim($_POST['Lname']),
        'fname_err' => '',
        'lname_err' => '',
        'nic' => trim($_POST['nic']),
        'nic_err' => '',
        'dob' => '',
        'gender' => $_POST['gender'],
        'address1' => $_POST['line1'],
        'address2' => $_POST['line2'],
        'address3' => $_POST['line3'],
        'address_err' => '',
        'mobile' => $_POST['mobile'],
        'home' => $_POST['home'],
        'contact_err' => '',
        'email' => $_POST['email'],
        'email_err' => '',
        'password' => $_POST['password'],
        'password_err' => '',
        'confirm_password' => $_POST['confirm-pw'],
        'confirm_password_err' => ''

      ];

      // Validate fname
      if (empty($data['fname'])) {
        $data['fname_err'] = 'Require field';
      } else if (!preg_match("/^[a-zA-Z]+$/", $data['fname'])) {
        $data['fname_err'] = 'Invalid';
      }



      // Validate lname
      if (empty($data['lname'])) {
        $data['lname_err'] = 'Require field';
      } else if (!preg_match("/^[a-zA-Z]+$/", $data['lname'])) {
        $data['lname_err'] = 'Invalid';
      }
      $nicValid = $this->isNicValid($data['nic']);
      // Validate nic
      if (empty($data['nic'])) {
        $data['nic_err'] = 'Require field';
      } else if (!$nicValid) {
        $data['nic_err'] = 'Invalid';
      }
      // Validate dob
      if ($nicValid) {
        $data['dob'] = $this->CalculateDOB($data['nic']);
        if (!$data['dob']) {
          $data['nic_err'] = 'Invalid';
        }
      }
      $diff = abs(strtotime($data['dob']) - strtotime(date("Y-m-d")));
      $years = floor($diff / (365 * 60 * 60 * 24));
      if (!empty($data['nic']) && $years < 18) {
        $data['nic_err'] = '-You must be at least 18 years old to register.';
      }
      // Validate address
      if (empty($data['address1']) && empty($data['address2']) && empty($data['address3'])) {
        $data['address_err'] = 'Require field';
      }
      // Validate contact number
      if (empty($data['mobile']) && empty($data['home'])) {
        $data['contact_err'] = 'Require field';
      }
      // Validate email
      if (empty($data['email'])) {
        $data['email_err'] = 'Require field';
      } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $data['email_err'] = 'Invalid';
      } else if (!isValidEmail($data['email'])) { //check email deliverable or disposable one
        $data['email_err'] = 'Invalid';
      } else {
        // Check email
        if ($this->userModel->findUserByEmail($data['email'])) {
          $data['email_err'] = 'is already exist';
        }
      }
      if ($this->userModel->findUserByPhoneNo($data['mobile'], $data['home'])) {
        $data['contact_err'] = 'is already exist';
      }
      if ($this->userModel->findUserByNic($data['nic'])) {
        $data['nic_err'] = 'is already exist';
      }

      // Validate Password
      $uppercase = preg_match('@[A-Z]@', $data['password']);
      $lowercase = preg_match('@[a-z]@', $data['password']);
      $number = preg_match('@[0-9]@', $data['password']);
      $specialChars = preg_match('@[^\w]@', $data['password']);

      if (empty($data['password'])) {
        $data['password_err'] = 'Require field';
      } elseif (!$uppercase || !$lowercase || !$number || !$specialChars) {
        $data['password_err'] = 'must contain least one uppercase, lowercase, special character and a number';
      } elseif (strlen($data['password']) < 6) {
        $data['password_err'] = ' must be at least 6 characters';
      }

      // Validate Confirm Password
      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = 'Require field';
      } else {
        if ($data['password'] != $data['confirm_password']) {
          $data['confirm_password_err'] = 'Passwords do not match';
        }
      }

      // Make sure errors are empty
      if (

        empty($data['fname_err']) && empty($data['lname_err']) && empty($data['nic_err']) && empty($data['dob_err'])

        && empty($data['address_err']) && empty($data['contact_err']) && empty($data['email_err'])
        && empty($data['password_err'])
      ) {
        // Validated

        // Hash Password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Register User

        $verification_code = $this->userModel->register($data);

        if ($verification_code) {

          $status = sendMail($data['email'], "registration", $verification_code, "VOGUE");
          if ($status) {

            flash('register', 'You are registered. Verify your email to log in', 'success');
            redirect('/Users/login');
          } else {
            $this->userModel->deleteUser($data['email']);
            flash('register', "Registration Failed Check your connection $verification_code", 'invalid');
            redirect('/Users/login');
          }
        } else {
          flash('register', 'Registration Failed Try again', 'invalid');
          redirect('/Users/login');
        }
      } else {
        // Load view with errors
        $this->view('pages/userSignUp', $data);
      }
    } else {
      $data = [
        'fname' => '',
        'lname' => '',
        'fname_err' => '',
        'lname_err' => '',
        'nic' => '',
        'nic_err' => '',
        'gender' => 'male',
        'address1' => '',
        'address2' => '',
        'address3' => '',
        'address_err' => '',
        'mobile' => '',
        'home' => '',
        'contact_err' => '',
        'email' => '',
        'email_err' => '',
        'password' => '',
        'password_err' => '',
        'confirm_password' => '',
        'confirm_password_err' => ''
      ];
      $this->view('pages/userSignUp', $data);
    }
  }
  public function CalculateDOB($nic)
  {
    $dayText = 0;
    $year = "";
    $month = "";
    $day = "";
    if (strlen($nic) == 10) {
      $set = substr($nic, 0, 2);
      $year = "19$set";
      $dayText = substr($nic, 2, 3);
    } else {
      $year = substr($nic, 0, 4);
      $dayText = substr($nic, 4, 3);
    }
    if ($dayText > 500) {
      $dayText = $dayText - 500;
    }
    if ($dayText < 1 && $dayText > 366) {
      return 0;
    } else {

      //Month
      if ($dayText > 335) {
        $day = $dayText - 335;
        $month = "12";
      } else if ($dayText > 305) {
        $day = $dayText - 305;
        $month = "11";
      } else if ($dayText > 274) {
        $day = $dayText - 274;
        $month = "10";
      } else if ($dayText > 244) {
        $day = $dayText - 244;
        $month = "09";
      } else if ($dayText > 213) {
        $day = $dayText - 213;
        $month = "08";
      } else if ($dayText > 182) {
        $day = $dayText - 182;
        $month = "07";
      } else if ($dayText > 152) {
        $day = $dayText - 152;
        $month = "06";
      } else if ($dayText > 121) {
        $day = $dayText - 121;
        $month = "05";
      } else if ($dayText > 91) {
        $day = $dayText - 91;
        $month = "04";
      } else if ($dayText > 60) {
        $day = $dayText - 60;
        $month = "03";
      } else if ($dayText < 32) {
        $month = "01";
        $day = $dayText;
      } else if ($dayText > 31) {
        $day = $dayText - 31;
        $month = "02";
      }
      return "$year-$month-$day";
    }
  }

  public function isNicValid($nic)
  {
    $result = true;
    if ($nic == "") {
      $result = false;
    } else {
      if (strlen($nic) == 10) {

        $nic_9 = substr($nic, 0, 9);

        if (!is_numeric($nic_9)) {

          $result = false;
        }

        $nic_v = substr($nic, 9, 1);
        if (!(strtoupper($nic_v) == "V")) {

          $result = false;
        }
      } else if (strlen($nic) == 12) {
        // $nic_12 = substr($nic, 0, 11);

        if (!is_numeric($nic)) {

          $result = false;
        }
      } else {

        $result = false;
      }
    }

    return $result;
  }



  public function emailVerify($verification_Code)
  {
    $data = [
      'status' => ''
    ];

    $status = $this->userModel->verify($verification_Code);
    if ($status) {
      $this->view('pages/EmailVerify', $data);
    } else {
      $data = [
        'status' => 'Unsuccessful'
      ];
      $this->view('pages/EmailVerify', $data);
    }
  }
  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user->UserId;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_name'] = $user->First_Name . ' ' . $user->Last_Name;
    $_SESSION['user_fname'] = $user->First_Name;
    $_SESSION['user_lname'] = $user->Last_Name;
    $_SESSION['user_phone'] = $user->Last_Name;
    $_SESSION['image'] = $user->image;
    switch ($user->type) {
      case "Customer":
        if ($user->verification_status === "1") {
          redirect('/customerDashboard/dashboard');
        } else {
          flash('register', 'Your email has not been validated', 'invalid');
          redirect('/Users');
        }

        break;
      case "Admin":
        $this->view('Admin/adminDash');
        break;
      case "Manager":
        $this->view('Manager/managerDash');
        break;
      case "Gold Appraiser":
        $this->view('Gold Appraiser/goldappDash');
        break;
      case "Vault Keeper":
        redirect('/VKDashboard');
        break;
      case "Pawning Officer":
        // $this->view('PawnOfficer/pawnofficerDash');
        redirect('/pawningOfficerDashboard/dashboard');
        break;
      case "Owner":
        $this->view('Owner/ownerDash');
        break;
    }
  }
  public function checkEmail()
  {
     
    if(isset($_POST["email"])){
        $result=$this->userModel->getUserByEmail($_POST["email"]);
        if(empty($result)){ 
          flash('register', "You are not registered with Us.", 'invalid');
          $this->view('pages/userLogin');

        }    
        else if($result->verification_status==="0"){
          flash('register', "You are not verified your email yet.", 'invalid');
          $this->view('pages/userLogin');
        }else if(!empty($result) && $result->verification_status==="1"){
          $_SESSION['OTP']=$this->randomPassword();
          $data['success']=1;
          echo json_encode($data);
        }

      // $data['name']="sandalika";
    }
   
  }
   //to generate a OTP number
   private function randomPassword()
   {
       $alphabet = '1234567890';
       $pass = array(); //remember to declare $pass as an array
       $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
       for ($i = 0; $i < 6; $i++) {
           $n = rand(0, $alphaLength);
           $pass[] = $alphabet[$n];
       }
       return implode($pass); //turn the array into a string
   }

  public function logout()
  {
    if ($this->userModel->setLastSeen($_SESSION['user_id'])) {
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();

      redirect('/Users');
    }
  }

  public function isLoggedIn()
  {
    if (isset($_SESSION['user_id'])) {
      return true;
    } else {
      return false;
    }
  }
}
