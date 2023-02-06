<?php
class VKDashboard extends Controller
{
        public function __construct()
        {
                if (!isLoggedIn()) {
                        redirect('/Users');
                }
                // $this->Model = $this->model('Appointment');
        }

        public function dashboard()
        {
                // $result = $this->Model->getAppointmentById($_SESSION['user_id']);
                // $data = [
                //         'appointments' => $result

                // ];

                // if (empty($result)) {
                //         $data['appointments'] = (array) null;
                // }
                $this->view('VaultKeeper/vaultkeeperDash');
        }

        public function lockers()
        {
                $data = [];
                $this->view('VaultKeeper/locker');
        } 
        public function Customers()
        {
                $data = [];
                $this->view('VaultKeeper/Customers');
        }

}
?>