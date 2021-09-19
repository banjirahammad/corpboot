<?php
  require '../vendor/autoload.php';

  use  App\Classes\Session;
  Session::init();

  if (Session::get('login') != FALSE) {
    header('location:dashbord.php');
  }else {
    header('location:login.php');
  }
