<?php
// Load Config
require_once 'config/config.php';

/* Helpers */

require_once 'helpers/UrlHelper.php';
require_once 'helpers/SessionHelper.php';
require_once 'helpers/mailHelper.php';
require_once 'helpers/flashErrors.php';


// Autoload Core Libraries
spl_autoload_register(function ($className) {
  require_once 'libraries/' . $className . '.php';
});