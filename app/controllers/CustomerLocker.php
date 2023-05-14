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
        $this->paymentmodel = $this->model('payment');
        $this->modelCustomer = $this->model('customer');
    }


    public function index()
    {
        $allocation = $this->reservationModel->getCustomerReserveLockers($_SESSION['user_id']);
        $data = [
            'reservation' => $allocation
        ];
        $this->view('Customer/locker', $data);
    }
    public function viewLockerArticle($lockerid)
    {
        // $reservation = $this->reservationModel->getReservation($reserveId);
        // $article = $this->articleModel->getArticleById($reservation->Article_Id);
        // $delivery = $this->deliveryModel->getDeliveryByLocker($reservation->lockerNo);
        // $locker = $this->lockerModel->getLockerById($reservation->lockerNo);
        // $interest = $this->interestModel->getAllocationInterest();
        // $payment = $this->paymentmodel->getReservationPayments($reserveId);

        // $data = [ 
        //     'reservation' => $reservation,
        //     'article' => $article,
        //     'delivery' => $delivery,
        //     'locker' => $locker,
        //     'payment' => $payment,
        //     'interest' => $interest

        // ];
        $currentReservations = $this->reservationModel->getReservationsbyRetrieve($lockerid, 0);
        $previous_reservations = $this->reservationModel->preLockerReservationByCustomer($lockerid);
        $delivery = null;
        $currentpayment = null;
        $customer = null;
        if (!empty($currentReservations)) {
            $delivery = $this->deliveryModel->deliveryByLocker($lockerid, $currentReservations[0]->Date);
            $currentpayment = $this->paymentmodel->filterReservationPayment($currentReservations);

            $customerid = $currentReservations[0]->UserID;
            $customer = $this->modelCustomer->getCustomerById($customerid);
            //         // do something with the customer name
        }
        $extend = 0;
        if (!empty($currentReservations)) {
            $interval = date_diff(date_create($currentReservations[0]->Retrieve_Date), date_create());
            $date1 =  $currentReservations[0]->Retrieve_Date; // the date to check
            $current_date = date('Y-m-d'); // the current date
            if($interval->y>0){
                $format=$interval->format('%Y Year %m months  %d days');
            }else{
                $format=$interval->format('%m months  %d days');
            }
            $timeremain = $date1 < $current_date ? "Overdue" : $format;
            $tag = ($timeremain == "Overdue" )? "red" : "";
            
            if ($interval->days <= 30 || $current_date> $date1) {
                $extend = 1;
                
            }
        } else {
            $tag = "";
            $timeremain = "";
        }


        $data = [
            'currentReservations' => $currentReservations,
            'previous_reservations' => $previous_reservations,
            'delivery' => $delivery,
            'currentpayment' => $currentpayment,
            'locker' => $lockerid,
            'timeremain' => $timeremain,
            'tag' => $tag,
            'extend' => $extend,
            'customer' => $customer
        ];
        $this->view('Customer/article_locker', $data);
    }
    public function viewExtend($lockerid)
    {

        $currentReservations = $this->reservationModel->getReservationsbyRetrieve($lockerid, 0);
        // $customerid = $currentReservations[0]->UserID;
        // $customer = $this->modelCustomer->getCustomerById($customerid);
        $allocationFee = $this->interestModel->getAllocationInterest()->Interest_Rate;
        // $fine =  $this->interestModel->getFine();

        $interval = date_diff(date_create($currentReservations[0]->Retrieve_Date), date_create());
        

        $overdue = 0;
        $periodof6=0;
        $extendStart=$currentReservations[0]->Retrieve_Date;
        $extendTo = date('Y-m-d', strtotime('+6 months', strtotime( $extendStart)));
        if ($interval->days<30 && $currentReservations[0]->Retrieve_Date<date_create()) {
            $overdue = $interval->days; 
            $months = ceil($overdue / 30); 
            $periodof6 =  floor($months/6 ) ; 
            if ($periodof6>0) {
                $mon=$periodof6*6;
               
                $extendStart= date('Y-m-d', strtotime('+'.$mon.'months', strtotime($currentReservations[0]->Retrieve_Date)));
                $extendTo = date('Y-m-d', strtotime('+6 months', strtotime( $extendStart)));
            
            }
        }

        $data = [
            'currentReservations' => $currentReservations,
            'allocations' => count($currentReservations),
            'lockerid' => $lockerid,
            // 'fine' => $fine->Interest_Rate,
            'allocationFee' => $allocationFee,
            'extendTo' => $extendTo, 
            'extendStart' => $extendStart,
            'periodof6' => $periodof6,
            'overduepay' => $periodof6*$allocationFee/2,
            'overdue' => $overdue
        ];
        $this->view('Customer/lockerpaydetails', $data);
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
