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
            $this->view('Admin/goldpricePage');

        }

    }