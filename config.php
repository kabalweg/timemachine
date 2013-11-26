<?php
define('INC', 'includes');
define('CSS_ASSETS', 'assets/css');
define('CLASSES', 'classes');

error_reporting(E_ALL);

function class_autoloader($class_name) {
  require_once CLASSES.'/'.$class_name.'.php';
}

spl_autoload_register('class_autoloader');


?>