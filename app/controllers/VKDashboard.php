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
        }

        public function index()
        {
                $result = $this->modelAppointment->getAppointmentByDate(date("Y-m-d"));
                $appointmentCount=$this->modelAppointment->countAppointments(date("Y-m-d"));
                $lockers=$this->lockerModel->countLockerAvailable();
                $todayAllocation=$this->ReservationModel->countTodayAllocation();

                $data = [
                        'appointments' => $result,
                        'lockers' => $lockers,
                        'todayAllocation' => $todayAllocation,
                        'appointments' => $result,
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
                $this->view('VaultKeeper/vaultkeeperDash',$data);
        }

        public function Reservations()
        {      
                $this->view('VaultKeeper/Reservations');
        } 
        public function Customers()
        {
                $result=$this->modelCustomer->getAllCustomers();
                
                $data = [
                        'customers'=>$result
                ];
                if (empty($result)) {
                        $data['customers'] = (array) null;
                }
                //  header("Content-type: image/jpeg");
                // foreach ($data['customers'] as $customer) {
                //         echo $customer->image;
                // }
                $this->view('VaultKeeper/Customers',$data);
        }

}
?>