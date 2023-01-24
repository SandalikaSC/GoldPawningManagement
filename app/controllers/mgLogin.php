<?php

class mgLogin extends Controller
{
    public function index($alert = NULL) //viewing login function
    {

        if (isset($_SESSION['user'])) {  //checks whether user already logs
           
            redirect('mgDashboard');
        }

        $this->view("/Manager/login", $alert);  //otherwise redirect to login page

    }

    public function verify()  //
    {

        if (isset($_POST["email"]) and isset($_POST["psw"])) {
            $email = $_POST["email"];
            $pass = $_POST["psw"];
            $user = $this->model("UserModel");
            $result = $user->getUser($email);
            if ($user->rowCount() > 0) {
                // output data of each row
                $res = $result->password;
                $role = $result->type;
                $id = $result->UserID;
            
                if (password_verify($pass, $res)) {  //checks the password 
               
                    $_SESSION['userid'] = $id;
                    $_SESSION['user'] = $email;
                    switch ($role) {  //checks the role..according to the role, it will redirect to the relevant login page
                        case "Manager":
                            $staff = $this->model("staffModel");
                            $details = $staff->loadProfilePicture($email);
                            $_SESSION['image']=$details->image;
                            $_SESSION['name']=$details->Name;
                            redirect("mgDashboard");
                            break;
                        case "Pawning Officer":
                            $staff = $this->model("staffModel");
                            $details = $staff->loadProfilePicture($email);
                            $_SESSION['image']=$details->image;
                            $_SESSION['name']=$details->Name;
                            redirect("mgDashboard");
                            break;
                        case "Gold Appraiser":
                            $staff = $this->model("staffModel");
                            $details = $staff->loadProfilePicture($email);
                            $_SESSION['image']=$details->image;
                            $_SESSION['name']=$details->Name;
                            redirect("mgDashboard");
                            break;
                        case "Vault Keeper":
                            $staff = $this->model("staffModel");
                            $details = $staff->loadProfilePicture($email);
                            $_SESSION['image']=$details->image;
                            $_SESSION['name']=$details->Name;
                            redirect("mgDashboard");
                            break;
                        default:
                            redirect("mgLogin/index/invalidUser");
                    }
                } else {  //if the password is incorrect

                    redirect("mgLogin/index/incorrectpassword");
                }
            } else {

                redirect("mgLogin/index/invalidpassword");
            }
        }
    }
}
