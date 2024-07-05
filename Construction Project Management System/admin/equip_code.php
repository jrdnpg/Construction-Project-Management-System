<?php
session_start();
require 'db_conn.php';

if(isset($_POST['delete_equip']))
{
    $equip_id = mysqli_real_escape_string($conn, $_POST['delete_equip']);

    $query = "DELETE FROM equipments WHERE equip_id='$equip_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Equipment Deleted Successfully";
        header("Location: equipments.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Equipment Not Deleted";
        header("Location: equipments.php");
        exit(0);
    }
}


if(isset($_POST['update_equip']))
{
    $equip_id = mysqli_real_escape_string($conn, $_POST['equip_id']);

    $equip_name = mysqli_real_escape_string($conn, $_POST['equip_name']);
    $manufacturer = mysqli_real_escape_string($conn, $_POST['manufacturer']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $equip_quantity = mysqli_real_escape_string($conn, $_POST['equip_quantity']);
    $equip_purchase_price = mysqli_real_escape_string($conn, $_POST['equip_purchase_price']);
    $equip_purchase_date = mysqli_real_escape_string($conn, $_POST['equip_purchase_date']);

    $query = "UPDATE equipments SET equip_name='$equip_name', manufacturer='$manufacturer', model='$model', equip_quantity='$equip_quantity',
     equip_purchase_price='$equip_purchase_price', equip_purchase_date='$equip_purchase_date' WHERE equip_id='$equip_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Equipments Updated Succesfully";
        header("Location: equipments.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Equipments Not Updated";
        header("Location: equipments.php");
        exit(0);
    }

}



$equip_name = mysqli_real_escape_string($conn, $_POST['equip_name']);
$manufacturer = mysqli_real_escape_string($conn, $_POST['manufacturer']);
$model = mysqli_real_escape_string($conn, $_POST['model']);
$equip_quantity = mysqli_real_escape_string($conn, $_POST['equip_quantity']);
$equip_purchase_price = mysqli_real_escape_string($conn, $_POST['equip_purchase_price']);
$equip_purchase_date = mysqli_real_escape_string($conn, $_POST['equip_purchase_date']);

$sql = "SELECT * FROM equipments WHERE equip_name='$equip_name' AND equip_purchase_date='$equip_purchase_date' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['message_danger'] = "Equipment Is Already Added";
        header("Location: equip_create.php");
        exit(0);
}else {

if(isset($_POST['save_equip']))
{
    $query = "INSERT INTO equipments (equip_name, manufacturer, model, equip_quantity, equip_purchase_price, equip_purchase_date) VALUES
        ('$equip_name', '$manufacturer', '$model', '$equip_quantity', '$equip_purchase_price', '$equip_purchase_date')"; 

    $query_run = mysqli_query($conn, $query);
    if ($query_run){
        $_SESSION['message'] = "Equipments Added Succesfully";
        header("Location: equip_create.php");
        exit(0);
    }else{
        $_SESSION['message'] = "Equipments Not Added";
        header("Location: equip_create.php");
        exit(0);
    }
}
}
?>