<?php
class CustomerLocker extends Controller
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
            $this->view('Customer/locker');

        }
        public function viewLockerArticle()
        {
            $this->view('Customer/article_locker');
            // if($id==1){
            //     $this->view('Customer/ ');
            // }else if($id==2){
            //     $this->view('Customer/ ');
            // }
           

        }
        public function viewLockerPay()
        {
            $this->view('Customer/locker_pay');
        
        }
    }