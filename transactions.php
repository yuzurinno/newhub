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
            <li class="has-sub ">
                <a href="tb-stat.php">
                    <i class="fa fa-tv"></i>
                    <span>TB Status Monitoring</span>
                </a>
            </li>
            <li class="has-sub active">
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
                            <h4 class="panel-title">Dispense Drugs</h4>
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>


                        <div class="panel-body">
                            <div class="table-responsive">
                                   <form method="post" action="" id="form_submit">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="table-responsive">
                                                <div class="col-md-3">
                                                <div class="form-group">
                                        <label for=""> Select Client: &nbsp;</label>
                                      <select class="select" name="client_search" id="client_search" style="width:250px;" required>
                                    <option value="">Select Client</option>
                                </select>

                                    </div>
                                                </div>
                                                <table id="tb_regimen" class="table m-0">
                                                    <thead>
                                                        <tr style="background-color: #2D353C; color: white;">
                                                            <th style="width:20%;">Drug</th>
                                                            <th style="width:20%;">Date Dispensed</th>
                                                            <th style="width:15%;">No of Pills Dispensed</th>
                                                            <th style="width:15%;">No of Pills on Hand</th>
                                                            <th style="width:15%;">No of Pills Missed</th>
                                                            <th style="width:15%;"><button type="button" class="btn btn-success btn-sm" id="add_row"><i class="icon-plus nav-icon"></i>Add New Row</button></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="regimen_group">
                                                        <tr id="row_id1" class="item">
                                                            <td>
                                                                <select class="form-control" name="drugs_name[]" required>
                                                                    <option value="" disabled selected>Select Meds</option>
                                                                    <?php select_drugs(); ?>
                                                                </select>
                                                            </td>
                                                            <td><input type="date" class="form-control" name="date_dispensed[]"></td>
                                                            <td><input type="number" class="form-control" name="no_dispensed[]"></td>
                                                            <td><input type="number" class="form-control" name="no_hand[]"></td>
                                                            <td><input type="number" class="form-control" name="no_missed[]"></td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger btn-sm remove-row" data-id="1">Remove</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>

                                                <div class="modal-footer custom">

                                    			<div class="left-side">
                                      			<button type="button" class="btn btn-danger"  data-dismiss="modal">Cancel</button>
                                   				 </div>
                                    			<div class="divider"></div>
                                   				 <div class="right-side">
                                        		<button type="submit" class="btn btn-success success" id="save_new_patient"><i class="icon-save nav-icon"></i> Save</button>
                                    			</div>
                                				</div>
                                				</div>
                                				</div>
                                				</div>
                                				
                            </form>
                      
                                    <table id="tb_transaction" class="table table-bordered table-hover table-td-valign-middle" width="100%">
                                    	<thead>
                                       	 	<tr style="background-color: #2D353C; color: white;">
                                                            <th style="width:10%;">Patient Code</th>
                                                            <th style="width:3%;">Regimen</th>
                                                            <th style="width:10%;">Date Dispensed</th>
                                                            <th style="width:8%;">Pills Dispensed</th>
                                                            <th style="width:8%;">Pills on Hand</th>
                                                            <th style="width:10%;">Pills Missed</th>
                                                            <th style="width:10%;">Next Refill</th>
                                                            <th style="width:10%;">Disbursed By</th>
                                                            <!-- <th style="width:10%;">Action</th> -->
                                                        </tr>
                                                    </thead>
                                                    <!-- <tbody id="regimen_group">
                                                        <tr id="row_id1" class="item">
                                                           
                                                            <td><input type="text" class="form-control" name="no_of_pill[]"></td>
                                                    
                                                            <td><input type="date" class="form-control" name="no_of_pill[]"></td>
                                                            <td><input type="number" class="form-control" name="date_discontinued[]"></td>
                                                            <td><input type="number" class="form-control" name="remarks[]"></td>
                                                            <td><input type="number" class="form-control" name="remarks[]"></td>
                                                            <td><input type="date" class="form-control" name="no_of_pill[]"></td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger btn-sm remove-row" data-id="1">Remove</button>
                                                            </td>
                                                        </tr>
                                                    </tbody> -->
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

            //Add Row
            $("#add_row").click(function() {
                var newTextBoxDiv = $(document.createElement('tr'))
                    .attr("id", 'row_id' + row_counter, "class", 'item').attr("class", 'item');
                newTextBoxDiv.after().html("<td>" +
                    "<select class='form-control' name='drugs_name[]' required>" +
                    "<option value='' disabled selected>Select Meds</option>" +
                    "<?php select_drugs(); ?>" +
                    "</select>" +
                    "</td>" +
                    "<td><input type='date' value='' class='form-control' name='date_dispensed[]'></td>" +
                    "<td><input type='number' class='form-control' name='no_dispensed[]'></td>" +
                    "<td><input type='number' class='form-control' name='no_hand[]'></td>" +
                    "<td><input type='number' class='form-control' name='no_missed[]'></td>" +
                    "<td>" +
                    "<button type='button' class='btn btn-danger btn-sm remove-row' data-id='" + row_counter + "'>Remove</button>" +
                    "</td>" +
                    "</tr>");
                newTextBoxDiv.appendTo("#regimen_group");
                row_counter++;
            });

			
				function fetch_transaction(client_id) {
                    console.log('From Function ' + client_id);
					var dataTable = $('#tb_transaction').DataTable({
					
						"processing": true,
						"serverSide": true,
						"order": [],
						"ajax": {
							url: "fetch_transaction.php",
							type: "POST",
                            data: {
                                'client_id': client_id
                            },
                        
						}	
			});
         

            
		}


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
                var client_id = $('#client_search').val();
                if (confirm("Are you sure you want to save this?")) {
                 
                    $.ajax({
                        url: "includes/insert_new_transaction.php",
                        type: 'POST',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            $('#loading-wrapper').show();
                        },
                        success: function(response) {
                            $('#tb_transaction').DataTable().destroy();
                            $('#loading-wrapper').hide();
                            $('#alert_message').html('<div class="alert alert-success">' + response + '</div>');
                            console.log('Client ID: ' + client_id);
                            //window.location.reload();
                            fetch_transaction(client_id);
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

            // $('#add').click(function() {
            // 	var html = '<tr>';

            // 	html += '<td contenteditable id="data1"></td>';
            // 	html += '<td contenteditable id="data2"></td>';
            // 	html += '<td contenteditable id="data3">'
            // 	html += '<select class="form-control">'
            // 	html += '<option value="" disabled selected>Choose your option</option>'

            // 	html += '</select>';
            // 	html += '</td>';
            // 	html += '<td contenteditable id="data4"></td>';
            // 	html += '<td contenteditable id="data5"></td>';
            // 	html += '<td contenteditable id="data6"></td>';
            // 	html += '<td contenteditable id="data7"></td>';


            // 	html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';

            // 	html += '</tr>';
            // 	$('#client_list tbody').prepend(html);

            // });

            // });


            $('#div_tb').fadeOut('slow');
            $('#client_search').change(function() {
                var client_id = $(this).val();
                console.log('From select ' + client_id);
                 $('#tb_transaction').DataTable().destroy();
                fetch_transaction(client_id);

               
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





        });

    </script>
</body>

</html>
