<?php
class Reservations extends Controller
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
                

        }
        public function ViewReservation()
        {
                $this->view('VaultKeeper/LockerItemDetails');
        }
        public function makePayment()
        {
                $this->view('VaultKeeper/makepayment');
        }
        public function releaseLocker()
        {
                $this->view('VaultKeeper/ReleaseLocker');
        }
        

    }