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
           <li class="has-sub active">
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
                    url: "includes/fetch.php",
                    type: "POST",

                }
            });
        }

    </script>
</body>

</html>
