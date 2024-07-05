<?php
session_start();
require 'db_conn.php';

if(isset($_POST['delete_item']))
{
    $item_id = mysqli_real_escape_string($conn, $_POST['delete_item']);

    $query = "DELETE FROM supply WHERE item_id='$item_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Item Deleted Successfully";
        header("Location: supplies.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Item Not Deleted";
        header("Location: supplies.php");
        exit(0);
    }
}


if(isset($_POST['update_item']))
{
    $item_id = mysqli_real_escape_string($conn, $_POST['item_id']);

    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $supplier = mysqli_real_escape_string($conn, $_POST['supplier']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $unit = mysqli_real_escape_string($conn, $_POST['unit']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $item_quantity = mysqli_real_escape_string($conn, $_POST['item_quantity']);
    $item_purchase_price = mysqli_real_escape_string($conn, $_POST['item_purchase_price']);
    $item_purchase_date = mysqli_real_escape_string($conn, $_POST['item_purchase_date']);

    $query = "UPDATE supply SET item_name='$item_name', supplier='$supplier', brand='$brand', unit='$unit',
     description='$description', item_quantity='$item_quantity' , item_purchase_price='$item_purchase_price' , item_purchase_date='$item_purchase_date' 
     WHERE item_id='$item_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Item Updated Succesfully";
        header("Location: supplies.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Item Not Updated";
        header("Location: supplies.php");
        exit(0);
    }

}


$item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
$supplier = mysqli_real_escape_string($conn, $_POST['supplier']);
$brand = mysqli_real_escape_string($conn, $_POST['brand']);
$unit = mysqli_real_escape_string($conn, $_POST['unit']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$item_quantity = mysqli_real_escape_string($conn, $_POST['item_quantity']);
$item_purchase_price = mysqli_real_escape_string($conn, $_POST['item_purchase_price']);
$item_purchase_date = mysqli_real_escape_string($conn, $_POST['item_purchase_date']);

$sql = "SELECT * FROM supply WHERE item_name='$item_name' AND item_purchase_date='$item_purchase_date' AND supplier='$supplier'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['message_danger'] = "Item Is Already Added";
        header("Location: sup_create.php");
        exit(0);
}else {

if(isset($_POST['save_supply']))
{ 
    $query = "INSERT INTO supply (item_name, supplier, brand, unit, description, item_quantity, item_purchase_price, item_purchase_date) VALUES
        ('$item_name', '$supplier', '$brand', '$unit', '$description', '$item_quantity', '$item_purchase_price', '$item_purchase_date')"; 

    $query_run = mysqli_query($conn, $query);
    if ($query_run){
        $_SESSION['message'] = "Item Added Succesfully";
        header("Location: sup_create.php");
        exit(0);
    }else{
        $_SESSION['message'] = "Item Not Added";
        header("Location: sup_create.php");
        exit(0);
    }
}
}
?>