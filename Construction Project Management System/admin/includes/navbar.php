<?php
require 'db_conn.php';
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-info sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
    <div class="sidebar-brand-icon mb-1">
        <i class="fas fa-home fa-3x"></i>
    </div>
    <div class="sidebar-brand-text text-white">
        seas
        <br>
        <sup>Construction</sup>
       
    </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="admin.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Main Menu
    
</div>

<!-- Nav Item - Project Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProject"
        aria-expanded="true" aria-controls="collapseProject">
        <i class="fas fa-fw fa-suitcase "></i>
        <span>Project Management</span>
    </a>
    <div id="collapseProject" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Project Management:</h6>
            <a class="collapse-item" href="projects_view.php">Projects</a>
            <a class="collapse-item" href="calendar.php">Calendar</a>
            <a class="collapse-item" href="employees.php">Employees</a>
            <a class="collapse-item" href="dtr.php">Daily Time Record</a>
            <a class="collapse-item" href="location.php">Work Location</a>
        </div>
    </div>
</li>

<!-- Nav Item - Inventory Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseinventory"
        aria-expanded="true" aria-controls="collapseinventory">
        <i class="fas fa-fw fa-list-alt"></i> 
        <span>Inventory</span>
    </a>
    <div id="collapseinventory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Inventory:</h6>
            <a class="collapse-item" href="tools.php">Tools</a>
            <a class="collapse-item" href="equipments.php">Equipments</a>
            <a class="collapse-item" href="supplies.php">Construction Supplies</a>
        </div>
    </div>
</li>

<!-- Nav Item - Documents Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDocu"
        aria-expanded="true" aria-controls="collapseDocu">
        <i class="fa fa-fw fa-folder"></i> 
        <span>Reports</span>
    </a>
    <div id="collapseDocu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Reports:</h6>
            <a class="collapse-item" href="emp_report.php">List of Employee</a>
            <a class="collapse-item" href="tool_report.php">List of Tools</a>
            <a class="collapse-item" href="equip_report.php">List of Equipments</a>
            <a class="collapse-item" href="sup_report.php">List of Supplies</a>
            <a class="collapse-item" href="attendance_report.php">Attendance</a>
            <a class="collapse-item" href="payroll.php">Payroll</a>
        </div>
    </div>
</li>

<!-- Nav Item - Documents Collapse Menu -->


<!-- Nav Item - Charts -->
<!-- <li class="nav-item">
    <a class="nav-link" href="calendar.php">
    <i class="fas fa-fw fa-calendar"></i>
        <span>Calendar</span></a> -->

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

</li>
<!-- Heading -->
<div class="sidebar-heading">
    Others
</div>

<!-- Nav Public View Editor Charts -->
<!-- <li class="nav-item">
    <a class="nav-link" href="publicview_edit.php">
        <i class="fas fa-fw fa-cog"></i>
        <span>Public View Editor</span></a>
</li> -->

<!-- Nav Messages - Tables -->
<li class="nav-item">
    <a class="nav-link" href="message_view.php">
        <i class="fas fa-fw fa-envelope"></i>
        <span>Messages</span></a>
</li>
<!-- Nav Comments - Tables -->
<li class="nav-item">
    <a class="nav-link" href="comment_view.php">
        <i class="fas fa-fw fa-comments"></i>
        <span>Comments</span></a>
</li>

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Sidebar Message -->
<!-- <div class="sidebar-card d-none d-lg-flex">
    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
    <p class="text-center mb-2"><strong>Have some questions?</strong> </p>
    <a class="btn btn-success btn-sm" href="https://web.facebook.com/?_rdc=1&_rdr">Go to Home!</a>
</div> -->

</ul>
<!-- End of Sidebar -->

<!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up fa-3x"></i>
    </a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-info" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>  

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" >

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-gray-200 topbar mb-4 static-top shadow  text-white">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars text-info"></i>
        </button>

        <!-- Topbar Search -->
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-2 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" id="search" onchange= "openPage()"
                 placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
               
                 <script>
                    function openPage(){
                        var x = document.getElementById("search").value;

                        if (x === "tools"){
                            window.open("tools.php");
                        }
                        if (x === "employee"){
                            window.open("employees.php");
                        }
                        if (x === "equipments"){
                            window.open("equipments.php");
                        }
                    }
                </script>
               
                    <div class="input-group-append">
                    <button class="btn btn-info" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw text-gray-600"></i>
                </a>
                <!-- Dropdown - Search -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-info" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Nav Item - Notifications -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" 
                    data-toggle="tooltip" title="Click to view comments!" data-placement="top">
                    <i class="fas fa-comments fa-fw text-gray-600"></i>
                    <!-- Counter - Notifications -->
                    <span class="badge badge-danger badge-counter">
                    <?php
                                                
                        $query = "SELECT com_id FROM comments ORDER BY com_id";
                        $query_run = mysqli_query($conn, $query);

                        $row = mysqli_num_rows($query_run);

                        echo $row ;

                    ?>
                    </span>
                </a>

               

                <!-- Dropdown - Notifications -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header bg-info border-info">
                        Comments
                    </h6>
                    </h6>
                    <?php 
                        $query = "SELECT * FROM comments ORDER BY com_id DESC LIMIT 2";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $mes)
                            {
                    ?>
                    <a class="dropdown-item d-flex align-items-center" href="comment_view.php?com_id=<?= $mes['com_id']; ?>">
                        <div>
                            <div class="small text-gray-500"><?= $mes['comment_name']; ?></div>
                            <div class="text-truncate font-weight-bold "><?= $mes['comment_message']; ?></div>
                            <div class="small text-gray-500"><?= $mes['comment_date']; ?></div>
                        </div>
                    </a>
                    <?php
                            }
                        }
                        else
                        {
                            echo "<small><center> No Comments </center></small>";
                        }
                    ?>
                    <a class="dropdown-item text-center small text-gray-500" href="comment_view.php">Show All Comments</a>
                </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    data-toggle="tooltip" title="Click to view messages!" data-placement="top">
                    <i class="fas fa-envelope fa-fw text-gray-600"></i>
                    <!-- Counter - Messages -->
                    <span class="badge badge-danger badge-counter"> 
                        <?php
                                                
                            $query = "SELECT cus_id FROM messages ORDER BY cus_id";
                            $query_run = mysqli_query($conn, $query);

                            $row = mysqli_num_rows($query_run);

                            echo $row ;

                        ?>
                                                    
                    </span>
                </a>

                <!-- Dropdown - Messages -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header bg-info border-info">
                        Messages
                    </h6>
                    
                    <?php 
                $query = "SELECT * FROM messages ORDER BY cus_id DESC LIMIT 2";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $mes)
                    {
                        ?>

                    <a class="dropdown-item d-flex align-items-center" href="message_view.php?cus_id=<?= $mes['cus_id']; ?>" 
                    data-toggle="tooltip" title="Click to view this message!" data-placement="top">
                        <div class="dropdown-list-item mr-2">
                            <!-- <img class="rounded-circle" src="img/signup.jpg"
                                alt="..."> -->
                            
                        </div>
                        <div class="font-weight-bold">
                            <div class="text-truncate"><?= $mes['customer_message']; ?></div>
                            <div class="small text-gray-500"><?= $mes['customer_name']; ?> · <?= $mes['message_date']; ?></div>
                        </div>
                    </a>

                    <?php
                    }
                }
                else
                {
                    echo "<small><center> No Messages </center></small>";
                }
            ?>
                    <a class="dropdown-item text-center small text-gray-600" href="message_view.php">Read More Messages</a>
                    
                </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <span class="mr-2 mt-2 d-none d-lg-inline text-info small text-uppercase">
                        <?php echo $_SESSION['name']; ?>
                    </span>
                    <img class="img-profile rounded-circle"
                        src="img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <!-- <a class="dropdown-item" href="profile.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile 
                    </a> -->
                    <!-- <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a> -->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>

                    
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    