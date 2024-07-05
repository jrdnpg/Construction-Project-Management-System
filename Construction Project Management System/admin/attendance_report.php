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
 <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-1">
    <h1 class="h3 mb-0 text-gray-800">
        <!-- <i class="fas fa-fw fa-list-alt"></i>  -->
        Employee Attendance
    </h1>
    <a href="attendance_report.php" class="btn btn-sm btn-info shadow-sm" value="print" onclick="PrintDiv();">
        <i class="fas fa-print fa-sm text-white-60 mr-1"></i>
        Print Report
    </a>
    
</div>
<hr>

<div class="row justify-content-center">
            <div class="col-md-12">
             
                    
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-primary">From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-primary">To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-primary">Click to Filter</label> <br>
                                      <button type="submit" class="btn btn-primary px-5"><i class="fas fa-filter fa-sm text-white-60 mr-2"></i>Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                 



                <span id="divToPrint" style="width: 100%;">
            <div class="card shadow">  
                <div class="card-header">
                <hr>
                    <center>
                    <h3><b>Seas 226 Construction Supplies Trading</b></h3>
                    <h5><i>Daily Time Record</i></h5>
                    </center>
                <hr>
                    <div class="ml-2">
                        <small><?php echo date("l");?> ,<?php echo date("M d, Y");?></small><br>
                    </div>
                </div>
                 <br>
                <div class="card-body py-0">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover" width="100%" cellspacing="0">
                            <thead class='thead-light' style="text-align:center">
                                    <th>No.</th>
                                    <th>Employee Name</th>
                                    <th>Position</th>
                                    <th>Am</th>
                                    <th>PM</th>
                            </thead>
                            <tbody>
                            <?php 
                                $conn = mysqli_connect("localhost","root","","construction");

                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];
                                    $no=1;
                                    $query =  "SELECT * FROM employees, dtr WHERE employees.emp_id = dtr.employee_id AND dtr_date BETWEEN '$from_date' AND '$to_date' ";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            $AmIn = $row['am_in'];
                                            $AmOut = $row['am_out'];
                                            $PmIn = $row['pm_in'];
                                            $PmOut = $row['pm_out']
                                            ?>
                                            <tr style="text-align:center">
                                                <td><?php echo $no; ?></td>
                                                <td><?= $row['first_name']; ?> <?= $row['mid_name']; ?> <?= $row['last_name']; ?></td>
                                                <td><?= $row['position']; ?></td>
                                                <td>    
                                                    <small class="text-gray-800"> 
                                                    Time In 
                                                    </small>
                                                    <small class="text-primary">                     
                                                    <?php date_default_timezone_set('Asia/Manila'); echo date("h:i A", strtotime($AmIn))?>
                                                    </small> <br>
                                                    <small  class="text-gray-800">
                                                    Time Out 
                                                    </small>
                                                    <small  class="text-danger">
                                                    <?php date_default_timezone_set('Asia/Manila'); echo date("h:i A", strtotime($AmOut))?>
                                                    </small>    
                                            
                                                <td>    
                                                    <small class="text-gray-800"> 
                                                    Time In 
                                                    </small>
                                                    <small class="text-primary">                     
                                                    <?php date_default_timezone_set('Asia/Manila'); echo date("h:i A", strtotime($PmIn))?>
                                                    </small> <br>
                                                    <small  class="text-gray-800">
                                                    Time Out 
                                                    </small>
                                                    <small  class="text-danger">
                                                    <?php date_default_timezone_set('Asia/Manila'); echo date("h:i A", strtotime($PmOut))?>
                                                    </small>   
                                                 </td> 
                                            </tr>
                                            <?php
                                            $no++;
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                            ?>
                            </tbody>    
                        </table>
                    </div>
                </div>
            </div>
        </span>

                            </tbody>
                        </table>
                    </div>
                

                <script type="text/javascript">     
                    function PrintDiv() {    
                    var divToPrint = document.getElementById('divToPrint');
                    var popupWin = window.open('', '_blank', 'width=800,height=800');
                    popupWin.document.open();
                    popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
                    popupWin.document.close();
                            }
                </script>

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