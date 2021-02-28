<?php
include 'connection.php';
// include 'includes/select.php';
$client_search = $_POST['client_selected'];
$query = "SELECT * FROM hact.view_client where id = $client_search";
$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$sql_regimen = "SELECT * FROM hact.regimen where client_id = $client_search";
$regimen_result = mysqli_query($conn, $sql_regimen);
while($row_regimen = mysqli_fetch_assoc($regimen_result)){
    $regimen[] = $row_regimen;
}

//TB Stats
if($row['tb_status'] == 'Active'){
    $query = "SELECT * FROM hact.tb_data where tb_client_id = $client_search";
    $number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));
    $result = mysqli_query($conn, $query);
    $tb_row = mysqli_fetch_assoc($result);
} else {
    $tb_row = "";
}


echo json_encode([
    'data' => $row,
    'regimen' => $regimen,
    'tb_stats' => $tb_row,
]);

?>
