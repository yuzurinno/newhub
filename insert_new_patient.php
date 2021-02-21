<?php
include 'connection.php';
$conn->autocommit(FALSE);


$px_code =  $_POST['px_code'];
$kp_class = $_POST['kp_class'];
$arv_date_started = $_POST['arv_date_started'];
$cd4_date = $_POST['cd4_date'];
$cd4_status = $_POST['cd4_status'];
$vr_load_date = $_POST['vr_load_date'];
$vr_load_result = $_POST['vr_load_result'];
$ipt_date_started = $_POST['ipt_date_started'];
$ipt_status = $_POST['ipt_status'];
$ipt_date_dc = $_POST['ipt_date_dc'];
$ipt_remarks = $_POST['ipt_remarks'];
$cpt_date_started = $_POST['cpt_date_started'];
$cpt_status = $_POST['cpt_status'];
$cpt_date_dc = $_POST['cpt_date_dc'];
$cpt_remarks = $_POST['cpt_remarks'];
$azi_date_started =  $_POST['azi_date_started'];
$azi_status = $_POST['azi_status'];
$azi_date_dc = $_POST['azi_date_dc'];
$azi_remarks = $_POST['azi_remarks'];
$tb_stat = $_POST['tb_stat'];
$tb_site = $_POST['tb_site'];
$tb_tx_status = $_POST['tb_tx_status'];
$tb_tx_outcome = $_POST['tb_tx_outcome'];
$hbsab = $_POST['hbsab'];
$code = $_POST['reg_code'];
$client_selected = $_POST['client_selected'];

$drugs_name = $_POST["drugs_name"];
$no_of_pill = $_POST["no_of_pill"];
$date_discontinued = $_POST["date_discontinued"];
$remarks = $_POST["remarks"];
$px_id = $_POST['px_id'];
$id =$_POST['id'];


if($px_id == '')
{



    $insert_profile = "INSERT INTO client_profile(client_code,kp_id,tb_status,regimen_code,arv_date_started)VALUES('$px_code','$kp_class','$tb_stat','$code','$arv_date_started')";
    if($conn->query($insert_profile) === TRUE) {
        
        $sql_select = "SELECT id from client_profile WHERE client_code='$px_code'";
        $result = $conn->query($sql_select);
        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_assoc();
            $id_select = $row['id'];
            
            for($i=0;$i<count($drugs_name);$i++){
            
                $conn->query("INSERT INTO regimen (client_id,regimen_id, date_discontinued, remarks) VALUES('$id_select','$drugs_name[$i]', '$date_discontinued[$i]', '$remarks[$i]')");
            }

            $conn->query("INSERT INTO cd4_data(cd4_client_id,cd4_date_started,cd4_result)VALUES('$id_select','$cd4_date','$cd4_status')");
            $conn->query("INSERT INTO vl_data(vl_client_id,vl_date_started,vl_result)VALUES('$id_select','$vr_load_date','$vr_load_result')");
            $conn->query("INSERT INTO ipt_data(ipt_client_id,ipt_date_started,ipt_status,ipt_date_completed_discountinued,ipt_remarks)VALUES('$id_select','$ipt_date_started','$ipt_status','$ipt_date_dc','$ipt_remarks')");
            $conn->query("INSERT INTO cpt_data(cpt_client_id,cpt_date_started,cpt_status,cpt_date_completed_discountinued,cpt_remarks)VALUES('$id_select','$cpt_date_started','$cpt_status','$cpt_date_dc','$cpt_remarks')");
            $conn->query("INSERT INTO azithro_data(azi_client_id,azi_date_started,azi_status,azi_date_completed_discountinued,azi_remarks)VALUES('$id_select','$azi_date_started','$azi_status','$azi_date_dc','$azi_remarks')");
            $conn->query("INSERT INTO tb_data(tb_client_id,tb_site,tb_treatment_stat,tb_tx_outcome,tb_hbsab)VALUES('$id_select','$tb_site','$tb_tx_status','$tb_tx_outcome','$hbsab')");
        } else {
            echo $conn->error;
        }
    }
} else {
    $update_profile = "UPDATE client_profile set client_code='$px_code', kp_id='$kp_class', tb_status='$tb_stat', regimen_code='$code', arv_date_started='$arv_date_started' where id ='$px_id'";
    if($conn->query($update_profile) === TRUE) {
       
            
            for($i=0;$i<count($drugs_name);$i++){

                $sql_select = "SELECT id from regimen WHERE id ='$id[$i]'";
                $result = $conn->query($sql_select);
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
            
                    $conn->query("Update regimen set regimen_id='$drugs_name[$i]', date_discontinued='$date_discontinued[$i]', remarks='$remarks[$i]' where id ='$id[$i]'");
                
                } else {

                    $conn->query("INSERT INTO regimen (client_id,regimen_id, date_discontinued, remarks) VALUES('$px_id','$drugs_name[$i]', '$date_discontinued[$i]', '$remarks[$i]')");

                }

            }

            $conn->query("UPDATE cd4_data set cd4_date_started='$cd4_date',cd4_result='$cd4_status' WHERE cd4_client_id='$px_id'");
            $conn->query("UPDATE vl_data set vl_date_started='$vr_load_date',vl_result='$vr_load_result' WHERE vl_client_id='$px_id'");
            $conn->query("UPDATE ipt_data set ipt_date_started='$ipt_date_started',ipt_status='$ipt_status',ipt_date_completed_discountinued='$ipt_date_dc',ipt_remarks='$ipt_remarks' WHERE ipt_client_id='$px_id'");
            $conn->query("UPDATE cpt_data set cpt_date_started='$cpt_date_started',cpt_status='$cpt_status',cpt_date_completed_discountinued='$cpt_date_dc',cpt_remarks='$cpt_remarks' WHERE cpt_client_id='$px_id'");
            $conn->query("UPDATE azithro_data set azi_date_started='$azi_date_started',azi_status='$azi_status',azi_date_completed_discountinued='$azi_date_dc',azi_remarks='$azi_remarks' WHERE azi_client_id='$px_id'");
            $conn->query("UPDATE tb_data set tb_site='$tb_site',tb_treatment_stat='$tb_tx_status',tb_tx_outcome='$tb_tx_outcome',tb_hbsab='$hbsab' WHERE tb_client_id='$px_id'");
        } else {
            echo $conn->error;
        }
    }


// Commit transaction
if (!$conn->commit()) {
    echo json_encode([
        'message' => 'Error ' . $conn->error,
    ],400);
} else {
    echo json_encode([
        'message' => 'ok',
    ],200);
}


$conn->rollback();
?>