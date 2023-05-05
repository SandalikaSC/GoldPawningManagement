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
                // $this->articleMocel = $this->model('article');
                $this->ReservationModel = $this->model('reservation');
                $this->validationModel = $this->model('validateArticle');
                $this->deliveryModel = $this->model('delivery');
                $this->paymentModel = $this->model('payment');
        }


        public function index()
        {
        }
        public function ViewReservation($lockerid)
        {
                $currentReservations = $this->ReservationModel->getCurrentReservations($lockerid);
                $previous_reservations = $this->ReservationModel->getPreReservations($lockerid);
                // $delivery = null;
                // $currentpayment = null;
                // $customer = null;
                if (!empty($currentReservations)) {
                //         $delivery = $this->deliveryModel->deliveryByLocker($lockerid);
                        $currentpayment = $this->paymentModel->getreservationPayment($currentReservations);

                //         $customerid = $currentReservations[0]->UserID;
                //         $customer = $this->modelCustomer->getCustomerById($customerid);
                //         // do something with the customer name
                }


                $data = [
                        'currentReservations' => $currentReservations,
                        'previous_reservations' => $previous_reservations,
                        // 'delivery' => $delivery,
                        'currentpayment' => $currentpayment,
                        'locker'=>$lockerid,
                        // 'customer' => $customer 
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
