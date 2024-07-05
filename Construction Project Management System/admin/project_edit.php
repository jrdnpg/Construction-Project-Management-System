<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
require 'db_conn.php';
?>

<!-- to not back when logout-->
<script type="text/javascript">
    window.history.forward();
    function noBack() {
        window.history.forward();
    }
</script>

 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->

        <?php include('message.php'); ?>    
        <?php include('message_danger.php'); ?>

    <div class="row justify-content-center"> 

        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg">

            <div class="card-header py-3">

                <div class="d-sm-flex align-items-center justify-content-between py-2">
                <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-edit fw-fa fa-1x text-gray-600 mr-1"></i>
       EDIT PROJECT</h6>
                <a href="projects_view.php" class="btn btn-sm btn-info shadow-sm"><i
                        class="fa fa-undo fa-sm text-white-100 mr-1"></i>Back</a>
                </div>
            </div>
            <div class="card-body">
            <?php
                if(isset($_GET['project_id']))
                {
                    $PROG_id = mysqli_real_escape_string($conn, $_GET['project_id']);
                    $query = "SELECT * FROM projects WHERE project_id='$PROG_id' ";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $proj = mysqli_fetch_array($query_run);
            ?>
                
                <form class="user text-primary" action="proj_code.php" method="POST"  enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                        <input type="hidden" name="project_id" value="<?= $proj['project_id']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Project title</label>
                        <input type="text" name="title" value = "<?=$proj['title'];?>" required class="form-control" placeholder="Project title">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-7 mb-3 mb-sm-0">
                        <label>Location</label>
                        <input type="text" name="location" value = "<?=$proj['location'];?>"  required class="form-control" placeholder="Location">
                        </div>
                        <div class="col-sm-5">
                        <label>Cost</label>
                        <input type="number" name="cost" value = "<?=$proj['cost'];?>"  required class="form-control" placeholder="Cost">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label>Date Started</label>
                            <input type="date" name="started" value = "<?=$proj['started'];?>"  required class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>Target Completion Date</label>
                            <input type="date" name="target_date" value = "<?=$proj['target_date'];?>"  required class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>Date Completed</label>
                            <input type="date" name="completed" value = "<?=$proj['completed'];?>"  class="form-control">
                        </div>
                    </div>

                    <button type="submit" name="update_project" class="btn btn-info btn-user ml-2">Update Project</button>
                </form>

            <?php
                    }
                    else
                    {
                        echo "<h4>No Such Id Found</h4>";
                    }
                }
            ?>
            </div>
            </div>
        </div>
    </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>