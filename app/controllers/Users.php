<?php
class Users extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('Customer');
  }

  public function index()
  {
    $this->login();
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
        'name_err' => '',
        'nic' => trim($_POST['nic']),
        'nic_err' => '',
        'dob' => trim($_POST['dob']),
        'dob_err' => '',
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
      // Validate name
      if (empty($data['fname']) || empty($data['lname'])) {
        $data['name_err'] = 'Require field';
      } else if (!preg_match("/^[a-zA-Z]+$/", $data['fname']) || !preg_match("/^[a-zA-Z]+$/", $data['lname'])) {
        $data['name_err'] = 'Invalid';
      }
      // Validate nic
      if (empty($data['nic'])) {
        $data['nic_err'] = 'Require field';
      } else if (!preg_match("/^[\d]{12}$/", $data['nic'])) {
        $data['contact_err'] = 'Invalid';
      }
      // Validate dob
      if (empty($data['dob'])) {
        $data['dob_err'] = 'Require field';
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
      } else {
        // Check email
        if ($this->userModel->findUserByEmail($data['email'])) {
          $data['email_err'] = 'is already exist';
        }
      }


      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Require field';
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
        empty($data['name_err']) && empty($data['nic_err']) && empty($data['dob_err'])
        && empty($data['address_err']) && empty($data['contact_err']) && empty($data['email_err'])
        && empty($data['password_err'])
      ) {
        // Validated

        // Hash Password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Register User
        if ($this->userModel->register($data)) {

          $verification_code = $this->userModel->register($data);
          if ($verification_code) {
            sendMail($data['email'], "registration", $verification_code, "");

            flash('register', 'You are registered. Verify your email to log in', 'success');
            redirect('/Users');

          } else {
            flash('register', 'Registration Failed Try again', 'invalid');
            redirect('/Users');
          }


        } else {
          // Load view with errors
          $this->view('pages/userSignUp', $data);
        }
      } else {
        $data = [
          'fname' => '',
          'lname' => '',
          'name_err' => '',
          'nic' => '',
          'nic_err' => '',
          'dob' => '',
          'dob_err' => '',
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

  }

  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user->UserID;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_name'] = $user->First_Name . ' ' . $user->Last_Name;
    switch ($user->type) {
      case 1:
        if ($user->verification_status==="1") {
          $this->view('Customer/customerDash');
        }else{
          flash('register', 'Your email has not been validated', 'invalid');
          redirect('/Users');
        }
        
        break;
      case 2:
        $this->view('Admin/adminDash');
        break;
      case 3:
        $this->view('Manager/managerDash');
        break;
      case 4:
        $this->view('GoldAppraiser/goldappDash');
        break;
      case 5:
        $this->view('VaultKeeper/vaultkeeperDash');
        break;
      case 6:
        $this->view('PawnOfficer/pawnofficerDash');
        break;
      default:
        $this->view('Owner/ownerDash');
    }


  }

  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    session_destroy();
    redirect('/Users');
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