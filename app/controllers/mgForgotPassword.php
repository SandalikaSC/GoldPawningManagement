<?php

class mgForgotPassword extends controller
{
    //viewing sending otp code window
    public function sendOTPwindow($alert = null)
    {

        if (isset($_SESSION['user'])) {
            redirect('mgDashboard');
        }

        $this->view("/Manager/sendOTPwindow", $alert);
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


    //for viewing otp validation window
    public function validateOTPwindow($alert = null)
    {

        if (!isset($_SESSION['email'])) {
            redirect("mgForgotPassword/sendOTPwindow");
        }
        $this->view('/Manager/validateOTPwindow', $alert);
    }


    //OTP sending function
    public function sendOTP()
    {
        if (isset($_POST["email"])) {
            $email = $_POST["email"];
            $_SESSION["email"] = $email;
            $userModel = $this->model("userModel");
            // $result = $userModel->verifyEmail($email);
            $userModel->verifyEmail($email);

            if ($userModel->rowCount() > 0) {
                $password = $this->randomPassword();
                $_SESSION["OTP"] = $password;
                $abc=sendMail($email, "OTP", $password, "VOGUE");
                if($abc==null){
                    redirect("mgForgotPassword/sendOTPwindow/conn_error");
                }else{

                    redirect("mgForgotPassword/validateOTPwindow");
                }
            } else {
                redirect("mgForgotPassword/sendOTPwindow/failed");
            }
        } else {
            redirect("mgForgotPassword/sendOTPwindow");
        }
    }


    //checking whether OTP is correct or not
    public function validateOTP()
    {

        if (isset($_POST["otp"])) {

            $otp = $_POST["otp"];
            if ($_SESSION["OTP"] == $otp) {
                $this->view("reenterNewPasswd");
            } else {
                redirect("mgForgotPassword/validateOTPwindow/failed");
            }
        } else {
            redirect("mgForgotPassword/validateOTPwindow");
        }
    }

    //viewing re-setting new password window
    public function reenterNewPassword($alert = null)
    {
        if (!isset($_SESSION['otp'])) {
            redirect("mgForgotPassword/sendOTPwindow");
        }
        $this->view('/Manager/reenterNewPasswd', $alert);
    }


    //the function to assign new password to the user
    public function setNewPassword()
    {

        if (isset($_POST["new-password"]) and isset($_POST["confirm-password"])) {
            $newPassword = $_POST["new-password"];
            $confirmPassword = $_POST["confirm-password"];
            if ($newPassword == $confirmPassword) {
                $userModel = $this->model("userModel");
                $hash = password_hash($newPassword, PASSWORD_BCRYPT);
                $userModel->resetPassword($_SESSION["email"], $hash);
                unset($_SESSION["email"]);
                unset($_SESSION["otp"]);
                redirect("mgLogin/index/passwordChanged");
            } else {
                redirect("mgForgotPassword/reenterNewPassword/failed");
            }
        } else {
            redirect("mgForgotPassword/reenterNewPassword/empty");
        }
    }
}
