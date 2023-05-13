<?php
class ownerDashboard extends controller{  

     //for displaying manager dashboard
  public function index()
  {
    isLoggedIn();
    // $staff = $this->model("staffModel");
    // $result = $staff->loadProfilePicture($_SESSION['user_email']);
    // $_SESSION['profile_pic'] = $result->image;
    // $_SESSION['mg_name'] = $result->Name;

    $goldRates = $this->model('mgDashboardModel');  //load gold rates
    $result1 = $goldRates->loadGoldRates();

    $interest = $this->model('mgDashboardModel');  //load loan interest
    $result2 = $interest->loadInterest();

    $complaint = $this->model('mgDashboardModel');  //load complaints
    $result3 = $complaint->loadComplaints();

    
    $incomeAndExp = $this->model('mgDashboardModel'); //derive income and expenditure
    $resultArr = $incomeAndExp->deriveIncomeAndExpen();

    $count = $this->model('mgDashboardModel');  //count the summary
    $countArr = $count->countAll();

    $today = date("Y-m-d");     //view note
    $note = $this->model('mgDashboardModel')->viewNote($_SESSION['user_id'],$today);
   

    $this->view("/Owner/ownerDash", array($result1, $result2, $result3,$resultArr,$countArr,$note));
  }

 //to load the chart date when the year is selected.
 public function loadChartData($year)
  {

    isLoggedIn();
    $incomeAndExp = $this->model('mgDashboardModel');
    $resultArr = $incomeAndExp->deriveIncomeAndExpenInGivenYear($year);
    echo json_encode($resultArr);

  }

  //to create notes
  public function setNote(){
    if(isset($_POST['noteTitle']) AND isset($_POST['noteDate']) AND isset($_POST['noteContent'])){
      isLoggedIn();
      $note = $this->model('mgDashboardModel')->addNote($_SESSION['user_id'],$_POST['noteTitle'],$_POST['noteDate'],$_POST['noteContent']);
      redirect("/ownerDashboard/index");

    }

  }

  //to generate the report of income and expenditure
  public function generateReport($year){
    $this->view("pages/incomeAndExpenditureReport",$year);
  }

 
}
?>