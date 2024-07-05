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
                    <i class="fa fa-chart-pie fa-1x text-gray-600 mr-1"></i>
                    Charts
                </h1>
                <!-- <a href="charts.php" class="btn btn-sm btn-info shadow-sm" value="print" onclick="PrintDiv();">
                <i class="fas fa-print fa-sm text-white-60 mr-1"></i>
                Print Report
            </a> -->
                </div>
                <form action="" method="GET" >
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="text-primary">From Date</label>
                                                <input type="date" name="from_date" required value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="text-primary">To Date</label>
                                                <input type="date" name="to_date" required value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="text-primary">Click to Filter</label> <br>
                                            <button type="submit" class="btn btn-primary btn-md px-4"><i class="fas fa-filter fa-sm text-white-60 mr-2"></i>Filter</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
              

                    <!--Top 10 Highest Quantity Of Tools Start-->
                    <div class="row mb-4">
                        <!-- Tools Charts Start-->
                        <div class="col-sm-6">
                        <?php
                            include('db_conn.php');

                            if(isset($_GET['from_date']) && isset($_GET['to_date']))
                            {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                              
                                $sql =  "SELECT * FROM tools WHERE purchase_date BETWEEN '$from_date' AND '$to_date' ORDER BY quantity DESC LIMIT 10  ";
                                $result = mysqli_query($conn,$sql);
                                $charts="";
                                while ($row = mysqli_fetch_array($result)) { 
                                    $high_tool_name[]  = $row['tool_name']  ;
                                    $high_tool_quantity[] = $row['quantity'];


                                }
                            }

                        ?>

                        <div class="card border-left-info border-bottom-info shadow h-300 py-0" style="height: 21rem; ">
                            <div class="card-header text-info">
                                Top 10 Highest Quantity Of Tools
                                
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:15vh; width:30vw">
                                        <canvas  id="tool_chart_high"></canvas> 
                                </div>
                            </div>
                            <div class="card-footer">
                                
                                        <a href="tools.php" class="btn btn-info btn-icon-split btn-sm" style="float: right;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text text-xs mt-1">View Details</span>
                                        </a>
                                    
                            </div>
                        </div>
            
                        <script type="text/javascript">
                            var ctx = document.getElementById("tool_chart_high").getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels:<?php echo json_encode($high_tool_name); ?>,
                                                datasets: [{
                                                    backgroundColor: [
                                                        "#212C58",
                                                        "#334173",
                                                        "#48578E",
                                                        "#6171A9",
                                                        "#7D8EC4",
                                                        "#9DADDF",
                                                        "#C0CFFA"
                                                    ],
                                                    data:<?php echo json_encode($high_tool_quantity); ?>,
                                                }]
                                            },
                                            options: {
                                                legend: {
                                                display: true,
                                                position: 'bottom',
                        
                                                labels: {
                                                    fontColor: '#71748d',
                                                    fontFamily: 'Circular Std Book',
                                                    fontSize: 14,
                                                }
                                            },
                                        }
                                        });
                            </script>
                        </div>
                        <!--Top 10 Highest Quantity Of Tools-->
                        
                        <!--Top 10 Lowest Quantity Of Tools-->
                        <div class="col-sm-6">
                        <?php
                            include('db_conn.php');

                            if(isset($_GET['from_date']) && isset($_GET['to_date']))
                            {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                            
                                $sql =  "SELECT * FROM tools WHERE purchase_date BETWEEN '$from_date' AND '$to_date' ORDER BY quantity ASC LIMIT 10  ";
                                $result = mysqli_query($conn,$sql);
                                $charts="";
                                while ($row = mysqli_fetch_array($result)) { 
                                    $low_tool_name[]  = $row['tool_name']  ;
                                    $low_tool_quantity[] = $row['quantity'];


                                }
                            }

                        ?>

                        
                        <div class="card border-left-info border-bottom-info shadow h-200 py-0" style="height: 21rem; ">
                            <div class="card-header text-info">
                            Top 10 Lowest Quantity Of Tools
                                
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:15vh; width:30vw">
                                        <canvas  id="tool_chart_low"></canvas> 
                                </div>
                            </div>
                            <div class="card-footer">
                            <a href="tools.php" class="btn btn-info btn-icon-split btn-sm" style="float: right;">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text text-xs mt-1">View Details</span>
                            </a>
                            </div>
                        </div>


                        <script type="text/javascript">
                            var ctx = document.getElementById("tool_chart_low").getContext('2d');
                                        var myChart = new Chart (ctx, {
                                            type: 'bar',
                                            data: {
                                                labels:<?php echo json_encode($low_tool_name); ?>,
                                                datasets: [{
                                                    backgroundColor: [
                                                        "#212C58",
                                                        "#334173",
                                                        "#48578E",
                                                        "#6171A9",
                                                        "#7D8EC4",
                                                        "#9DADDF",
                                                        "#C0CFFA"
                                                    ],
                                                    data:<?php echo json_encode($low_tool_quantity); ?>,
                                                }]
                                            },
                                            options: {
                                                legend: {
                                                display: true,
                                                position: 'bottom',
                        
                                                labels: {
                                                    fontColor: '#71748d',
                                                    fontFamily: 'Circular Std Book',
                                                    fontSize: 14,

                                            
                                                }
                                            },
                        
                        
                                        }
                                        });
                            </script>
                        </div>
                         <!--Top 10 Lowest Quantity Of Tools-->
                   
                    </div>   
                     <!-- End Row -->


                    <!--Top 10 Highest Quantity Of Equipments Start-->
                    <div class="row mb-4">
                        <!-- Tools Charts Start-->
                        <div class="col-sm-6">
                        <?php
                            include('db_conn.php');

                            if(isset($_GET['from_date']) && isset($_GET['to_date']))
                            {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                              
                                $sql =  "SELECT * FROM equipments WHERE equip_purchase_date BETWEEN '$from_date' AND '$to_date' ORDER BY equip_quantity DESC LIMIT 10  ";
                                $result = mysqli_query($conn,$sql);
                                $charts="";
                                while ($row = mysqli_fetch_array($result)) { 
                                    $high_equip_name[]  = $row['equip_name']  ;
                                    $high_equip_quantity[] = $row['equip_quantity'];


                                }
                            }

                        ?>

                        <div class="card border-left-info border-bottom-info shadow h-300 py-0" style="height: 21rem; ">
                            <div class="card-header text-info">
                                Top 10 Highest Quantity Of Equipments
                                
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:15vh; width:30vw">
                                        <canvas  id="equip_chart_high"></canvas> 
                                </div>
                            </div>
                            <div class="card-footer">
                                
                                        <a href="equipments.php" class="btn btn-info btn-icon-split btn-sm" style="float: right;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text text-xs mt-1">View Details</span>
                                        </a>
                                    
                            </div>
                        </div>
            
                        <script type="text/javascript">
                            var ctx = document.getElementById("equip_chart_high").getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels:<?php echo json_encode($high_equip_name); ?>,
                                                datasets: [{
                                                    backgroundColor: [
                                                        "#212C58",
                                                        "#334173",
                                                        "#48578E",
                                                        "#6171A9",
                                                        "#7D8EC4",
                                                        "#9DADDF",
                                                        "#C0CFFA"
                                                    ],
                                                    data:<?php echo json_encode($high_equip_quantity); ?>,
                                                }]
                                            },
                                            options: {
                                                legend: {
                                                display: true,
                                                position: 'bottom',
                        
                                                labels: {
                                                    fontColor: '#71748d',
                                                    fontFamily: 'Circular Std Book',
                                                    fontSize: 14,
                                                }
                                            },
                                        }
                                        });
                            </script>
                        </div>
                        <!--Top 10 Highest Quantity Of Equipments End-->
                        
                        <!--Top 10 Lowest Quantity Of Equipments Start-->
                        <div class="col-sm-6">
                        <?php
                            include('db_conn.php');

                            if(isset($_GET['from_date']) && isset($_GET['to_date']))
                            {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                            
                                $sql =  "SELECT * FROM equipments WHERE equip_purchase_date BETWEEN '$from_date' AND '$to_date' ORDER BY equip_quantity ASC LIMIT 10  ";
                                $result = mysqli_query($conn,$sql);
                                $charts="";
                                while ($row = mysqli_fetch_array($result)) { 
                                    $low_equip_name[]  = $row['equip_name']  ;
                                    $low_equip_quantity[] = $row['equip_quantity'];
                                }
                            }

                        ?>

                        
                        <div class="card border-left-info border-bottom-info shadow h-200 py-0" style="height: 21rem; ">
                            <div class="card-header text-info">
                            Top 10 Lowest Quantity Of Equipments
                                
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:15vh; width:30vw">
                                        <canvas  id="equip_chart_low"></canvas> 
                                </div>
                            </div>
                            <div class="card-footer">
                            <a href="equipments.php" class="btn btn-info btn-icon-split btn-sm" style="float: right;">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text text-xs mt-1">View Details</span>
                            </a>
                            </div>
                        </div>


                        <script type="text/javascript">
                            var ctx = document.getElementById("equip_chart_low").getContext('2d');
                                        var myChart = new Chart (ctx, {
                                            type: 'bar',
                                            data: {
                                                labels:<?php echo json_encode($low_equip_name); ?>,
                                                datasets: [{
                                                    backgroundColor: [
                                                        "#212C58",
                                                        "#334173",
                                                        "#48578E",
                                                        "#6171A9",
                                                        "#7D8EC4",
                                                        "#9DADDF",
                                                        "#C0CFFA"
                                                    ],
                                                    data:<?php echo json_encode($low_equip_quantity); ?>,
                                                }]
                                            },
                                            options: {
                                                legend: {
                                                display: true,
                                                position: 'bottom',
                        
                                                labels: {
                                                    fontColor: '#71748d',
                                                    fontFamily: 'Circular Std Book',
                                                    fontSize: 14,

                                            
                                                }
                                            },
                        
                        
                                        }
                                        });
                            </script>
                        </div>
                         <!--Top 10 Lowest Quantity Of Equipments-->
                   
                    </div>   
                     <!-- End Row -->

                      <!--Top 10 Highest Quantity Of Supplies Start-->
                    <div class="row mb-4">
                        <!-- Tools Charts Start-->
                        <div class="col-sm-6">
                        <?php
                            include('db_conn.php');

                            if(isset($_GET['from_date']) && isset($_GET['to_date']))
                            {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                              
                                $sql =  "SELECT * FROM supply WHERE item_purchase_date BETWEEN '$from_date' AND '$to_date' ORDER BY item_quantity DESC LIMIT 10  ";
                                $result = mysqli_query($conn,$sql);
                                $charts="";
                                while ($row = mysqli_fetch_array($result)) { 
                                    $high_supply_name[]  = $row['item_name']  ;
                                    $high_supply_quantity[] = $row['item_quantity'];


                                }
                            }

                        ?>

                        <div class="card border-left-info border-bottom-info shadow h-300 py-0" style="height: 21rem; ">
                            <div class="card-header text-info">
                                Top 10 Highest Quantity Of Supplies
                                
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:15vh; width:30vw">
                                        <canvas  id="supply_chart_high"></canvas> 
                                </div>
                            </div>
                            <div class="card-footer">
                                
                                        <a href="supplies.php" class="btn btn-info btn-icon-split btn-sm" style="float: right;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text text-xs mt-1">View Details</span>
                                        </a>
                                    
                            </div>
                        </div>
            
                        <script type="text/javascript">
                            var ctx = document.getElementById("supply_chart_high").getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels:<?php echo json_encode($high_supply_name); ?>,
                                                datasets: [{
                                                    backgroundColor: [
                                                        "#212C58",
                                                        "#334173",
                                                        "#48578E",
                                                        "#6171A9",
                                                        "#7D8EC4",
                                                        "#9DADDF",
                                                        "#C0CFFA"
                                                    ],
                                                    data:<?php echo json_encode($high_supply_quantity); ?>,
                                                }]
                                            },
                                            options: {
                                                legend: {
                                                display: true,
                                                position: 'bottom',
                        
                                                labels: {
                                                    fontColor: '#71748d',
                                                    fontFamily: 'Circular Std Book',
                                                    fontSize: 14,
                                                }
                                            },
                                        }
                                        });
                            </script>
                        </div>
                        <!--Top 10 Highest Quantity Of Supplies End-->
                        
                        <!--Top 10 Lowest Quantity Of Supplies Start-->
                        <div class="col-sm-6">
                        <?php
                            include('db_conn.php');

                            if(isset($_GET['from_date']) && isset($_GET['to_date']))
                            {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                            
                                $sql =  "SELECT * FROM supply WHERE item_purchase_date BETWEEN '$from_date' AND '$to_date' ORDER BY item_quantity ASC LIMIT 10  ";
                                $result = mysqli_query($conn,$sql);
                                $charts="";
                                while ($row = mysqli_fetch_array($result)) { 
                                    $low_supply_name[]  = $row['item_name']  ;
                                    $low_supply_quantity[] = $row['item_quantity'];
                                }
                            }

                        ?>

                        
                        <div class="card border-left-info border-bottom-info shadow h-200 py-0" style="height: 21rem; ">
                            <div class="card-header text-info">
                            Top 10 Lowest Quantity Of Supplies
                                
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:15vh; width:30vw">
                                        <canvas  id="supply_chart_low"></canvas> 
                                </div>
                            </div>
                            <div class="card-footer">
                            <a href="supplies.php" class="btn btn-info btn-icon-split btn-sm" style="float: right;">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text text-xs mt-1">View Details</span>
                            </a>
                            </div>
                        </div>


                        <script type="text/javascript">
                            var ctx = document.getElementById("supply_chart_low").getContext('2d');
                                        var myChart = new Chart (ctx, {
                                            type: 'bar',
                                            data: {
                                                labels:<?php echo json_encode($low_supply_name); ?>,
                                                datasets: [{
                                                    backgroundColor: [
                                                        "#212C58",
                                                        "#334173",
                                                        "#48578E",
                                                        "#6171A9",
                                                        "#7D8EC4",
                                                        "#9DADDF",
                                                        "#C0CFFA"
                                                    ],
                                                    data:<?php echo json_encode($low_supply_quantity); ?>,
                                                }]
                                            },
                                            options: {
                                                legend: {
                                                display: true,
                                                position: 'bottom',
                        
                                                labels: {
                                                    fontColor: '#71748d',
                                                    fontFamily: 'Circular Std Book',
                                                    fontSize: 14,

                                            
                                                }
                                            },
                        
                        
                                        }
                                        });
                            </script>
                        </div>
                         <!--Top 10 Lowest Quantity Of Supplies-->
                   
                    </div>   
                     <!-- End Row -->


                    <!--projects-->
                    <div class="row mb-4">
                       
                        <div class="col-sm-6">
                        <?php
                            include('db_conn.php');

                            if(isset($_GET['from_date']) && isset($_GET['to_date']))
                            {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                                
                              
                                $sql =  "SELECT * FROM projects WHERE completed BETWEEN '$from_date' AND '$to_date' ORDER BY cost DESC LIMIT 10  ";
                                $result = mysqli_query($conn,$sql);
                                $charts="";
                                while ($row = mysqli_fetch_array($result)) { 
                                    $com[]  = $row['completed']  ;
                                    $cost[] = $row['cost'];


                                }
                            }

                        ?>

                        <div class="card border-left-info border-bottom-info shadow h-300 py-0" style="height: 21rem; ">
                            <div class="card-header text-info">
                                Completed Projects Cost
                                
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:15vh; width:30vw">
                                        <canvas  id="projects"></canvas> 
                                </div>
                            </div>
                            <div class="card-footer">
                                
                                        <a href="projects_view.php" class="btn btn-info btn-icon-split btn-sm" style="float: right;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text text-xs mt-1">View Details</span>
                                        </a>
                                    
                            </div>
                        </div>
            
                        <script type="text/javascript">
                            var ctx = document.getElementById("projects").getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                                labels:<?php echo json_encode($com); ?>,
                                                datasets: [{
                                                    backgroundColor: [
                                                        "#212C58",
                                                        "#334173",
                                                        "#48578E",
                                                        "#6171A9",
                                                        "#7D8EC4",
                                                        "#9DADDF",
                                                        "#C0CFFA"
                                                    ],
                                                    data:<?php echo json_encode($cost); ?>,
                                                }]
                                            },
                                            options: {
                                                legend: {
                                                display: true,
                                                position: 'bottom',
                        
                                                labels: {
                                                    fontColor: '#71748d',
                                                    fontFamily: 'Circular Std Book',
                                                    fontSize: 14,
                                                }
                                            },
                                        }
                                        });
                            </script>
                        </div>
                        <!--projects-->

                        <!--projects-->
                        <div class="col-sm-6">
                        <?php
                            include('db_conn.php');

                            if(isset($_GET['from_date']) && isset($_GET['to_date']))
                            {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                            
                                $sql =  "SELECT * FROM projects ORDER BY cost ASC LIMIT 10  ";
                                $result = mysqli_query($conn,$sql);
                                $charts="";
                                while ($row = mysqli_fetch_array($result)) { 
                                    $loc[]  = $row['location']  ;
                                    $cos[] = $row['cost'];
                                }
                            }

                        ?>

                        
                        <div class="card border-left-info border-bottom-info shadow h-200 py-0" style="height: 21rem; ">
                            <div class="card-header text-info">
                            Cost Of Projects Per Location
                                
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:15vh; width:30vw">
                                        <canvas  id="proj"></canvas> 
                                </div>
                            </div>
                            <div class="card-footer">
                            <a href="projects_view.php" class="btn btn-info btn-icon-split btn-sm" style="float: right;">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text text-xs mt-1">View Details</span>
                            </a>
                            </div>
                        </div>


                        <script type="text/javascript">
                            var ctx = document.getElementById("proj").getContext('2d');
                                        var myChart = new Chart (ctx, {
                                            type: 'bar',
                                            data: {
                                                labels:<?php echo json_encode($loc); ?>,
                                                datasets: [{
                                                    backgroundColor: [
                                                        "#212C58",
                                                        "#334173",
                                                        "#48578E",
                                                        "#6171A9",
                                                        "#7D8EC4",
                                                        "#9DADDF",
                                                        "#C0CFFA"
                                                    ],
                                                    data:<?php echo json_encode($cos); ?>,
                                                }]
                                            },
                                            options: {
                                                legend: {
                                                display: true,
                                                position: 'bottom',
                        
                                                labels: {
                                                    fontColor: '#71748d',
                                                    fontFamily: 'Circular Std Book',
                                                    fontSize: 14,

                                            
                                                }
                                            },
                        
                        
                                        }
                                        });
                            </script>
                        </div>
                         <!--projects-->
                   
                    </div>   
                     <!-- End Row -->
                </span>

               
                           
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