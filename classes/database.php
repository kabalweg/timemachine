<?php

class Database {
  public $class_name;
  public $table_name;
  public $db;

  public function __construct() {
    $this->db = new PDO("mysql:host=localhost;dbname=timemachine;charset=utf8", "root", "crop", array(PDO::ATTR_EMULATE_PREPARES => false,
                                                                                                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $this->class_name = get_class($this);
    $this->table_name = strtolower($this->class_name).'s';
  }

  
  
}


?>