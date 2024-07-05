<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->

    <div class="row justify-content-center"> 

    <?php include('message.php'); ?>

        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg">

            <div class="card-header py-3">

                <div class="d-sm-flex align-items-center justify-content-between py-2">
                <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-plus fa-1x text-gray-600 mr-3"></i>
                ADD EQUIPMENT</h6>
                <a href="equipments.php" class="btn btn-sm btn-danger shadow-sm"><i
                        class="fa fa-undo fa-sm text-white-100 mr-1"></i>Back</a>
                </div>
            </div>
                <div class="card-body">
                    
                    <form class="user" action="tool_code.php" method="POST">
                        <div class="form-group">
                            <label>Equipment Name</label>
                            <input type="text" name="equip_name" required class="form-control" placeholder="Equipment Name">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Manufacturer</label>
                            <input type="text" name="manufacturer" required class="form-control" placeholder="Manufacturer">
                            </div>
                            <div class="col-sm-6">
                            <label>Model</label>
                            <input type="text" name="model" required class="form-control" placeholder="Model">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                            <label>Quantity</label>
                            <input type="number" name="equip_quantity" required class="form-control" placeholder="Quantity">
                            </div>
                            <div class="col-sm-5">
                            <label>Purchase Price</label>
                            <input type="number" name="equip_purchase_price" required class="form-control" placeholder="Purchase Price">
                            </div>
                            <div class="col-sm-5">
                            <label>Purchase Date</label>
                            <input type="date" name="equip_purchase_date" required class="form-control" placeholder="Purchase Date">
                            </div>
                        </div>

                        <button type="submit" name="save_equip" required  class="btn btn-info">Save Tool</button>
                    </form>
                    
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