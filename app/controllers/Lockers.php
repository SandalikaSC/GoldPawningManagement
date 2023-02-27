<?php
    class Lockers extends Controller {
        public function __construct(){
            if(!isLoggedIn()) {
                redirect('employees');
            }
        }

        public function show_lockers(){
            $data = [
                'title' => 'Locker'
            ];

            $this->view('Admin/locker', $data);
        }

        public function view_locker() {
            $data = [];

            $this->view('Admin/view_locker', $data);
        }
    }