
<?php
include 'includes/connection.php';
// include 'includes/select.php';

$columns = array('id', 'client_code', 'tb_client_id', 'tb_site', 'tb_treatment_stat', 'tb_tx_outcome', 'tb_hbsab', 'tb_status', 'status');

$query = "SELECT * FROM hact.view_tb";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE client_code LIKE "%'.$_POST["search"]["value"].'%" 
 OR tb_treatment_stat LIKE "%'.$_POST["search"]["value"].'%" 
 OR tb_status LIKE "%'.$_POST["search"]["value"].'%" 
 OR tb_hbsab LIKE "%'.$_POST["search"]["value"].'%" 
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
    $tb_site = $row['tb_site'];
    $tb_client_id = $row['tb_client_id'];
    $tb_treatment_stat = $row['status'];
    $tb_tx_outcome = $row['tb_tx_outcome'];
    $tb_hbsab = $row['tb_hbsab'];
    $tb_status = $row['tb_status'];
  

 $sub_array = array();
 $sub_array[] = "<b><div content class='update' data-id='' data-column='client_code'>$client_code</div>";
 $sub_array[] = "<div content class='update' data-id='' data-column='tb_status'>$tb_status</div>";
 $sub_array[] = "<div content class='update' data-id='' data-column='tb_site'>$tb_site</div>";
 $sub_array[] = "<div content class='update' data-id='' data-column='tb_treatment_stat'>$tb_treatment_stat</div>";
 $sub_array[] = "<div content class='update' data-id='' data-column='tb_tx_outcome'>$tb_tx_outcome</div>";
 $sub_array[] = "<div content class='update' data-id='' data-column='tb_hbsab'>$tb_hbsab</div>";


//  $sub_array[] = "<button type='button' name='delete' class='btn btn-danger btn-xs delete' data-client_code='$client_code' data-id='$id' id='$id'>Delete</button>";
 $data[] = $sub_array; 
}

function get_all_data($conn)
{
 $query = "SELECT * FROM hact.view_tb";
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
