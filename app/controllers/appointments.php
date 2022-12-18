<?php
class appointments extends Controller
{

        public function __construct()
        {
                if (!isLoggedIn()) {
                        redirect('/Users');
                }
                $this->Model = $this->model('Appointment');

        }


        public function index()
        {


        }
        public function loadTimeSlots()
        {
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
                        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


                        $data = [
                                'date' => trim($_POST['date']),
                                'date_err' => '',
                                'time_slots' => $_POST['selector'],
                                'time_slot_err' => '',
                                'reason' => $_POST['reason'],
                                'reason_err' => ''
                        ];
                        echo $data['time_slots'];
                        echo $data['reason'];

                        $result = $this->Model->getSlotsNotIn($data['date']);
                        // Init data
                        $data = [
                                'date' => trim($_POST['date']),
                                'date_err' => '',
                                'time_slots' => $result

                        ];
                        // $this->view('pages/userLogin', $data);
                        $this->view('Customer/newAppointment', $data);


                }


        }
        public function AddAppointment()
        {
                // Check for POST
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // Process form
                        // Sanitize POST data
                        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                        // Init data
                        $data = [];
                } else {

                        $result = $this->Model->getSlotsNotIn(date('Y-m-d'));
                        // Init data
                        $data = [
                                'date' => date('Y-m-d'),
                                'date_err' => '',
                                'time_slots' => $result

                        ];


                        // $this->view('pages/userLogin', $data);
                        $this->view('Customer/newAppointment', $data);
                }
        }
}
?>