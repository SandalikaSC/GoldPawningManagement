<?php
    class Lockers extends Controller {
        public function __construct(){
            if(!isLoggedIn()) {
                redirect('employees');
            }
        }

        public function show_lockers(){
            
            $lockers = $this->model('Locker')->getAllLockers();
            // echo $lockers;
            $data = [
                'title' => 'Locker',
                'lockers' => $lockers,
            ];

            $this->view('Admin/locker', $data);
        }

        public function view_locker() {
            $data = [];

            $this->view('Admin/view_locker', $data);
        }
    }