<?php
session_start();
require 'db_conn.php';

if(isset($_POST['save_message']))   
{
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $customer_email = mysqli_real_escape_string($conn, $_POST['customer_email']);
    $customer_subject = mysqli_real_escape_string($conn, $_POST['customer_subject']);
    $customer_message = mysqli_real_escape_string($conn, $_POST['customer_message']);



    $query = "INSERT INTO  messages (customer_name, customer_email, customer_subject, customer_message) VALUES
        ('$customer_name', '$customer_email', '$customer_subject', '$customer_message')";

         $query_run = mysqli_query($conn, $query);
         if ($query_run){
            echo "<script>alert('Message Succesfuly')</script>";
             header("Location: contact.php");
             exit(0);
         }else{
            echo "<script>alert('Message Succesfuly')</script>";
             header("Location: contact.php");
             exit(0);
         }
}

if(isset($_POST['save_comment']))

{
    $comment_name = mysqli_real_escape_string($conn, $_POST['comment_name']);
    $comment_email = mysqli_real_escape_string($conn, $_POST['comment_email']);
    $comment_message = mysqli_real_escape_string($conn, $_POST['comment_message']);
   
    $query = "INSERT INTO  comments (comment_name, comment_email, comment_message) VALUES
        ('$comment_name', '$comment_email', '$comment_message')";

         $query_run = mysqli_query($conn, $query);
         if ($query_run){
            echo "<script>alert('Message Succesfuly')</script>";
             header("Location: project.php");
             exit(0);
         }else{
            echo "<script>alert('Message Succesfuly')</script>";
             header("Location: project.php");
             exit(0);
         }
}
?>