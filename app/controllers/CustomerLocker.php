<?php
class CustomerLocker extends Controller
{

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('/Users');
        }
        $this->reservationModel = $this->model('reservation');

    }


    public function index()
    {
        $allocation = $this->reservationModel->getReservationByUserID($_SESSION['user_id']);
        $data = [
            'reservation' => $allocation
        ];  
        $this->view('Customer/locker', $data);
    }
    public function viewLockerArticle()
    {
        $this->view('Customer/article_locker');
        // if($id==1){
        //     $this->view('Customer/ ');
        // }else if($id==2){
        //     $this->view('Customer/ ');
        // }


    }
    public function viewLockerPay()
    {
        $this->view('Customer/locker_pay');
    }
}
