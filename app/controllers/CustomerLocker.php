<?php
class CustomerLocker extends Controller
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
    }


    public function index()
    {
        $allocation = $this->reservationModel->getReservationByUserID($_SESSION['user_id']);
        $data = [
            'reservation' => $allocation
        ];  
        $this->view('Customer/locker', $data);
    }
    public function viewLockerArticle($reserveId)
    {
        $reservation=$this->reservationModel->getReservation($reserveId);
        $article=$this->articleModel->getArticleById($reservation->Article_Id);
        $delivery=$this->deliveryModel->getDeliveryByReserveId($reserveId);
        $locker=$this->lockerModel->getLockerById($reservation->lockerNo);


        $data=[
            'reservation'=>$reservation,
            'article'=>$article,
            'delivery'=>$delivery,
            'locker'=>$locker

        ];

        $this->view('Customer/article_locker',$data);  


    }
    public function viewLockerPay()
    {
        $this->view('Customer/locker_pay');
    }
}
