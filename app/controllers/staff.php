<?php
class Staff extends Controller
{
  public function __construct()
  {
    flashMessage();
  }
  public function index($msg = null)  //viewing staff dashboard function
  {
    isLoggedIn();
    $staff = $this->model("staffModel");
    $result = $staff->getStaffMember();
    $this->view("/Manager/staff_dashboard", array($result, $msg));
  }


  public function addNew($alert = null)
  {
    isLoggedIn();
    $this->view("/Manager/add_employee", $alert);
  }

  private function randomPassword()
  {
    $pass = array(); //remember to declare $pass as an array
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 2; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
    }

    $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 2; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
    }

    $alphabet = '1234567890';
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 2; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
    }

    $alphabet = '~!@#$%^&*()_+-?><=|\/:;';
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 2; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
    }


    return implode($pass); //turn the array into a string
  }


  public function setStaffMember()
  {
    isLoggedIn(); //checks whether user is already logged
    $staffMem = $this->model("staffModel");
    $NIC = $this->model('staffmodel');
    $row = $staffMem->emailExist($_POST["email"]);
    $row2 = $NIC->nicExist($_POST["nic"]);
    $phone = $this->model('staffmodel');
    $row3 = $phone->phoneExist($_POST["mob-no"]);

    $randPassword = $this->randomPassword();  //generate a random password
    $hash = password_hash($randPassword, PASSWORD_BCRYPT); //hash the password
    $id = $this->model('staffModel')->getStaffId($_POST['role']);
    ++$id;
    if ($staffMem->rowCount() > 0 or $NIC->rowCount()>0 or $phone->rowCount()>0) {
      if($staffMem->rowCount() > 0 and $NIC->rowCount()>0  and $phone->rowCount()>0){
        flashMessage("NIC, Email and Phone Number already Exists");
      }
      else if($staffMem->rowCount() > 0 and $NIC->rowCount()>0){
        flashMessage("Email and NIC already exist");
      } else if($staffMem->rowCount() > 0 and $phone->rowCount()>0){
        flashMessage("Email and Phone number already exist");
      } else if($NIC->rowCount() > 0 and $phone->rowCount()>0){
        flashMessage("NIC and Phone number already exist");
      }
      else if($NIC->rowCount()>0){
        flashMessage("NIC already exists");
      }else if($staffMem->rowCount() > 0){
        flashMessage("Email already exists");
      }else if($phone->rowCount() > 0){
        flashMessage("Phone number already exist");
      }
      redirect('/staff/addNew');
    } else {
      $staffMem = $this->model("staffModel");
      $result = $staffMem->addStaffMember($id,$_POST['fName'], $_POST['lName'], $_POST['gender'], $_POST['nic'], $_POST['dob'], $_POST['lane1'], $_POST['lane2'], $_POST['lane3'], $_POST['mob-no'], $_POST['mob-no2'], $_POST['email'], $_POST['role'], $_POST['image'], $hash);

      if ($result) {
        $abc = sendMail($_POST['email'], "staff_reg", $randPassword, $_POST['fName'] . $_POST['lName']);
        if($abc == null){
          $staffMem = $this->model("staffModel");
          $staffMem->deleteStaffMember($id);
          flashMessage("Network Error Occurd..");
          redirect('/staff/addNew');
        }else{
          redirect('/staff/index/success');        
        }    

      } else {
        redirect('/staff/addNew');
      }
    }
  }

  //view staff memeber function
  public function viewStaffMember($id)
  {
    isLoggedIn();
    $staffMem = $this->model("staffModel");
    $data = $staffMem->viewStaffMember($id);
    $this->view("/Manager/view-employee", $data);
    
  }


  //view 'confirm delete' confirmation box
  public function confirmDelete($id)
  {
    isLoggedIn();
    $staffMem = $this->model("staffModel");
    $result = $staffMem->viewStaffMember($id);
    $this->view("/Manager/delete-employee", $result);
  }



  public function deleteEmployee($id)
  {
    isLoggedIn();
    $staffMem = $this->model("staffModel");
    $dd = $staffMem->deleteStaffMember($id);
    if (!$dd) {
      redirect("staff/confirmDelete/$id");
    } else {
      redirect("staff/index/delsuccess");
    }
  }
  
  
  
 
}


