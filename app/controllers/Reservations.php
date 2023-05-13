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
                $this->interestModel = $this->model('interest');
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
                $currentReservations = $this->ReservationModel->getReservationsbyRetrieve($lockerid, 0);
                $previous_reservations = $this->ReservationModel->getReservationsbyRetrieve($lockerid, 1);
                $delivery = null;
                $currentpayment = null;
                $customer = null;
                if (!empty($currentReservations)) {
                        $delivery = $this->deliveryModel->deliveryByLocker($lockerid, $currentReservations[0]->Date);
                        $currentpayment = $this->paymentModel->filterReservationPayment($currentReservations);

                        $customerid = $currentReservations[0]->UserID;
                        $customer = $this->modelCustomer->getCustomerById($customerid);
                        //         // do something with the customer name
                }
                $extend = 0;
                if (!empty($currentReservations)) {
                        $interval = date_diff(date_create($currentReservations[0]->Retrieve_Date), date_create());
                        $date1 =  $currentReservations[0]->Retrieve_Date; // the date to check
                        $current_date = date('Y-m-d'); // the current date

                        if ($interval->y > 0) {
                                $format = $interval->format('%Y Year %m months  %d days');
                        } else {
                                $format = $interval->format('%m months  %d days');
                        }


                        $timeremain = $date1 < $current_date ? "Overdue" : $format;
                        $tag = $timeremain == "Overdue" ? "red" : "";
                        if ($interval->days <= 30 || $current_date > $date1) {
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


                $this->view('VaultKeeper/LockerItemDetails', $data);
        }
        public function extend($lockerid)
        {
                $currentReservations = $this->ReservationModel->getReservationsbyRetrieve($lockerid, 0);
                $customerid = $currentReservations[0]->UserID;
                $customer = $this->modelCustomer->getCustomerById($customerid);
                $allocationFee = $this->interestModel->getAllocationInterest()->Interest_Rate;
                $fine =  $this->interestModel->getFine();

                $interval = date_diff(date_create($currentReservations[0]->Retrieve_Date), date_create());

                $overdue = 0;
                $periodof6=0;
                $extendTo = date('Y-m-d', strtotime('+6 months', strtotime($currentReservations[0]->Retrieve_Date)));
                $extendStart=$currentReservations[0]->Retrieve_Date;
                if ($currentReservations[0]->Retrieve_Date < date_create()) {
                        $overdue = $interval->days;
                        $months = ceil($overdue / 30);
                        $periodof6 = $months / 6;
                        if ($periodof6 > 0) {
                                $mon = $periodof6 * 6;

                                $extendStart = date('Y-m-d', strtotime('+' . $mon . 'months', strtotime($currentReservations[0]->Retrieve_Date)));
                                $extendTo = date('Y-m-d', strtotime('+6 months', strtotime($extendStart)));
                        }
                }

                $data = [
                        'currentReservations' => $currentReservations,
                        'customer' => $customer,
                        'lockerid' => $lockerid,
                        'fine' => $fine->Interest_Rate,
                        'allocationFee' => $allocationFee,
                        'extendTo' => $extendTo,
                        'periodof6' => $periodof6, 
                        'extendStart' => $extendStart,
                        'overduepay' => $periodof6*$allocationFee/2,
                        'overdue' => $overdue
                ];


                $this->view('VaultKeeper/extend', $data);
        }
        public function releaseLocker($lockerid)
        {
                $currentReservations = $this->ReservationModel->getReservationsbyRetrieve($lockerid, 0);
                $fine =  $this->interestModel->getFine();



                $interval = date_diff(date_create($currentReservations[0]->Retrieve_Date), date_create());

                $overdue = 0;
                if ($interval->days < 0) {
                        $overdue = $interval->days;
                }


                $data = [
                        'currentReservations' => $currentReservations,
                        'fine' => $fine->Interest_Rate,
                        'lockerid' => $lockerid,
                        'overdue' => $overdue
                ];

                $this->view('VaultKeeper/ReleaseLocker', $data);
        }
}
