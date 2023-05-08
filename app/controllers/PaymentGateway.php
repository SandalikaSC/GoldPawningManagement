<?php

class PaymentGateway extends Controller
{

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('/Users');
        }
        $this->reservationModel = $this->model('reservation');
        $this->appointment = $this->model('Appointment');
        $this->payment = $this->model('payment');
    }


    // public function index()
    // {
    //     $allocation = $this->reservationModel->getReservationByUserID($_SESSION['user_id']);
    //     $data = [
    //         'reservation' => $allocation
    //     ];
    //     $this->view('Customer/locker', $data);
    // }
    public function pay($locker, $amount)
    {

        $order_id = uniqid();
        $currency = "LKR";

        $data = [];
        $data['hash'] = strtoupper(md5(
            merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5(merchant_secret))
        ));
        $data['merchant_id'] = merchant_id;
        $data['order_id'] = $order_id;
        $data['reservationId'] = $locker;
        $data['amount'] =  number_format($amount, 2, '.', '');
        $data['currency'] = $currency;
        $data['merchant_secret'] = merchant_secret;
        $data['items'] = "Locker " . $locker;
        $data['first_name'] = $_SESSION['user_fname'];
        $data['last_name'] = $_SESSION['user_lname'];
        $data['email'] = $_SESSION['user_email'];
        $data['phone'] = $_SESSION['user_phone'];
        $data['address'] = $_SESSION['user_address'];
        $data['city'] = "Colombo";
        $data['country'] = "Sri Lanka";
        $data['delivery_address'] = "VoguePawn";
        $data['delivery_city'] = "Colombo";
        $data['delivery_country'] = "Sri Lanka";


        echo json_encode($data);
    }
    public function AddDetails()
    {
        $amount = $_GET['payment'];
        $extend = $_GET['extend'];
        $locker = $_GET['locker'];
        $order_id = $_GET['orderid'];

        $currentReservations = $this->reservationModel->getReservationsbyRetrieve($locker, 0);
         
        $status = $this->payment->addOnlineLockerPayment($amount, $currentReservations[0]->Allocate_Id, $order_id);

        if ($status) {
            for ($i = 0; $i < count($currentReservations); $i++) {
                $this->reservationModel->lockerExtend($extend, $currentReservations[$i]->Allocate_Id);
            } 

            notification("extend", "Reservation extended successfully", "gold");
        }
        echo json_encode($locker);
    }
    public function addAppointment()
    {
        $data['date'] = $_GET['appointment']['appointment_Date'];
        $data['time_slots'] = $_GET['appointment']['slot_Id'];
        $data['reasonID'] = 6;
        $appointment = $this->appointment->addAppointment($data);

        echo json_encode($appointment);
    }
    public function deleteAppointment()
    {
        $appointment = $_GET['appointment'];
        $status = $this->appointment->cancelAppointment($appointment);
        echo json_encode($status);
    }
}
