<?php
  namespace App\Classes;
  // this is session class

  class Session{

    public static function init(){
      session_start();
    }

    public function destroy(){
      session_destroy();
      header('location:login.php');
      exit();
    }

    public static function set($key,$value){
      $_SESSION[$key] = $value;
    }

    public static function get($key){
      if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
      }
      else {
        return FALSE;
      }
    }

    public function check(){
      self::init();
      if (self::get('login')==FALSE) {
        self::destroy();
      }
    }

    public static function checklogin(){
      self::init();
      if (self::get('login')==true) {
        header('location:index.php');
        exit();
      }
    }

  }
