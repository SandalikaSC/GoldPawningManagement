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
                        'goldrates' => $result ,
                        'editRate'=>""
               
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
                        $result = $this->Model->getGoldRates();
                        $editRate=$this->Model->getRate($rateid);
                        $data = [
                                'goldrates' => $result ,
                                'editRate'=>$editRate,
                       
                        ];
                        if (empty($result)) {
                                $data['goldrates'] = (array) null;
                        } 
                        if (empty($result)) {
                                $data['editRate'] = (array) null;
                        } 
                        $this->view('Admin/goldpricePage',$data);

                } else {
                        $data = [];
                        $this->view('Admin/goldpricePage',$data);
                }
 

        }
        public function editRate(){
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // Process form
                        // Sanitize POST data
                        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                        // Init data
                       // $result = $this->Model->getGoldRates();
                        $data = [
                                'Karat' => trim($_POST['Karat']) ,
                                'newprice'=>trim($_POST['newPrice']) 
                       
                        ];  
                       $result = $this->Model->EditGoldRate($data); 
                      /*  if($result){
                               echo "updated";
                              }else{
                                  echo"not";
                              }*/
        }
        

    }
}