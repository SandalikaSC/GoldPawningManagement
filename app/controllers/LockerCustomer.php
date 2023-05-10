<?php
class LockerCustomer extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('employees');
        }

        $this->customerModel = $this->model('Customer');
        $this->lockerModel = $this->model('Locker');
        $this->ReservationModel = $this->model('reservation');
        $this->validationModel = $this->model('validateArticle');
        $this->deliveryModel = $this->model('delivery');
    }

    public function index()
    {
    }
    public function getCustomer($id)
    {

        $customers = $this->customerModel->getCustomerById($id);
        $reservations =  $this->ReservationModel->getReservationByUserID($id);
            $data = [
                'customer' =>  $customers,
                'reservations' =>  $reservations
            ];
        $this->view('VaultKeeper/viewCustomer', $data);
    }
}
