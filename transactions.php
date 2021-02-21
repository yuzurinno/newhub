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
                <a class="nav-link" href="client.php">
                    <i class="fa fa-user nav-icon"></i>
                    <span style="font-size: 13px;">  Clients</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tb.php">
                    <i class="fa fa-check nav-icon"></i>
                    <span style="font-size: 13px;">  TB Status</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active-page" href="transactions.php">
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
                    <div class="tab-content mt-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <script src="https://use.fontawesome.com/fcfd8b4814.js"></script>

                            <div class="card">
                                    <div class="card-header"><b>Dispense Drugs</b></div>
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
                                                        <tr>
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
                                        <button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="right-side">
                                        <button type="submit" class="btn btn-link success" id="save_new_patient"><i class="icon-save nav-icon"></i> Save</button>
                                    </div>
                                </div>
                            </form>

                                                <table id="tb_transaction" class="table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:10%;">Patient Code</th>
                                                            <th style="width:10%;">Regimen</th>
                                                            <th style="width:10%;">Date Dispensed</th>
                                                            <th style="width:10%;">No of Pills Dispensed</th>
                                                            <th style="width:10%;">Pills on Hand</th>
                                                            <th style="width:10%;">Pills Missed</th>
                                                            <th style="width:10%;">Date of Next Refill</th>
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
                                            <br>
                                            <br>
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

            $("#client_search").change(function(){
                var id = $(this).val();
                $("#regimen_group").empty();
                $.ajax({
                    url: "edit_client.php",
                    method: "POST",
                    data: {
                        client_selected: id,
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response.data.id);
                        var counter = 1;
                    
                        jQuery.each(response.regimen, function(index, item) {
                     
                          
                            var newTextBoxDiv = $(document.createElement('tr')).attr("id", 'row_id' + counter, "class", 'item');
                            newTextBoxDiv.after().html("<td>" +
                                "<select class='form-control' id='drugs_name' name='drugs_name[]' required>" +
                                "<option value='' disabled selected>Select Meds</option>" +
                                "<?php select_drugs(); ?>" +
                                "</select>" +
                                "</td>" +
                             
                                "<td><input type='date' class='form-control' name='date_dispensed[]'></td>" +
                                "<td><input type='text' class='form-control' name='pills_dispensed[]'></td>" +
                                "<td><input type='text' class='form-control' name='pills_onhand[]'></td>" +
                                "<td><input type='text' class='form-control' name='pills_missed[]'></td>" +
                                "<td>" +
                                "<button type='button' class='btn btn-danger btn-sm remove-row' data-id='" + counter + "'>Remove</button>" +
                                "</td>" +
                                "<input   class='form-control' name='id[]' value='" + item.id + "' type='hidden'>" +
                                "</tr>");
                            newTextBoxDiv.appendTo("#regimen_group");
                            $("#row_id" + counter + " select option[value=" + item.regimen_id + " ]").attr('selected', 'selected').attr('readonly');
                            $("#row_id" + counter + " option:not(:selected)").prop("disabled", true);
                            counter++;
                        });


                        //Update Button
                        $('#save_new_patient').html('<i class="icon-edit nav-icon"></i> Update');
                    }
                });
            });

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
