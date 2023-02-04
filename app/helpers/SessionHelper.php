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
      echo '<div class="' . $class . '" id="msg-notification">' . $_SESSION[$name] . '</div>';
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

// <link rel='stylesheet' type='text/css' media='screen' href='<?php echo URLROOT?>"/css/notification.css'>
<!-- <div class="toast "> -->

    <!-- <div class="toast-content"> -->
        <!-- <i class="fas fa-solid fa-check check red"></i> -->
<!--  -->
        <!-- <div class="message"> -->
            <!-- <span class="text text-1">Success</span> -->
            <!-- <span class="text text-2">Your changes has been saved</span> -->
        <!-- </div> -->
    <!-- </div> -->
    <!-- <i class="fa-solid fa-xmark close"></i> -->


    <!-- <div class="red progress"></div> -->
<!-- </div>  -->

<!-- <script src='<?php echo URLROOT ?>/js/notification.js'></script> -->

