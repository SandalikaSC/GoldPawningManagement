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
        $this->PaymentModel = $this->model('payment');
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
        $data['validArticles'] = $validArticles;
        $data['allocationFee'] = $allocationFee;


        $allocateMy = null;
        if (!empty($CustomerLockers) && !empty($validArticles)) {

            while (!empty($CustomerLockers)) {
                $allocateMy[] = array_shift($validArticles);
                $locker = array_shift($CustomerLockers);
                $allocateMy[count($allocateMy) - 1]->lockerNo = $locker->lockerNo;
            }
            // var_dump($CustomerLockers);
            // var_dump($allocateMy);
        }
        $reserve = null;
        $lockersPay = 0; //lockers that have to pay
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
        if (empty($validArticles)) {
            $data['notreserve'] = null;
        } else {
            $data['notreserve'] = $validArticles;
        }
        if (empty($reserve)) {
            $data['reserve'] = null;
        } else {
            $data['reserve'] = $reserve;
        }
        if (empty($allocateMy)) {
            $data['allocateMy'] = null;
        } else {
            $data['allocateMy'] = $allocateMy;
        }
        if (empty($duration)) {
            $data['duration'] = null;
        } else {
            $data['duration'] = $duration;
        }
        if (empty($invalidArticles)) {
            $data['invalidArticles'] = null;
        } else {
            $data['invalidArticles'] = $invalidArticles;
        }

 
        // $data['reserve'] = $reserve;
        // $data['duration'] = $duration;
        // $data['notreserve'] = $validArticles;
        $data['lockersPay'] = $lockersPay;
        // $data['allocateMy'] = $allocateMy;

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

            if (!empty($article_id)) {
                $this->LockerModel->updateLockerArticles($allocation['lockerNo'], "Not Available");
                $this->reservationModel->addLockerReserved($allocation, $article_id);
                // delete validated
                $this->validationModel->deleteValidation($allocation['id']);
            } else {
                notification("newAllocation", "Somthing went wrong ", "red");
                echo json_encode(0);
            }
        }

        $PreAlocker = 0;
        foreach ($reserved as $allocation) {

            $Rate = $this->rateingModel->getRateIdByKaratage($allocation['karatage']);
            $article_id = $this->articleModel->addArticle($allocation, $Rate);

            if (!empty($article_id)) {
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
                    $reservationId = $this->reservationModel->addNewReservation($allocation, $article_id, $retrieve, $payment);
                    $this->PaymentModel->addCashLockerPayment($payment, $reservationId);
                    // //delete validated
                    $this->validationModel->deleteValidation($allocation['id']);
                }
            } else {


                notification("newAllocation", "Somthing went wrong", "red");
                echo json_encode(0);
            }
        }
        // delete invalid articles from validation tableF
        if (!empty($notreserve)) {
            foreach ($notreserve as $article) {
                $this->validationModel->deleteValidation($article['id']);
            }
        }

        // delete Articles coudn't alloate from validation table
        if (!empty($invalidArticles)) {
            foreach ($invalidArticles as $article) {
                $this->validationModel->deleteValidation($article['id']);
            }
        }

        //send emai
        //gererate reciept
        notification("VkDash", "Lockers Allocated Successfully", "gold");
        echo json_encode(1);
    }






    // $this->view('VaultKeeper/allocateLocker');


    public function removeValidations($cusid)
    {
        $status = $this->validationModel->deleteValidatedbyCustomer($cusid);
        if ($status) {
            notification("VkDash", $cusid . "'s Validations Removed", "red");
            echo json_encode(1);
        } else {
            notification("newAllocation", "Something went wrong", "red");
            echo json_encode(0);
        }
    }
}
