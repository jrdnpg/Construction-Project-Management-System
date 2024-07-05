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
        <i class="fa fa-tasks fa-1x text-gray mr-1"></i>
        Projects
    </h1>
    <a href="project_create.php" class="btn btn-sm btn-info shadow-sm"><i
            class="fas fa-plus fa-sm text-white mr-1"></i>Add Project</a>
</div>

        <?php include('message.php'); ?>    
        <?php include('message_danger.php'); ?>

<?php 
                $no=1;
                $query = "SELECT * FROM projects";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $proj)
                    {
                        $start = $proj['started'];
                        $target = $proj['target_date'];
                        $complete = $proj['completed'];
                        $cost = $proj['cost'];
                        ?>
<div class="row">
<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
    <img src="uploads/<?= $proj['image']; ?>" class="img-fluid img-responsive img-thumbnail" style="width:100%; height:100%" alt="Photo Of Project">

        <div class="card-body">
        <b><span class="card-text text-gray-900">Title</span></b>
        <p class="text-primary small"><?= $proj['title']; ?></p>
        <b><span class="card-text text-gray-900">Location :</span></b>
        <p class="text-primary small"><?= $proj['location']; ?></p>
        <b><span class="card-text text-gray-900">Cost : </span></b>
        <p class="text-primary small">Php. <?php echo number_format($cost, 2); ?></p>
                    <hr>
            <div class="d-flex justify-content-between align-items-center">
               
                    <form class="user text-primary text-center" method="POST"  enctype="multipart/form-data">
                        <div class="form-group">
                            <a href="change_image.php?project_id=<?=$proj['project_id'];?>" class="btn btn-md btn-outline-primary mt-3">Change Image</a>
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
<div class="col-md-8 mb-2">
    <div class="card mb-8 shadow-sm">
        <div class="card-header py-3">

        <div class="d-sm-flex align-items-center justify-content-between py-2">
        <h6 class="m-0 font-weight-bold text-gray-800">
        PROJECT DETAILS</h6>
        </div>
        </div>
        
        <div class="card-body">
            <p class="text-primary mb-1">Project Status</p>
            <div class="table-responsive">
                <table class="table-sm table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class='thead-light'>
                        <tr style="text-align:center">
                            <!-- <th>ID</th> -->
                            <th>Started</th>
                            <th>Target Completion Date</th>
                            <th>Completed</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr style="text-align:center">
                            <td><?php echo date('M d, Y', strtotime($start))?></td>
                            <td><?php echo date('M d, Y', strtotime($target))?></td>
                            <td><?php echo date('M d, Y', strtotime($complete))?></td>
                            </tr>	
                            
                    </tbody>
                </table>
            </div>
            <!-- <input class="col-sm-4 form-control" id="myInput" type="text" placeholder="Search Employee... "> -->
            <br>

            <p class="text-primary mb-1">Employees Assigned</p>
            <div class="table-responsive">
                <table class="table-sm table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class='thead-light'>
                        <tr style="text-align:center">
                            <!-- <th>ID</th> -->
                            <th>No.</th>
                            <th>Employee Name</th>
                            <th>Position</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                    <?php 
                    $no=1;
                $location = $proj['location'];

                $query = "SELECT * FROM employees, location WHERE employees.emp_id = location.location_id AND location = '$location'";
                $query_run = mysqli_query($conn, $query);
               
                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $dtr)
                    {  
                        ?>
                            <tr style="text-align:center">
                            <td><?php echo $no; ?></td>
                            <td><?= $dtr['first_name']; ?> <?= $dtr['mid_name']; ?> <?= $dtr['last_name']; ?></td>
                            <td><?= $dtr['position']; ?></td>
                            </tr>
                            <?php
                             $no++;
                    }
                }
                else
                {
                    echo "<h5> No Record Found </h5>";
                }
            
        
            ?>	 
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

</div>
<?php
                $no++;
            }
        }
        else
        {
            echo "<h3 class='mt-5 text-center'> No Projects Found </h3>";
        }
    ?>

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

<!-- to not back when logout-->
<script type="text/javascript">
    window.history.forward();
    function noBack() {
        window.history.forward();
    }
</script>