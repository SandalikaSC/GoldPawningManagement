<?php
class Extend extends Controller
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
    public function SaveExtend($locker, $months)
    {

        $currentReservations = $this->ReservationModel->getReservationsbyRetrieve($locker, 0);
        //add payment
        $allocationFee = $this->interestModel->getAllocationInterest()->Interest_Rate;
        $setDate=$currentReservations[0]->Retrieve_Date;
        $setDate = date('Y-m-d', strtotime('+'.$months. 'months', strtotime($setDate)));
        echo $setDate;
        if ($months == 6) {
            $allocationFee = $allocationFee / 2.0;
        }
        $status = $this->paymentModel->addCashLockerPayment($allocationFee, $currentReservations[0]->Allocate_Id);
        // //update reservations
        if ($status) {
            foreach ($currentReservations as $reservation) {
                $this->ReservationModel->lockerExtend($setDate, $reservation->Allocate_Id);
            } 

            notification("locker","Extened duration successfully","gold");
            redirect("/Reservations/ViewReservation/".$currentReservations[0]->lockerNo);
            
        }else{
            notification("extend","Something went wrong ","red");
        }

    }
}
