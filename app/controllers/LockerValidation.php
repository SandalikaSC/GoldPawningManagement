<?php
class LockerValidation extends Controller
{

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('/Users');
        }
        $this->customerModel = $this->model('Customer');
    }
    public function index()
    { 
        if (isset($_POST['appointment_allocation'])) {

            $data = [
                'customerId' => '',
                'name' => '',
                'phone' => '',
                'nic' => '',                
                'image' => "",
                'appointment' => ''

            ];
            $this->view('VaultKeeper/newAllocation', $data);
        } else {
            $data = [
                'customerId' => '',
                'name' => '',
                'phone' => '',
                'nic' => '',
                'image' => "",
                'appointment' => ''

            ];
            $this->view('VaultKeeper/newAllocation', $data);
        }
    }
    public function validation($appointment)
    {
        if (!empty($_POST['id']) && !empty($_POST['image'])) {
            
        } else {
            notification('validation',"Please fill require fields",'red');
            if ($appointment==0) {
                $appointment=null;
            }
            $data = [
                'customerId' => $_POST['id'],
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'nic' => $_POST['nic'],
                'image' => $_POST['image'],
                'appointment' => $appointment

            ];
            $this->view('VaultKeeper/newAllocation', $data);
        }
    }
    public function getCustomer()
    {

        $customer = $this->customerModel->getCustomerByIdNIC($_GET["customerid"]);

        echo json_encode($customer);
    }
}
