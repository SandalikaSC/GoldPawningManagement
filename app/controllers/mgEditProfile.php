<?php
class mgEditProfile extends controller{
    
     public function index(){

        isLoggedIn();
        $this->view("/Manager/edit-profile");
     }

     public function manualPasswdChange(){
      isLoggedIn();
      $this->view("/Manager/manual_change_password");
     }

     public function manualEmailChange(){
      isLoggedIn();
      $this->view("/Manager/manual_change_email");
     }

     public function editProfileDetails(){
      isLoggedIn();
      $this->view("/Manager/edit-profile-details");
     }

     //to generate a OTP number
    private function randomPassword()
    {
        $alphabet = '1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 6; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

   }     
?>
