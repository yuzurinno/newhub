<?php
session_start();
include 'includes/connection.php';
include 'includes/select.php';
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#royalHospitalsNavbar" aria-controls="royalHospitalsNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="royalHospitalsNavbar">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="icon-add-to-list nav-icon"></i>
                   <span style="font-size: 13px;"> For Refill</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active-page" href="client.php">
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
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-clipboard-list"></i>Master List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-address-card"></i>Profile</a>
                    </li>
                </ul>
                <div class="col-lg-12">
                    <div class="tab-content mt-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <script src="https://use.fontawesome.com/fcfd8b4814.js"></script>



                            <div class="table-container">


                                <!--*************************
									*************************
									*************************
									Basic table start
								*************************
								*************************
								*************************-->
                                <div class="table-responsive">
                                    <div class="form-group">
                                        <!-- <label for=""> Select Username</label>
                                        <select class="username" name="username" id="username" required>
                                            <option value="">Select Username</option>
                                        </select> -->

                                    </div>

                                    <table id="client_list" style="font-size: 12px; width: 140%; text-align: center" class="table table-striped table-bordered data-table">
                                        <colgroup>
                                            <col span="1" style="width: 10%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                            <col span="1" style="width: 5%;">
                                        </colgroup>

                                        <thead>

                                            <td style="text-align:center;">
                                                <b>Patient Code</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>KP Class</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>ARV D.S</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>TB Status</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>CD4 D.S</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>CD4 Res.</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>VL D.S</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>VL Result </b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>IPT Stat</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>IPT D.S</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>IPT D.C/DSC</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>IPT Remarks</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>CPT Stat</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>CPT D.S</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>CPT D.C/DSC</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>CPT Remarks</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>AZT D.S</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>AZT D.C/DSC</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>AZT Stat</b>
                                            </td>
                                            <td style="text-align:center;">
                                                <b>AZT Remarks</b>
                                            </td>

                                            <!-- <td>
											<b>Action</b>
											</td> -->
                                        </thead>
                                    </table>
                                </div>
                                <!--*************************
									*************************
									*************************
									Basic table end
								*************************
								*************************
								*************************-->



                            </div>

                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for=""> Select Client: &nbsp;</label>
                                        <select class="select" name="client_search" id="client_search" style="width:250px;" required>
                                            <option value="">Select Client</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="button" id="select_client" class="btn btn-block btn-Success btn-sm" data-id="1" style="height: 28px;">Select</button>
                                    </div>
                                </div>
                            </div>
                            <form method="post" action="" id="form_submit">
                                <div class="card">
                                    <div class="card-header" style="font-size: 16px"><b>Basic Information</b></div>
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

                                <div class="card">
                                    <div class="card-header" style="font-size: 16px"><b>IPT</b></div>
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


                                <div class="card">
                                    <div class="card-header" style="font-size: 16px"><b>CPT</b></div>
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
                                <div class="card">
                                    <div class="card-header" style="font-size: 16px"><b>Azithro</b></div>
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


                                <div class="card">
                                    <div class="card-header"><b>Regimen</b></div>

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
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="check_tb" id="check_tb">
                                    <label class="custom-control-label" for="check_tb">Active TB?</label>
                                </div>
                                <br>

                                <div class="card" id="div_tb">
                                    <div class="card-header"><b>TB</b></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="tb_site" class="col-form-label"><b>TB Site</b></label>
                                                    <select class="form-control" id="tb_site" style="font-size: 13px;">
                                                        <option value="" selected disabled>Select Site</option>
                                                        <option value="PTB">PTB</option>
                                                        <option value="EPTB">EPTB</option>
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
                                                        <option value="Cured">Cured</option>
                                                        <option value="Failed">Failed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="hbsab" class="col-form-label" style="font-size: 13px;"><b>HbsAg:</b></label>
                                                    <select class="form-control" id="hbsab" style="font-size: 13px;">
                                                        <option value="" selected disabled>Select</option>
                                                        <option value="Reactive">Reactive</option>
                                                        <option value="Non-Reactive">Non-Reactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer custom">

                                    <div class="left-side">
                                        <button type="button" class="btn btn-link danger" data-dismiss="modal"><b>Cancel</b></button>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="right-side">
                                        <button type="submit" class="btn btn-link success" id="save_new_patient"><i class="icon-save nav-icon"></i><b>Save</b></button>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="right-side">

                                        <button type="button" class="btn btn-link success" id="resetshit"><b>Reset</b></button>
                                    </div>
                                </div>
                            </form>
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
            fetch_data();

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
                // if (row_counter == 0) {
                //     alert("No more textbox to remove");
                //     return false;
                // }
                row_counter--;
                $("#row_id" + id).remove();
            });



            function fetch_data() {
                var dataTable = $('#client_list').DataTable({

                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "ajax": {
                        url: "fetch.php",
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
                         window.location.reload();
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

                    $("#tb_site").attr("name", "tb_site").attr("required", true);
                    $("#tb_tx_status").attr("name", "tb_tx_status").attr("required", true);
                    $("#tb_tx_outcome").attr("name", "tb_tx_outcome");
                    $("#hbsab").attr("name", "hbsab");
                } else {
                    $('#div_tb').fadeOut('slow');
                    $("#tb_site").removeAttr("name").removeAttr("required");
                    $("#tb_tx_status").removeAttr("name").removeAttr("required");
                    $("#tb_tx_outcome").removeAttr("name").removeAttr("required");
                    $("#hbsab").removeAttr("name").removeAttr("required");
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
                        url: "insert.php",
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
                        url: "delete.php",
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


            $(document).on('click', '#select_client', function() {
                event.preventDefault();
                var client_selected = $("#client_search option:selected").val();
                $.ajax({
                    url: "edit_client.php",
                    method: "POST",
                    data: {
                        client_selected: client_selected,
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response.data.id);
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
                            $("#tb_site").attr("name", "tb_site").attr("required", true);
                            $("#tb_tx_status").attr("name", "tb_tx_status").attr("required", true);
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
                                "<input type='hidden'  name='id[]' value='"+item.id+"' required>" +
                                "<select class='form-control' id='drugs_name' name='drugs_name[]' required>" +
                                "<option value='' disabled selected>Select Meds</option>" +
                                "<?php select_drugs(); ?>" +
                                "</select>" +
                                "</td>" +

                                "<td><input type='date' class='form-control' name='date_discontinued[]' value='" + item.date_discontinued + "'></td>" +
                                "<td><input type='text' class='form-control' name='remarks[]' value='" + item.id + "'></td>" +
                                "<td>" +
                                "<button type='button' class='btn btn-danger btn-sm remove-row' data-id='" + counter + "'>Remove</button>" +
                                "</td>" +
                                "<input class='form-control' name='id[]' value='" + item.id + "' type='text'>" +
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
