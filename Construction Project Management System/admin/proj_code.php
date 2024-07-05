<?php
session_start();
require 'db_conn.php';

if(isset($_POST['update_project']))
{
    $project_id = mysqli_real_escape_string($conn, $_POST['project_id']);

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $cost = mysqli_real_escape_string($conn, $_POST['cost']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $started = mysqli_real_escape_string($conn, $_POST['started']);
    $target_date = mysqli_real_escape_string($conn, $_POST['target_date']);
    $completed = mysqli_real_escape_string($conn, $_POST['completed']);

    $query = "UPDATE projects SET title='$title', location='$location', cost='$cost', duration='$duration',
    started='$started',  target_date='$target_date',  completed='$completed' WHERE project_id='$project_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Project Updated Successfully";
        header("Location: projects_view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Project Not Updated";
        header("Location: projects_view.php");
        exit(0);
    }

}


if (isset($_POST['save_project']) && isset($_FILES['image'])) {
	include "db_conn.php";

	echo "<pre>";
	print_r($_FILES['image']);
	echo "</pre>";

	$img_name = $_FILES['image']['name'];
	$img_size = $_FILES['image']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$error = $_FILES['image']['error'];

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $cost = mysqli_real_escape_string($conn, $_POST['cost']);
    $started = mysqli_real_escape_string($conn, $_POST['started']);
    $target_date = mysqli_real_escape_string($conn, $_POST['target_date']);
    $completed = mysqli_real_escape_string($conn, $_POST['completed']);

	if ($error === 0) {
		if ($img_size > 1250000) {
            $_SESSION['message_danger'] = "Sorry, your file is too large.";
            header("Location: project_create.php");
            exit(0);
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
                $sql = "INSERT INTO projects (title, location, cost, started, target_date, completed,image) VALUES
                          ('$title', '$location', '$cost', '$started', '$target_date', '$completed', '$new_img_name')"; 
				
                mysqli_query($conn, $sql);
                $_SESSION['message'] = "Project Succesfully Added";
                header("Location: project_create.php");
                exit(0);
			}else {
                $_SESSION['message_danger'] = "You can't upload files of this type";
                header("Location: project_create.php");
                exit(0);
			}
		}
	}else {
        $_SESSION['message_danger'] = "unknown error occurred";
        header("Location: project_create.php");
        exit(0);
	}

}else {
    header("Location: project_create.php");
    exit(0);
}

?>




