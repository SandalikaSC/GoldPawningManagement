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
                $this->viewAppointments();

        }
        public function loadTimeSlots()
        {
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
                        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


                        $result = $this->Model->getSlotsNotIn(trim($_POST['date']));

                        $data = [
                                'reasonID' => trim($_POST['reason']),
                                'date' => trim($_POST['date']),
                                'date_err' => '',
                                'time_slots' => $result,
                                'time_slot_err' => ''

                        ];

                        if (empty($data['date'])) {
                                $data['date_err'] = 'Required Field';
                                $data['time_slots'] = (array) null;

                        } else if ($data['date'] < date("Y-m-d")) {
                                $data['date_err'] = 'invalid date';
                                $data['time_slots'] = (array) null;

                        } else if (empty($data['time_slots'])) {
                                $data['time_slot_err'] = 'No time slots available';
                        }


                        // $this->view('pages/userLogin', $data);
                        $this->view('Customer/newAppointment', $data);


                } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                        $data = [
                                'reasonID' => trim($_POST['reason']),
                                'date' => trim($_POST['date']),
                                'date_err' => '',
                                'time_slots' => '',
                                'time_slot_err' => ''

                        ];
                        if (!empty(trim($_POST['selector']))) {
                                $data['time_slots'] = trim($_POST['selector']);

                        }

                        if (empty($data['date'])) {
                                $data['date_err'] = 'Required Field';

                        } else if ($data['date'] < date("Y-m-d")) {
                                $data['date_err'] = 'invalid date';
                                $data['time_slots'] = (array) null;

                        }

                        if (empty($data['time_slots'])) {
                                $data['time_slot_err'] = 'Required Field';

                        }
                        if (!empty($data['reasonID']) && empty($data['date_err']) && empty($data['time_slot_err'])) {
                                // echo 'submitted';
                                $result = $this->Model->addAppointment($data);
                                if ($result) {
                                        $date = $data['date'];
                                        flash('appointment', "Your Appointment on '{$date}'  is Confirmed.", 'success');
                                        redirect('/appointments');
                                } else {
                                        flash('appointment', 'Something went wrong. Try Again.', 'invalid');

                                }

                        } else {
                                $this->view('Customer/newAppointment', $data);
                        }




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
                                'reasonID' => "1",
                                'date' => date('Y-m-d'),
                                'date_err' => '',
                                'time_slots' => $result,
                                'time_slot_err' => ''
                        ];

                        if (empty($data['time_slots'])) {
                                $data['time_slot_err'] = 'No time slots available';
                        }

                        // $this->view('pages/userLogin', $data);
                        $this->view('Customer/newAppointment', $data);
                }
        }

        public function viewAppointments()
        {
                $result = $this->Model->getAppointmentById($_SESSION['user_id']);
                $data = [
                        'appointments' => $result,
                        'from' => '',
                        'from_err' => '',
                        'to' => '',
                        'to_err' => ''
               
                ];

                if (empty($result)) {
                        $data['appointments'] = (array) null;
                }

                $this->view('Customer/appointments', $data);
                

        }


        public function cancelAppointment($appId,$date)
        {
               
                $result = $this->Model->cancelAppointment($appId);
                if ($result) {
                        flash('appointment', "Your appointment on '$date' cancelled", 'success');

                } else {
                        flash('appointment', 'Something went wrong. Try Again.', 'invalid');

                }
                redirect('/appointments');

        }
        public function searchAppointment()
        {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // Process form
                        // Sanitize POST data
                        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                        $data = [
                                'appointments' =>(array) null,
                                'from' => trim($_POST['from']),
                                'from_err' => '',
                                'to' => trim($_POST['to']),
                                'to_err' => ''
                        ];
                          //from date valodation
                        if (empty($data['from'])) {
                                $data['from_err'] = 'Required field';
                        }
                        //to date valodation
                        if (empty($data['to'])) {
                                $data['to_err'] = 'Required field';
                        }
                        //date difference validation
                        if(!empty($data['to']) && !empty($data['from'])){
                                $difference = strtotime($data['to']) - strtotime($data['from']);
                                if ($difference<0) {
                                        $data['to_err'] = 'Invalid Date Selection';
                                }
                        }
                        if(empty($data['to_err']) && empty($data['from_err'])){
                                $result = $this->Model->getAppointmentFromTo($data);  
                                if (!empty($result)) { 
                                
                                        $data['appointments'] = $result;
                                } 
                        }
                        
                                
                        $this->view('Customer/appointments', $data);
 
                } 
                
        }
}
?>