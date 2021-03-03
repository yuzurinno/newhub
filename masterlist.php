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
        table td {
            word-break: keep-all !important;
        }
        .table-brown,
        .table-brown>td,
        .table-brown>th {
            background-color: #E2C7A3;
            color: black;
        }
		.table-purple,
        .table-purple>td,
        .table-purple>th {
            background-color: #E3DCF9;
            color: black;
        }
		}
		 table-orange,
        .table-orange>td,
        .table-orange>th {
            background-color: #FFDEAF;
            color: black;
        }
		.table-danger,
        .table-danger>td,
        .table-danger>th {
            background-color: #FCDCDC;
            color: black;
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
                            <div class="stats-number">0</div>
                            <div class="stats-progress progress">
                                <!--                                <div class="progress-bar" style="width: 40.5%;"></div>-->
                            </div>
                            <div class="stats-desc">Today</div>
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
                            <h4 class="panel-title">Master List of Clients</h4>
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>


                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="client_list" class="table table-bordered table-hover table-td-valign-middle" width="200%">
                                    <thead>
                                        <tr style="background-color: #2D353C; color: white;">
                                        
                                            <th class="text-nowrap" style="text-align:center">Client Code</th>
                                            <th class="text-nowrap" style="text-align:center">KP Class</th>
                                            <th class="text-nowrap" style="text-align:center">ARV</th>
                                            <th class="text-nowrap" style="text-align:center">TB Status</th>
                                            <th class="text-nowrap" style="text-align:center">CD4 Date</th>
                                            <th class="text-nowrap" style="text-align:center">CD4 Result</th>
                                            <th class="text-nowrap" style="text-align:center">VL</th>
                                            <th class="text-nowrap" style="text-align:center">VL Result</th>
                                            <th class="text-nowrap" style="text-align:center">IPT</th>
                                            <th class="text-nowrap" style="text-align:center">IPT Status</th>
                                            <th class="text-nowrap" style="text-align:center">IPT Disc.</th>
                                            <th class="text-nowrap" style="text-align:center">IPT Remarks</th>
                                            <th class="text-nowrap" style="text-align:center">CPT</th>
                                            <th class="text-nowrap" style="text-align:center">CPT Status</th>
                                            <th class="text-nowrap" style="text-align:center">CPT Disc.</th>
                                            <th class="text-nowrap" style="text-align:center">CPT Remarks</th>
                                            <th class="text-nowrap" style="text-align:center">AZT</th>
                                            <th class="text-nowrap" style="text-align:center">AZT Status</th>
                                            <th class="text-nowrap" style="text-align:center">AZT Disc.</th>
                                            <th class="text-nowrap" style="text-align:center">AZT Remarks</th>
                                            <th class="text-nowrap" style="text-align:center;">Code</th>
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
            var dataTable = $('#client_list').DataTable({
                "createdRow": function(row, data, dataIndex) {
                    if (data[20] == "LTE") {
                        $(row).addClass('table-danger');
                    } else if (data[20] == "3TC AZT") {
                        $(row).addClass('table-brown');
                    }
					else if (data[20] == "EFV") {
                        $(row).addClass('table-success');
                    }
					else if (data[20] == "NVP") {
                        $(row).addClass('table-primary');
                    }
					else if (data[20] == "LPV/RTV") {
                        $(row).addClass('table-purple');
                    }
					else if (data[20] == "TLD") {
                        $(row).addClass('table-orange');
                    }
					else if (data[20] == "NVP SY") {
                        $(row).addClass('table-warning');
                    }
					else if (data[20] == "AZT SY") {
                        $(row).addClass('table-warning');
                    }
					else if (data[20] == "3TC SY") {
                        $(row).addClass('table-warning');
                    }
					else {
						$(row).addClass('table-default');
					}
                },
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "fetch.php",
                    type: "POST",

                }
            });
        }

    </script>
</body>

</html>
