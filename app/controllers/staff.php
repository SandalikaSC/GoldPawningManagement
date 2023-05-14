<?php
class Staff extends Controller
{
  public function __construct()
  {
    flashMessage();
  }

  //to get all staff members.
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

  //to generate the password
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

//to get the DOB from the NIC card
  public function getDOB($nic)
  {
    $dayText = 0;
    $year = "";
    $month = "";
    $day = "";
    if (strlen($nic) == 10) {
      $set = substr($nic, 0, 2);
      $year = "19$set";
      $dayText = substr($nic, 2, 3);
    } else {
      $year = substr($nic, 0, 4);
      $dayText = substr($nic, 4, 3);
    }
    if ($dayText > 500) {
      $dayText = $dayText - 500;
    }
    if ($dayText < 1 && $dayText > 366) {
      return 0;
    } else {

      //Month
      if ($dayText > 335) {
        $day = $dayText - 335;
        $month = "12";
      } else if ($dayText > 305) {
        $day = $dayText - 305;
        $month = "11";
      } else if ($dayText > 274) {
        $day = $dayText - 274;
        $month = "10";
      } else if ($dayText > 244) {
        $day = $dayText - 244;
        $month = "09";
      } else if ($dayText > 213) {
        $day = $dayText - 213;
        $month = "08";
      } else if ($dayText > 182) {
        $day = $dayText - 182;
        $month = "07";
      } else if ($dayText > 152) {
        $day = $dayText - 152;
        $month = "06";
      } else if ($dayText > 121) {
        $day = $dayText - 121;
        $month = "05";
      } else if ($dayText > 91) {
        $day = $dayText - 91;
        $month = "04";
      } else if ($dayText > 60) {
        $day = $dayText - 60;
        $month = "03";
      } else if ($dayText < 32) {
        $month = "01";
        $day = $dayText;
      } else if ($dayText > 31) {
        $day = $dayText - 31;
        $month = "02";
      }
      return "$year-$month-$day";
    }
  }

//to create staff member record.
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
    if ($staffMem->rowCount() > 0 or $NIC->rowCount() > 0 or $phone->rowCount() > 0) {  //check whether email,NIC, phone number are already exist
      if ($staffMem->rowCount() > 0 and $NIC->rowCount() > 0  and $phone->rowCount() > 0) {
        echo json_encode(array("msg" => "failed"));
        flashMessage("NIC, Email and Phone Number already Exists", 0);
      } else if ($staffMem->rowCount() > 0 and $NIC->rowCount() > 0) {
        echo json_encode(array("msg" => "failed"));
        flashMessage("Email and NIC already exist", 0);
      } else if ($staffMem->rowCount() > 0 and $phone->rowCount() > 0) {
        echo json_encode(array("msg" => "failed"));
        flashMessage("Email and Phone number already exist", 0);
      } else if ($NIC->rowCount() > 0 and $phone->rowCount() > 0) {
        echo json_encode(array("msg" => "failed"));
        flashMessage("NIC and Phone number already exist", 0);
      } else if ($NIC->rowCount() > 0) {
        echo json_encode(array("msg" => "failed"));
        flashMessage("NIC already exists", 0);
      } else if ($staffMem->rowCount() > 0) {
        echo json_encode(array("msg" => "failed"));
        flashMessage("Email already exists", 0);
      } else if ($phone->rowCount() > 0) {
        echo json_encode(array("msg" => "failed"));
        flashMessage("Phone number already exist", 0);
      }
    } else {
      $dob=$this->getDOB($_POST['nic']);
      $staffMem = $this->model("staffModel");
      $result = $staffMem->addStaffMember($id, $_POST['fName'], $_POST['lName'], $_POST['gender'], $_POST['nic'], $dob, $_POST['lane1'], $_POST['lane2'], $_POST['lane3'], $_POST['mob-no'], $_POST['mob-no2'], $_POST['email'], $_POST['role'], $_POST['image'], $hash);

      if ($result) {
        $abc = sendMail($_POST['email'], "staff_reg", $randPassword, $_POST['fName'] . $_POST['lName']);
        if ($abc == null) {
          $staffMem = $this->model("staffModel");
          $staffMem->deleteStaffMember($id);
          echo json_encode(array("msg" => "failed"));
          flashMessage("Network Error Occurd..", 0);
          
        } else {
          echo json_encode(array("msg" => "success"));
          flashMessage("Successfully Added", 1);     
        }
      } else {
        echo json_encode(array("msg" => "failed"));
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


//to delete the employee.
  public function deleteEmployee($id)
  {
    isLoggedIn();
    $staffMem = $this->model("staffModel");
    $dd = $staffMem->deleteStaffMember($id);
    if (!$dd) {
      redirect("/staff/confirmDelete/$id");
    } else {
      redirect("/staff/index/delsuccess");
    }
  }
}
