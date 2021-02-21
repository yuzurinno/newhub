<?php
include 'includes/connection.php';



    if(empty($_SESSION['username'])){
        header("location:login.php");
    }else{
      
    
    }
    

?>
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
	
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<!-- Icomoon Font Icons css -->
	<link rel="stylesheet" href="fonts/style.css">

	<!-- Main css -->
	<link rel="stylesheet" href="css/main.css">

<!-- Data Tables -->
<link rel="stylesheet" href="vendor/datatables/dataTables.bs4.css" />
<link rel="stylesheet" href="vendor/datatables/dataTables.bs4-custom.css" />
<link rel="stylesheet" href="vendor/bs-select/bs-select.css" />



	<!-- *************
		************ Vendor Css Files *************
	************ -->
	<style>
	.content-wrapper {
	padding: 1.5rem 1.5rem 1.5rem 1.5rem;
	background: #fff;
	min-height: calc(100vh - 264px);
	}
	.text-brown {
color: #7A6D5C !important;
}
.text-purple{
	color: #B354B0 !important;
}
.text-orange {
	color: #F8A664 !important;
}
.tab-head{
  padding-left: 0px !important;
  padding-right: 0px !important;
}
.nav-item a:focus{
  outline: unset;
}
.nav-item a:hover{
  border: 1px solid #fff !important;
}
.nav-item a{
 
  font-weight: 600;
  padding-left: 28px;
  padding-right: 28px;
}
.nav-item .active{
  color: #5741A3 !important;
  border:none !important;
  border-bottom: 3px solid #5741A3 !important;
  font-weight: 600;
}
.nav-item .active:hover{
  border:none !important;
  border-bottom: 3px solid #5741A3 !important;
}
.nav-tabs{
  border-bottom: none !important; 
}
.tab-pane h5{
  border-left: 4px solid #5741A3;
}
.tab-pane p{
  border-top: 1px solid #c1c1c1;
}
.card{
	width: 100%;
}
.card-header{
	background-color: #71A786 !important;
	color: #fff;
	font-size:16px;
}
.card-footer{
	width: 100%;
	background-color: #71A786 !important;
	height: 6px!important;
	padding: 0.2rem 0.5rem !important;
}
.table thead {
    background: #71A786;
    color: #ffffff;
}
#tb_regimen thead{
	background: #007E71;
    color: #ffffff;
}
.tab-content {
    padding: 0rem;
}
#signout{
	color: #ffffff;
}
.col-form-label{
	font-size: 13px;
}
.form-control{
	font-size: 13px;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #71A786;
	border-left: 1px solid #71A786;
	border-right: 1px solid #71A786;
	border-bottom: 1px solid #71A786;
}
.table-bordered td, .table-bordered th {
    border: 1px solid #71A786;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #71A786;
}
.table-bordered td, .table-bordered th {
    border: 1px solid #71A786;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #71A786;
}
table.table-bordered.dataTable th, table.table-bordered.dataTable td {
	border-left: 1px solid #71A786;

}
table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {
	border-bottom: 1px solid #71A786;

}
table.table-bordered.dataTable th, table.table-bordered.dataTable td {
	border-right: 1px solid #71A786;

}
table.table-bordered.dataTable th:last-child, table.table-bordered.dataTable th:last-child, table.table-bordered.dataTable td:last-child, table.table-bordered.dataTable td:last-child {
	border-right: 1px solid #71A786;
}

.page-header {
    padding: 0rem; 
    background: none;
    margin: 0 0 0 0;  
    min-height: 0px;  
     max-height: 0px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.card .card-header {
  padding: 0.5rem 0.5rem 0.5rem 1rem;
	}
.card-header {
    padding: .75rem 1rem;
  
    background-color: rgba(0,0,0,.03);
    border-bottom: 1px solid rgba(0,0,0,.125);
	font-size: 14px;
}

	</style>

</head>
<body >

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
				
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 text-center">
				<span style="font-size: 30px; vertical-align: middle; color: white;"><b>HACT</span></b></span> <span style="font-size: 12px; vertical-align: middle; color: white;"> |  HIV and AIDS Core Team</span>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">

					<!-- Header actions start -->
					<ul class="header-actions">
						<li class="dropdown d-none d-sm-block">
							<a href="#" class="contact" style="background-color: #71A786;">
								TALAVERA GENERAL HOSPITAL
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


	