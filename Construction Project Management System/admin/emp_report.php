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
            <!-- <i class="fas fa-fw fa-list-alt"></i>  -->
                List Of Employee(s)
            </h1>
            <a href="emp_report.php" class="btn btn-sm btn-info shadow-sm" value="print" onclick="PrintDiv();">
                <i class="fas fa-print fa-sm text-white-60 mr-1"></i>
                Print Report
            </a>
        </div>
                    
        <span id="divToPrint" style="width: 100%;">
            <div class="card shadow mb-4">  
                <div class="card-header py-2">
                <hr>
                    <center>
                    <h3><b>Seas 226 Construction Supplies Trading</b></h3>
                    <h5><i>List of Employee(s)</i></h5>
                    </center>
                <hr>
                    <div class="ml-2">
                        <small><b>Day :</b> <?php echo date("l");?></small><br>
                        <small><b>Date :</b> <?php echo date("M d, Y");?></small><br>
                        <small><b>Time :</b> <?php date_default_timezone_set('Asia/Manila'); echo date("h:i a");?></small>
                    </div>
                </div>
                 <br>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover" width="100%" cellspacing="0">
                            <thead class='thead-light'>
                                <tr style="text-align:center">
                                    <th>No.</th>
                                    <th>Employee Name</th>
                                    <th>Position</th>
                                    <th>Age</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Daily Rate</th>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    $query = "SELECT * FROM employees";
                                    $result = mysqli_query($conn, $query) or die (mysqli_error($db));
                                
                                        while ($emp = mysqli_fetch_assoc($result)) {
                                                            
                                            echo '<tr style="text-align:center">';
                                            echo '<td>'.$no++.'</td>';
                                            echo '<td>'. $emp['last_name'] .', '. $emp['first_name'] .' '. $emp['mid_name'] .'</td>';
                                            echo '<td>'. $emp['position'].'</td>';
                                            echo '<td>'. $emp['age'].'</td>';
                                            echo '<td>'. $emp['address'].'</td>';
                                            echo '<td>'. $emp['phone'].'</td>';
                                            echo '<td>'. $emp['salary'].'</td>';
                                            echo '</tr>';
                                        }
                                                            
                                    ?> 
                                    <tr style="text-align:center" class="font-weight-bold">
                                        <td>Total</td>
                                        <td>
                                        <?php
                                            $query = "SELECT emp_id FROM employees ORDER BY emp_id";
                                            $query_run = mysqli_query($conn, $query);
                                            $row = mysqli_num_rows($query_run);
                                            echo $row ;
                                        ?>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td> <?php
                                            $query = "SELECT sum(salary) from employees";
                                                $result = mysqli_query($conn,$query);
                                                $row = mysqli_fetch_array($result); 
                                                echo $row[0]; 
                                            ?></td>
                                    </tr>
                            </tbody>    
                        </table>
                    </div>
                </div>
            </div>
        </span>
            
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