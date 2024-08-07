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
                <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-edit fw-fa fa-1x text-gray-600 mr-1"></i>
       EDIT EMPLOYEE</h6>
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
                        <input type="hidden" name="emp_id" value="<?= $employee['emp_id']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label>Last Name</label>
                            <input type="text" name="last_name" value = "<?=$employee['last_name'];?>" required class="form-control" placeholder="Last Name">
                        </div>
                        <div class="col-sm-4">
                            <label>First Name</label>
                            <input type="text" name="first_name" value = "<?=$employee['first_name'];?>" required class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-sm-4">
                            <label>Middle Initial</label>
                            <input type="text" name="mid_name" value = "<?=$employee['mid_name'];?>" required class="form-control" placeholder="Middle Initial">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <select type="text" name="position" value = "<?=$employee['position'];?>" class="form-control custom-select">
                            <option selected><?=$employee['position'];?></option>
                            <option>Foreman</option>
                            <option>Mason</option>
                            <option>Carpenter</option>
                            <option>Mason/Carpenter</option>
                            <option>Backhoe Operator</option>
                            <option>Driver</option>
                            <option>Laborer</option>
                            <option>Painter</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                        <label>Age</label>
                        <input type="number" name="age" value = "<?=$employee['age'];?>" class="form-control" placeholder="Age">
                        </div>
                        <div class="col-sm-8">
                        <label>Address</label>
                        <input type="text" name="address" value = "<?=$employee['address'];?>" class="form-control" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 mb-2 mb-sm-0 ">
                        <label>Phone</label>
                        <input type="text" name="phone" value = "<?=$employee['phone'];?>" data-pattern="****-***-****" 
                        placeholder="0000-000-0000" maxlength="13" minlength="13" class="form-control" maxlength="11" >
                        </div>
                        <div class="col-sm-8">
                        <label>Daily Rate</label>
                        <input type="number" name="salary" value = "<?=$employee['salary'];?>" class="form-control" placeholder="Daily Rate">
                        </div>
                    </div>
                    
                        <button type="submit" name="update_employee" class="btn btn-info btn-user ml-2">Update Employee</button>
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