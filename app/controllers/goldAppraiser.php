<?php
    class goldAppraiser extends Controller
    {
        public function __construct()
        {
            $this->goldAppraiserModel = $this->model('goldAppModel');
        }

        public function dashboard() {
            $data = [];

            $this->view('GoldAppraiser/goldappDash', $data);
        }

        public function view_validated_articles() {
            $data = [];

            $this->view('GoldAppraiser/view_validated_articles', $data);
        }
    }