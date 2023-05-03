<?php
class mgDashboard extends controller
{
  public function __construct()
  {
    flashMessage();
  }

  //for displaying manager dashboard
  public function index()
  {

    isLoggedIn();
    $staff = $this->model("staffModel");
    $result = $staff->loadProfilePicture($_SESSION['user_email']);
    $_SESSION['profile_pic'] = $result->image;
    $_SESSION['mg_name'] = $result->Name;

    $goldRates = $this->model('mgDashboardModel');
    $result1 = $goldRates->loadGoldRates();

    $interest = $this->model('mgDashboardModel');
    $result2 = $interest->loadInterest();

    $complaint = $this->model('mgDashboardModel');
    $result3 = $complaint->loadComplaints();

    $incomeAndExp = $this->model('mgDashboardModel');
    $resultArr = $incomeAndExp->deriveIncomeAndExpen();

    $count = $this->model('mgDashboardModel');
    $countArr = $count->countAll();

    $today = date("Y-m-d");
    $note = $this->model('mgDashboardModel')->viewNote($_SESSION['user_id'],$today);
   
    // var_dump($resultArr);
  

    $this->view("/Manager/managerDash", array($result1, $result2, $result3,$resultArr,$countArr,$note));
  }



  public function removeComplaint($cid)
  {
    isLoggedIn();
    $complaint = $this->model("UserModel");
    $data = $complaint->deleteComplaint($cid);
    flashMessage("Complaint Deleted..");
    redirect('/mgDashboard');
  }


  public function sendReplyForComplaints()
  {
    if (!empty($_POST["text-area"])) {
      $complaint = $this->model('UserModel');
      $res = $complaint->getUserEmail($_POST['cusId']);

      if ($res) {
        $abc = sendMail($res->email, "send_reply", $_POST['text-area'], "Vogue Pawn");
        if ($abc == null) {
          echo "failed";
          flashMessage("Network Error Occurd..");
          
        } else {
          echo "done";
          flashMessage("Successfully Sent..");
          
        }
      } else {
          echo "failed";
          flashMessage("This Customer couldn't find");
       
      }
    } else {
      echo "failed";
      flashMessage("Please type again the reply");

    }
  }


  public function incomeAndExpen()
  {
    $income = $this->model('mgDashboardModel');
    $resultArr = $income->deriveIncomeAndExpen();
    // var_dump($result);

    $monthsIncome = array();
    $amountsIncome = array();
    $monthsExpen = array();
    $amountsExpen = array();

    // Store the paid month and total amount in separate arrays
    if ($resultArr[0]->num_rows > 0) {
      foreach ($resultArr[0] as $row) {
        // $month = date("F", mktime(0, 0, 0, $row['Month'], 1, $row['Year']));
        $month=$row['Month'];
        $totIncome = $row['totalIncome'];
        array_push($monthsIncome, $month);
        array_push($amountsIncome, $totIncome);
      }
    }
    
    // Store the paid month and total amount in separate arrays
    if ($resultArr[1]->num_rows > 0) {
      foreach ($resultArr[1] as $row) {
        // $month = date("F", mktime(0, 0, 0, $row['Month'], 1, $row['Year']));
        $month=$row['Month'];
        $totIncome = $row['totalExpen'];
        array_push($monthsExpen, $month);
        array_push($amountsExpen, $totIncome);
      }
    }

  }

  public function updateStatusOfComplaints($cid){
    $obj = $this->model('mgDashboardModel');
    $result= $obj->updateStatus($cid);
  }

  public function setNote(){
    if(isset($_POST['noteTitle']) AND isset($_POST['noteDate']) AND isset($_POST['noteContent'])){
      isLoggedIn();
      $note = $this->model('mgDashboardModel')->addNote($_SESSION['user_id'],$_POST['noteTitle'],$_POST['noteDate'],$_POST['noteContent']);
      redirect("/mgDashboard/index");

    }

  }
}
