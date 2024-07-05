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
       EDIT ITEM</h6>
                <a href="supplies.php" class="btn btn-sm btn-info shadow-sm"><i
                        class="fa fa-undo fa-sm text-white-100 mr-1"></i>Back</a>
                </div>
            </div>
            <div class="card-body">
            <?php
                if(isset($_GET['item_id']))
                {
                    $item_ID = mysqli_real_escape_string($conn, $_GET['item_id']);
                    $query = "SELECT * FROM supply WHERE item_id='$item_ID' ";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $sup = mysqli_fetch_array($query_run);
            ?>
                
                <form class="user text-primary" action="sup_code.php" method="POST">
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                        <input type="hidden" name="item_id" value="<?= $sup['item_id']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Item Name</label>
                        <input type="text" name="item_name" value="<?= $sup['item_name']; ?>" required class="form-control" placeholder="Enter Item Name">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Supplier</label>
                        <input type="text" name="supplier" value="<?= $sup['supplier']; ?>" required class="form-control" placeholder="Enter Supplier">
                        </div>
                        <div class="col-sm-6">
                        <label>Brand</label>
                        <input type="text" name="brand" value="<?= $sup['brand']; ?>" required class="form-control" placeholder="Enter Brand">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Unit</label>
                        <input type="text" name="unit" value="<?= $sup['unit']; ?>" required class="form-control" placeholder="Enter Unit">
                        </div>
                        <div class="col-sm-6">
                        <label>Description</label>
                        <input type="text" name="description" value="<?= $sup['description']; ?>"required class="form-control" placeholder="Enter Description">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                        <label>Quantity</label>
                        <input type="number" name="item_quantity" value="<?= $sup['item_quantity']; ?>" required class="form-control" placeholder="Enter Quantity">
                        </div>
                        <div class="col-sm-4">
                        <label>Purchase Price</label>
                        <input type="number" name="item_purchase_price" value="<?= $sup['item_purchase_price']; ?>" required class="form-control" placeholder="Enter Purchase Price">
                        </div>
                        <div class="col-sm-5">
                        <label>Purchase Date</label>
                        <input type="date" name="item_purchase_date" value="<?= $sup['item_purchase_date']; ?>" required class="form-control" placeholder="Enter Purchase Date">
                        </div>
                    </div>
                    
                    <button type="submit" name="update_item" class="btn btn-info btn-user ml-2">Update Item</button>
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