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
    // var_dump($resultArr);
  

    $this->view("/Manager/managerDash", array($result1, $result2, $result3,$resultArr,$countArr));
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
    if (isset($_POST["text-area"])) {
      $complaint = $this->model('UserModel');
      $res = $complaint->getUserEmail($_POST['cusId']);

      if ($res) {
        $abc = sendMail($res->email, "send_reply", $_POST['text-area'], "Vogue Pawn");
        if ($abc == null) {
          //   $staffMem = $this->model("staffModel");
          //   $staffMem->deleteStaffMember($id);
          flashMessage("Network Error Occurd..");
          redirect('/mgDashboard');
        } else {
          flashMessage("Successfully Sent..");
          redirect('/mgDashboard');
        }
      } else {
        redirect('/mgDashboard');
      }
    } else {
      redirect('/mgDashboard');
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
}
