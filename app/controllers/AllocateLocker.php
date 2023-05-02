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
        $this->interestModel = $this->model('interest');
    }
    public function index($customer)
    {

        $validArticles = $this->validationModel->getvalidArticles($customer);
        $invalidArticles = $this->validationModel->getInvalidArticles($customer);
        $CustomerLockers = $this->LockerModel->AvailableCustomerArticles($customer);
        $customer = $this->customerModel->getCustomerById($customer);
        $AvailableLockers = $this->LockerModel->getAvailableLocker();
        $allocationFee = $this->interestModel->getAllocationInterest()->Interest_Rate;




        $data['customer'] = $customer;
        $data['AvailableLockers'] = $AvailableLockers;
        $data['invalidArticles'] = $invalidArticles;
        $data['validArticles'] = $validArticles;
        $data['allocationFee'] = $allocationFee;


        $allocateMy = null;
        if (!empty($CustomerLockers)) {

            while (!empty($CustomerLockers)) {
                $allocateMy[] = array_shift($validArticles);
                $locker = array_shift($CustomerLockers);
                $allocateMy[count($allocateMy) - 1]->lockerNo = $locker->lockerNo;
                
            }
            // var_dump($CustomerLockers);
            // var_dump($allocateMy);
        }
        $reserve = null;
        $lockersPay = 0;
        $duration= array();

        while (!empty($validArticles) && !empty($AvailableLockers)) {

            
            $reserve[] = array_shift($validArticles);
            $locker = array_shift($AvailableLockers);
            $reserve[count($reserve) - 1]->lockerNo = $locker->lockerNo;
            $reserve[count($reserve) - 1]->duration = 6;
            $duration[$lockersPay]['locker']= $locker->lockerNo;
            $duration[$lockersPay]['duration']= 6; 
            // $duration[$lockersPay]['payment']= 0;
            $lockersPay++;
            if (!empty($validArticles)) {
                $reserve[] = array_shift($validArticles);
                $reserve[count($reserve) - 1]->lockerNo = $locker->lockerNo;
                $reserve[count($reserve) - 1]->duration = 6;
            }
        }

 
        $data['reserve'] = $reserve;
        $data['duration'] = $duration;
        $data['notreserve'] = $validArticles;
        $data['lockersPay'] = $lockersPay;
        $data['allocateMy'] = $allocateMy;

        $this->view('VaultKeeper/allocateLocker', $data);
    }


    public function AllocateLocker()
    {
        $this->view('VaultKeeper/allocateLocker');
    }
}
