<?php
if(isset($_POST['employee_id']) && (int)$_POST['employee_id'] > 0) {
  $employee_id = (int)$_POST['employee_id'];

  $employee = new Employee();
  $employee_info = $employee->FindById($employee_id);
  if(empty($employee_info)) {
    echo '<p class="alert">No employee found! Please try another ID.</p>';
  }
  else {
    $clock = new ClockInOut();
    $clock_info = $clock->FindByEmployeeId($employee_id, 1);
    
    if($clock_info) {
      echo "<p><b>Hello, {$employee_info->first_name}.</b><br/>";
      echo "You already clocked in on <b>{$clock_info->start}</b>. <a href='/?p=clockout'>Clock out</a> instead?<p>";
    }
    else {
      $timestamp = date('Y-m-d H:i:s');
      $clock->employee_id = $employee_id;
      $clock->start = $timestamp;
      $clock->end = null;
      $clock->Insert();

      $_SESSION['is_admin'] = $employee_info->is_admin;
      $_SESSION['first_name'] = $employee_info->first_name;

       echo "<p>Welcome back, {$employee_info->first_name}. Thanks for <b>clocking in.</b>. The time now is {$timestamp}.</p>";
    }
  }
}
?>

<p>
  <form action="" method="POST">
    <label for="clock_in_out">Enter Employee ID:
      <input type="text" id="employee_id" name="employee_id" />
    <label for="clock_in_out">
    <input type="submit" id="submit" name="submit" value="Submit"/>
  </form>
</p>