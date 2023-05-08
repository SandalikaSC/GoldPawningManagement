<?php
class RetriveLockerArticle extends Controller
{

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('/Users');
        }
        // $this->Model = $this->model('Appointment');
        $this->modelCustomer = $this->model('Customer');
        $this->modelAppointment = $this->model('Appointment');
        $this->lockerModel = $this->model('Locker');
        $this->interestModel = $this->model('interest');
        $this->ReservationModel = $this->model('reservation');
        $this->validationModel = $this->model('validateArticle');
        $this->deliveryModel = $this->model('delivery');
        $this->paymentModel = $this->model('payment');
    }


    public function index()
    {
    }
    public function RetriveArticle()
    {
        $release = $_POST['release'];
        $locker = $_POST['locker'];
        $lockerRelease = $_POST['lockerRelease'];
        $fine = $_POST['fine'];
        if ($fine != 0) {
            $this->paymentModel->addCashLockerPayment($fine, $release[0]);
        }
        for ($i = 0; $i < count($release); $i++) {
            $this->ReservationModel->RetriveLockerArticle($release[$i]);
            $this->lockerModel->ReleaseArticleLocker($locker);
        }
        if ($lockerRelease==1) {
            $this->lockerModel->DeAllocateLocker($locker);
            notification("locker","Locker Released","gold");
          
        }else{
            notification("locker","Article retrieved","gold");
        }
 
        echo json_encode(1);
    }
}
