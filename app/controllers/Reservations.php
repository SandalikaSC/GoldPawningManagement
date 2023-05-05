<?php
class Reservations extends Controller
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
                $this->ReservationModel = $this->model('reservation');
                $this->validationModel = $this->model('validateArticle');
                $this->deliveryModel = $this->model('delivery');
        }


        public function index()
        {
        }
        public function ViewReservation($lockerid)
        {
                $data = [
                        // 'appointments' => $result,
                        

                ];


                $this->view('VaultKeeper/LockerItemDetails', $data);
        }
        public function makePayment()
        {
                $this->view('VaultKeeper/makepayment');
        }
        public function releaseLocker()
        {
                $this->view('VaultKeeper/ReleaseLocker');
        }
}
