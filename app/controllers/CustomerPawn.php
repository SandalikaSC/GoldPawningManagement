<?php
class CustomerPawn extends Controller
{

        public function __construct()
        {
                if (!isLoggedIn()) {
                        redirect('/Users');
                }
                $this->customerPawnModel = $this->model('Pawning');

                // $this->Model = $this->model('Appointment');

        }
        

        public function index()
        {
            $pawning=$this->customerPawnModel->getPawnByUserID($_SESSION['user_id']);
            $data = [
                    'pawnings'=>$pawning
            ];
            if (empty($pawning)) {
                    $data['interest'] = (array) null;
            } 

            $this->view('Customer/pawnArticles',$data);

        }
        public function viewPawnArticle($pawn_id)
        {
            $pawning=$this->customerPawnModel->
           

        }
        public function makePayment(){
            $this->view('Customer/Pawn-pay');
        }
    }