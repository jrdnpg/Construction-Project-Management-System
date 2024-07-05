<?php 
session_start();
 if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
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
<div class="d-sm-flex align-items-center justify-content-between mb-4 ml-3">
    <h1 class="h3 mb-0 text-gray-600">
        <i class="fa fa-user-clock fa-1x text-gray mr-1"></i>
        Daily Time Record
    </h1>
    <a href="attendance_report.php" class="btn btn-sm btn-info shadow-sm"><i
            class="fas fa-download fa-sm text-white"></i> Generate Report</a>
</div>

<?php include('message.php'); ?>
<?php include('message_danger.php'); ?>

<div class="row">
<div class="col-md-4">


<div class="card shadow-sm mt-5">

        
        <div class="card-header py-0 px-0">    
        <div class="card-header text-primary d-sm-flex align-items-center justify-content-between">
        <h6 class="text-gray-800 text-left font-weight-bold">Add Attendance</h6>

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
        <form class="user text-primary" action="dtr_code.php" method="POST">
            
                    
                       
                    <input type="hidden" name="emp_id" value = "<?=$employee['emp_id'];?>" required class="form-control">
                    <div class="form-group">
                    <label>Employee Name</label>
                        <input type="text" value = "<?=$employee['first_name'];?> <?=$employee['mid_name'];?> <?=$employee['last_name'];?>" required class="form-control">
                    </div>
                    <div class="form-group">
                    <label>Position</label>
                        <input type="text" value = "<?=$employee['position'];?>" required class="form-control">
                    </div>
                   
                    <input type="hidden" name="dtr_date" required class="form-control">
                 
                    <button type="submit" name="save_dtr" class="btn btn-info btn-user">Save Attendance</button>
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
        <?php echo date("l");?>, <?php echo date("M d Y");?>
        </span>
        </div>
        </div>
 
     </div>


</div>


<div class="col-md-8">

<ul class="nav nav-pills mb-2 justify-content-center" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Employee List</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-about-tab" data-toggle="pill" href="#pills-about" role="tab" aria-controls="pills-about" aria-selected="false">Attendance</a>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

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
                            <td><?= $dtr['position']; ?></td>
                            <td>
                            <a class="btn btn-sm btn-outline-primary" href="dtr.php?emp_id=<?= $dtr['emp_id']; ?>" 
                                        data-toggle="tooltip" title='Add Attendance to"<?= $dtr['first_name']; ?>"!' data-placement="top">
                                        <i class="fa fa-plus fw-fa" aria-hidden="true"></i>
                                        <!-- Edit -->
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






    <div class="tab-pane fade" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">

     <!-- DataTables Start-->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between py-2">
        <h6 class="m-0 font-weight-bold text-primary">Daily Time Record</h6>
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
                        <th>AM</th>
                        <th>PM</th>
                        <th>OT</th>

                        <th width="15%">Options</th>
                    </tr>
                </thead>
                <tfoot class='thead-light'>
                    <tr style="text-align:center">                  
                        <th>Employee Name</th>
                        <th>AM</th>
                        <th>PM</th>
                        <th>OT</th>
                     
                        <th>Options</th>
                    </tr>
                </tfoot>
                <tbody>
                <!-- SELECT * FROM employees, dtr WHERE employees.emp_id = dtr.employee_id; -->
				<?php 
                
                $query = "SELECT * FROM employees, dtr WHERE employees.emp_id = dtr.employee_id;";
                $query_run = mysqli_query($conn, $query);
               
                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $dtr)
                    {  
                        $AmIn = $dtr['am_in'];
                        $AmOut = $dtr['am_out'];
                        $PmIn = $dtr['pm_in'];  
                        $PmOut = $dtr['pm_out'] 
                        ?>
                        <tr style="text-align:center">
                            <!-- <td></td> -->
                            <td ><?= $dtr['first_name']; ?> <?= $dtr['mid_name']; ?> <?= $dtr['last_name']; ?></td>
                            
                            <td>    
                                <small class="text-gray-800"> 
                                    Time In 
                                    </small>
                                    <small class="text-primary">                     
                                    <?= $dtr['am_in']; ?>
                                </small> <br>
                                <small  class="text-gray-800">
                                Time Out 
                                </small>
                                <small  class="text-danger">
                                <?= $dtr['am_out']; ?>
                                </small>    
                            
                            <td>    
                                <small class="text-gray-800"> 
                                    Time In 
                                    </small>
                                    <small class="text-primary">                     
                                    <?= $dtr['pm_in']; ?>
                                </small> <br>
                                <small  class="text-gray-800">
                                Time Out 
                                </small>
                                <small  class="text-danger">
                                <?= $dtr['pm_out']; ?>
                                </small>   
                    </td> 
                            <td><?= $dtr['ot']; ?> hrs</td>
                          
                            <td>
                            <a class="btn btn-sm btn-outline-success" href="dtr_edit.php?dtr_id=<?= $dtr['dtr_id']; ?>"
                            data-toggle="tooltip" title='Edit Attendance!' data-placement="top">
                            <i class="fa fa-edit fw-fa" aria-hidden="true"></i>
                            <!-- Edit -->
                            </a>

                            <form action="dtr_code.php" method="POST" class="d-inline">
                                <button type="submit" name="delete_dtr" value="<?=$dtr['dtr_id'];?>" 
                                class="btn btn-sm btn-outline-danger" onclick="msg()">
                                <i class="fa fa-trash fw-fa" aria-hidden="true"></i>
                                <!-- Delete -->
                                </button>
                                <script>
                                    function msg(){
                                        var result = confirm ('Are you sure you want to delete this data?');
                                        if(result==false){
                                            event.preventDefault();
                                        }
                                    }
                                </script>
                            </form>
                                   
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