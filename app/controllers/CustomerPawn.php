<?php
class CustomerPawn extends Controller
{

        public function __construct()
        {
                if (!isLoggedIn()) {
                        redirect('/Users');
                }
                // $this->Model = $this->model('Appointment');

        }


        public function index()
        {
            $this->view('Customer/pawnArticles');

        }
        public function viewPawnArticle($id)
        {
            if($id==1){
                $this->view('Customer/article_pawn_pending');
            }else if($id==2){
                $this->view('Customer/article_pawn');
            }
           

        }
        public function makePayment(){
            $this->view('Customer/Pawn-pay');
        }
    }