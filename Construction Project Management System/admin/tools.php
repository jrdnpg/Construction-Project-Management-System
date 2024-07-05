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
        <i class="fa fa-toolbox fa-1x text-gray-600 mr-1"></i>
        Tools
    </h1>    
    <a href="tool_report.php" class="btn btn-sm btn-info shadow-sm"><i
            class="fas fa-download fa-sm text-white"></i> Generate Report</a>
</div>

<?php include('message.php'); ?>

<!-- DataTables Start-->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between py-2">
        <h6 class="m-0 font-weight-bold text-primary">List of Tool(s)</h6>
        <a href="tool_create.php" class="btn btn-sm btn-primary shadow-sm"><i
                class="fa fa-plus fa-sm text-white mr-1"></i>Add Tools</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive text-primary">
            <table class="table table-sm table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class='thead-light'>
                    <tr style="text-align:center">
                        <!-- <th>ID</th> -->
                        <th>Tool name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Purchase Price</th>
                        <th>Purchase Date</th>
                        <th width="12%">Options</th>
                    </tr>
                </thead>
                <tfoot class='thead-light'>
                    <tr style="text-align:center">
                        <!-- <th>ID</th> -->
                        <th>Tool name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Purchase Price</th>
                        <th>Purchase Date</th>
                        <th>Options</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php 
                $query = "SELECT * FROM tools";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $tool)
                    {
                        $date = $tool['purchase_date'];
                        ?>
                        <tr style="text-align:center">
                            <!-- <td></td> -->
                            <td><?= $tool['tool_name']; ?></td>
                            <td><?= $tool['category']; ?></td>
                            <td><?= $tool['quantity']; ?></td>
                            <td><?= $tool['purchase_price']; ?></td>
                            <td><?php echo date('M d, Y', strtotime($date))?></td>
                            <td>

                            
                            <a class="btn btn-sm btn-outline-primary" href="tool_view.php?tool_id=<?= $tool['tool_id']; ?>" 
                            data-toggle="tooltip" title='View Tool "<?= $tool['tool_name']; ?>"!' data-placement="top">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <!-- View -->
                            </a>

                            <a class="btn btn-sm btn-outline-success" href="tool_edit.php?tool_id=<?= $tool['tool_id']; ?>" 
                            data-toggle="tooltip" title='Edit Tool "<?= $tool['tool_name']; ?>"!' data-placement="top">
                            <i class="fa fa-edit fw-fa" aria-hidden="true"></i>
                            <!-- Edit -->
                            </a>

                            <form action="tool_code.php" method="POST" class="d-inline">
                                <button type="submit" name="delete_tool" value="<?=$tool['tool_id'];?>" class="btn btn-sm btn-outline-danger" onclick="msg()" 
                                data-toggle="tooltip" title='Delete Tool "<?= $tool['tool_name']; ?>"!' data-placement="top">
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

<!-- to not back when logout-->
<script type="text/javascript">
    window.history.forward();
    function noBack() {
        window.history.forward();
    }
</script>