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
            <i class="fa fa-tachometer-alt fa-1x text-gray-600 mr-1"></i>
            Dashboard
        </h1>
        <a href="charts.php" class="btn btn-sm btn-info shadow-sm"><i
                class="fas fa-chart-pie fa-sm text-white mr-1"></i>Charts</a>
    </div>

    <!-- Content Row -->
    <div class="row">
<!-- Total of Earnings-->
<div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info border-bottom-info shadow h-100 py-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs  mr-3 font-weight-bold text-info text-uppercase mb-1">
                                Total of Projects</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                            <?php
                                
                                $query = "SELECT project_id FROM projects ORDER BY project_id";
                                $query_run = mysqli_query($conn, $query);

                                $row = mysqli_num_rows($query_run);

                                echo $row ;

                                ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tasks fa-3x text-info"></i>
                        </div>

                        <div class="col-auto">
                        <a href="projects_view.php" class="btn btn-info btn-icon-split btn-sm mt-5">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text text-xs mt-1">View Details</span>
                        </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    <!--  Total of employees -->
    <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary border-bottom-primary shadow h-100 py-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total of employees</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                
                                <?php
                                
                                $query = "SELECT emp_id FROM employees ORDER BY emp_id";
                                $query_run = mysqli_query($conn, $query);

                                $row = mysqli_num_rows($query_run);

                                echo $row ;

                                ?>
                                
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-3x text-primary"></i>
                        </div>

                        <div class="col-auto">
                        <a href="employees.php" class="btn btn-primary btn-icon-split btn-sm mt-5">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text text-xs mt-1">View Details</span>
                        </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--  Total of Equipments -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success border-bottom-success shadow h-100 py-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-4">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total of Tools</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            
                            <?php
                                $query = "SELECT sum(quantity) from tools";
                                $result = mysqli_query($conn,$query);
                                $row = mysqli_fetch_array($result); 
                                echo $row[0]; 
                            ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-fw fa-toolbox fa-3x text-success"></i>
                        </div>

                        <div class="col-auto">
                        <a href="tools.php" class="btn btn-success btn-icon-split btn-sm mt-5">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text text-xs mt-1">View Details</span>
                        </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--  Total of Equipments -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning border-bottom-warning shadow h-100 py-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-1">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total of Equipments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            
                            <?php
                                $query = "SELECT sum(equip_quantity) from equipments";
                                $result = mysqli_query($conn,$query);
                                $row = mysqli_fetch_array($result); 
                                echo $row[0]; 
                            ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-fw fa-truck fa-3x text-warning"></i>
                        </div>

                        <div class="col-auto">
                        <a href="equipments.php" class="btn btn-warning btn-icon-split btn-sm mt-5">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text text-xs mt-1">View Details</span>
                        </a>
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
 }else{
    header("Location: login.php");
    exit();
 }
 ?>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>