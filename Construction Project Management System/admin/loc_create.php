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

        <div class="col-xl-12 col-lg-12 col-md-12">
       
        <?php include('message.php'); ?>
        <?php include('message_danger.php'); ?>

            <div class="card o-hidden border-0 shadow-lg">

            <div class="card-header py-3">

                <div class="d-sm-flex align-items-center justify-content-between py-2">
                <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-plus fa-1x text-gray-600 mr-1"></i>
       ADD LOCATION</h6>
                <a href="location.php" class="btn btn-sm btn-info shadow-sm"><i
                        class="fa fa-undo fa-sm text-white-100 mr-2"></i>Back</a>
                </div>
            </div>
            <div class="card-body">     
            <div class="row">
<div class="col-md-4">


<div class="card shadow-sm">

        
        <div class="card-header py-0 px-0">    
        <div class="card-header text-primary d-sm-flex align-items-center justify-content-between">
        <h6 class="text-gray-800 text-left font-weight-bold">Add Location</h6>

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
        <form class="user text-primary" action="loc_code.php" method="POST">
            
                    
                       
                    <input type="hidden" name="emp_id" value = "<?=$employee['emp_id'];?>" required class="form-control">
                    <div class="form-group">
                    <label>Employee Name</label>
                        <input type="text" value = "<?=$employee['first_name'];?> <?=$employee['mid_name'];?> <?=$employee['last_name'];?>" required class="form-control">
                    </div>
                    <div class="form-group">
                    <label>Position</label>
                        <input type="text" value = "<?=$employee['position'];?>" required class="form-control">
                    </div>
                    <div class="form-group">
                    <label>Location</label>
                        <input type="text" name="location"required class="form-control" placeholder="Location">
                    </div>

                    <button type="submit" name="save_loc" class="btn btn-info btn-user">Save Location</button>
                </form>
                <?php
                }
                else
                {
                    echo "<h1 class='text-danger'>No Such Id Found</h1>";
                }
            }
        ?>
   
        </div>

        <div class="card-footer text-danger tex-center">
        <span class="small text-center ml-4">

        </span>
        </div>
        </div>
 
     </div>


</div>


<div class="col-md-8">

     <!-- DataTables employee list Start-->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between py-2">
        <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
        <!-- <a href="employee_create.php" class="btn btn-sm btn-primary shadow-sm"><i
                class="fa fa-plus fa-sm text-white mr-1"></i>Add Attendance</a> -->
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive text-primary">
            <table class="table-sm table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class='thead-light'>
                    <tr style="text-align:center">
                        <th>Employee Name</th>
                        <th>Position</th>
                        <th width="12%">Options</th>
                    </tr>
                </thead>
                <tfoot class='thead-light'>
                    <tr style="text-align:center">                  
                        <th>Employee Name</th>
                        <th>Position</th>
                        <th>Options</th>
                    </tr>
                </tfoot>
                <tbody>
                <!-- SELECT * FROM employees, dtr WHERE employees.emp_id = dtr.employee_id; -->
				<?php 
                
                $query = "SELECT * FROM employees";
                $query_run = mysqli_query($conn, $query);
               
                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $dtr)
                    {      
                        ?>
                        <tr style="text-align:center">
                            <!-- <td></td> -->
                            <td ><?= $dtr['first_name']; ?> <?= $dtr['mid_name']; ?> <?= $dtr['last_name']; ?></td>
                            <td ><?= $dtr['position']; ?></td>
                            <td>
                            <a class="btn btn-sm btn-outline-primary" href="loc_create.php?emp_id=<?= $dtr['emp_id']; ?>" 
                                        data-toggle="tooltip" title='Add Attendance to"<?= $dtr['first_name']; ?>"!' data-placement="top">
                                        <i class="fa fa-plus fw-fa" aria-hidden="true"></i>
                                        <!-- Add -->
                                        </a> 
                            </td>
                        </tr>
                        <?php
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
<!-- DataTables End-->

    </div>

</div>

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