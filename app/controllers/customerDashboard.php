<?php
class customerDashboard extends Controller
{
        public function __construct()
        {
                if (!isLoggedIn()) {
                        redirect('/Users');
                }
                $this->Model = $this->model('Appointment');
                $this->goldModel = $this->model('goldprice');
                $this->interestModel = $this->model('interest');
        }

        public function dashboard()
        {
                $result = $this->Model->getAppointmentById($_SESSION['user_id']);
                $result2 = $this->goldModel->getGoldRates();
                $result3 = $this->interestModel->getInterest();

                $data = [
                        'appointments' => $result,
                        'goldRates' =>array_slice($result2, 2),
                        'interest' => $result3
                ];

                if (empty($result)) {
                        $data['appointments'] = (array) null;
                }
                if (empty($result2)) {
                        $data['goldRates'] = (array) null;
                }
                if (empty($result3)) {
                        $data['interest'] = (array) null;
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