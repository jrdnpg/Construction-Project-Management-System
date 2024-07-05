<?php
session_start();
require 'db_conn.php';

if(isset($_POST['delete_employee']))
{
    $emp_id = mysqli_real_escape_string($conn, $_POST['delete_employee']);

    $query = "DELETE FROM employees WHERE emp_id='$emp_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Employee Deleted Successfully";
        header("Location: employees.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Deleted";
        header("Location: employees.php");
        exit(0);
    }
}

if(isset($_POST['update_employee']))
{
    $emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);

    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $mid_name = mysqli_real_escape_string($conn, $_POST['mid_name']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);

    $query = "UPDATE employees SET first_name='$first_name', last_name='$last_name', mid_name='$mid_name', position='$position',
    age='$age',  address='$address',  phone='$phone',  salary='$salary' WHERE emp_id='$emp_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Employee Updated Successfully";
        header("Location: employees.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Updated";
        header("Location: employees.php");
        exit(0);
    }

}


$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
$mid_name = mysqli_real_escape_string($conn, $_POST['mid_name']);
$position = mysqli_real_escape_string($conn, $_POST['position']);
$age = mysqli_real_escape_string($conn, $_POST['age']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$salary = mysqli_real_escape_string($conn, $_POST['salary']);

$sql = "SELECT * FROM employees WHERE phone='$phone' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['message_danger'] = "Employee Is Already Added";
        header("Location: employee_create.php");
        exit(0);
}else {

if(isset($_POST['save_employee']))
{
    $query = "INSERT INTO employees (first_name, last_name, mid_name,position,age,address,phone,salary) VALUES
        ('$first_name', '$last_name', '$mid_name', '$position', '$age', '$address', '$phone', '$salary')"; 

    $query_run = mysqli_query($conn, $query);
    if ($query_run){
        $_SESSION['message'] = "Employee Added Succesfully";
        header("Location: employee_create.php");
        exit(0);
    }else{
        $_SESSION['message'] = "Employee Not Added";
        header("Location: employee_create.php");
        exit(0);
    }
}
}

?>