<?php

  /**
   *this is database class
   */
  namespace App\Classes;
  use mysqli;

  require_once '../config/config.php';

  class Database
  {
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASSWORD;
    public $db_name = DB_NAME;
    public $error;
    public $conn;

    public function __construct()
    {
      $this->connectDb();
    }

    private function connectDb()
    {
      $this->conn = new mysqli($this->host,$this->user,$this->pass,$this->db_name);
      if (!$this->conn) {
        $this->error =  'connection Failed'.$this->conn->connect_error;
        return FALSE;
      }
    }

    public function select($query){
      $result = $this->conn->query($query) or die($this->conn->error.__LINE__);
      // print_r($result);
      if($result->num_rows > 0){
        return $result;
      }
      else {
        return FALSE;
      }
    }

    public function insert($query){

      $insert = $this->conn->query($query) or die($this->conn->error.__LINE__);
      if ($insert) {
        return $insert;
      }
      else {
        return FALSE;
      }

    }

    public function update($query){

      $update = $this->conn->query($query) or die($this->conn->error.__LINE__);
      if ($update) {
        return $update;
      }
      else {
        return FALSE;
      }

    }

    public function delete($query){

      $result = $this->conn->query($query) or die($this->conn->error.__LINE__);
      if ($result) {
        return $result;     }
      else {
        return FALSE;
      }

    }

    public function user_info_exist($query){
      $result = $this->conn->query($query) or die($this->conn->error.__LINE__);
      // print_r($result);
      if($result->num_rows > 0){
        return 1;
      }
      else {
        return 0;
      }
    }

  }
