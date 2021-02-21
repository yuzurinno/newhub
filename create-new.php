<?php
include 'includes/connection.php';

?>
<html lang="en">
	
<?php
include 'header.html';
?>

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
							<a class="nav-link active-page" href="index.php">
								<i class="icon-devices_other nav-icon"></i>
								Clients
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="tb.php">
								<i class="icon-devices_other nav-icon"></i>
								TB Status
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="transactions.php">
								<i class="icon-devices_other nav-icon"></i>
								Transactions
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="refill.php">
								<i class="icon-devices_other nav-icon"></i>
								For Refill
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="report.php" id="doctoRs">
								<i class="icon-users nav-icon"></i>
								Reports
							</a>
							
						</li>
					 
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
						<li class="breadcrumb-item active">List of Clients</li>
					</ol>
				
				</div>
				<!-- Page header end -->


				<!-- Content wrapper start -->
				<div class="content-wrapper">

					<!-- Row start -->
					<div class="row gutters">

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<?php include 'modals/add-modal.php'; ?>
						<a href="#customModalTwo" data-toggle="modal">
						
							<button class="btn btn-success" name="add" id="add" type="submit"><i class="fa fa-plus"></i>&nbsp; Add New Client</button>
							</a>
							<div class="table-container">
						
								<!--*************************
									*************************
									*************************
									Basic table start
								*************************
								*************************
								*************************-->
								<div class="table-responsive">
									<table id="client_list" style="font-size: 11px;" class="table table-striped table-bordered data-table">
									
										<thead>
                                                
											<td>
											<b>Patient Code</b>
											</td>
											<td>
											<b>ARV Date Started</b>
											</td>
										
											<td>
											<b>Regimen Code</b>
											</td>
											<td>
											<b>TB Status</b>
											</td>
											<td>
											<b>CD4 DS</b>
											</td>
											<td>
											<b>CD4 Res.</b>
											</td>
											<td>
											<b>VL DS</b>
											</td>
											<td>
											<b>VL Res.</b>
											</td>
											<td>
											<b>IPT Stat</b>
											</td>
											<td>
											<b>IPT DS</b>
											</td>
											<td>
											<b>IPT DC/D</b>
											</td>
											<td>
											<b>IPT Rem.</b>
											</td>
											<td>
											<b>CPT Stat</b>
											</td>
											<td>
											<b>CPT DS</b>
											</td>
											<td>
											<b>CPT DC/D</b>
											</td>
											<td>
											<b>CPT Rem.</b>
											</td>
											<td >
											<b>AZT Stat</b>
											</td>
											<td >
											<b>AZT DS</b>
											</td>
											<td>
											<b>AZT DC/D</b>
											</td>
											<td>
											<b>AZT Rem.</b>
											</td>
											
											<td>
											<b>Action</b>
											</td>
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

						</div>

					</div>
					<!-- Row end -->

				</div>
				<!-- Content wrapper end -->
				<footer class="main-footer">© TGH iHOMP 2020</footer>

			</div>
			<!-- *************
				************ Main container end *************
			************* -->

			

		</div>

		<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<?php
        include 'scripts.html';
        ?>
		

		<script type="text/javascript" language="javascript">
			$(document).ready(function() {

				fetch_data();
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

				function update_data(id, column_name, value) {

					$.ajax({
						url: "update.php",
						method: "POST",
						data: {
							id: id,
							column_name: column_name,
							value: value
						},
						success: function(data) {
							$('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
							$('#client_list').DataTable().destroy();
							fetch_data();
						}
					});
					setInterval(function() {
						$('#alert_message').html('');
					}, 5000);
				}

				$(document).on('blur', '.update', function() {
					var id = $(this).data("id");
					var column_name = $(this).data("column");
					var value = $(this).text();
					update_data(id, column_name, value);


					});
				<?php
				include 'includes/select.php';
				?>
				// $('#add').click(function() {
				// 	var html = '<tr>';
				
				// 	html += '<td contenteditable id="data1"></td>';
				// 	html += '<td contenteditable id="data2"></td>';
				// 	html += '<td contenteditable id="data3">'
				// 	html += '<select class="form-control">'
                // 	html += '<option value="" disabled selected>Choose your option</option>'
                // 	html += "<?php selections(); ?>";
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
								side_effect:side_effect

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

<!-- Mirrored from bootstrap.gallery/royal-hospital-admin/design-option-4/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 28 Sep 2020 12:00:00 GMT -->
</html>