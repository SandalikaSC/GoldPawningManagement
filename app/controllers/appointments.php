<?php
class appointments extends Controller
{

        public function __construct()
        { 
                if (!isLoggedIn()) {
                        redirect('/Login');
                }
                $this->userModel = $this->model('appointment');
        }


        public function index()
        {
                // Init data
                $data = [
                        'email' => '',
                        'password' => '',
                        'email_err' => '',
                        'password_err' => '',
                ];
                // Load view
                // $this->view('pages/userLogin', $data);
                $this->view('Customer/newAppointment');
        }
}
?>