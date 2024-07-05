<?php
session_start();
require 'db_conn.php';

if(isset($_POST['delete_location']))
{
    $loc_id = mysqli_real_escape_string($conn, $_POST['delete_location']);

    $query = "DELETE FROM location WHERE loc_id='$loc_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Location Deleted Successfully";
        header("Location: location.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Location Not Deleted";
        header("Location: location.php");
        exit(0);
    }
}


if(isset($_POST['update_location']))
{
    $loc_id = mysqli_real_escape_string($conn, $_POST['loc_id']);

    $location = mysqli_real_escape_string($conn, $_POST['location']);

    $query = "UPDATE location SET location='$location' WHERE loc_id='$loc_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] ="Location Updated Succesfully";
        header("Location: location.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Location Not Updated";
        header("Location: location.php");
        exit(0);
    }

}







$location_id = mysqli_real_escape_string($conn, $_POST['emp_id']);
$location = mysqli_real_escape_string($conn, $_POST['location']);

$sql = "SELECT * FROM location WHERE location_id='$location_id' AND location='$location' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['message_danger'] = "Location Is Already Added";
        header("Location: loc_create.php");
        exit(0);
}else {

    if(isset($_POST['save_loc']))
    {
        $query = "INSERT INTO location (location_id, location) VALUES
            ('$location_id', '$location')"; 
    
        $query_run = mysqli_query($conn, $query);
        if ($query_run){
            $_SESSION['message'] = 'Location Added Successfully';
            header("Location: loc_create.php");
            exit(0);
        }else{
            $_SESSION['message'] = "Attendance Not Added";
            header("Location: loc_create.php");
            exit(0);
        }
    }
}
?>

?>

