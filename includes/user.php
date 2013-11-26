<?php

if(isset($_SESSION) && $_SESSION['is_admin'] == 1) {
  $employee = new Employee();

  if(isset($_POST) && $_POST['submit']) {
    $employee->first_name = $_POST['first_name'];
    $employee->last_name = $_POST['last_name'];
    $employee->is_admin = (isset($_POST['is_admin']) ? 1 : 0);
    //var_dump($employee)
    $employee->Insert();
  }
  
  $action = isset($_GET['a']) ? $_GET['a'] : null;
  if(empty($action)) {
    echo "<p>
            <a href='/?p=user&a=new'>Add New User</a>
          </p>";
  }
  else {
    echo "<p>
            <form action='/?p=user' method='POST'>
              <table>
                <tr><td class='label'>Firstname:</td><td><input type='text' id='first_name' name='first_name'/></td></tr>
                <tr><td class='label'>Lastname:</td><td><input type='text' id='last_name' name='last_name'/></td></tr>
                <tr><td class='label'>Is Admin?:</td><td><input type='checkbox' id='is_admin' name='is_admin'/></td></tr>
                <tr><td class='label'></td><td><input type='submit' id='submit' name='submit' value='submit'/></td></tr>
              </table>
            </form>
          </p>";
  }

  echo "<table>
          <tr>
            <td class='td'>ID</td>
            <td class='td'>Firstname</td>
            <td class='td'>Lastname</td>
            <td class='td'>IsAdmin?</td>
          </tr>";

  $all_employees = $employee->All();
  foreach ($all_employees as $single_employee) {
    $is_admn = ($single_employee->is_admin == 1 ? 'Yes' : 'No');
    echo "<tr>
            <td>{$single_employee->id}</td>
            <td>{$single_employee->first_name}</td>
            <td>{$single_employee->last_name}</td>
            <td>{$is_admn}</td>
          </tr>";
  }
  echo "</table>";
}
else {
  header('Location: /');
}

?>