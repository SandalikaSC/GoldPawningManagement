<?php
class customerDashboard extends Controller
{
        public function __construct()
        {
                if (!isLoggedIn()) {
                        redirect('/Users');
                }
                $this->Model = $this->model('Appointment');
        }

        public function dashboard()
        {
                $result = $this->Model->getAppointmentById($_SESSION['user_id']);
                $data = [
                        'appointments' => $result

                ];

                if (empty($result)) {
                        $data['appointments'] = (array) null;
                }
                $this->view('Customer/customerDash', $data);
        }

        public function locker()
        {
                $data = [];
                $this->view('Customer/locker');
        }
        public function pawnArticles()
        {
                $data = [];
                $this->view('Customer/pawnArticles');
        }
        public function ContactUs()
        {
                $data = [
                        'compalint' => '',
                        'compalint_err' => ''
                ];
                $this->view('Customer/ContactUs', $data);
        }
        public function About()
        {
                $data = [];
                $this->view('Customer/about');
        }

}
?>