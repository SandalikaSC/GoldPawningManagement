<?php
class Goldprices extends Controller
{

        public function __construct()
        {
                if (!isLoggedIn()) {
                        redirect('/Users');
                }
                $this->Model = $this->model('goldprice');

        }


        public function index()
        {

                $result = $this->Model->getGoldRates();
                $data = [
                        'goldrates' => $result 
               
                ];

                if (empty($result)) {
                        $data['goldrates'] = (array) null;
                } 

            $this->view('Admin/goldpricePage',$data);

        }
        public function selectRate($rateid){

                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        // Process form
                        // Sanitize POST data
                        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                        // Init data
                        $data = [];

                        
                } else {
                        $data = [];
                        $this->view('Admin/goldpricePage',$data);
                }
 

        }

    }