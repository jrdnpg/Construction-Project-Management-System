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

    <div class="row justify-content-center"> 

        <div class="col-xl-8 col-lg-10 col-md-6">
            <div class="card o-hidden border-0 shadow-lg">

            <div class="card-header py-3">

                <div class="d-sm-flex align-items-center justify-content-between py-2">
                <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-edit fw-fa fa-1x text-gray-600 mr-1"></i>
       EDIT ATTENDANCE</h6>
                <a href="dtr.php" class="btn btn-sm btn-info shadow-sm"><i
                        class="fa fa-undo fa-sm text-white-100 mr-1"></i>Back</a>
                </div>
            </div>
            <div class="card-body">
            <?php
                if(isset($_GET['dtr_id']))
                {
                    $dtr_ID = mysqli_real_escape_string($conn, $_GET['dtr_id']);
                    $query = "SELECT * FROM dtr WHERE dtr_id='$dtr_ID' ";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $dtr = mysqli_fetch_array($query_run);
            ?>
                
                <form class="user text-primary" action="dtr_code.php" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="hidden" name="dtr_id" value="<?= $dtr['dtr_id']; ?>" class="form-control">
                            </div>
                        </div>
                        <h6 class="text-primary text-left font-weight-bold small">AM</h6>
                        <div class="form-group row">
                    
                            <div class="col-sm-6 mb-3 mb-sm-0">
                        
                            <label class="text-gray-800 text-left font-weight-bold small">In</label>
                                <input type="time" name="am_in"  class="form-control" value="<?= $dtr['am_in']; ?>">
                            
                            </div>
                            <div class="col-sm-6">
                            <label class="text-gray-800 text-left font-weight-bold small">Out</label>
                                <input type="time" name="am_out"  class="form-control" value="<?= $dtr['am_out']; ?>">
                        
                            </div>
                            
                        </div>
                        <hr>
                        <h6 class="text-primary text-left font-weight-bold small">PM</h6>
                    
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="text-gray-800 text-left font-weight-bold small">In</label>
                                <input type="time" name="pm_in"  class="form-control" value="<?= $dtr['pm_in']; ?>">
                            
                            </div>
                            <div class="col-sm-6">
                            <label class="text-gray-800 text-left font-weight-bold small">Out</label>
                                <input type="time" name="pm_out"  class="form-control" value="<?= $dtr['pm_out']; ?>">
                        
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 mb-3 mb-sm-0">
                            <label class="text-primary">Over Time (Number Of Hours)</label>
                            <input type="number" name="ot" value="<?= $dtr['ot']; ?>" class="form-control">
                            </div>
                        </div>
                    
                    
                        <button type="submit" name="update_dtr" class="btn btn-info btn-user ml-2">Update Attendance</button>
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