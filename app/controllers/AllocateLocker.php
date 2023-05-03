<?php

use function PHPSTORM_META\type;

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
        $this->articleModel = $this->model('article');
        $this->rateingModel = $this->model('goldprice');
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
        $duration = array();

        while (!empty($validArticles) && !empty($AvailableLockers)) {


            $reserve[] = array_shift($validArticles);
            $locker = array_shift($AvailableLockers);
            $reserve[count($reserve) - 1]->lockerNo = $locker->lockerNo;
            $reserve[count($reserve) - 1]->duration = 6;
            $duration[$lockersPay]['locker'] = $locker->lockerNo;
            $duration[$lockersPay]['duration'] = 6;
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

        $alredyAllocate = $_POST['allocatemy'];
        $reserved = $_POST['reserved'];
        $duration = $_POST['duration'];
        $notreserve = $_POST['notreserve'];
        $invalidArticles = $_POST['invalidArticles'];


        // allocate already allocate locker artilces

        foreach ($alredyAllocate as $allocation) {

            $Rate = $this->rateingModel->getRateIdByKaratage($allocation['karatage']);
            $article_id = $this->articleModel->addArticle($allocation, $Rate);
            $this->LockerModel->updateLockerArticles($allocation['lockerNo'], "Not Available");
            if (!empty($article_id)) {
                $this->reservationModel->addLockerReserved($allocation, $article_id);
            }
            //delete validated
            $this->validationModel->deleteValidation($allocation['id']);
        }

        $PreAlocker = 0;
        foreach ($reserved as $allocation) {

            $Rate = $this->rateingModel->getRateIdByKaratage($allocation['karatage']);
            $article_id = $this->articleModel->addArticle($allocation, $Rate);
            $locker = $allocation['lockerNo'];
            if ($PreAlocker == $locker) {
                $this->LockerModel->updateLockerArticles($allocation['lockerNo'], "Not Available");
                $this->reservationModel->addLockerReserved($allocation, $article_id);
            } else {
                $this->LockerModel->updateLockerArticles($allocation['lockerNo'], "Available");
                $PreAlocker = $locker;

                //calculate locker duration send duration
                $mothDuration = 0;
                for ($i = 0; $i < count($duration); $i++) {
                    if ($duration[$i]['locker'] == $allocation['lockerNo']) {
                        $mothDuration = $duration[$i]['duration'];
                    }
                }
                //calculate retrieve date
                $today = new DateTime();
                $future_date = $today->modify('+' . $mothDuration . ' months');
                $retrieve = $future_date->format('Y-m-d');

                $payment = $this->interestModel->getAllocationInterest()->Interest_Rate;

                //calculate payment for duration
                if ($mothDuration == 6) {
                    $payment = $payment / 2.0;
                }
                //add new locker reservation
                $this->reservationModel->addNewReservation($allocation, $article_id, $retrieve, $payment);

                // //delete validated
                $this->validationModel->deleteValidation($allocation['id']);
            }

            //delete invalid articles from validation table
            foreach ($notreserve as $article) {
                $this->validationModel->deleteValidation($article['id']);

            }

            //delete Articles coudn't alloate from validation table
            foreach ($invalidArticles as $article) {
                $this->validationModel->deleteValidation($article['id']);

            }



        }


        echo json_encode(1);




        // $this->view('VaultKeeper/allocateLocker');
    }

    public function removeValidations()
    {
    }
}
