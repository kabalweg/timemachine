<?php

if(isset($_SESSION['is_admin'])) {
    $employee_id = 0;

    $clock = new ClockInOut();
    $clock_infos = $clock->FindReportByEmployeeId(0);

    if($clock_infos) {
      $employee = new Employee();
      echo "<table>
              <tr>
                <td class='td'>ID</td>
                <td class='td'>Employee Name</td>
                <td class='td'>Date Range</td>
                <td class='td'>Total Work Hour</td>
              </tr>";
      foreach ($clock_infos as $clock_info) {
        $employee_info = $employee->FindById($clock_info->employee_id);
        echo "<tr>
                <td>{$employee_info->id}</td>
                <td>{$employee_info->first_name} {$employee_info->last_name}</td>
                <td>{$clock_info->start} to {$clock_info->end}</td>
                <td>{$clock_info->total_work_hour}</td>
              </tr>";
      }

      echo "</table>";
    }
}
else {
  echo '<p>
          <form action="" method="POST">
            <label for="clock_in_out">Enter Employee ID:
              <input type="text" id="employee_id" name="employee_id" />
            <label for="clock_in_out">
            <input type="submit" id="submit" name="submit" value="Submit"/>
          </form>
        </p>';


  if(isset($_POST['employee_id']) && (int)$_POST['employee_id'] > 0) {
    $employee_id = (int)$_POST['employee_id'];

    $employee = new Employee();
    $employee_info = $employee->FindById($employee_id);
    if(empty($employee_info)) {
      echo '<p class="alert">No employee found! Please try another ID.</p>';
    }
    else {
      $clock = new ClockInOut();
      $clock_infos = $clock->FindReportByEmployeeId($employee_id);
      
      if($clock_infos) {
        
        echo "<table>
                <tr>
                  <td class='td'>ID</td>
                  <td class='td'>Employee Name</td>
                  <td class='td'>Date Range</td>
                  <td class='td'>Total Work Hour</td>
                </tr>";
        foreach ($clock_infos as $clock_info) {
          echo "<tr>
                  <td>{$employee_info->id}</td>
                  <td>{$employee_info->first_name} {$employee_info->last_name}</td>
                  <td>{$clock_info->start} to {$clock_info->end}</td>
                  <td>{$clock_info->total_work_hour}</td>
                </tr>";
        }

        echo "</table>";
      }
    }
  }
}
?>