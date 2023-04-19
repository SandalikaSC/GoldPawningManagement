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
        $this->appointment = $this->model('Appointment');
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
        $reservation = $this->reservationModel->getReservation($reserveId);
        $article = $this->articleModel->getArticleById($reservation->Article_Id);
        $delivery = $this->deliveryModel->getDeliveryByReserveId($reserveId);
        $locker = $this->lockerModel->getLockerById($reservation->lockerNo);
        $interest = $this->interestModel->getAllocationInterest();


        $data = [
            'reservation' => $reservation,
            'article' => $article,
            'delivery' => $delivery,
            'locker' => $locker,
            'interest' => $interest

        ];

        $this->view('Customer/article_locker', $data);
    }
    public function viewLockerPay($allocate_Id)
    {

        $reservation = $this->reservationModel->getReservation($allocate_Id);
        $article = $this->articleModel->getArticleById($reservation->Article_Id);
        $interest = $this->interestModel->getAllocationInterest();
        $fineRate = $this->interestModel->getFine();
        $tomorrow = new DateTime('tomorrow');
        $tomorrowFormatted = $tomorrow->format('Y-m-d');
        $timeSlots = $this->appointment->getSlotsNotIn($tomorrowFormatted);
        $interval = date_diff(date_create($reservation->Retrieve_Date), date_create());
        $duedays = $interval->days;

        $dateObject = date_create($reservation->Retrieve_Date);
        $retrieve = $dateObject->format('Y-m-d');

        $data = [
            'reservationId' => $reservation->Allocate_Id,
            'retrieve_Date' => $retrieve,
            'finePaidTill' => $reservation->finePaidTill,
            'installement' => $reservation->allocation_fee,
            'articleId' => $reservation->Article_Id,
            'articleImg' => $article->image,
            'duedays' => $duedays,
            'fineRate' => $fineRate,
            'timeslot' => $timeSlots,
            'interest' => $interest

        ];
        $this->view('Customer/pawnpaydetails', $data);
    }
    public function getTimeSlots()
    {

        if (isset($_POST["date"])) {
            $date =  $_POST["date"];
            $data = $this->appointment->getSlotsNotIn($date);

            echo json_encode($data);
        }
    }
}
