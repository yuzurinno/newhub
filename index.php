<?php
session_start();
include 'includes/connection.php';
include 'includes/select.php';

$sess = $_SESSION['username'];
if(empty($_SESSION['username'])){
    header("location:login.php");
}else{
  

}



?>
<html lang="en">

<?php
include 'header.html';
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<body>
    <div class="container-fluid">
        <!-- Navigation start -->
        <nav class="navbar navbar-expand-lg custom-navbar">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#royalHospitalsNavbar"
                aria-controls="royalHospitalsNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="royalHospitalsNavbar">
            <ul class="navbar-nav">
		<li class="nav-item">
                <a class="nav-link active-page" href="index.php">
                    <i class="icon-add-to-list nav-icon"></i>
                   <span style="font-size: 13px;"> For Refill</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="client.php">
                    <i class="fa fa-user nav-icon"></i>
                    <span style="font-size: 13px;">  Clients</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  " href="tb.php">
                    <i class="fa fa-check nav-icon"></i>
                    <span style="font-size: 13px;">  TB Status</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="transactions.php">
                    <i class="fa fa-calculator nav-icon"></i>
                    <span style="font-size: 13px;">  Transactions</span>
                </a>
            </li>
         
            <!-- <li class="nav-item">
                <a class="nav-link" href="report.php" id="doctoRs">
                    <i class="icon-users nav-icon"></i>
                    Reports
                </a>
                
            </li> -->
         
        </ul>
            </div>
        </nav>
        <!-- Navigation end -->
        <!-- *************
				************ Main container start *************
			************* -->
        <div class="main-container">


            <!-- Page header start -->
            <div class="page-header">
                <ol class="breadcrumb">

                </ol>

            </div>
            <!-- Page header end -->


            <!-- Content wrapper start -->
            <div class="content-wrapper">

                <!-- Row start -->
                <div class="row gutters">


                </div>
                <!-- Row end -->

                <div class="col-lg-12">

                    <link rel="stylesheet"
                        href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css" />

                  

                    <div class="table-container">

                    <br>
                        <!--*************************
									*************************
									*************************
									Basic table start
								*************************
								*************************
								*************************-->
                        <div class="table-responsive">

                            <!-- <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Filter:</label>
                                        <select class="form-control" name="client_search" id="client_search" required>
                                            <option value="">This Week</option>
                                            <option value="">Next Week</option>
                                            <option value="">Next Month</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Date:</label>
                                        <input type="date" class="form-control" name="search_by_date">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <br>
                                        <button type="button" class="btn btn-block btn-Success btn-sm remove-row"
                                            data-id="1" style="height: 35px;">Search</button>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="card col-md-6">


                                    <div class="card-header" style="font-size: 15px"><b>Today</b></div>
                                    <div class="card-body">


                                        <table id="refill_list_today" style="font-size: 12px; text-align: center;"
                                            class="table table-striped table-bordered data-table">
                                            <thead>

                                                <td style="text-align:center;">
                                                    <b>Patient Code</b>
                                                </td>
                                                <td style="text-align:center;">
                                                    <b>Drug</b>
                                                </td>
                                                <td style="text-align:center;">
                                                    <b>Date of Refill</b>
                                                </td>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="card-header" style="font-size: 15px"><b>Next 7 Days</b></div>
                                    <div class="card-body">
                                        <table id="refill_filtered" style="font-size: 12px;"
                                            class="table table-striped table-bordered data-table">
                                            <thead>

                                                <td style="text-align:center;">
                                                    <b>Patient Code</b>
                                                </td>
                                                <td style="text-align:center;">
                                                    <b>Drug</b>
                                                </td>
                                                <td style="text-align:center;">
                                                    <b>Date of Refill</b>
                                                </td>

                                            </thead>
                                        </table>

                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>

                </div>


            </div>
            <footer class="main-footer">© TGH iHOMP 2020</footer>
        </div>
    </div>
    <!-- Row end -->
    <?php include 'scripts.html'; ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {


            $('#client_search').change(function () {
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
                var dataTable = $('#refill_filtered').DataTable({

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
</body>

</html>