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
<div class="d-sm-flex align-items-center justify-content-between mb-4 ml-2">
	<h1 class="h3 mb-0 text-gray-800">
        <i class="fa fa-envelope fa-1x text-gray-600 mr-1"></i>
        Messages
    </h1>
    <!-- <a href="emp_report.php" class="btn btn-sm btn-info shadow-sm">
        <i class="fas fa-plus fa-sm text-white mr-1"></i>Add Project</a> -->
</div>

<div class="row">
<div class="col-md-5">
<div class="card text-center shadow-sm">
        <div class="card-header">
            <h6 class="text-gray-800 text-left font-weight-bold">Inbox</h6>
        </div>
        <div class="card-body">
            <div class="card text-left">
            <?php 
                    $query = "SELECT * FROM messages ORDER BY cus_id DESC";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $mes)
                        {
                            $date = $mes['message_date']; 
                            $time = $mes['message_time']
                            ?>

                        <a class="btn  btn-outline-default" href="message_view.php?cus_id=<?= $mes['cus_id']; ?>" 
                        data-toggle="tooltip" title="Click to view this message!" data-placement="top">
                        
                        
                        <div class="small text-gray-800 text-left font-weight-bold"><span class="card-text text-gray-900"><?= $mes['customer_name']; ?></span></div>
                        <div class="small text-truncate text-gray-600"><?= $mes['customer_message']; ?></div>
                        <div class="small text-gray-700 text-left"> <?php echo date('M d, Y', strtotime($date))?> . <?php date_default_timezone_set('Asia/Manila'); echo date("h:i A", strtotime($time))?></div>
                                
                        
                        </a>
                    
                        <?php
                        }
                    }
                    else
                    {
                        echo "<small><center> No Messages </center></small>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="col-md-7">

<?php include('message.php'); ?>
                    

<?php
    if(isset($_GET['cus_id']))
    {
        $customer_ID = mysqli_real_escape_string($conn, $_GET['cus_id']);
        $query = "SELECT * FROM messages WHERE cus_id='$customer_ID' ";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            $date = $mes['message_date']; 
            $time = $mes['message_time'];

            $mes = mysqli_fetch_array($query_run);
?>
    
    <div class="card shadow-sm">
    <div class="card-header text-primary d-sm-flex align-items-center justify-content-between">
        <h1 class="h5 mb-0 text-primary">
            <?=$mes['customer_name'];?>
        </h1>
        <a href="message_view.php" class="btn btn-sm btn-outline-default">
            <i class="fas fa-times"></i></a>
    </div>

    <div class="card-body">
        <h5 class="card-title text-gray-900"><?=$mes['customer_subject'];?></h5> 
        <small class="card-text text-gray-600 font-weight-bold">
             Date : </small><small><?php echo date('M d, Y', strtotime($date))?>
        </small><br>
        <small class="card-text text-gray-600 font-weight-bold">
             Time : </small><small><?php date_default_timezone_set('Asia/Manila'); echo date("h:i A", strtotime($time))?>
        </small><br>
        <small class="card-text text-gray-600 font-weight-bold">Email : </small><a class="small mb-5" href=""><?=$mes['customer_email'];?></a>
        <hr>
    
            <p class="text-justify text-gray-800">
            <?=$mes['customer_message'];?>
            </p>
        <hr>

        <form action="mes_code.php" method="POST" class="d-inline">
            <button type="submit" name="delete_message" value="<?=$mes['cus_id'];?>" 
            class="btn btn-md btn-danger" style="float: right;" onclick="msg()">
            <!-- <i class="fa fa-trash fw-fa" aria-hidden="true"></i> -->
            Delete
            </button>
            <script>
                function msg(){
                    var result = confirm ('Are you sure you want to delete this message?');
                    if(result==false){
                        event.preventDefault();
                    }
                }
            </script>
        </form>

        <a href="https://accounts.google.com/ServiceLogin/signinchooser?service=mail&passive=1209600&osid=1&continue=https%3A%2F%2Fmail.google.com%2Fmail%2Fu%2F0%2F&followup=https%3A%2F%2Fmail.google.com%2Fmail%2Fu%2F0%2F&emr=1&ifkv=ARgdvAtgSyHyhBGEVZW7ZtSjPWOxlcHk_8v2InPvrxslO6CvXWqMxPqbC0lpcujS8Xbx8o7AwDGyPA&flowName=GlifWebSignIn&flowEntry=ServiceLogin" 
        class="btn btn-md btn-primary mr-3" style="float: right;">
            <!-- <i class="fab fa-facebook-f fa-fw"></i> -->
            Reply
        </a>
    </div>
    </div>
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