<?php
class mgEditProfile extends controller
{

    public function index($alert = null)
    {

        isLoggedIn();
        $staffMem = $this->model("staffModel");
        $alert = $staffMem->viewStaffMember($_SESSION['user_id']);
        $this->view("/Manager/edit-profile", $alert);
    }


    public function editProfileDetails()
    {
        isLoggedIn();
        $this->view("/Manager/edit-profile-details");
    }

    public function userChangePassword()
    {

        $currentPwd = $_POST["curr-password"];
        $confirmPwd = $_POST["confirm-password"];
        $newPwd = $_POST["new-password"];
        $staffmem = $this->model("staffModel");
        $passwd = $staffmem->getUserPassword($_SESSION['user_email']);
        if (password_verify($currentPwd, $passwd->password)) {
            if ($newPwd == $confirmPwd) {
                $userModel = $this->model("userModel");
                $hash = password_hash($newPwd, PASSWORD_BCRYPT);
                $userModel->resetPassword($_SESSION["user_email"], $hash);
                echo json_encode(array("msg" => "ok"));
            } else {
                echo json_encode(array("msg" => "fail"));
            }
        } else {
            echo json_encode(array("msg" => "fail"));
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

    public function sendOTP()
    {
        $_SESSION['otp'] = $this->randomPassword();
        $abc = sendMail($_SESSION['user_email'], 'OTP', $_SESSION['otp'], 'Vogue');
        header("Content-Type: application/json");
        if ($abc == null) {
            echo json_encode(array("msg" => "fail"));
        } else {
            echo json_encode(array("msg" => "ok"));
        }
    }

    public function verifyOtpAndPassword()
    {

        $password = $_POST['password'];
        $otp = $_POST['otp'];
        $staffmem = $this->model("staffModel");
        $DBPassword = $staffmem->getUserPassword($_SESSION['user_email']);
        if (password_verify($password, $DBPassword->password) and $otp == $_SESSION['otp']) {
            echo json_encode(array("msg" => "ok"));
            unset($_SESSION['otp']);
        } else {
            echo json_encode(array("msg" => "fail"));
            unset($_SESSION['otp']);
        }
    }

    public function manualSetEmail()
    {
        if (isset($_POST["new_email"]) and isset($_POST["confirm_email"])) {
            $newEmail = $_POST["new_email"];
            $confirmEmail = $_POST["confirm_email"];
            $staffmem = $this->model("staffModel");
            $isEmailExist = $staffmem->emailExist($newEmail);
            if ($newEmail == $confirmEmail and !$isEmailExist) {
                $userModel = $this->model("userModel");
                $userModel->resetEmail($_SESSION["user_email"], $newEmail);
                $_SESSION['user_email'] = $newEmail;
                redirect("/mgEditProfile/index/success");
            } else if ($isEmailExist) {
                redirect("/mgEditProfile/index/emailExist");
            }
        } else {
            redirect("/mgEditProfile/index/failed");
        }
    }

    public function updatePersonalDetails()
    {

        isLoggedIn(); //checks whether user is already logged
        $email = $this->model("staffModel");
        $NIC = $this->model('staffmodel');
        $row = $email->emailExist($_POST["email"]);
        $row2 = $NIC->nicExist($_POST["nic"]);
        $phone = $this->model('staffmodel');
        $row3 = $phone->phoneExist($_POST["mob-no"]);

        if ($email->rowCount() > 0 or $NIC->rowCount() > 0 or $phone->rowCount() > 0) {
            if ($email->rowCount() > 0 and $NIC->rowCount() > 0  and $phone->rowCount() > 0) {
                redirect('/staff/addNew/NIC,_email_and_Phone_Number_already_Exists');
            } else if ($email->rowCount() > 0 and $NIC->rowCount() > 0) {
                redirect('/staff/addNew/Email_and_NIC_already_Exist');
            } else if ($email->rowCount() > 0 and $phone->rowCount() > 0) {
                redirect('/staff/addNew/Email_and_Phone_Number_already_Exist');
            } else if ($NIC->rowCount() > 0 and $phone->rowCount() > 0) {
                redirect('/staff/addNew/NIC_and_Phone_Number_already_Exist');
            } else if ($NIC->rowCount() > 0) {
                redirect('/staff/addNew/NIC_already_Exists');
            } else if ($email->rowCount() > 0) {
                redirect('/staff/addNew/Email_already_Exists');
            } else if ($phone->rowCount() > 0) {
                redirect('/staff/addNew/Phone_Number_already_Exists');
            }
        } else {
            $staffMem = $this->model("staffModel");
            $result = $staffMem->addStaffMember($_POST['fName'], $_POST['lName'], $_POST['gender'], $_POST['dob'], $_POST['lane1'], $_POST['lane2'], $_POST['lane3'], $_POST['mob-no'], $_POST['mob-no2'], $_POST['email'], $_POST['image']);

            if ($result) {
                redirect('/staff/index/success');
            } else {
                redirect('/staff/unsuccess');
            }
        }
    }
}
