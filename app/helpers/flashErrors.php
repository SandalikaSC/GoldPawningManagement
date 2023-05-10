<?php
function flashMessage($message=null,$check=null){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(empty($message)){
        if(isset($_SESSION['message']) and $_SESSION['msgTag']){
            $_SESSION['msgTag'] = false;
        }
        elseif(isset($_SESSION['message']) and !$_SESSION['msgTag']){
            unset($_SESSION['message']);
            unset($_SESSION['check']);
        }
    }
    else{
        $_SESSION['message'] = $message;
        $_SESSION['check']=$check;
        $_SESSION['msgTag']=true;
    }
}


?>