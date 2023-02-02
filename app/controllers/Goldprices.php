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

    }