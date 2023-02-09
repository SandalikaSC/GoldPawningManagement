<?php
class VKDashboard extends Controller
{
        public function __construct()
        {
                if (!isLoggedIn()) {
                        redirect('/Users');
                }
                $this->modelCustomer = $this->model('Customer');
        }

        public function index()
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