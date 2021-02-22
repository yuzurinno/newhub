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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Color Admin | Dashboard</title>
    <?php include 'includes/head.php'; ?>
</head>

<body>
    <div id="page-loader" class="fade show">
        <span class="spinner"></span>
    </div>
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        <div id="header" class="header navbar-default">
            <div class="navbar-header">
                <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Talavera's </b>| HOPE</a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <ul class="navbar-nav navbar-right">
                <li class="navbar-form">
                    <form action="#" method="POST" name="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter keyword" />
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </li>

                <li class="dropdown navbar-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/img/user/user-13.jpg" alt="" />
                        <span class="d-none d-md-inline"><?php echo $sess; ?></span> <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!--
<a href="javascript:;" class="dropdown-item">Edit Profile</a>
<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
<a href="javascript:;" class="dropdown-item">Calendar</a>
<a href="javascript:;" class="dropdown-item">Setting</a>
<div class="dropdown-divider"></div>
-->
                        <a href="logout.php" class="dropdown-item">Log Out</a>
                    </div>
                </li>
            </ul>

        </div>


        <div id="sidebar" class="sidebar">

            <div data-scrollbar="true" data-height="100%">

                <ul class="nav">
                    <li class="nav-profile">
                        <a href="javascript:;" data-toggle="nav-profile">
                            <div class="cover with-shadow"></div>
                            <div class="image">
                                <img src="../assets/img/user/user-13.jpg" alt="" />
                            </div>
                            <div class="info">
                                <!--<b class="caret pull-right"></b>-->
                                <?php echo $fname . ' ' . $lname; ?>
                                <small><?php echo $designation; ?></small>
                            </div>
                        </a>
                    </li>
                    <!--<li>-->
                    <!--
<ul class="nav nav-profile">
<li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
<li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
<li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
</ul>
</li>
-->
                </ul>


                <ul class="nav">
                    <li class="nav-header">Navigation</li>
                    <li class="has-sub active">
                        <a href="javascript:;">
                            <i class="fa fa-th-large"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <i class="fa fa-gem"></i>
                            <span>Clients</span>
                        </a>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <i class="fa fa-gem"></i>
                            <span>TB Status Monitoring</span>
                        </a>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <i class="fa fa-gem"></i>
                            <span>Transactions</span>
                        </a>
                    </li>
                    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>

                </ul>

            </div>

        </div>
        <div class="sidebar-bg"></div>


        <div id="content" class="content">

            <ol class="breadcrumb float-xl-right">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
                <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>


            <h1 class="page-header">HACT <small>Monitoring System</small></h1>


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
                    <div class="widget widget-stats bg-blue">
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
                            <table id="refill_list_today" class="table table-striped table-bordered table-td-valign-middle">
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
                                Visitors Origin
                            </h4>
                        </div>
                        <div id="visitors-map" class="bg-dark-darker" style="height: 179px;"></div>
                        <div class="list-group">
                            <a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis">
                                1. United State
                                <span class="badge bg-teal f-s-10">20.95%</span>
                            </a>
                            <a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis">
                                2. India
                                <span class="badge bg-blue f-s-10">16.12%</span>
                            </a>
                            <a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis">
                                3. Mongolia
                                <span class="badge bg-silver-darker f-s-10">14.99%</span>
                            </a>
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

<?php include 'includes/footer.php'; ?>
<script src="assets/js/app.min.js" type="2f70c5f32bf6631aa2736d53-text/javascript"></script>
<script src="assets/js/theme/default.min.js" type="2f70c5f32bf6631aa2736d53-text/javascript"></script>


<script src="assets/plugins/datatables.net/js/jquery.dataTables.min.js" type="2f70c5f32bf6631aa2736d53-text/javascript"></script>
<script src="assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js" type="2f70c5f32bf6631aa2736d53-text/javascript"></script>
<script src="assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js" type="2f70c5f32bf6631aa2736d53-text/javascript"></script>
<script src="assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="2f70c5f32bf6631aa2736d53-text/javascript"></script>
<script src="assets/plugins/datatables.net-autofill/js/dataTables.autoFill.min.js" type="2f70c5f32bf6631aa2736d53-text/javascript"></script>
<script src="assets/plugins/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js" type="2f70c5f32bf6631aa2736d53-text/javascript"></script>
<script src="assets/js/demo/table-manage-autofill.demo.js" type="2f70c5f32bf6631aa2736d53-text/javascript"></script>

<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="2f70c5f32bf6631aa2736d53-|49" defer=""></script>

<?php include 'scripts.html'; ?>
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
                    url: "fetch_refill_today.php",
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
                    url: "fetch_refill_this_week.php",
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
                    url: "fetch_refill_next_month.php",
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
                    url: "fetch_refill_date.php",
                    type: "POST",

                }

            });
        }




    });

</script>

</html>
