<?php
class LockerValidation extends Controller
{

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('/Users');
        }
        // $this->Model = $this->model('Appointment');

    }
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form 
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        }else{

            $this->view('VaultKeeper/newAllocation');
        }
       
    }
}
?>