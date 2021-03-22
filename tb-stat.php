<?php
session_start();
include 'includes/connection.php';
//include 'includes/select.php';

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
		table td { word-break: keep-all!important; }
		.header1 {
			background-color: #2D353C;
			color: white;
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
            <li class="has-sub">
                <a href="index.php">
                    <i class="fa fa-th-large"></i>
                    <span class="target">Dashboard</span>
                </a>
            </li>
           <li class="has-sub ">
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
            <li class="has-sub active">
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

                <div class="col-xl-12">

                    <div class="panel panel-inverse">

                        <div class="panel-heading">
                            <h4 class="panel-title">TB Status Monitoring</h4>
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>


                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="tb_client"  class="table table-striped table-bordered table-td-valign-middle" width="100%">
                                <thead>
                                    <tr class="header1">
                                        <th class="text-nowrap">Client Code</th>
                                        <th class="text-nowrap">TB Status</th>
                                        <th class="text-nowrap">Site</th>
                                        <th class="text-nowrap">TX Status</th>
                                        <th class="text-nowrap">TX Result</th>
                                        <th class="text-nowrap">HBsAg</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        
                

                    </div>




                </div>


            </div>
        </div>
        <?php include 'includes/app-settings.php'; ?>
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <script src="assets/plugins/highlight.js/highlight.min.js" type="67901a91b1666f1b32d3dba0-text/javascript"></script>
<script src="assets/js/demo/render.highlight.js" type="67901a91b1666f1b32d3dba0-text/javascript"></script>
    </div>

    <?php include 'includes/footer.php'; ?>
    <script>
        $(document).ready(function() {
            fetch_data();

        });

        function fetch_data() {
            var dataTable = $('#tb_client').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "fetch_tb.php",
                    type: "POST",

                }
            });
        }
		

    </script>
</body>

</html>
