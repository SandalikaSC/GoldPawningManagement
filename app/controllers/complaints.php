<?php
class complaints extends Controller
{

        public function __construct()
        {
                if (!isLoggedIn()) {
                        redirect('/Users');
                }
                $this->Model = $this->model('complaint');
                  

        }


        public function index()
        { 

        }
        public function addComplaint()
        {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

               
                $data = [
                        'complaint'=>trim($_POST['msg']),
                        'compalint_err' => ''
                ];
                if(empty($data['complaint'])){
                        $data['compalint_err'] = 'Required Field';
                        
                }else{
                        $result = $this->Model->addComplaint($data);
                        
                                if ($result) { 
                                        
                                        flash('complaint', "Your massage is recorded successfully we will look in to it", 'success');
                                        $this->view('Customer/ContactUs', $data);  
                                } else {
                                        
                                        flash('complaint', 'Something went wrong. Try Again.', 'invalid');
                                            
                                }

                }
               
                $this->view('Customer/ContactUs', $data);  
        }

}
?>