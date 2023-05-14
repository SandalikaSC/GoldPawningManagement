<?php 

class mgLogout extends Controller{
  
    public function index(){
        // $_SESSION['last_seen']=date("h:i:sa");
        // $staffMem = $this->model("staffModel");
        // $result = $staffMem->setLastSeen($_SESSION['last_seen'], $_SESSION["user"]);
       
        session_start();
        session_unset();
        session_destroy();
        redirect('mgLogin');

    }
}
?>