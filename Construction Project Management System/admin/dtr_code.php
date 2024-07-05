<?php
session_start();
require 'db_conn.php';

if(isset($_POST['delete_dtr']))
{
    $dtr_id = mysqli_real_escape_string($conn, $_POST['delete_dtr']);

    $query = "DELETE FROM dtr WHERE dtr_id='$dtr_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Attendance Deleted Successfully";
        header("Location: dtr.php");
        exit(0);
    }
    else
    {
        $_SESSION['message_danger'] = "Employee Not Deleted";
        header("Location: dtr.php");
        exit(0);
    }
}

if(isset($_POST['update_dtr']))
{
    $dtr_id = mysqli_real_escape_string($conn, $_POST['dtr_id']);

    $am_in = mysqli_real_escape_string($conn, $_POST['am_in']);
    $am_out = mysqli_real_escape_string($conn, $_POST['am_out']);
    $pm_in = mysqli_real_escape_string($conn, $_POST['pm_in']);
    $pm_out = mysqli_real_escape_string($conn, $_POST['pm_out']);
    $ot = mysqli_real_escape_string($conn, $_POST['ot']);

    $query = "UPDATE dtr SET am_in='$am_in', am_out='$am_out', pm_in='$pm_in', pm_out='$pm_out', ot='$ot' WHERE dtr_id='$dtr_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Attendance Updated Successfully";
        header("Location: dtr.php");
        exit(0);
    }
    else
    {
        $_SESSION['message_danger'] = "Attendance Not Updated";
        header("Location: dtr_edit.php");
        exit(0);
    }

}








if(isset($_POST['save_dtr']))
{ 

$employee_id = mysqli_real_escape_string($conn, $_POST['emp_id']);

    $query = "INSERT INTO dtr (employee_id) VALUES
        ('$employee_id')"; 

    $query_run = mysqli_query($conn, $query);
    if ($query_run){
        $_SESSION['message'] = 'Attendance added succesfully, you can now add time record in "Attendace" tab';
        header("Location: dtr.php");
        exit(0);
    }else{
        $_SESSION['message'] = "Attendance Not Added";
        header("Location: dtr.php");
        exit(0);
    }
}
?>