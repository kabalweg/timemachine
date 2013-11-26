<?php

class ClockInOut extends Database {

  public $id;
  public $employee_id;
  public $start;
  public $end;

  public function __construct() {
    parent::__construct();
  }

  public function FindByEmployeeId($employee_id, $mode = 1) {
    $q = "SELECT  id,
                  employee_id,
                  start,
                  end
          FROM {$this->table_name}
          WHERE employee_id = ?";
    $q .= ($mode == 1 ? " AND end IS NULL " : " AND end IS NOT NULL");
    $q .= " ORDER BY id DESC
            LIMIT 1";

    $st = $this->db->prepare($q);
    $st->setFetchMode(PDO::FETCH_CLASS, $this->class_name);
    $st->execute(array($employee_id));
    return $st->fetch();
  }

  public function FindReportByEmployeeId($employee_id) {
    $q = "SELECT employee_id,
            DATE_FORMAT(start, '%Y-%m-%d') start,
            DATE_FORMAT(end, '%Y-%m-%d') end,
            (SUM(TIMESTAMPDIFF(MINUTE, start, end)) / 60) AS total_work_hour
          FROM {$this->table_name} ";
    $q .= " WHERE 1 = 1 ";
    $q .= ($employee_id > 0 ? " AND employee_id = ? " : "");
    $q .= " AND end IS NOT NULL
            AND end >= DATE_SUB(DATE_FORMAT(NOW(), '%Y-%m-%d'), INTERVAL 7 DAY)
            GROUP BY employee_id,
                    DATE_FORMAT(start, '%Y-%m-%d'),
                    DATE_FORMAT(end, '%Y-%m-%d')";
          
    $st = $this->db->prepare($q);
    $st->setFetchMode(PDO::FETCH_OBJ);
    if($employee_id > 0)
      $st->execute(array($employee_id));
    else
      $st->execute();
    return $st->fetchAll();
  }

  public function Update($id) {
    $q = "UPDATE {$this->table_name}
          SET employee_id = ?,
              start = ?,
              end = ?
          WHERE id = ?";
    
    $st = $this->db->prepare($q);
    $st->execute(array($this->employee_id, $this->start, $this->end, $id));
    return $st->rowCount();
  }

  public function Insert() {
    $q = "INSERT INTO {$this->table_name}
            (employee_id,
              start,
              end)
          VALUES (
              ?,
              ?,
              ?
          )";
    
    $st = $this->db->prepare($q);
    $st->execute(array($this->employee_id, $this->start, $this->end));
    return $st->rowCount();
  }
}

?>