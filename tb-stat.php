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
        <?php include 'includes/sidebar.php'; ?>
        <div id="content" class="content">
            <?php include 'includes/breadcrumb.php'; ?>
            <div class="row">

                <div class="col-xl-3 col-md-6">
                    <div class="widget widget-stats bg-teal">
                        <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                        <div class="stats-content">
                            <div class="stats-title">TOTAL CLIENTS</div>
                            <div class="stats-number">7,842,900</div>
                            <div class="stats-progress progress">
                                <div class="progress-bar" style="width: 70.1%;"></div>
                            </div>
                            <div class="stats-desc">Better than last week (70.1%)</div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6">
                    <div class="widget widget-stats bg-pink">
                        <div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
                        <div class="stats-content">
                            <div class="stats-title">TODAY'S NEW CLIENTS</div>
                            <div class="stats-number">180,200</div>
                            <div class="stats-progress progress">
                                <div class="progress-bar" style="width: 40.5%;"></div>
                            </div>
                            <div class="stats-desc">Better than last week (40.5%)</div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6">
                    <div class="widget widget-stats bg-indigo">
                        <div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
                        <div class="stats-content">
                            <div class="stats-title">TOTAL TRANS-IN</div>
                            <div class="stats-number">38,900</div>
                            <div class="stats-progress progress">
                                <div class="progress-bar" style="width: 76.3%;"></div>
                            </div>
                            <div class="stats-desc">Better than last week (76.3%)</div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6">
                    <div class="widget widget-stats bg-dark">
                        <div class="stats-icon stats-icon-lg"><i class="fa fa-comment-alt fa-fw"></i></div>
                        <div class="stats-content">
                            <div class="stats-title">TOTAL TRANS-OUT</div>
                            <div class="stats-number">3,988</div>
                            <div class="stats-progress progress">
                                <div class="progress-bar" style="width: 54.9%;"></div>
                            </div>
                            <div class="stats-desc">Better than last week (54.9%)</div>
                        </div>
                    </div>
                </div>

            </div>


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
