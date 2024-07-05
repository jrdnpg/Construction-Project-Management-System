<?php 
session_start();
 if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
include('includes/header.php');
include('includes/navbar.php');
require 'db_conn.php';

//Code for deletion
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$profilepic=$_GET['ppic'];
$ppicpath="uploads"."/".$profilepic;
$sql=mysqli_query($conn,"delete from projects where project_id=$rid");
unlink($ppicpath);
echo "<script>alert('Data deleted');</script>"; 
echo "<script>window.location.href = 'projects_view.php'</script>";     
} 
?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-3">
    <h1 class="h3 mb-0 text-gray-600">
        <i class="fa fa-user-cog fa-1x text-gray mr-1"></i>
        User Profile
    </h1>
    <!-- <a href="project_create.php" class="btn btn-sm btn-info shadow-sm"><i
            class="fas fa-plus fa-sm text-white mr-1"></i>Add Projects</a> -->
</div>

        <?php include('message.php'); ?>    
        <?php include('message_danger.php'); ?>

<div class="row">
<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
    <img src="img/1.jpg" class="img-fluid img-responsive img-thumbnail" style="width:100%; height:100%" alt="Photo Of Project">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">
               
                    <form class="user text-primary text-center" method="POST"  enctype="multipart/form-data">
                        <div class="form-group">
                            <a href="change_image.php?project_id=<?=$proj['project_id'];?>" class="btn btn-md btn-outline-primary mt-3">Change Profile Picture</a>
                        </div>
                    </form>
                <div class="button-group">
                    <a class="btn btn-md btn-outline-success" href="project_edit.php?project_id=<?= $proj['project_id']; ?>" 
                    data-toggle="tooltip" title='Edit Project!' data-placement="top">
                    <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>

                    <a href="projects_view.php?delid=<?php echo ($proj['project_id']);?>&&ppic=<?php echo $proj['image'];?>" 
                    class="btn btn-md btn-outline-danger" title="Delete Project!" data-toggle="tooltip" onclick="msg()">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    <script>
                            function msg(){
                                var result = confirm ('Are you sure you want to delete this project?');
                                if(result==false){
                                    event.preventDefault();
                                }
                            }
                        </script>    
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="card mb-8 shadow-sm">
        <div class="card-header py-3">

        <div class="d-sm-flex align-items-center justify-content-between py-2">
        <h6 class="m-0 font-weight-bold text-gray-800">
        Profile</h6>
        </div>
        </div>
        
        <div class="card-body">
        <form class="user text-primary">

            <div class="form-group">
                <label>Name</label>
                <p class="form-control">
                <?php echo $_SESSION['name']; ?>
                </p>
            </div>
            <div class="form-group">
                <label>User Name</label>
                <p class="form-control">
                <?php echo $_SESSION['user_name']; ?>
                </p>
            </div>

            <div class="form-group row">
                <div class="col-sm-4 mb-2 mb-sm-0 ">
                <label>Age</label>
                <p class="form-control">
                <?php echo $_SESSION['user_name']; ?>
                </p>
                </div>
                <div class="col-sm-8">
                <label>Address</label>
                <p class="form-control">
                <?php echo $_SESSION['user_name']; ?>
                </p>
                </div>
            </div>

        </form>
        

        </div>
    </div>

</div>

</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php 
 }else{
    header("Location: login.php");
    exit();
 }
 ?>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>