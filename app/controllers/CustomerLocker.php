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
        $this->interestModel = $this->model('interest');
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
        $interest=$this->interestModel->getAllocationInterest();


        $data=[
            'reservation'=>$reservation,
            'article'=>$article,
            'delivery'=>$delivery,
            'locker'=>$locker,
            'interest'=> $interest

        ];

        $this->view('Customer/article_locker',$data);  


    }
    public function viewLockerPay($allocate_Id)
    { 
        
        $reservation=$this->reservationModel->getReservation($allocate_Id);
        $article=$this->articleModel->getArticleById($reservation->Article_Id);
        $interest=$this->interestModel->getAllocationInterest();
        $fineRate=$this->interestModel->getFine();

        $interval = date_diff(date_create($reservation->Retrieve_Date), date_create());
        $duedays=$interval->days;

         
        $data=[
            'reservationId'=>$reservation->Allocate_Id,
            'installement'=>$reservation->allocation_fee,
            'articleId'=>$reservation->Article_Id,
            'articleImg'=>$article->image,
            'duedays'=>$duedays,
            'fineRate'=>$fineRate,
            'interest'=> $interest

        ];
        $this->view('Customer/pawnpaydetails',$data);
    }
}
