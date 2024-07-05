<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
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

    <div class="row justify-content-center"> 

        <div class="col-xl-10 col-lg-12 col-md-9">
       
        <?php include('message.php'); ?>
        <?php include('message_danger.php'); ?>

            <div class="card o-hidden border-0 shadow-lg">

            <div class="card-header py-3">

                <div class="d-sm-flex align-items-center justify-content-between py-2">
                <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-plus fa-1x text-gray-600 mr-1"></i>
       ADD PROJECT</h6>
                <a href="projects_view.php" class="btn btn-sm btn-info shadow-sm"><i
                        class="fa fa-undo fa-sm text-white-100 mr-2"></i>Back</a>
                </div>
            </div>
            <div class="card-body">


                <form class="user text-primary" action="proj_code.php" method="POST"  enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Project title</label>
                        <input type="text" name="title"  class="form-control" placeholder="Project title">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-7 mb-3 mb-sm-0">
                        <label>Location</label>
                        <input type="text" name="location"  required class="form-control" placeholder="Location">
                        </div>
                        <div class="col-sm-5">
                        <label>Cost</label>
                        <input type="number" name="cost"  required class="form-control" placeholder="Cost">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label>Date Started</label>
                            <input type="date" name="started" required  class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>Target Completion Date</label>
                            <input type="date" name="target_date"  required class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>Date Completed</label>
                            <input type="date" name="completed" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                    <label>Upload image</label><br>
                        <input type="file" required  class="text-center center-block file-upload" name="image"><br>
                        <span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
                     </div>

                    <button type="submit" name="save_project" class="btn btn-info btn-user ml-2">Save Project</button>
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
include('includes/scripts.php');
include('includes/footer.php');
?>