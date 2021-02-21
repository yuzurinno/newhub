<?php
include 'connection.php';
/* disable autocommit */
$conn->autocommit(FALSE);

$px_code = $_POST["px_code"];
$kp_class = $_POST["kp_class"];
$arv_date_started = $_POST["arv_date_started"];
$cd4_date = $_POST["cd4_date"];
$cd4_status = $_POST["cd4_status"];
$vr_load_date = $_POST["vr_load_date"];
$vr_load_result = $_POST["vr_load_result"];
$ipt_date_started = $_POST["ipt_date_started"];
$ipt_status = $_POST["ipt_status"];
$ipt_date_dc = $_POST["ipt_date_dc"];
$ipt_remarks = $_POST["ipt_remarks"];
$cpt_date_started = $_POST["cpt_date_started"];
$cpt_status = $_POST["cpt_status"];
$cpt_date_dc = $_POST["cpt_date_dc"];
$cpt_remarks = $_POST["cpt_remarks"];
$azi_date_started = $_POST["azi_date_started"];
$azi_status = $_POST["azi_status"];
$azi_date_dc = $_POST["azi_date_dc"];
$azi_remarks = $_POST["azi_remarks"];


$drugs_name = $_POST["drugs_name"];
$no_of_pill = $_POST["no_of_pill"];
$remarks = $_POST["remarks"];


$tb_site = $_POST["tb_site"];
$tb_tx_status = $_POST["tb_tx_status"];
$tb_tx_outcome = $_POST["tb_tx_outcome"];
$hbsab = $_POST["hbsab"];



for($i=0;$i<count($drugs_name);$i++){
    $conn->query("INSERT INTO test_foreach (drugs_name, no_of_pill, remarks) VALUES('$drugs_name[$i]', '$no_of_pill[$i]', '$remarks[$i]')");
}

// Commit transaction
if (!$conn->commit()) {
  echo "Commit transaction failed";
  exit();
}

// Rollback transaction
$conn->rollback();
$conn->close();
?>
