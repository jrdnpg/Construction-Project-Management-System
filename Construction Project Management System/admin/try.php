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
 <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-3">
    <h1 class="h3 mb-0 text-gray-800">
        <i class="fa fa-user-cog fa-1x text-gray mr-1"></i>
        <b>Edit Profile</b>
    </h1>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-body">

            <div class="text-center">
            <img src="img/bg-login.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
            <h6> <i class="fas fa-edit fa-sm fa-fw mr-1 text-gray-600"></i> Edit Profile Picture</h6>
            <input type="file" class="text-center center-block file-upload small btn-outline-info">
        </div>
        
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card mb-8 shadow-sm">
            <div class="card-header py-3">

            <div class="card-body">
                            <p class="card-text text-info small">User Profile</p>
                        <div class="form-group">
                        <label>Name</label>
                        <?php echo $_SESSION['name']; ?>
                                <input type="text" name="last_name" required class="form-control" placeholder="User Name">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>Username</label>
                                
                                <?php echo $_SESSION['user_name']; ?>
                                <input type="text" name="last_name" required class="form-control" placeholder="Username">
                            </div>
                            <div class="col-sm-6">
                                <label>Password</label>
                                <input type="password" name="first_name" required class="form-control" placeholder="Password">
                            </div>
                        </div>
                            <hr>
                            <p class="card-text text-info small">Other Details</p>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label>Age</label>
                                <input type="text" name="last_name" required class="form-control" placeholder="Age">
                            </div>
                            <div class="col-sm-8">
                                <label>Address</label>
                                <input type="text" name="first_name" required class="form-control" placeholder="Address">
                            </div>
                        </div>
                        <hr>
                        <div class="btn-group">
                            <button type="button" class="btn btn-md btn-success">Update</button>
                            
                            <button type="button" class="btn btn-md btn-outline-danger">Delete</button>
                        </div>
                    </form>
            
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