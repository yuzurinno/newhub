<?php
include 'includes/connection.php';
?>
<html lang="en">
	
<!-- Mirrored from bootstrap.gallery/royal-hospital-admin/design-option-4/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 28 Sep 2020 12:00:00 GMT -->
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="img/fav.png" />

		<!-- Title -->
		<title>Talavera's Hope</title>


		<!-- *************
			************ Common Css Files *************
			************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="fonts/style.css">

		<!-- Main css -->
		<link rel="stylesheet" href="css/main.css">
	<!-- Data Tables -->
	<link rel="stylesheet" href="vendor/datatables/dataTables.bs4.css" />
	<link rel="stylesheet" href="vendor/datatables/dataTables.bs4-custom.css" />


		<!-- *************
			************ Vendor Css Files *************
		************ -->
		<style>
		.content-wrapper {
    	padding: 1.5rem 1.5rem 1.5rem 1.5rem;
    	background: #fff;
    	min-height: calc(100vh - 264px);
}
		</style>

	</head>
	<body>

		<!-- Loading starts -->
		<div id="loading-wrapper">
			<div class='spinner-wrapper'>
				<div class='spinner'>
					<div class='inner'></div>
				</div>
				<div class='spinner'>
					<div class='inner'></div>
				</div>
				<div class='spinner'>
					<div class='inner'></div>
				</div>
				<div class='spinner'>
					<div class='inner'></div>
				</div>
				<div class='spinner'>
					<div class='inner'></div>
				</div>
				<div class='spinner'>
					<div class='inner'></div>
				</div>
			</div>
		</div>
		<!-- Loading ends -->


		<!-- *************
			************ Header section start *************
		************* -->


		<!-- Header start -->
		<header class="header">
			<div class="container-fluid">

				<!-- Row start -->
				<div class="row gutters">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
						<a href="index-2.html" class="logo">HACT<span>|HUB</span></a>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">

						<!-- Header actions start -->
						<ul class="header-actions">
							<li class="dropdown d-none d-sm-block">
								<a href="#" class="contact" style="background-color: #33AF65;">
									<i class="icon-phone"></i> 09201111 DUMMY NUMBER
								</a>
							</li>
							<li class="dropdown d-none d-sm-block">
							
								<div class="dropdown-menu lrg" aria-labelledby="notifications">
									
									<ul class="header-notifications">
											<li>
												<a href="#" class="clearfix">
													<div class="avatar">
														<img src="img/user24.png" alt="avatar" />
														<span class="notify-iocn icon-drafts text-danger"></span>
													</div>
													<div class="details">
														<h6>Dr. Clive</h6>
														<p>Appointed as a new President 2019-2020</p>
													</div>
												</a>
											</li>
											<li>
												<a href="#" class="clearfix">
													<div class="avatar">
														<img src="img/user21.png" alt="avatar" />
														<span class="notify-iocn icon-layers text-info"></span>
													</div>
													<div class="details">
														<h6>Dr. G. Levsmia</h6>
														<p>Will be on leave on October 2nd week.</p>
													</div>
												</a>
											</li>
											<li>
												<a href="#" class="clearfix">
													<div class="avatar">
														<img src="img/user19.png" alt="avatar" />
														<span class="notify-iocn icon-person_add text-success"></span>
													</div>
													<div class="details">
														<h6>Dr. George S</h6>
														<p>Sent new applointments list</p>
													</div>
												</a>
											</li>
										</ul>
								</div>
							</li>
							<li class="dropdown">
								<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
									<span class="user-name"></span>
									<span class="avatar">NR<span class="status busy"></span></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
									<div class="header-profile-actions">
										<div class="header-user-profile">
											<div class="header-user">
												<img src="img/user11.png" alt="Royal Hospitals Admin Template" />
											</div>
											<h5>Nélson Romyo</h5>
											<p>Admin</p>
										</div>
								
										<a href="account-settings.html"><i class="icon-settings1"></i> Account Settings</a>
									
										<a href="login.html"><i class="icon-log-out1"></i> Sign Out</a>
									</div>
								</div>
							</li>
						</ul>						
						<!-- Header actions end -->

					</div>
				</div>
				<!-- Row end -->

			</div>
		</header>
		<!-- Header end -->

		<!-- *************
			************ Header section end *************
		************* -->


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
								<i class="icon-devices_other nav-icon"></i>
								Clients
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link  active-page" href="report.php" id="doctoRs">
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
							<button class="btn btn-success" name="add" id="add" type="submit"><i class="fa fa-plus"></i>&nbsp; Print Report</button>
							
							<div class="table-container">
								<h5 class="table-title">Basic Example</h5>
								<!--*************************
									*************************
									*************************
									Basic table start
								*************************
								*************************
								*************************-->
								<div class="table-responsive">
									<table id="client_list" class="table table-striped table-bordered">
									
										<thead>
                                                
											<td width="15%">
											<b>Name</b>
											</td>
											<td width="10%">
											<b>Date Started</b>
											</td>
											<td width="10%">
											<b>Regimen</b>
											</td>
											<td width="10%">
											<b>Refill</b>
											</td>
											<td width="10%">
											<b>CD4</b>
											</td>
											<td width="10%">
											<b>VL Date</b>
											</td>
											<td width="25%">
											<b>Side Effect</b>
											</td>
											<td width="10%">
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
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/moment.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		
    <!-- // jQuery core // -->

   
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>


		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Apex Charts -->
		<script src="vendor/apex/apexcharts.min.js"></script>
		<script src="vendor/apex/examples/mixed/hospital-line-column-graph.js"></script>
		<script src="vendor/apex/examples/mixed/hospital-line-area-graph.js"></script>
		<script src="vendor/apex/examples/bar/hospital-patients-by-age.js"></script>

		<!-- Rating JS -->
		<script src="vendor/rating/raty.js"></script>	
		<script src="vendor/rating/raty-custom.js"></script>
		
		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Data Tables -->
		<script src="vendor/datatables/dataTables.min.js"></script>
		<script src="vendor/datatables/dataTables.bootstrap.min.js"></script>
		
		<!-- Custom Data tables -->
		<script src="vendor/datatables/custom/custom-datatables.js"></script>
		<script src="vendor/datatables/custom/fixedHeader.js"></script>

		<!-- Main Js Required -->
		<script src="js/main.js"></script>
		
		<script src="js/plugins/responsivetables.1.0.min.js"></script>
		<script src="js/plugins/responsivehelper.1.0.min.js"></script>
		<script src="js/plugins/mainmenu.1.0.min.js"></script>
		<script src="js/plugins/easyfiletree.1.0.min.js"></script>
		<script src="js/plugins/autosaveforms.1.0.min.js"></script>
		<script src="js/plugins/chainedinputs.1.0.min.js"></script>
		<script src="js/plugins/checkboxtoggle.1.0.min.js"></script>
		<script src="js/plugins/bootstraptabsextend.1.0.min.js"></script>
		<script src="js/plugins/lockscreen.1.0.min.js"></script>
		<script src="js/plugins/autoexpand.1.0.min.js"></script>
		<script src="js/plugins/notify.1.0.min.js"></script>
		<script src="js/plugins/nanogress.1.0.min.js"></script>
		<script src="js/plugins/powerwizard.1.0.min.js"></script>
		<script src="js/plugins/simpleselect.1.0.min.js"></script>
		<script src="js/plugins/tinycontextmenu.1.0.min.js"></script>
	
		<!-- // Third-party plugins // -->
	
		<script src="js/plugins/tinyscrollbar.min.js"></script>
		<script src="js/plugins/jquery.knob.js"></script>
		<script src="js/plugins/prism.min.js"></script>
		<script src="js/plugins/h5f.min.js"></script>
		<script src="../../../../../maps.google.com/maps/api/js38db?sensor=false&amp;language=en"></script>
		<script src="js/plugins/gmap3.min.js"></script>
		<script src="js/plugins/jquery.tablesorter.min.js"></script>
		<script src="js/plugins/jquery.tablesorter.widgets.min.js"></script>
		<script src="js/plugins/jquery.tablesorter.pager.min.js"></script>
		<script src="js/plugins/fullcalendar.min.js"></script>
		<script src="ckeditor/ckeditor.js"></script>
		<script src="js/plugins/hogan-2.0.0.js"></script>
		<script src="js/plugins/jquery.nouislider.min.js"></script>
		<script src="js/plugins/jquery.autosize-min.js"></script>
		<script src="js/plugins/jquery.magnific-popup.min.js"></script>
		<script src="js/plugins/jquery.pwstrength.min.js"></script>
		<script src="js/plugins/jquery.mixitup.min.js"></script>
		<script src="js/plugins/jquery.vticker.min.js"></script>
		<script src="js/flot/jquery.flot.min.js"></script>
		<script src="js/flot/jquery.flot.resize.min.js"></script>
		<script src="js/flot/excanvas.min.js"></script>
		<script src="js/plugins/layout.min.js"></script>
		<script src="js/plugins/masonry.pkgd.min.js"></script>
		<script src="js/plugins/json2.js"></script>
	
		<!-- // Custom //-->
	
		<script src="js/plugins/theme-demo.min.js"></script>

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
							type: "POST"
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

				$('#add').click(function() {
					var html = '<tr>';
					html += '<td contenteditable id="data1"></td>';
					html += '<td contenteditable id="data2"></td>';
					html += '<td contenteditable id="data3"></td>';
					html += '<td contenteditable id="data4"></td>';
					html += '<td contenteditable id="data5"></td>';
					html += '<td contenteditable id="data6"></td>';
					html += '<td contenteditable id="data7"></td>';
				  

					html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';

					html += '</tr>';
					$('#client_list tbody').prepend(html);

				});



				$(document).on('click', '#insert', function() {
					console.log('fdh');
					$('#alert_message').html('');
					// var patient_id = $('#data1').text();
					var client_code = $('#data1').text();
					var date_started = $('#data2').text();
					var regimen = $('#data3').text();
					var refill = $('#data4').text();
					var cd4 = $('#data5').text();
					var vl_date = $('#data6').text();
					var side_effect = $('#data7').text();

					if (client_code != '' && date_started != '' && regimen != '')

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