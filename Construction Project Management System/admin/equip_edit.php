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
       EDIT EQUIPMENTS</h6>
                <a href="equipments.php" class="btn btn-sm btn-info shadow-sm"><i
                        class="fa fa-undo fa-sm text-white-100 mr-1"></i>Back</a>
                </div>
            </div>
            <div class="card-body">
            <?php
                if(isset($_GET['equip_id']))
                {
                    $equip_ID = mysqli_real_escape_string($conn, $_GET['equip_id']);
                    $query = "SELECT * FROM equipments WHERE equip_id='$equip_ID' ";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $equip = mysqli_fetch_array($query_run);
            ?>
                
                <form class="user text-primary" action="equip_code.php" method="POST">
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                        <input type="hidden" name="equip_id" value="<?= $equip['equip_id']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Equipment Name</label>
                        <input type="text" name="equip_name" value="<?= $equip['equip_name']; ?>" required class="form-control" placeholder="Equipment Name">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Manufacturer</label>
                        <input type="text" name="manufacturer" value="<?= $equip['manufacturer']; ?>" required class="form-control" placeholder="Manufacturer">
                        </div>
                        <div class="col-sm-6">
                        <label>Model</label>
                        <input type="text" name="model" value="<?= $equip['model']; ?>" required class="form-control" placeholder="Model">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                        <label>Quantity</label>
                        <input type="number" name="equip_quantity" value="<?= $equip['equip_quantity']; ?>" class="form-control" placeholder="Quantity">
                        </div>
                        <div class="col-sm-4">
                        <label>Purchase Price</label>
                        <input type="number" name="equip_purchase_price" value="<?= $equip['equip_purchase_price']; ?>" class="form-control" placeholder="Purchase Price">
                        </div>
                        <div class="col-sm-5">
                        <label>Purchase Date</label>
                        <input type="date" name="equip_purchase_date" value="<?= $equip['equip_purchase_date']; ?>" class="form-control" placeholder="Purchase Date">
                        </div>
                    </div>
                    
                    <button type="submit" name="update_equip" class="btn btn-info btn-user ml-2">Update Equipment</button>
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