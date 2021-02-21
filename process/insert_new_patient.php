<?php
include 'includes/connection.php';


if(isset($_POST['save_new_patient'])){
    $px_code =  $_POST['#px_code'];
    $kp_class = $_POST['#kp_class'];
    $arv_date_started = $_POST['#arv_date_started'];
    $cd4_date = $_POST['#cd4_date'];
    $cd4_status = $_POST['#cd4_status'];
    $vr_load_date = $_POST['#vr_load_date'];
    $vr_load_result = $_POST['#vr_load_result'];
    $ipt_date_started = $_POST['#ipt_date_started'];
    $ipt_status = $_POST['#ipt_status'];
    $ipt_date_dc = $_POST['#ipt_date_dc'];
    $ipt_remarks = $_POST['#ipt_remarks'];
    $cpt_date_started = $_POST['#cpt_date_started'];
    $cpt_status = $_POST['#cpt_status'];
    $cpt_date_dc = $_POST['#cpt_date_dc'];
    $cpt_remarks = $_POST['#cpt_remarks'];
    $azi_date_started =  $_POST['#azi_date_started'];
    $azi_status = $_POST['#azi_status'];
    $azi_date_dc = $_POST['#azi_date_dc'];
    $azi_remarks = $_POST['#azi_remarks'];


		$insert_profile = "INSERT INTO client_profile (client_code,kp_id,tb_status,regimen_code,arv_date_started)VALUES($px_code,$kp_class,'Inactive','samp',$arv_date_started)";
		if ($conn->query($insert_profile) === TRUE) {
    		header('Location:index.php', true, 301);
		} else {
			echo "Error: " . $sql_insert . "<br>" . $conn->error;
		}

    }
?>
