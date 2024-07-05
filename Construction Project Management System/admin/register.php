<?php 
include('includes/header.php');
?>


<body>
  
<style type="text/css">
        body{
            background-image: url('images/banner.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            min-height: 100vh;
            width: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.5)50%, rgba(0, 0, 0, 0.5)), url(images/banner.png);
            background-position: top;
            background-size: cover;
            position: relative;
    }
    </style>

    <div class="container">
        
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login">
                                <img src="img/5.jpg" class="img-fluid img-responsive" style="width:100%; height:100%" alt="...">
                            </div>
                            <div class="col-lg-6">
                            <a href="login.php" type="button" class="btn btn-md btn-outline-default mt-2 mr-2" style="float: right;">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900">Create an Account</h1>
                                        <small class="mb-4">Note: Only Admin can Create an Account!</small>
                                    </div> 

                            <form class="user mt-2" action="signup.php" method="post">

                                <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>

                                <?php if (isset($_GET['success'])) { ?>
                                    <p class="success"><?php echo $_GET['success']; ?></p>
                                <?php } ?>


                                <?php if (isset($_GET['name'])) { ?>
                                    <div class="form-group">
                                            <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName"
                                                placeholder="Full name" value="<?php echo $_GET['name']; ?>">
                                    </div>
                                <?php }else{ ?>
                                    <div class="form-group">
                                            <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName"
                                                placeholder="Full name">
                                    </div>
                                <?php }?>

                                <?php if (isset($_GET['uname'])) { ?>
                                    <div class="form-group">
                                            <input type="text" name="uname" class="form-control form-control-user" id="exampleFirstName"
                                                placeholder="Username" value="<?php echo $_GET['uname']; ?>">
                                    </div>

                                <?php }else{ ?>
                                    <div class="form-group">
                                            <input type="text" name="uname" class="form-control form-control-user" id="exampleFirstName"
                                                placeholder="Username">
                                    </div>
                                <?php }?>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password"class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                
                                    <div class="col-sm-6">
                                        <input type="password" name="re_password"class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Repeat Password">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info btn-user btn-block">Sign Up</button>
                               
                                
                                <!-- <a href="admin.php" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="admin.php" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> -->
                            </form>
                            <hr>
                            <!-- <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div> -->
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

<?php 
include('includes/scripts.php');
?>