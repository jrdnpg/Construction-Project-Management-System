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
                Construction Supply Inventory List
            </h1>
            <a href="sup_report.php" class="btn btn-sm btn-info shadow-sm" value="print" onclick="PrintDiv();">
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
                    <h5><i>Inventory of Construction Supplies</i></h5>
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
                                <th>Item</th>
                                <th>Supplier</th>
                                <th>Brand</th>
                                <th>Unit</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Purchase Price</th>
                                <th>Purchase Date</th>
                            </thead>
                            <tbody>
                                <?php
                                 $no=1;
                                    $query = "SELECT * FROM supply";
                                    $result = mysqli_query($conn, $query) or die (mysqli_error($db));
                                
                                        while ($sup = mysqli_fetch_assoc($result)) {

                                            $date = $sup['item_purchase_date'];
                                                            
                                            echo '<tr style="text-align:center">';
                                            echo '<td>'.$no++.'</td>';
                                            echo '<td>'. $sup['item_name'].'</td>';
                                            echo '<td>'. $sup['supplier'].'</td>';
                                            echo '<td>'. $sup['brand'].'</td>';
                                            echo '<td>'. $sup['unit'].'</td>';
                                            echo '<td>'. $sup['description'].'</td>';
                                            echo '<td>'. $sup['item_quantity'].'</td>';
                                            echo '<td>'. $sup['item_purchase_price'].'</td>';
                                            echo '<td>'. date('M d, Y', strtotime($date)).'</td>';
                                            echo '</tr>';
                                        }
                                                            
                                    ?> 
                                    <tr style="text-align:center" class="font-weight-bold">
                                        <td>Total</td>
                                        <td>
                                        <?php
                                            $query = "SELECT item_id FROM supply ORDER BY item_id";
                                            $query_run = mysqli_query($conn, $query);
                                            $row = mysqli_num_rows($query_run);
                                            echo $row ;
                                        ?>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <?php
                                                $query = "SELECT sum(item_quantity) from supply";
                                                    $result = mysqli_query($conn,$query);
                                                    $row = mysqli_fetch_array($result); 
                                                    echo $row[0]; 
                                            ?>
                                        </td>
                                        <td>  
                                            <?php
                                            $query = "SELECT sum(item_purchase_price) from supply";
                                                $result = mysqli_query($conn,$query);
                                                $row = mysqli_fetch_array($result); 
                                                echo $row[0]; 
                                            ?>
                                        </td>
                                        <td> </td>
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

<!-- to not back when logout-->
<script type="text/javascript">
    window.history.forward();
    function noBack() {
        window.history.forward();
    }
</script>