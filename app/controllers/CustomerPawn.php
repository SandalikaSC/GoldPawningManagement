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
        $pawning = $this->customerPawnModel->getPawnById($pawn_id);
        $article = $this->articleModel->getArticleById($pawning->Article_Id);
        $loan = $this->loanModel->getLoanByPawnId($pawn_id); 
        $paid = $this->paymentmodel->paidAmount($pawn_id); 
        $payment=$this->paymentmodel->getPawnPayments($pawn_id);
        $pawnInterest=$this->interestModel->getPawnInterest()->Interest_Rate;

        $status=$pawning->Status;
        if (strtotime($pawning->End_Date) < time()) {
            $status='Overdue';
          } 
        $data = [
            'pawning' => $pawning,
            'loan'=>$loan,
            'article'=>$article,
            'payment'=>$payment,
            'status'=>$status,
            'pawnInterest'=>$pawnInterest,
            'paid'=>$paid->Paid
        ];

        $this->view('Customer/Pawn-pay', $data);
    }
}
