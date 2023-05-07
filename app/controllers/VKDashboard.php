<?php
class VKDashboard extends Controller
{
        public function __construct()
        {
                if (!isLoggedIn()) {
                        redirect('/Users');
                }
                $this->modelCustomer = $this->model('Customer');
                $this->modelAppointment = $this->model('Appointment');
                $this->lockerModel = $this->model('Locker');
                $this->ReservationModel = $this->model('reservation');
                $this->validationModel = $this->model('validateArticle');
                $this->deliveryModel = $this->model('delivery');
        }

        public function index()
        {
                $result = $this->modelAppointment->getAppointmentByDate(date("Y-m-d"));
                $appointmentCount = $this->modelAppointment->countAppointments(date("Y-m-d"));
                $lockers = $this->lockerModel->countLockerAvailable();
                $todayAllocation = $this->ReservationModel->countTodayAllocation();
                $validations = $this->validationModel->getValidateArticles();

                $data = [
                        'appointments' => $result,
                        'lockers' => $lockers,
                        'todayAllocation' => $todayAllocation,
                        'appointments' => $result,
                        'validations' => $validations,
                        'countAppointment' => $appointmentCount

                ];
                if (empty($result)) {
                        $data['appointments'] = (array) null;
                }
                // foreach($data['appointments'] as $x){
                //         echo $x->Appointment_Id;
                //         echo $x->booked_Date;
                //         echo $x->appointment_date;
                //         echo $x->UserID;
                //         echo $x->time;

                // }
                $this->view('VaultKeeper/vaultkeeperDash', $data);
        }

        public function Reservations()
        {

                $lockers = $this->lockerModel->getAllLockers();
                $lockerCount = $this->lockerModel->countAllLocker();
                $available = $this->lockerModel->countLockerAvailable();
                $reserverd = $this->lockerModel->countLockerReserved();
                $CurrentArticles = $this->ReservationModel->countCurrentArticles();
                $keyDeliverd = $this->deliveryModel->countDeliverd();
                $notDeliverd = $this->deliveryModel->countNotDeliverd();

                $data = [
                        'lockers' =>  $lockers,
                        'lockerCount' =>  $lockerCount,
                        'available' =>  $available,
                        'reserverd' =>  $reserverd,
                        'CurrentArticles' =>  $CurrentArticles,
                        'keyDeliverd' =>  $keyDeliverd,
                        'notDeliverd' =>  $notDeliverd
                ];




                $this->view('VaultKeeper/Reservations', $data);
        }
        public function Customers()
        {
                $result = $this->modelCustomer->getAllCustomers();

                $data = [
                        'customers' => $result
                ];
                if (empty($result)) {
                        $data['customers'] = (array) null;
                }

                $this->view('VaultKeeper/Customers', $data);
        }

        public function loadnewValidation()
        {

                $validations = $this->validationModel->getValidateArticles();

                echo json_encode($validations);
        }
        
}
