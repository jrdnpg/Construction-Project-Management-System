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
            <i class="fa fa-map-marked-alt fa-1x text-gray-600 mr-1"></i>
            Location(s)
        </h1>
        <!-- <a href="charts.php" class="btn btn-sm btn-info shadow-sm"><i
                class="fas fa-industry fa-sm text-white"></i> Go to Charts</a> -->
    </div>

<?php include('message.php'); ?>

<div class="row">
<div class="col-md-4">


<div class="card shadow-sm">

        
        <div class="card-header py-0 px-0">    
        <div class="card-header text-primary d-sm-flex align-items-center justify-content-between">
        <h6 class="text-gray-800 text-left font-weight-bold">Edit Location</h6>

    </div>

        <div class="card-body">
        <?php
                if(isset($_GET['loc_id']))
                {
                    $PROG_id = mysqli_real_escape_string($conn, $_GET['loc_id']);
                    $query = "SELECT * FROM location WHERE loc_id='$PROG_id' ";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $loc = mysqli_fetch_array($query_run);
            ?>
        <form class="user text-primary" action="loc_code.php" method="POST">
            
                    <input type="hidden" name="loc_id" value = "<?=$loc['loc_id'];?>" required class="form-control">
                    <div class="form-group">
                    <label>Location</label>
                        <input type="text" name="location" value = "<?=$loc['location'];?>" required class="form-control">
                    </div>

                    <button type="submit" name="update_location" class="btn btn-info btn-user">Update Location</button>
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
        
  
        <div class="card-footer text-danger tex-center">
            <span class="small text-center ml-4">

        </span>
        </div>
        </div>
 
     </div>


</div>


<div class="col-md-8">
 <!-- DataTables Start-->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between py-2">
        <h6 class="m-0 font-weight-bold text-primary">Employee(s) Work Designation</h6>
        <a href="loc_create.php" class="btn btn-sm btn-primary shadow-sm"><i
                class="fa fa-plus fa-sm text-white mr-1"></i>Add Location</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive text-primary">
            <table class="table table-sm table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class='thead-light'>
                    <tr style="text-align:center">
                        <!-- <th>ID</th> -->
                        <th>Employee Name</th>
                        <th>Position</th>
                        <th>Location</th>
                        <th width="12%">Options</th>
                    </tr>
                </thead>
                <tfoot class='thead-light'>
                    <tr style="text-align:center">
                        <!-- <th>ID</th> -->
                        <th>Employee Name</th>
                        <th>Position</th>
                        <th>Location</th>
                        <th>Options</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php 
                
                $query = "SELECT * FROM employees, location WHERE employees.emp_id = location.location_id;";
                $query_run = mysqli_query($conn, $query);
               
                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $loc)
                    {  
                        ?>
                        <tr style="text-align:center">
                            <!-- <td></td> -->
                            <td ><?= $loc['first_name']; ?> <?= $loc['mid_name']; ?> <?= $loc['last_name']; ?></td>
                            <td><?= $loc['position']; ?></td>
                            <td><?= $loc['location']; ?></td>
                            <td>

                                        <a class="btn btn-sm btn-outline-success" href="location.php?loc_id=<?= $loc['loc_id']; ?>" 
                                        data-toggle="tooltip" title='Edit Location "<?= $loc['location']; ?>"!' data-placement="top">
                                        <i class="fa fa-edit fw-fa" aria-hidden="true"></i>
                                        <!-- Edit -->
                                        </a>

                                        <form action="loc_code.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_location" value="<?=$loc['loc_id'];?>" class="btn btn-sm btn-outline-danger" onclick="msg()" 
                                            data-toggle="tooltip" title='Delete Location "<?= $loc['location']; ?>"!' data-placement="top">
                                            <i class="fa fa-trash fw-fa" aria-hidden="true"></i>
                                            <!-- Delete -->
                                            </button>
                                            <script>
                                                function msg(){
                                                    var result = confirm ('Are you sure you want to delete this location?');
                                                    if(result==false){
                                                        event.preventDefault();
                                                    }
                                                }
                                            </script>
                                        </form>
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