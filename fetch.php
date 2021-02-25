
<?php
include 'includes/connection.php';
// include 'includes/select.php';

$columns = array('id', 'client_code', 'kp_class', 'arv_date_started', 'date_nearest_refill', 'tb_status', 'regimen_code', 'cd4_date_started', 'cd4_result', 'vl_date_started', 'vl_result', 'ipt_status', 'ipt_date_started', 'ipt_date_completed_discountinued', 'ipt_remarks', 'cpt_status', 'cpt_date_started', 'cpt_date_completed_discountinued', 'cpt_remarks', 'azi_status', 'azi_date_started', 'azi_date_completed_discountinued', 'azi_remarks' );

$query = "SELECT * FROM hact.view_client";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE client_code LIKE "%'.$_POST["search"]["value"].'%" 
 OR arv_date_started LIKE "%'.$_POST["search"]["value"].'%" 
 OR regimen_code LIKE "%'.$_POST["search"]["value"].'%" 
 OR tb_status LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));

$result = mysqli_query($conn, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result)){
    $client_code = $row['client_code'];
    $id = $row['id']; 
    $arv_date_started = $row['arv_date_started'];
    $tb_status = $row['tb_status'];
    $regimen_code = $row['regimen_code'];
    $cd4_date_started = $row['cd4_date_started'];
    $cd4_result = $row['cd4_result'];
    $vl_date_started = $row['vl_date_started'];
    $vl_result = $row['vl_result'];

    $ipt_status = $row['ipt_status'];
    $ipt_date_started = $row['ipt_date_started'];
    $ipt_date_completed_discountinued = $row['ipt_date_completed_discountinued'];
    $ipt_remarks = $row['ipt_remarks'];
  
    $cpt_status = $row['cpt_status'];
    $cpt_date_started = $row['cpt_date_started'];
    $cpt_date_completed_discountinued = $row['cpt_date_completed_discountinued'];
    $cpt_remarks = $row['cpt_remarks'];
  
    $azi_status = $row['azi_status'];
    $azi_date_started = $row['azi_date_started'];
    $azi_date_completed_discountinued = $row['azi_date_completed_discountinued'];
    $azi_remarks = $row['azi_remarks'];
    $kp_class = $row['kp_class'];
    $code = $row['code'];
    if($code == "LTE"){
        $color = "danger";
    } else if($code == "3TC AZT"){
        $color = "brown";
    } else if($code == "EFV" ){
        $color = "success";
    } else if($code == "NVP"){
        $color = "primary";
    } else if($code == "LPV/RTV"){
        $color = "purple";
    } else if($code == "TLD"){
        $color = "orange";
    } else if($code == "NVP SY"){
        $color = "warning";
    } else if($code == "AZT SY"){
        $color = "warning";
    } else if($code == "3TC SY"){
        $color = "warning";
    } else{
        $color = "dark";
    }
 $sub_array = array();
 $sub_array[] = "<b><div content class='update' data-id='' data-column='client_code'><span class='text-$color'>$client_code</span></div>";
$sub_array[] = "<div contenteditable class='update' data-id='' data-column='kp_class'>$kp_class</div>";
 $sub_array[] = "<div content class='update' data-id='' data-column='arv_date_started'>$arv_date_started</div>";


 //  $sub_array[] = "<div contenteditable class='update' data-id='' data-column='regimen'>$date_nearest_refill</div>";
//  $sub_array[] = "<div contenteditable class='update' data-id='' data-column='regimen_code'>$regimen_code</div>";
 $sub_array[] = "<div content class='update' style='text-align:center' data-id='' data-column='tb_status'>$tb_status</div>";
 $sub_array[] = "<div content class='update' style='text-align:center' data-id='' data-column='cd4_date_started'>$cd4_date_started</div>";
 $sub_array[] = "<div content class='update' style='text-align:center' data-id='' data-column='cd4_result'>$cd4_result</div>";
 $sub_array[] = "<div content class='update' style='text-align:center' data-id='' data-column='vl_date_started'>$vl_date_started</div>";
 $sub_array[] = "<div content class='update' style='text-align:center' data-id='' data-column='vl_result'>$vl_result</div>";
 $sub_array[] = "<div content class='update' style='text-align:center' data-id='' data-column='ipt_status'>$ipt_status</div>";
 $sub_array[] = "<div content class='update' style='text-align:center' data-id='' data-column='ipt_date_started'>$ipt_date_started</div>";
 $sub_array[] = "<div content class='update' style='text-align:center' data-id='' data-column='ipt_date_completed_discountinued'>$ipt_date_completed_discountinued</div>";
 $sub_array[] = "<div content class='update' style='text-align:center' data-id='' data-column='ipt_remarks'>$ipt_remarks</div>";
 $sub_array[] = "<div content class='update' style='text-align:center' data-id='' data-column='cpt_status'>$cpt_status</div>";
 $sub_array[] = "<div content class='update' style='text-align:center' data-id='' data-column='tb_stcpt_date_startedatus'>$cpt_date_started</div>";
 $sub_array[] = "<div content class='update' style='text-align:center' data-id='' data-column='cpt_date_completed_discountinued'>$cpt_date_completed_discountinued</div>";
 $sub_array[] = "<div content class='update' style='text-align:center' data-id='' data-column='cpt_remarks'>$cpt_remarks</div>";
 $sub_array[] = "<div content class='update' style='text-align:center' data-id='' data-column='azi_date_started'>$azi_date_started</div>";
 $sub_array[] = "<div content class='update' style='text-align:center' data-id='' data-column='azi_date_completed_discountinued'>$azi_date_completed_discountinued</div>";
 $sub_array[] = "<div content class='update' style='text-align:center' data-id='' data-column='azi_status'>$azi_status</div>";

 
 $sub_array[] = "<div content class='update' style='text-align:center' data-id='' data-column='azi_remarks'>$azi_remarks</div>";


//  $sub_array[] = "<button type='button' name='delete' class='btn btn-danger btn-xs delete' data-patient_code='$client_code' data-id='$id' id='$id'>Delete</button>";
 $data[] = $sub_array; 
}

function get_all_data($conn)
{
 $query = "SELECT * FROM hact.view_client";
 $result = mysqli_query($conn, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($conn),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);



?>
