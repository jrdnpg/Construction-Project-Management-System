<?php
session_start();
require 'db_conn.php';

if(isset($_POST['delete_tool']))
{
    $tool_id = mysqli_real_escape_string($conn, $_POST['delete_tool']);

    $query = "DELETE FROM tools WHERE tool_id='$tool_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Tool Deleted Successfully";
        header("Location: tools.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Tool Not Deleted";
        header("Location: tools.php");
        exit(0);
    }
}


if(isset($_POST['update_tool']))
{
    $tool_id = mysqli_real_escape_string($conn, $_POST['tool_id']);

    $tool_name = mysqli_real_escape_string($conn, $_POST['tool_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $purchase_price = mysqli_real_escape_string($conn, $_POST['purchase_price']);
    $purchase_date = mysqli_real_escape_string($conn, $_POST['purchase_date']);

    $query = "UPDATE tools SET tool_name='$tool_name', category='$category', quantity='$quantity', purchase_price='$purchase_price',
     purchase_date='$purchase_date' WHERE tool_id='$tool_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Tools Updated Successfully";
        header("Location: tools.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Tools Not Updated";
        header("Location: tools.php");
        exit(0);
    }

}





$tool_name = mysqli_real_escape_string($conn, $_POST['tool_name']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$purchase_price = mysqli_real_escape_string($conn, $_POST['purchase_price']);
$purchase_date = mysqli_real_escape_string($conn, $_POST['purchase_date']);

$sql = "SELECT * FROM tools WHERE tool_name='$tool_name' AND purchase_date='$purchase_date' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['message_danger'] = "Tool Is Already Added";
        header("Location: tool_create.php");
        exit(0);
}else {

if(isset($_POST['save_tool']))
{
    
    $query = "INSERT INTO tools (tool_name, category, quantity, purchase_price, purchase_date) VALUES
        ('$tool_name', '$category', '$quantity', '$purchase_price', '$purchase_date')"; 

    $query_run = mysqli_query($conn, $query);
    if ($query_run){
        $_SESSION['message'] = "Tool Added Succesfully";
        header("Location: tool_create.php");
        exit(0);
    }else{
        $_SESSION['message'] = "Tool Not Added";
        header("Location: tool_create.php");
        exit(0);
    }
}
}
?>