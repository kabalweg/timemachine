<?php
if(!isset($_SESSION)) {
  session_start();
}

$page = strtolower($_REQUEST['p']);

switch ($page) {
  case 'home':
    $title = "Home";
    $page = 'home.php';
    break;
  case 'about':
    $title = "About";
    $page = 'about.php';
    break;
  case 'user':
    $title = "User";
    $page = 'user.php';
    break;
  case 'admin':
    $title = "Admin";
    $page = 'admin.php';
    break;
  case 'report':
    $title = "Reports";
    $page = 'report.php';
    break;
  case 'clockout':
  default:
    $title = "Clock Out";
    $page = 'clock_out.php';
    break;
  case 'clockin':
  default:
    $title = "Clock In";
    $page = 'clock_in.php';
    break;
}

require_once 'config.php';

require_once INC.'/header.php';
require_once INC.'/'.$page;
require_once INC.'/footer.php';
?>