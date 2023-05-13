<?php
class mgEditProfile extends controller
{
    public function __construct()  //to display a flash message
    {
        flashMessage();
    }

    //to view user profile details
    public function index($alert = null)
    {
        isLoggedIn();
        $staffMem = $this->model("staffModel");
        $alert = $staffMem->viewStaffMember($_SESSION['user_id']);
        $this->view("/Pages/edit-profile", $alert);
    }

    //to edit personal profile details
    public function editProfileDetails($alert = null)
    {
        isLoggedIn();
        $staffMem = $this->model("staffModel");
        $data = $staffMem->viewStaffMember($_SESSION['user_id']);
        $this->view("/Pages/edit-profile-details", array($alert, $data));
    }

    //to check whether user enterd passward is available in the user table.
    public function isPasswordAvailable($pwd)
    {
        $passwords = $this->model("staffModel");
        $result = $passwords->getPasswords($_SESSION['user_id']);
        if ($result) {
            foreach ($result as $row) {
                if (password_verify($pwd, $row->password)) {
                    return true;
                }
            }
        }

        return false;
    }

    //to change the user password
    public function userChangePassword()
    {
        if (isset($_POST["curr-password"]) and isset($_POST["confirm-password"]) and isset($_POST["new-password"])) {
            $currentPwd = $_POST["curr-password"];
            $confirmPwd = $_POST["confirm-password"];
            $newPwd = $_POST["new-password"];
            $passwd = $this->model("staffModel")->getUserPassword($_SESSION['user_email']);

            if (password_verify($currentPwd, $passwd->password)) {

                if ($newPwd == $confirmPwd  and !$this->isPasswordAvailable($newPwd)) {
                    $staff = $this->model("staffModel");
                    $hash = password_hash($newPwd, PASSWORD_BCRYPT);
                    $staff->resetPassword($_SESSION["user_id"], $hash);
                    echo json_encode(array("msg" => "ok"));
                } else if (!($newPwd == $confirmPwd)) {
                    echo json_encode(array("msg" => "new-not-match-to-confirm"));
                    flashMessage("There is a mismatch between new and confirm passwords", 0);
                } else if ($this->isPasswordAvailable($newPwd)) {
                    echo json_encode(array("msg" => "already-available"));
                    flashMessage("New Password is Already Available..", 0);
                } 
            } else {
                echo json_encode(array("msg" => "invalid_pwd"));
                flashMessage("Current Password is Incorrect", 0);
            }
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


//to send the OTP for reset the email address
    public function sendOTP()
    {
        $_SESSION['otp'] = $this->randomPassword();
        $abc = sendMail($_SESSION['user_email'], 'OTP', $_SESSION['otp'], 'Vogue');
        header("Content-Type: application/json");

        if ($abc == null) {
            unset($_SESSION['otp']);
            echo json_encode(array("msg" => "fail"));
        } else {
            // Set the timestamp when the OTP was generated
            $_SESSION['otp_timestamp'] = time();
            echo json_encode(array("msg" => "ok"));
        }
    }

//to check whether OTP is timeout or not
    public function isTimeOut()
    {
        // Check if 30 seconds have passed since the OTP was generated
        if (isset($_SESSION['otp']) && isset($_SESSION['otp_timestamp'])) {
            if (time() - $_SESSION['otp_timestamp'] > 30) {
                // Unset the OTP session variable
                unset($_SESSION['otp']);
                unset($_SESSION['otp_timestamp']);
                return true;
            }
        }
    }

    //to check whether user enterd password is correct, OTP number is correct and OTP is timeout
    public function verifyOtpAndPassword()
    {
        $password = $_POST['password'];
        $otp = $_POST['otp'];
        $staffmem = $this->model("staffModel");
        $DBPassword = $staffmem->getUserPassword($_SESSION['user_email']);
        if (password_verify($password, $DBPassword->password) and $otp == $_SESSION['otp'] and !$this->isTimeOut()) {
            echo json_encode(array("msg" => "ok"));
            unset($_SESSION['otp']);
        } else {
            echo json_encode(array("msg" => "fail"));
            unset($_SESSION['otp']);
        }
    }

    //reset the user email
    public function manualSetEmail()
    {
        if (isset($_POST["new_email"]) and isset($_POST["confirm_email"])) {
            $newEmail = $_POST["new_email"];
            $confirmEmail = $_POST["confirm_email"];

            $staffmem = $this->model("staffModel");
            $isEmailExist = $staffmem->emailExist($newEmail, $_SESSION['user_id']);//to check whether email is already exist or not
            if ($newEmail == $confirmEmail and !$isEmailExist) { //check whether confirm email and new email is equal
                $staff = $this->model("staffModel");
                $staff->resetEmail($newEmail, $_SESSION['user_id']); //update the email
                $_SESSION['user_email'] = $newEmail;
                flashMessage("Email Updated", 1);
                redirect("/mgEditProfile");
            } else if ($isEmailExist) {
                flashMessage("Email already exists", 0);
                redirect("/mgEditProfile");
            } else if ($newEmail != $confirmEmail) {
                flashMessage("Mismatch Between New and Confirm Emails", 0);
                redirect("/mgEditProfile");
            } else {
                flashMessage("Email is not in Correct type", 0);
                redirect("/mgEditProfile");
            }
        } else {
            flashMessage("Fill Inputs Correctly..", 0);
            redirect("/mgEditProfile");
        }
    }

    //update personal details
    public function setPersonalDetails()
    {
        isLoggedIn();

        $count = 0;
        $phone = $this->model("staffModel")->getUserPhoneNumbers($_SESSION['user_id']);//to check whether there are two numbers or one number.
        foreach ($phone as $row) {
            if ($row->userId) {
                $count++;
            }
        }


        $result = '';
        if ($count == 2) {
            if (!empty($phone[0]->phone)) {
                $result = $this->model("staffModel")->setPersonalInfo($_SESSION['user_id'], $_POST['fName'], $_POST['lName'], $_POST['gender'], $_POST['lane1'], $_POST['lane2'], $_POST['lane3'], $_POST['mob-no2'], $_POST['image'], $phone[0]->phone, $phone[1]->phone);
            } else {
                $result = $this->model("staffModel")->setPersonalInfo($_SESSION['user_id'], $_POST['fName'], $_POST['lName'], $_POST['gender'], $_POST['lane1'], $_POST['lane2'], $_POST['lane3'], $_POST['mob-no2'], $_POST['image'], $phone[1]->phone, "empty");
            }
        } else if ($count == 1) {

            $result = $this->model("staffModel")->setPersonalInfo($_SESSION['user_id'], $_POST['fName'], $_POST['lName'], $_POST['gender'], $_POST['lane1'], $_POST['lane2'], $_POST['lane3'], $_POST['mob-no2'], $_POST['image'], $phone[1]->phone);
        }

        if ($result) {
            echo "done";
            flashMessage("Personal Details Updated", 1);
        } else {
            echo "fail";
            flashMessage("Personal Details not Updated", 0);
        }
    }
}
