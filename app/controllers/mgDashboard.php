<?php
class mgDashboard extends controller
{
  public function __construct()  //to display a flash message
  {
    flashMessage();
  }

  //for displaying manager dashboard
  public function index()
  {

    isLoggedIn();
    // $staff = $this->model("staffModel"); 
    // $result = $staff->loadProfilePicture($_SESSION['user_email']);
    // $_SESSION['profile_pic'] = $result->image;

    $goldRates = $this->model('mgDashboardModel');  //to display gold rates
    $result1 = $goldRates->loadGoldRates();

    $interest = $this->model('mgDashboardModel');  //to get a loan interest
    $result2 = $interest->loadInterest();

    $complaint = $this->model('mgDashboardModel');  //to load all complaints
    $result3 = $complaint->loadComplaints();

    $incomeAndExp = $this->model('mgDashboardModel'); //to derive the income and expenditure from the database
    $resultArr = $incomeAndExp->deriveIncomeAndExpen();

    $count = $this->model('mgDashboardModel');  //to get values for the summary
    $countArr = $count->countAll();

    $today = date("Y-m-d");
    $note = $this->model('mgDashboardModel')->viewNote($_SESSION['user_id'],$today); //to view notes
   

    $this->view("/Manager/managerDash", array($result1, $result2, $result3,$resultArr,$countArr,$note));
  }


//to remove complaints in complaint section
  public function removeComplaint($cid)
  {
    isLoggedIn();
    $complaint = $this->model("staffModel");
    $data = $complaint->deleteComplaint($cid);
    flashMessage("Complaint Deleted..",1);
    redirect('/mgDashboard');
  }


  //for replying to complaint
  public function sendReplyForComplaints()
  {
    if (!empty($_POST["text-area"])) {
      $complaint = $this->model('staffModel');
      $res = $complaint->getUserEmail($_POST['cusId']);

      if ($res) {
        $abc = sendMail($res->email, "send_reply", $_POST['text-area'], "Vogue Pawn");
        if ($abc == null) {
          echo "failed";
          flashMessage("Network Error Occurd..",0);
          
        } else {
          echo "done";
          flashMessage("Successfully Sent..",1);
          
        }
      } else {
          echo "failed";
          flashMessage("This Customer couldn't find",0);
       
      }
    } else {
      echo "failed";
      flashMessage("Please type again the reply",0);

    }
  }


  //to check whether some complaint is viewed or not.
  public function updateStatusOfComplaints($cid){
    $obj = $this->model('mgDashboardModel');
    $result= $obj->updateStatus($cid);
  }


  //to add a note
  public function setNote(){
    if(isset($_POST['noteTitle']) AND isset($_POST['noteDate']) AND isset($_POST['noteContent'])){
      isLoggedIn();
      $note = $this->model('mgDashboardModel')->addNote($_SESSION['user_id'],$_POST['noteTitle'],$_POST['noteDate'],$_POST['noteContent']);
      flashMessage("Note Added",1);
      redirect("/mgDashboard/index");

    }else{
      flashMessage("Fill form correctly",0);
      redirect("/mgDashboard/index");
    }

  }
}
