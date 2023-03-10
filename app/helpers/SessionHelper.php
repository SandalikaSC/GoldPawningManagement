<?php
session_start();

// Flash message helper
// EXAMPLE - flash('register_success', 'You are now registered');
// DISPLAY IN VIEW - echo flash('register_success');


function flash($name = '', $message = '', $class = 'invalid')
{
  if (!empty($name)) {
    if (!empty($message) && empty($_SESSION[$name])) {
      if (!empty($_SESSION[$name])) {
        unset($_SESSION[$name]);
      }

      if (!empty($_SESSION[$name . '_class'])) {
        unset($_SESSION[$name . '_class']);
      }

      $_SESSION[$name] = $message;
      $_SESSION[$name . '_class'] = $class;
    } elseif (empty($message) && !empty($_SESSION[$name])) {
      $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';


      echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';


      unset($_SESSION[$name]);
      unset($_SESSION[$name . '_class']);
    }
  }
}


function notification($name = '', $message = '', $class = 'gold')
{
  if (!empty($name)) {
    if (!empty($message) && empty($_SESSION[$name])) {
      if (!empty($_SESSION[$name])) {
        unset($_SESSION[$name]);
      }

      if (!empty($_SESSION[$name . '_class'])) {
        unset($_SESSION[$name . '_class']);
      }

      $_SESSION[$name] = $message;
      $_SESSION[$name . '_class'] = $class;
    } elseif (empty($message) && !empty($_SESSION[$name])) { 
      $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
         
      if ($class=='gold') {
        $title="Success";
      }else if ($class=='red') {
        $title="Error";
      }else if ($class=='black') {
        $title="Suggession";
      }  
      echo '
      <link rel="stylesheet" href="'.URLROOT .'/css/notification.css" type="text/css" media="screen" >
      <div class="toast">
      
      <div class="toast-content">
          <i class="fas fa-solid fa-check check '.$class .'"></i>
  
          <div class="message">
              <span class="text text-1"> '.$title .'</span>
              <span class="text text-2">'. $_SESSION[$name] .'</span>
          </div>
      </div>
      <i class="fa-solid fa-xmark close"></i>
  
      
      <div class="'.$class .' progress" ></div>
  </div>
  <script src="'.URLROOT.'/js/notification.js"></script>'; 
      unset($_SESSION[$name]);
      unset($_SESSION[$name . '_class']);
    }
  }
}

function isLoggedIn()
{
if (isset($_SESSION['user_id'])) {
return true;
} else {
return false;
}
}


