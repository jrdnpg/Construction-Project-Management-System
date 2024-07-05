<?php 
session_start();
 if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
include('includes/header.php');
include('includes/navbar.php');
require 'db_conn.php';
?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4 ml-3">
    <h1 class="h3 mb-0 text-gray-800">
        <i class="fa fa-fw fa-truck fa-1x text-gray-600 mr-3"></i>
        Equipments
    </h1>
    <a href="#" class="btn btn-sm btn-info shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<?php include('message.php'); ?>

<!-- DataTables Start-->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between py-2">
        <h6 class="m-0 font-weight-bold text-info">List of Equipments</h6>
        <a href="equip_create.php" class="btn btn-sm btn-primary shadow-sm"><i
                class="fa fa-plus fa-sm text-white-50 mr-2"></i>Add Equipment</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Equipment Name</th>
                        <th>Manufacturer</th>
                        <th>Model</th>
                        <th>Quantity</th>
                        <th>Purchase Price</th>
                        <th>Purchase Date</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Equipment Name</th>
                        <th>Manufacturer</th>
                        <th>Model</th>
                        <th>Quantity</th>
                        <th>Purchase Price</th>
                        <th>Purchase Date</th>
                        <th>Options</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php 
                $query = "SELECT * FROM employees";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $emp)
                    {
                        ?>
                        <tr>
                            <!-- <td></td> -->
                            <td><?= $emp['emp_name']; ?></td>
                            <td><?= $emp['position']; ?></td>
                            <td><?= $emp['age']; ?></td>
                            <td><?= $emp['phone']; ?></td>
                            <td><?= $emp['address']; ?></td>
                            <td><?= $emp['salary']; ?></td>
                            <td>
                                        <a class="btn btn-warning btn-sm" href="employee_view.php?emp_id=<?= $emp['emp_id']; ?>">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <!-- View -->
                                        </a>

                                        <a class="btn btn-success btn-sm" href="employee_edit.php?emp_id=<?= $emp['emp_id']; ?>">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                        <!-- Edit -->
                                        </a>

                                        <form action="emp_code.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_employee" value="<?=$emp['emp_id'];?>" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            <!-- Delete -->
                                            </button>
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