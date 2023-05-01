<?php
class AllocateLocker extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('/Users');
        }
        $this->customerModel = $this->model('Customer');
        $this->reservationModel = $this->model('reservation');
        $this->LockerModel = $this->model('Locker');
        $this->validationModel = $this->model('validateArticle');
    }
    public function index($customer)
    {

        $validArticles = $this->validationModel->getvalidArticles($customer);
        $invalidArticles = $this->validationModel->getInvalidArticles($customer);
        $CustomerLockers = $this->LockerModel->AvailableCustomerArticles($customer);
        $customer = $this->customerModel->getCustomerById($customer);
        $AvailableLockers = $this->LockerModel->getAvailableLocker();
        if (empty($CustomerLockers)) {
           $allocateMy=null;
        } else {
            $allocateMy=array_shift($validArticles);
        }
  

        $data = [
            'customer' => $customer,
            'CustomerLockers' => $CustomerLockers,
            'AvailableLockers' => $AvailableLockers,
            'AllocateMy' => $allocateMy,
            'invalidArticles' => $invalidArticles,
            'validArticles' => $validArticles

        ]; 
        // var_dump($CustomerLockers);
        $this->view('VaultKeeper/allocateLocker', $data);
    }


    public function AllocateLocker()
    {
        $this->view('VaultKeeper/allocateLocker');
    }
}
