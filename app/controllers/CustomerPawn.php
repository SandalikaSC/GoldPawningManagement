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
        public function viewPawnArticle()
        {
            $this->view('Customer/article_pawn');

        }
    }