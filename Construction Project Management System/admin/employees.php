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
    <h1 class="h3 mb-0 text-gray-800">
        <i class="fa fa-user-tie fa-1x text-gray-600 mr-1"></i>
        Employees
    </h1>
    <a href="emp_report.php" class="btn btn-sm btn-info shadow-sm"><i
            class="fas fa-download fa-sm text-white"></i> Generate Report</a>
</div>

<?php include('message.php'); ?>

<!-- DataTables Start-->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between py-2">
        <h6 class="m-0 font-weight-bold text-primary">List of Employee(s)</h6>
        <a href="employee_create.php" class="btn btn-sm btn-primary shadow-sm"><i
                class="fa fa-plus fa-sm text-white mr-1"></i>Add Employee</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive text-primary">
            <table class="table-sm table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class='thead-light'>
                    <tr style="text-align:center">
                        <!-- <th>ID</th> -->
                        <th>No.</th>
                        <th>Employee Name</th>
                        <th>Position</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Daily Rate</th>
                        <th width="12%">Options</th>
                    </tr>
                </thead>
                <tfoot class='thead-light'>
                    <tr style="text-align:center">
                        <!-- <th>ID</th> -->
                        <th>No.</th>
                        <th>Employee Name</th>
                        <th>Position</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Daily Rate</th>
                        <th>Options</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php 
                $no=1;
                $query = "SELECT * FROM employees";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $emp)
                    {
                        ?>
                        <tr style="text-align:center">	
                            <!-- <td></td> -->
                            <td><?php echo $no; ?></td>
                            <td ><?= $emp['first_name']; ?> <?= $emp['mid_name']; ?> <?= $emp['last_name']; ?></td>
                            <td><?= $emp['position']; ?></td>
                            <td><?= $emp['age']; ?></td>
                            <td><?= $emp['address']; ?></td>
                            <td><?= $emp['phone']; ?></td>
                            <td><?= $emp['salary']; ?></td>
                            <td>
                                        <a class="btn btn-sm btn-outline-primary" href="employee_view.php?emp_id=<?= $emp['emp_id']; ?>" 
                                        data-toggle="tooltip" title='View Employee "<?= $emp['first_name']; ?>"!' data-placement="top">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <!-- View -->
                                        </a>

                                        <a class="btn btn-sm btn-outline-success" href="employee_edit.php?emp_id=<?= $emp['emp_id']; ?>" 
                                        data-toggle="tooltip" title='Edit Employee "<?= $emp['first_name']; ?>"!' data-placement="top">
                                        <i class="fa fa-edit fw-fa" aria-hidden="true"></i>
                                        <!-- Edit -->
                                        </a>

                                        <form action="emp_code.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_employee" value="<?=$emp['emp_id'];?>" class="btn btn-sm btn-outline-danger" onclick="msg()" 
                                            data-toggle="tooltip" title='Delete Employee "<?= $emp['first_name']; ?>"!' data-placement="top">
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
<!-- DataTables End-->

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