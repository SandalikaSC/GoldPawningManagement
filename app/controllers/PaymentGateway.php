<?php 

class PaymentGateway extends Controller
{

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('/Users');
        }
        $this->reservationModel = $this->model('reservation');
        $this->articleModel = $this->model('article');
        $this->deliveryModel = $this->model('delivery');
        $this->lockerModel = $this->model('Locker');
        $this->interestModel = $this->model('interest');
        $this->appointment = $this->model('Appointment');
    }


    // public function index()
    // {
    //     $allocation = $this->reservationModel->getReservationByUserID($_SESSION['user_id']);
    //     $data = [
    //         'reservation' => $allocation
    //     ];
    //     $this->view('Customer/locker', $data);
    // }
    public function pay(){

        $data=[
            'merchant_id' => "1222949",
            'order_id' => uniqid(),
            'amount' => number_format( $_POST["amount"],2,".",""),
            'currency' => "LKR", 
            'merchant_secret' => merchant_secret,
            'items' => "Reservation ".$_POST["reservation"],
            'first_name' => $_SESSION['user_fname'],
            'last_name' =>  $_SESSION['user_lname'],
            'email' => $_SESSION['user_email'],
            'phone' => $_SESSION['user_phone'],
            'address' => $_SESSION['user_address'],
            'city' => " ",
            'country' => "Sri Lanka",
            'delivery_address' => "VoguePawn",
            'delivery_city' => "Colombo",
            'delivery_country' => "Sri Lanka" 
        ];


        $data['hash'] =
         strtoupper(
            md5 (
                $data=['merchant_id'] . 
                $data['order_id']  . 
                number_format( $_POST["amount"],2,".","")  . 
                $data['currency'] .  
                strtoupper(md5(merchant_secret)) 
            ) 
            );
        echo json_encode($data);
    }
}
























?>