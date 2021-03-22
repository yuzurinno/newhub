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
    <title>Patients | HACT</title>
    <?php include 'includes/head.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .card-info .card-header{
            background-color: #2D353C;
            color: white;
        }
		.panel-title{
			font-size: 16px !important;
		}
		
		.panel.panel-inverse>.panel-heading {
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
            <!-- Content Here -->
            <div class="panel panel-danger">


                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group pull-right">
                                <select class="select" name="client_search" id="client_search" style="width:250px;" required>
                                    <option value="">Select Client</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <form method="post" action="" id="form_submit">
                        <div class="card card-info mt-3">
                           <div class="panel panel-inverse">
                           <div class="panel-heading">
                            <h4 class="panel-title">Basic Information</h4>
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
					</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="px_code" class="col-form-label" style="font-size: 13px;"><b>PX Code:</b></label>
                                            <input type="text" class="form-control" name="px_code" id="px_code" placeholder="PX Code" style="font-size: 13px;">
                                            <input type="hidden" class="form-control" name="px_id" id="px_id" placeholder="PX Code" style="font-size: 13px;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kp_class" class="col-form-label" style="font-size: 13px;"><b>KP Class:</b></label>
                                            <select class="form-control" name="kp_class" id="kp_class" required>

                                                <option value="" disabled selected>Select Class</option>
                                                <?php select_kp(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="arv_date_started" class="col-form-label" style="font-size: 13px;"><b>ARV Date Started:</b></label>
                                            <input type="date" class="form-control" name="arv_date_started" id="arv_date_started" style="font-size: 13px;">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="cd4_date" class="col-form-label" style="font-size: 13px;"><b>CD4 Date:</b></label>
                                            <input type="date" class="form-control" name="cd4_date" id="cd4_date" placeholder="Date Done" style="font-size: 13px;">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="cd4_status" class="col-form-label" style="font-size: 13px;"><b>CD4 Result:</b></label>
                                            <input type="text" class="form-control" name="cd4_status" id="cd4_status" placeholder="Result" style="font-size: 13px;">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="vr_load_date" class="col-form-label" style="font-size: 13px;"><b>VR Load Date:</b></label>
                                            <input type="date" class="form-control" name="vr_load_date" id="vr_load_date" style="font-size: 13px;">

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="vr_load_result" class="col-form-label" style="font-size: 13px;"><b>VR Load Result:</b></label>
                                            <input type="text" class="form-control" name="vr_load_result" id="vr_load_result" placeholder="Result" style="font-size: 13px;">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card card-info mt-3">
                             <div class="panel panel-inverse">
                           <div class="panel-heading">
                            <h4 class="panel-title">IPT</h4>
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
					</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ipt_date_started" class="col-form-label" style="font-size: 13px;"><b>Date Started</b></label>
                                            <input type="date" class="form-control" name="ipt_date_started" id="ipt_date_started" placeholder="Date" style="font-size: 13px;">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">

                                            <label for="ipt_status" class="col-form-label" style="font-size: 13px;"><b>Status:</b></label>
                                            <select class="form-control" name="ipt_status" id="ipt_status">

                                                <option value="" disabled selected>Select Status</option>
                                                <?php select_status_ipt(); ?>
                                            </select>

                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ipt_date_dc" class="col-form-label" style="font-size: 13px;"><b>Date Completed / Discontinued:</b></label>
                                            <input type="date" class="form-control" name="ipt_date_dc" id="ipt_date_dc" placeholder="Date" style="font-size: 13px;">

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ipt_remarks" class="col-form-label" style="font-size: 13px;"><b>Remarks:</b></label>
                                            <input type="text" class="form-control" name="ipt_remarks" id="ipt_remarks" placeholder="IPT Remarks" style="font-size: 13px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card card-info mt-3">
                            <div class="panel panel-inverse">
                           <div class="panel-heading">
                            <h4 class="panel-title">CPT</h4>
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
					</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="cpt_date_started" class="col-form-label" style="font-size: 13px;"><b>Date Started</b></label>
                                            <input type="date" class="form-control" name="cpt_date_started" id="cpt_date_started" placeholder="Date" style="font-size: 13px;">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">

                                            <label for="cpt_status" class="col-form-label" style="font-size: 13px;"><b>Status:</b></label>
                                            <select class="form-control" name="cpt_status" id="cpt_status">

                                                <option value="" disabled selected>Select Status</option>
                                                <?php select_status_Cpt(); ?>
                                            </select>

                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="cpt_date_dc" class="col-form-label" style="font-size: 13px;"><b>Date Completed / Discontinued:</b></label>
                                            <input type="date" class="form-control" name="cpt_date_dc" id="cpt_date_dc" placeholder="Date" style="font-size: 13px;">

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="cpt_remarks" class="col-form-label" style="font-size: 13px;"><b>Remarks:</b></label>
                                            <input type="text" class="form-control" name="cpt_remarks" id="cpt_remarks" placeholder="CPT Remarks" style="font-size: 13px;">

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="card card-info mt-3">
                             <div class="panel panel-inverse">
                           <div class="panel-heading">
                            <h4 class="panel-title">Azithro</h4>
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
					</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="azi_date_started" class="col-form-label" style="font-size: 13px;"><b>Date Started</b></label>
                                            <input type="date" class="form-control" name="azi_date_started" id="azi_date_started" placeholder="Date" style="font-size: 13px;">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">

                                            <label for="azi_status" class="col-form-label" style="font-size: 13px;"><b>Status:</b></label>
                                            <select class="form-control" name="azi_status" id="azi_status">

                                                <option value="" disabled selected>Select Status</option>
                                                <?php select_status_azi(); ?>
                                            </select>

                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="azi_date_dc" class="col-form-label" style="font-size: 13px;"><b>Date Completed / Discontinued:</b></label>
                                            <input type="date" class="form-control" name="azi_date_dc" id="azi_date_dc" placeholder="Date" style="font-size: 13px;">

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="azi_remarks" class="col-form-label" style="font-size: 13px;"><b>Remarks:</b></label>
                                            <input type="text" class="form-control" name="azi_remarks" id="azi_remarks" placeholder="Azithro Remarks" style="font-size: 13px;">

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                        <div class="card card-info mt-3">
                           
                               <div class="card-body">
                                <div class="row">
                                    <div class="table-responsive">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="code" class="col-form-label" style="font-size: 13px;"><b>Select Code:</b></label>
                                                <select class="form-control" name="reg_code" id="reg_code">
                                                    <option value="" disabled selected>Select</option>
                                                    <?php select_codes(); ?>
                                                </select>

                                            </div>
                                        </div>

                                        <table id="tb_regimen" class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th style="width:30%;">Drug</th>
                                                    <th style="width:20%;">Date Discontinued</th>
                                                    <th style="width:20%;">Remarks</th>
                                                    <th style="width:10%;"><button type="button" class="btn btn-success btn-sm" id="add_row"><i class="icon-plus nav-icon"></i>Add New Row</button></th>
                                                </tr>
                                            </thead>
                                            <tbody id="regimen_group">
                                                <tr id="row_id1" class="item">
                                                    <td>
                                                        <select class="form-control" name="drugs_name[]">
                                                            <option value="" disabled selected>Select Meds</option>
                                                            <?php select_drugs(); ?>
                                                        </select>
                                                    </td>
                                                    <td><input type="date" class="form-control" name="date_discontinued[]"></td>
                                                    <td><input type="text" class="form-control" name="remarks[]"></td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm remove-row" data-id="1">Remove</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>


                        <br>

                        <div class="card card-info">
                            <div class="card-header">
                                <div class="col-md-12">
                                        <div class="switcher switcher-purple">
                                            <input type="checkbox" name="check_tb" id="check_tb">
                                           <label for="check_tb">Active TB?</label>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-body" id="div_tb">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="tb_site" class="col-form-label"><b>TB Site</b></label>
                                            <select class="form-control" id="tb_site" style="font-size: 13px;">
                                                <option value="" selected disabled>Select Site</option>
                                                <option value="Class 1">PTB</option>
                                                <option value="Class 2">EPTB</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="tb_tx_status" class="col-form-label"><b>TB TX Status:</b></label>
                                            <select class="form-control" id="tb_tx_status">
                                                <option value="" disabled selected>Select Status</option>
                                                <?php select_status_tb(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="tb_tx_outcome" class="col-form-label" style="font-size: 13px;"><b>TB TX Outcome:</b></label>
                                            <select class="form-control" id="tb_tx_outcome" style="font-size: 13px;">
                                                <option value="" selected disabled>Select Outcome</option>
                                                <option value="Class 1">Cured</option>
                                                <option value="Class 2">Failed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="hbsab" class="col-form-label" style="font-size: 13px;"><b>HBSAB:</b></label>
                                            <select class="form-control" id="hbsab" style="font-size: 13px;">
                                                <option value="" selected disabled>Select</option>
                                                <option value="Class 1">Reactive</option>
                                                <option value="Class 2">IDK</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer custom">

                            <div class="left-side">
                                <button type="button" class="btn btn-link btn-danger" data-dismiss="modal"><b>Cancel</b></button>
                            </div>
                            <div class="divider"></div>
                            <div class="right-side">
                                <button type="submit" class="btn btn-link btn-success" id="save_new_patient"><i class="icon-save nav-icon"></i><b>Save</b></button>
                            </div>
                            <div class="divider"></div>
                            <div class="right-side">

                                <button type="button" class="btn btn-link btn-success" id="resetshit"><b>Reset</b></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'includes/app-settings.php'; ?>
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    </div>

    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#client_search').select2({
                placeholder: 'Select Client',
                ajax: {
                    url: 'includes/search.php',
                    dataType: 'json',
                    delay: 250,
                    data: function(data) {
                        return {
                            searchTerm: data.term // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
            //fetch_data();

            var row_counter = 2;


            $("#add_row").click(function() {
                var newTextBoxDiv = $(document.createElement('tr'))
                    .attr("id", 'row_id' + row_counter, "class", 'item').attr("class", 'item');
                newTextBoxDiv.after().html("<td>" +
                    "<select class='form-control' name='drugs_name[]' required>" +
                    "<option value='' disabled selected>Select Meds</option>" +
                    "<?php select_drugs(); ?>" +
                    "</select>" +
                    "</td>" +
                    "<td><input type='date' class='form-control' name='date_discontinued[]'></td>" +
                    "<td><input type='text' class='form-control' name='remarks[]'></td>" +
                    "<td>" +
                    "<button type='button' class='btn btn-danger btn-sm remove-row' data-id='" + row_counter + "'>Remove</button>" +
                    "</td>" +
                    "</tr>");
                newTextBoxDiv.appendTo("#regimen_group");
                row_counter++;
            });


            //Delete Row
            $('body').on('click', '.remove-row', function(event) {
                var id = $(this).data('id');
                console.log('remove product clicked ' + id);
                if (row_counter == 0) {
                    alert("No more textbox to remove");
                    return false;
                }
                row_counter--;
                $("#row_id" + id).remove();
            });

            $("#resetshit").click(function() {
                $("#form_submit").trigger("reset");
            });

            function fetch_data() {
                var dataTable = $('#client_list').DataTable({

                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "ajax": {
                        url: "includes/fetch.php",
                        type: "POST",

                    }

                });
            }

            $(document).on('blur', '.update', function() {
                var id = $(this).data("id");
                var column_name = $(this).data("column");
                var value = $(this).text();
                update_data(id, column_name, value);


            });

            $(document).on('submit', '#form_submit', function(event) {
                event.preventDefault();
                if (confirm("Are you sure you want to save this?")) {
                    $.ajax({
                        url: "includes/insert_new_patient.php",
                        type: 'POST',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            $('#loading-wrapper').show();
                        },
                        success: function(response) {
                            $('#loading-wrapper').hide();
                            //$('#alert_message').html('<div class="alert alert-success">' + data + '</div>');

                            console.log('hi');
                            //window.location.reload();
                            $('#client_list').DataTable().destroy();
                            fetch_data();
                        },
                        error: function(error) {
                            $('#loading-wrapper').hide();
                            //console.log(error.data.message);
                            console.log(error.responseJSON.message);
                        }

                    });
                    setInterval(function() {
                        $('#alert_message').html('');
                    }, 5000);
                }
            });



            $('#div_tb').fadeOut('slow');
            $('#check_tb').change(function() {
                if (this.checked) {
                    $('#div_tb').fadeIn('slow');
                    var $tb_stat = 'Active';

                    $("#tb_site").attr("name", "tb_site");
                    $("#tb_tx_status").attr("name", "tb_tx_status");
                    $("#tb_tx_outcome").attr("name", "tb_tx_outcome");
                    $("#hbsab").attr("name", "hbsab");
                } else {
                    $('#div_tb').fadeOut('slow');
                    $("#tb_site").removeAttr("name");
                    $("#tb_tx_status").removeAttr("name");
                    $("#tb_tx_outcome").removeAttr("name");
                    $("#hbsab").removeAttr("name");
                }
            });



            $(document).on('click', '#insert', function() {

                console.log('fdh');
                $('#alert_message').html('');
                // var patient_id = $('#data1').text();
                var client_code = $('#data1').text();
                var date_started = $('#data2').text();
                var regimen = $("#data3 select option:selected").text();
                var refill = $('#data4').text();
                var cd4 = $('#data5').text();
                var vl_date = $('#data6').text();
                var side_effect = $('#data7').text();

                if (client_code != '' && date_started != '')

                {

                    $.ajax({
                        url: "includes/insert.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            client_code: client_code,
                            date_started: date_started,
                            regimen: regimen,
                            refill: refill,
                            cd4: cd4,
                            vl_date: vl_date,
                            side_effect: side_effect

                        },
                        success: function(data) {
                            if (data.code == "200") {
                                console.log(client_code);
                                $('#alert_message').html('<div class="alert alert-success">' + data.msg + '</div>');
                                $('#client_list').DataTable().destroy();
                                //window.location.reload();
                                fetch_data();
                            } else {
                                console.log(data.msg);
                                alert(data.msg);
                                $('#alert_message').html('<div class="alert alert-danger">' + data.msg + '</div>');
                            }

                        }
                    });
                    setInterval(function() {
                        $('#alert_message').html('');
                    }, 2000);
                } else {
                    alert("Kindly Fill in all Required Fields!");
                }
            });



            $(document).on('click', '.delete', function() {
                event.preventDefault();
                var client_delete = $(this).attr("data-patient_code");
                if (confirm("Are you sure you want to remove this?")) {

                    $.ajax({
                        url: "includes/delete.php",
                        method: "POST",
                        data: {

                            client_delete: client_delete,
                        },
                        success: function(data) {

                            $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                            $('#client_list').DataTable().destroy();
                            console.log('hi');
                            //window.location.reload();
                            fetch_data();
                        }
                    });
                    setInterval(function() {
                        $('#alert_message').html('');
                    }, 5000);
                }
            });


            $(document).on('change', '#client_search', function() {
                event.preventDefault();

                var client_selected = $("#client_search option:selected").val();
                $.ajax({
                    url: "includes/edit_client.php",
                    method: "POST",
                    data: {
                        client_selected: client_selected,
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $('#page-loader').show('fade');
                    },
                    success: function(response) {
                        console.log(response.data.id);
                        $('#page-loader').hide('fade');
                        //$('#page-loader').addClass('show');
                        $('#px_id').val(response.data.id);
                        $('#px_code').val(response.data.client_code);
                        $("#kp_class option[value=" + response.data.kp_id + "]").attr('selected', 'selected'); //Selected
                        $('#arv_date_started').val(response.data.arv_date_started);
                        $('#vr_load_date').val(response.data.vl_date_started);
                        $('#vr_load_result').val(response.data.vl_result);
                        $('#cd4_date').val(response.data.cd4_date_started);
                        $('#cd4_status').val(response.data.cd4_result);
                        $('#reg_code').val(response.data.regimen_code);

                        //IPT
                        $('#ipt_date_started').val(response.data.ipt_date_started);
                        if (response.data.ipt_status != '') {
                            $("#ipt_status option[value=" + response.data.ipt_status + "]").attr('selected', 'selected'); //Selected
                        }

                        $('#ipt_date_dc').val(response.data.ipt_date_completed_discountinued);
                        $('#ipt_remarks').val(response.data.ipt_remarks);
                        //CPT
                        $('#cpt_date_started').val(response.data.cpt_date_started);
                        if (response.data.cpt_status != '') {
                            $("#cpt_status option[value=" + response.data.cpt_status + "]").attr('selected', 'selected'); //Selected
                        }
                        $('#cpt_date_dc').val(response.data.cpt_date_completed_discountinued);
                        $('#cpt_remarks').val(response.data.cpt_remarks);



                        //azi
                        $('#azi_date_started').val(response.data.azi_date_started);
                        if (response.data.azi_status != '') {
                            $("#azi_status option[value=" + response.data.azi_status + "]").attr('selected', 'selected'); //Selected
                        }
                        $('#azi_date_dc').val(response.data.azi_date_completed_discountinued);
                        $('#azi_remarks').val(response.data.azi_remarks);


                        //Check TB
                        if (response.data.tb_status == 'Active') {
                            console.log('Active TB');
                            $("#check_tb").prop("checked", true);
                            $('#div_tb').fadeIn('slow');
                            $("#tb_site").attr("name", "tb_site");
                            $("#tb_tx_status").attr("name", "tb_tx_status");
                            $("#tb_tx_outcome").attr("name", "tb_tx_outcome");
                            $("#hbsab").attr("name", "hbsab");

                            //auto Selected
                            $("#tb_site option[value='" + response.tb_stats.tb_site + "']").attr('selected', 'selected'); //Selected
                            $("#tb_tx_status option[value='" + response.tb_stats.tb_treatment_stat + "']").attr('selected', 'selected'); //Selected
                            $("#tb_tx_outcome option[value='" + response.tb_stats.tb_tx_outcome + "']").attr('selected', 'selected'); //Selected
                            $("#hbsab option[value='" + response.tb_stats.tb_hbsab + "']").attr('selected', 'selected'); //Selected
                        } else {
                            $("#check_tb").prop("checked", false);
                            $('#div_tb').fadeOut('slow');
                            $("#tb_site").removeAttr("name");
                            $("#tb_tx_status").removeAttr("name");
                            $("#tb_tx_outcome").removeAttr("name");
                            $("#hbsab").removeAttr("name");
                            $("#tb_site").prop('selectedIndex', 0);
                            $("#tb_tx_status").prop('selectedIndex', 0);
                            $("#tb_tx_outcome").prop('selectedIndex', 0);
                            $("#hbsab").prop('selectedIndex', 0);
                        }


                        var counter = 1;
                        $("#regimen_group").empty();
                        jQuery.each(response.regimen, function(index, item) {


                            var newTextBoxDiv = $(document.createElement('tr')).attr("id", 'row_id' + counter, "class", 'item');
                            newTextBoxDiv.after().html("<td>" +
                                "<select class='form-control' id='drugs_name' name='drugs_name[]' required>" +
                                "<option value='' disabled selected>Select Meds</option>" +
                                "<?php select_drugs(); ?>" +
                                "</select>" +
                                "</td>" +

                                "<td><input type='date' class='form-control' name='date_discontinued[]' value='" + item.date_discontinued + "'></td>" +
                                "<td><input type='text' class='form-control' name='remarks[]' value='" + item.remarks + "'></td>" +
                                "<td>" +
                                "<button type='button' class='btn btn-danger btn-sm remove-row' data-id='" + counter + "'>Remove</button>" +
                                "</td>" +
                                "<input class='form-control' name='id[]' value='" + item.id + "' type='hidden'>" +
                                "</tr>");
                            newTextBoxDiv.appendTo("#regimen_group");
                            $("#row_id" + counter + " select option[value=" + item.regimen_id + "]").attr('selected', 'selected');
                            counter++;
                        });


                        //Update Button
                        $('#save_new_patient').html('<i class="icon-edit nav-icon"></i> Update');
                    }
                });
            });
        });

    </script>
</body>

</html>
