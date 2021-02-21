<?php
session_start();
include 'includes/connection.php';


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
                <a class="nav-link active-page" href="tb.php">
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
						<li class="breadcrumb-item active">List of Clients</li>
					</ol>
				
				</div>
				<!-- Page header end -->


				<!-- Content wrapper start -->
				<div class="content-wrapper">

					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						
							
							<div class="table-container">
						
								<!--*************************
									*************************
									*************************
									Basic table start
								*************************
								*************************
								*************************-->
								<div class="table-responsive">
									<table id="tb_data" style="font-size: 11px;" class="table table-striped table-bordered data-table">
									
										<thead>
                                                
											<td>
											<b>Patient Code</b>
											</td>
											<td>
											<b>TB Status</b>
											</td>
										
											<td>
											<b>Site</b>
											</td>
											<td>
											<b>TX Status</b>
											</td>
											<td>
											<b>TX Result</b>
											</td>
											<td>
											<b>HBSAB</b>
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
        <?php
        include 'scripts.html';
        ?>
		
		<script type="text/javascript" language="javascript">
			$(document).ready(function() {

				fetch_data();
				function fetch_data() {
					var dataTable = $('#tb_data').DataTable({
					
						"processing": true,
						"serverSide": true,
						"order": [],
						"ajax": {
							url: "fetch_tb.php",
							type: "POST",
							
						}
						
			});
		}

  });
			
             
</script>

	</body>

<!-- Mirrored from bootstrap.gallery/royal-hospital-admin/design-option-4/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 28 Sep 2020 12:00:00 GMT -->
</html>