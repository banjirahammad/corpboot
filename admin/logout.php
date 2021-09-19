<?php
  require_once '../vendor/autoload.php';

  use  App\Classes\Session;

  $session = new Session();

  Session::init();
  $session->destroy();







 ?>
