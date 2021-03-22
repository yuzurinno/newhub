<?php
session_start();
include 'includes/connection.php';
include 'includes/select.php';

$sess = $_SESSION['username'];
$fname = $_SESSION['first_name'];
$lname = $_SESSION['last_name'];
$designation = $_SESSION['designation'];
if(empty($_SESSION['username'])){
    header("location:login.php");
}

$page_header = "HACT <small>Monitoring System</small>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Color Admin | Dashboard</title>
    <?php include 'includes/head.php'; ?>
    <style>
        table td {
            word-break: keep-all !important;
        }
       
   
    </style>
</head>


<body>
<div id="page-loader" class="fade show">
        <span class="spinner"></span>
    </div>
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        <?php include 'includes/header.php'; ?>
        
<div id="sidebar" class="sidebar">
    <div data-scrollbar="true" data-height="100%">
        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img src="assets/img/user/user-13.jpg" alt="" />
                    </div>
                    <div class="info">
                        <?php echo "$fname $lname"; ?>
                        <small><?php echo $designation; ?></small>
                    </div>
                </a>
            </li>
        </ul>
        <ul class="nav">
            <li class="nav-header">Navigation</li>
            <li class="has-sub active">
                <a href="index.php">
                    <i class="fa fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
            </li>
           <li class="has-sub">
		   <a href="javascript:;">
		   <b class="caret"></b>
		   <i class="fa fa-users"></i>
		   <span>Clients</span>
		   </a>
		   <ul class="sub-menu">
		   <li><a href="masterlist.php" target="_blank">Master List</a></li>
		   <li><a href="patients.php" target="_blank">Client's Profile</a></li>
		   </ul>
		   </li>
            <li class="has-sub">
                <a href="tb-stat.php">
                    <i class="fa fa-tv"></i>
                    <span>TB Status Monitoring</span>
                </a>
            </li>
            <li class="has-sub">
                <a href="transactions.php">
                    <i class="fa fa-calculator"></i>
                    <span>Transactions</span>
                </a>
            </li>
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
        </ul>
    </div>
</div>
<div class="sidebar-bg"></div>

        <div id="content" class="content">
            <?php include 'includes/breadcrumb.php'; ?>
          <?php include 'includes/body.php'; ?>
        


            <div class="row">

                <div class="col-xl-8">

                    <div class="panel panel-inverse">

                        <div class="panel-heading">
                            <h4 class="panel-title">For Refill - Today</h4>
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>


                        <!--
<div class="alert alert-info fade show">
<button type="button" class="close" data-dismiss="alert">
<span aria-hidden="true">&times;</span>
</button>
AutoFill gives an Excel like option to a DataTable to click and drag over multiple cells,
filling in information over the selected cells and incrementing numbers as needed.
Try to mouseover and drag over any table column below.
</div>
-->


                        <div class="panel-body">
                            <table id="refill_list_today" class="table table-striped table-bordered table-td-valign-middle" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">ID</th>
                                        <th class="text-nowrap">Client Code</th>
                                        <th class="text-nowrap">Drug</th>
                                        <th class="text-nowrap">Date of Refill</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h4 class="panel-title">For Refill - Next 7 days</h4>
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>

                        <div class="panel-body">
                            <table id="fetch_refill_this_week" class="table table-striped table-bordered table-td-valign-middle">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">ID</th>
                                        <th class="text-nowrap">Client Code</th>
                                        <th class="text-nowrap">Drug</th>
                                        <th class="text-nowrap">Date of Refill</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>


                </div>


                <div class="col-xl-4">
                    <div class="panel panel-inverse" data-sortable-id="index-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                For Follow up:
                            </h4>
                        </div>
                        <div id="visitors-map" class="bg-dark-darker" style="height: 179px;"></div>
                        <div class="list-group">
<!--
                            <a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis">
                              
                                <span class="badge bg-teal f-s-10"></span>
                            </a>
                            <a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis">
                              
                                <span class="badge bg-blue f-s-10"></span>
                            </a>
                            <a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis">
                              
                                <span class="badge bg-silver-darker f-s-10"></span>
                            </a>
-->
                        </div>
                    </div>
                </div>

            </div>




            <!--
<div class="col-xl-4 col-lg-6">

<div class="panel panel-inverse" data-sortable-id="index-3">
<div class="panel-heading">
<h4 class="panel-title">Today's Schedule</h4>
</div>
<div id="schedule-calendar" class="bootstrap-calendar"></div>
<div class="list-group">
<a href="javascript:;" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center text-ellipsis">
Sales Reporting
<span class="badge bg-teal f-s-10">9:00 am</span>
</a>
<a href="javascript:;" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center text-ellipsis">
Have a meeting with sales team
<span class="badge bg-blue f-s-10">2:45 pm</span>
</a>
</div>
</div>

</div>


<div class="col-xl-4 col-lg-6">

<div class="panel panel-inverse" data-sortable-id="index-4">
<div class="panel-heading">
<h4 class="panel-title">New Registered Users</h4>
<span class="label bg-teal">24 new users</span>
</div>
<ul class="registered-users-list">
<li>
<a href="javascript:;"><img src="../assets/img/user/user-5.jpg" alt="" /></a>
<h4 class="username text-ellipsis">
Savory Posh
<small>Algerian</small>
</h4>
</li>
<li>
<a href="javascript:;"><img src="../assets/img/user/user-3.jpg" alt="" /></a>
<h4 class="username text-ellipsis">
Ancient Caviar
<small>Korean</small>
</h4>
</li>
<li>
<a href="javascript:;"><img src="../assets/img/user/user-1.jpg" alt="" /></a>
<h4 class="username text-ellipsis">
Marble Lungs
<small>Indian</small>
</h4>
</li>
<li>
<a href="javascript:;"><img src="../assets/img/user/user-8.jpg" alt="" /></a>
<h4 class="username text-ellipsis">
Blank Bloke
<small>Japanese</small>
</h4>
</li>
<li>
<a href="javascript:;"><img src="../assets/img/user/user-2.jpg" alt="" /></a>
<h4 class="username text-ellipsis">
Hip Sculling
<small>Cuban</small>
</h4>
</li>
<li>
<a href="javascript:;"><img src="../assets/img/user/user-6.jpg" alt="" /></a>
<h4 class="username text-ellipsis">
Flat Moon
<small>Nepalese</small>
</h4>
</li>
<li>
<a href="javascript:;"><img src="../assets/img/user/user-4.jpg" alt="" /></a>
<h4 class="username text-ellipsis">
Packed Puffs
<small>Malaysian</small>
</h4>
</li>
<li>
<a href="javascript:;"><img src="../assets/img/user/user-9.jpg" alt="" /></a>
<h4 class="username text-ellipsis">
Clay Hike
<small>Swedish</small>
</h4>
</li>
</ul>
<div class="panel-footer text-center">
<a href="javascript:;" class="text-inverse">View All</a>
</div>
</div>

                </div>
-->

        </div>

    </div>

</body>
  <?php include 'includes/app-settings.php'; ?>
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <script src="assets/plugins/highlight.js/highlight.min.js" type="67901a91b1666f1b32d3dba0-text/javascript"></script>
        <script src="assets/js/demo/render.highlight.js" type="67901a91b1666f1b32d3dba0-text/javascript"></script>
 

    <?php include 'includes/footer.php'; ?>
    <script>

<?php include 'includes/scripts.html'; ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {


        $('#client_search').change(function() {
            var client_id = $(this).val();
            console.log('From select ' + client_id);
            $('#tb_transaction').DataTable().destroy();
            fetch_transaction(client_id);

        });
        fetch_refill_today();
        fetch_refill_this_week();

        function fetch_refill_today() {
            var dataTable = $('#refill_list_today').DataTable({

                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "includes/fetch_refill_today.php",
                    type: "POST",

                }

            });
        }

        function fetch_refill_this_week() {
            var dataTable = $('#fetch_refill_this_week').DataTable({

                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "includes/fetch_refill_this_week.php",
                    type: "POST",

                }

            });
        }

        function fetch_refill_next_month() {
            var dataTable = $('#').DataTable({

                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "includes/fetch_refill_next_month.php",
                    type: "POST",

                }

            });
        }

        function fetch_refill_date() {
            var dataTable = $('#').DataTable({

                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "includes/fetch_refill_date.php",
                    type: "POST",

                }

            });
        }




    });

</script>

</html>
