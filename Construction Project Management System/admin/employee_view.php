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

        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg">

            <div class="card-header py-3">

                <div class="d-sm-flex align-items-center justify-content-between py-2">
                <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-eye fa-1x text-gray-600 mr-1"></i>
        EMPLOYEE DETAILS</h6>
                <a href="employees.php" class="btn btn-sm btn-info shadow-sm"><i
                        class="fa fa-undo fa-sm text-white-100 mr-1"></i>Back</a>
                </div>
            </div>
            <div class="card-body">
            <?php
                if(isset($_GET['emp_id']))
                {
                    $employee_id = mysqli_real_escape_string($conn, $_GET['emp_id']);
                    $query = "SELECT * FROM employees WHERE emp_id='$employee_id' ";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $employee = mysqli_fetch_array($query_run);
            ?>
                
                <form class="user text-primary" action="emp_code.php" method="POST">
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                        <input type="hidden" name="emp_id" value="<?= $employee['emp_id']; ?>" class="form-control form-control-user">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label>Last Name</label>
                            <p class="form-control">
                                <?=$employee['last_name'];?>
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <label>First Name</label>
                            <p class="form-control">
                                <?=$employee['first_name'];?>
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <label>Middle Initial</label>
                            <p class="form-control">
                                <?=$employee['mid_name'];?>
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <p class="form-control">
                            <?=$employee['position'];?>
                        </p>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                        <label>Age</label>
                        <p class="form-control">
                            <?=$employee['age'];?>
                        </p>
                        </div>
                        <div class="col-sm-8">
                        <label>Address</label>
                        <p class="form-control">
                            <?=$employee['address'];?>
                        </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 mb-2 mb-sm-0 ">
                        <label>Phone</label>
                        <p class="form-control">
                            <?=$employee['phone'];?>
                        </p>
                        </div>
                        <div class="col-sm-8">
                        <label>Daily Rate</label>
                        <p class="form-control">
                            <?=$employee['salary'];?>
                        </p>
                        </div>
                    </div>
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