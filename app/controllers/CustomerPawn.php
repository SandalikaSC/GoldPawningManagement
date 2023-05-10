<?php
class CustomerPawn extends Controller
{

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('/Users');
        }
        $this->customerPawnModel = $this->model('Pawning');
        $this->interestModel = $this->model('interest');
        $this->articleModel = $this->model('article');
        $this->deliveryModel = $this->model('delivery');
        $this->loanModel = $this->model('loan');
        $this->appointment = $this->model('Appointment');
        $this->paymentmodel = $this->model('payment');
        $this->lockermodel = $this->model('Locker');
        $this->reservationModel = $this->model('reservation');
    }



    public function index()
    {
        $pawning = $this->customerPawnModel->getPawnByUserID($_SESSION['user_id']);

        foreach ($pawning as &$pawn) {
            // Check the status of the pawn and set the status field accordingly
            if ($pawn->Status == 'Completed' || $pawn->Status == 'Retrieved') {
                if (empty($pawn->Redeemed_Date)) {
                    $pawn->updated_status = 'Completed';
                } else {
                    $pawn->updated_status = 'Retrieved';
                }
            } else  if ($pawn->Status == 'Auctioned') {
                $pawn->updated_status = 'Auctioned';
            } else if ($pawn->Status == 'Pawned') {
                $current_date = date('Y-m-d');
                $retrieve_date = $pawn->End_Date;
                if (strtotime($retrieve_date) < strtotime($current_date)) {
                    $pawn->updated_status = 'Overdue';
                } else {
                    $pawn->updated_status = 'Pawned';
                }
            }
        }
        $data = [
            'pawnings' => $pawning
        ];


        $this->view('Customer/pawnArticles', $data);
    }
    public function viewPawnArticle($pawn_id)
    {


        $pawning = $this->customerPawnModel->goldLoanDetails($pawn_id);
        $paid = $this->paymentmodel->paidAmount($pawn_id);
        $paid->Paid = ceil($paid->Paid);

        $paidPrinciple = $this->paymentmodel->paidPrincipleAmount($pawn_id);
        $paidPrinciple->PaidPrinciple = ceil($paidPrinciple->PaidPrinciple);

        $interestAmount = $pawning->Amount * $pawning->Interest / 100;
        $payment = $this->paymentmodel->getPawnPayments($pawn_id);

        if ($pawning->Status == 'Completed' || $pawning->Status == 'Retrieved') {
            if (empty($pawning->Redeemed_Date)) {
                $status = 'Completed';
            } else {
                $status = 'Retrieved';
            }
        } else  if ($pawning->Status == 'Auctioned') {
            $status = 'Auctioned';
        } else if ($pawning->Status == 'Pawned') {
            $current_date = date('Y-m-d');
            $retrieve_date = $pawning->End_Date;
            if (strtotime($retrieve_date) < strtotime($current_date)) {
                $status = 'Overdue';
            } else {
                $status = 'Pawned';
            }
        }

        $data = [
            'goldLoan' => $pawning,
            'paid' => $paid->Paid,
            'paidPrinciple' => $paidPrinciple->PaidPrinciple,
            'status' => $status,
            'payment' => $payment,
            'interestAmount' => $interestAmount
        ];
        $this->view('Customer/article_pawn', $data);
    }
    public function makePayment($pawn_id)
    {
        //     $locker = $this->lockermodel->AvailableCustomerArticles($_SESSION['user_id']);

        //     if (empty($locker)) {
        //         $locker = $this->lockermodel->getAvailableLocker();
        //     }

        $pawning = $this->customerPawnModel->getPawnById($pawn_id);
        $article = $this->articleModel->getArticleById($pawning->Article_Id);
        $loan = $this->loanModel->getLoanByPawnId($pawn_id);

        $paid = $this->paymentmodel->paidAmount($pawn_id);
        $paid->Paid = ceil($paid->Paid);

        $principle = $this->paymentmodel->paidPrincipleAmount($pawn_id);
        $principle->PaidPrinciple = ceil($principle->PaidPrinciple);

        $payment = $this->paymentmodel->getPawnPayments($pawn_id);

        $pawnInterest = $this->interestModel->getPawnInterest()->Interest_Rate;
        $reserveInterest = $this->interestModel->getAllocationInterest()->Interest_Rate;
        $delivery = $this->interestModel->getdelivaryRate()->Interest_Rate;

        $mylockers = $this->lockermodel->AvailableCustomerArticles($_SESSION['user_id']); //get available customer lockers


        $locker = $this->lockermodel->getAvailableLocker(); //get available lockes


        $tomorrow = new DateTime('tomorrow');
        $tomorrowFormatted = $tomorrow->format('Y-m-d');
        $timeSlots = $this->appointment->getSlotsNotIn($tomorrowFormatted);

        $status = $pawning->Status;
        // if (strtotime($pawning->End_Date) < time()) {

        //     $status = 'Overdue';
        // }
        if ($pawning->Status == 'Completed' || $pawning->Status == 'Retrieved') {
            if (empty($pawning->Redeemed_Date)) {
                $status = 'Completed';
            } else {
                $status = 'Retrieved';
            }
        } else  if ($pawning->Status == 'Auctioned') {
            $status = 'Auctioned';
        } else if ($pawning->Status == 'Pawned') {
            $current_date = date('Y-m-d');
            $retrieve_date = $pawning->End_Date;

            if ($pawning->WarningOne == 1 || $pawning->WarningTwo == 1) {
            }
            if (strtotime($retrieve_date) < strtotime($current_date)) {
                $status = 'Overdue';
            } else if ($pawning->WarningOne == 1 || $pawning->WarningTwo == 1) {
                $status = 'Overdue';
            } else {
                $status = 'Pawned';
            }
        }
        $toPayInst = 0;
        if ($loan->Repay_Method == 'Fixed') {
            $toPayInst = 12 - $paid->Paid / $loan->monthly_installment;
        }
        $today = date('Y-m-d'); // Get today's date in 'YYYY-MM-DD' format
        $extendto = date('Y-m-d', strtotime('+6 months', strtotime($today)));
       $topayPrinciple=$loan->Amount-$principle->PaidPrinciple;

            $data = [
                'pawning' => $pawning,
                'locker' => $locker,
                'loan' => $loan,
                'extendTo' => $extendto,
                'locker' => $locker,
                'mylockers' => $mylockers,
                'article' => $article,
                'payment' => $payment,
                'status' => $status,
                'pawnInterest' => $pawnInterest,
                'reserveInterest' => $reserveInterest,
                'delivery' => $delivery,
                'paid' => $paid->Paid,
                'topayPrinciple' => $topayPrinciple,
                'toPayInst' => $toPayInst,
                'principle' => $principle->PaidPrinciple,
                'timeslot' => $timeSlots
            ];

        $this->view('Customer/Pawn-pay', $data);
    }
    public function getTimeSlots()
    {

        if (isset($_POST["date"])) {
            $date =  $_POST["date"];
            $data = $this->appointment->getSlotsNotIn($date);

            echo json_encode($data);
        }
    }
}
