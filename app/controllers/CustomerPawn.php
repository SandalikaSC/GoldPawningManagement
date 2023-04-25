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




        $data = [
            'pawnings' => $pawning
        ];
        if (empty($pawning)) {
            $data['interest'] = (array) null;
        }

        $this->view('Customer/pawnArticles', $data);
    }
    public function viewPawnArticle($pawn_id)
    {
        
        $pawning = $this->customerPawnModel->goldLoanDetails($pawn_id);
        $paid = $this->paymentmodel->paidAmount($pawn_id);
        $interestAmount=$pawning->Amount *$pawning->Interest/100;
        $payment=$this->paymentmodel->getPawnPayments($pawn_id); 
        $status=$pawning->Status;
        if (strtotime($pawning->End_Date) < time()) {
            $status='Overdue';
          } 


        $data = [
            'goldLoan' => $pawning,
            'paid'=>$paid->Paid,
            'status'=>$status,
            'payment'=>$payment,
            'interestAmount'=>$interestAmount
        ];
        // if (empty($pawning)) {
        //     $data['goldLoan'] = (array) null;
        // }

        $this->view('Customer/article_pawn', $data);
    }
    public function makePayment($pawn_id)
    { 
        $locker = $this->lockermodel->AvailableCustomerArticles($_SESSION['user_id']);

        if (empty($locker)) {
             $locker=$this->lockermodel->getAvailableLocker();
        }
        $pawning = $this->customerPawnModel->getPawnById($pawn_id);
        $article = $this->articleModel->getArticleById($pawning->Article_Id);
        $loan = $this->loanModel->getLoanByPawnId($pawn_id); 
        $paid = $this->paymentmodel->paidAmount($pawn_id); 
        $principle= $this->paymentmodel->paidPrincipleAmount($pawn_id); 
        $payment=$this->paymentmodel->getPawnPayments($pawn_id);
        $pawnInterest=$this->interestModel->getPawnInterest()->Interest_Rate;
        $reserveInterest=$this->interestModel->getAllocationInterest()->Interest_Rate;
        $delivery=$this->interestModel->getdelivaryRate()->Interest_Rate;

        $locker = $this->lockermodel->AvailableCustomerArticles($_SESSION['user_id']);

        if (empty($locker)) {
             $locker=$this->lockermodel->getAvailableLocker();
        }

        $tomorrow = new DateTime('tomorrow');
        $tomorrowFormatted = $tomorrow->format('Y-m-d');
        $timeSlots = $this->appointment->getSlotsNotIn($tomorrowFormatted);

        $status=$pawning->Status;
        if (strtotime($pawning->End_Date) < time()) {
            $status='Overdue';
          } 
        $data = [
            'pawning' => $pawning,
            'locker' => $locker,
            'loan'=>$loan,
            'locker'=>$locker,
            'article'=>$article,
            'payment'=>$payment,
            'status'=>$status,
            'pawnInterest'=>$pawnInterest,
            'reserveInterest'=>$reserveInterest,
            'delivery'=>$delivery,
            'paid'=>$paid->Paid,
            'principle'=>$principle->PaidPrinciple,
            'timeslot'=>$timeSlots
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
