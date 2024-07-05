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



        <div class="col-xl-10 col-lg-12 col-md-9">
        <?php include('message.php'); ?>
        <?php include('message_danger.php'); ?>
            <div class="card o-hidden border-0 shadow-lg">

            <div class="card-header py-3">

                <div class="d-sm-flex align-items-center justify-content-between py-2">
                <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-plus fa-1x text-gray-600 mr-1"></i>
       ADD TOOLS</h6>
                <a href="tools.php" class="btn btn-sm btn-info shadow-sm"><i
                        class="fa fa-undo fa-sm text-white-100 mr-1"></i>Back</a>
                </div>
            </div>
            <div class="card-body">
                
                <form class="user text-primary" action="tool_code.php" method="POST">
                    <div class="form-group">
                        <label>Tool Name</label>
                        <input type="text" name="tool_name" required class="form-control" placeholder="Tool Name">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select type="text" name="category" required class="form-control custom-select">
                            <option selected disabled value>Choose Category...</option>
                            <option>Hand Tool</option>
                            <option>Power Tool</option>
                            <option>Machine Tool</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                        <label>Quantity</label>
                        <input type="number" name="quantity" required class="form-control" placeholder="Quantity">
                        </div>
                        <div class="col-sm-4">
                        <label>Purchase Price</label>
                        <input type="number" name="purchase_price" required class="form-control" placeholder="Purchase Price">
                        </div>
                        <div class="col-sm-5">
                        <label>Purchase Date</label>
                        <input type="date" name="purchase_date" required class="form-control" placeholder="Purchase Date">
                        </div>
                    </div>
                    
                    <button type="submit" name="save_tool" class="btn btn-info btn-user ml-2">Save Tool</button>
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