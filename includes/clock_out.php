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
      $timestamp = date('Y-m-d H:i:s');
      $clock_info->mode = 0;
      $clock_info->end = $timestamp;
      $clock_info->Update($clock_info->id);

      session_unset();

      echo "<p>Thanks for <b>clocking out</b>, {$employee_info->first_name}. The time now is {$timestamp}. <br/>Goodbye!</p>";
    }
    else {
      echo "<p><b>Hello, {$employee_info->first_name}.</b><br/>";
      echo "You have not clocked in yet. <a href='/?p=clockin'>Click here</a> to clock in.<p>";
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