<?php

class Employee extends Database {

  public $id;
  public $first_name;
  public $last_name;
  public $is_admin;

  public function __construct() {
    parent::__construct();
  }

  public function FindById($employee_id) {
    $q = "SELECT  id,
                  first_name,
                  last_name,
                  is_admin
          FROM {$this->table_name}
          WHERE id = ?
          LIMIT 1";

    $st = $this->db->prepare($q);
    $st->setFetchMode(PDO::FETCH_CLASS, $this->class_name);
    $st->execute(array($employee_id));
    return $st->fetch();
  }

  public function All() {
    $q = "SELECT  id,
                  first_name,
                  last_name,
                  is_admin
          FROM {$this->table_name}";

    $st = $this->db->prepare($q);
    $st->setFetchMode(PDO::FETCH_CLASS, $this->class_name);
    $st->execute();
    return $st->fetchAll();
  }

  public function Insert() {
    $q = "INSERT INTO {$this->table_name}
            (first_name,
              last_name,
              is_admin)
          VALUES (
              ?,
              ?,
              ?
          )";

    $st = $this->db->prepare($q);
    $st->execute(array($this->first_name, $this->last_name, $this->is_admin));
    return $st->rowCount();
  }
}

?>