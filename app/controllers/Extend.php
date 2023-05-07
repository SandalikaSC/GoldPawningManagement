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
    public function SaveExtend($locker,$months)
    {  
         
        $currentReservations = $this->ReservationModel->getReservationsbyRetrieve($locker, 0);
        //add payment
        //update reservations
        
    }
}
