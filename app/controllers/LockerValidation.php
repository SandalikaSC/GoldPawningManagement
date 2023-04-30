<?php
class LockerValidation extends Controller
{

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('/Users');
        }
        $this->customerModel = $this->model('Customer');
        $this->appointmentModel = $this->model('Appointment');
        $this->validationModel = $this->model('validateArticle');
    }
    public function index()
    {
        if (isset($_POST['appointment_allocation'])) {
            $appointment = $this->appointmentModel->getAppointmentByAppId($_POST['appointment_id']);
            $customer = $this->customerModel->getCustomerById($appointment->UserID);

            $data = [
                'customerId' => $customer->UserId,
                'name' => $customer->First_Name . ' ' . $customer->Last_Name,
                'phone' => $customer->phone,
                'nic' => $customer->NIC,
                'article_type' => "Ring",
                'image' => "",
                'appointment' => $_POST['appointment_id']

            ];
            $this->view('VaultKeeper/newAllocation', $data);
        } else {
            $data = [
                'customerId' => '',
                'name' => '',
                'phone' => '',
                'nic' => '',
                'article_type' => "Ring",
                'image' => "",
                'appointment' => ''

            ];
            $this->view('VaultKeeper/newAllocation', $data);
        }
    }
    public function validation($appointment)
    {
        if ($appointment == 0) {
            $appointment = null;
        }
        if (!empty($_POST['id']) && !empty($_POST['image'])) {


            $data = [
                'customerId' => $_POST['id'],
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'nic' => $_POST['nic'],
                'article_type' => $_POST['article_type'],
                'image' => $_POST['image'],
                'appointment' => $appointment
            ];

            $status= $this->validationModel->addValidation($data);
            if ($status) {
                 if (!empty($data['appointment'])) {
                    $this->appointmentModel->completeAppointment($data['appointment']);
                 }
                 notification('VkDash', "Article Sent to validation", 'gold');
                 redirect('/VKDashboard');
                 
            }else{
                notification('validation', "Something went Wrong Try again", 'red');
                $this->view('VaultKeeper/newAllocation', $data);
            }

            // $statusp=
        } else {
            notification('validation', "Please fill require fields", 'red');

            $data = [
                'customerId' => $_POST['id'],
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'nic' => $_POST['nic'],
                'article_type' => $_POST['article_type'],
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
