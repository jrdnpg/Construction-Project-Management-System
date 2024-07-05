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
        Employee Payroll
    </h1>
    <a href="payroll.php" class="btn btn-sm btn-info shadow-sm" value="print" onclick="PrintDiv();">
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
                    <h5><i>Payroll</i></h5>
                    <small>Payroll for the period of 
                        <?php 
                    if(isset($_GET['from_date']))
                    { 
                        $from = $_GET['from_date']; 
                        echo  date('M d, Y', strtotime($from));
                    } 
                    ?> to
                     <?php
                      if(isset($_GET['to_date']))
                      { 
                        $to = $_GET['to_date']; 
                        echo  date('M d, Y', strtotime($to));
                      } 
                      ?>
                      </small>
                    </center>
           
                </div>
                 <br>
                <div class="card-body py-0">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover" width="100%" cellspacing="0">
                            <thead class='thead-light' style="text-align:center">
                                    <th rowspan="2">No.</th>
                                    <th>Employee Name</th>
                                    <th>Position</th>
                                    <th colspan="2">Days Worked</th>
                                    <th>Amount</th>
                                    <th colspan="2">Overtime</th>
                                    <th>OT Amount</th>
                                    <th>Net Income</th> 
                            </thead>
                            <thead class='thead-light' style="text-align:center">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>No. of days</th>
                                    <th>Rate/day</th>
                                    <th></th>
                                    <th>No. of hours</th>
                                    <th>Rate/hour</th>
                                    <th></th>
                                    <th></th>
                            </thead>
                            <tbody>
                            <?php 
                                $conn = mysqli_connect("localhost","root","","construction");

                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    function dateDifference($from_date, $to_date)
                                        {
                                            // calulating the difference in timestamps 
                                            $diff = strtotime($from_date) - strtotime($to_date);
                                            
                                            // 1 day = 24 hours 
                                            // 24 * 60 * 60 = 86400 seconds
                                            return ceil(abs($diff / 86400));
                                        }
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];
                                    $dateDiff = dateDifference($from_date, $to_date);

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
                                            $PmOut = $row['pm_out'];
                                            $rate_hours = $row['salary']/11;
                                            $ot = $row['ot'];
                                           

                                            $rate = $row['salary'];
                                            $amount = $dateDiff * $rate;
                                            $ot_amount = $rate_hours * $ot;
                                          
                                            
                                            ?>
                                            <tr style="text-align:center">
                                                <td><?php echo $no; ?></td>
                                                <td><?= $row['first_name']; ?> <?= $row['mid_name']; ?> <?= $row['last_name']; ?></td>
                                                <td><?= $row['position']; ?></td>
                                                <td><?php echo $dateDiff; ?></td>
                                                <td><?= $row['salary']; ?></td>
                                                <td><?php echo number_format($amount, 2); ?></td>
                                                <td>
                                                    <?php if (isset($ot)) {
                                                    echo $ot;
                                                    } else {
                                                    echo "Variable does not exist";
                                                    } ?>
                                                </td>
                                                <td>
                                                    <?php if (isset($ot)) {
                                                    echo number_format($rate_hours, 2);
                                                    } else {
                                                    echo "Variable does not exist";
                                                    } ?>
                                                </td>
                                                <td>
                                                <?php if (isset($ot)) {
                                                    
                                                    echo number_format($ot_amount, 2);
                                                    } else {
                                                    echo "Variable does not exist";
                                                    } ?>
                                                </td>
                                                <td>
                                                    <?php if (isset($ot)) {
                                                    $total = $amount + $ot_amount;
                                                    echo number_format($total, 2);
                                                    } else {
                                                    echo number_format($amount, 2);
                                                    } ?></td>
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