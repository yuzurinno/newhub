
<?php
include 'includes/connection.php';
// include 'includes/select.php';

$columns = array('id', 'client_code', 'drug_name', 'date_next_fill');

$date_today = date('Y-m-d');
$days_filled = 7;

$date = date_create($date_today); 
         
date_add($date, date_interval_create_from_date_string("$days_filled days")); 

$refill_date = date_format($date, "Y-m-d");




$query = "SELECT * FROM view_refill WHERE date_next_fill between '$date_today' and '$refill_date'";

if(!empty($_POST["search"]["value"]))
{
 $query = 'SELECT * FROM view_refill WHERE date_next_fill between '.$date_today.' && '.$refill_date.' && client_code LIKE "%'.$_POST["search"]["value"].'%" 
 OR drug_name LIKE "%'.$_POST["search"]["value"].'%" 
 ';
} else {
    $query = "SELECT * FROM view_refill WHERE date_next_fill between '$date_today' and '$refill_date'";
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
    $drug_name = $row['drug_name'];
    $date_next_fill = $row['date_next_fill'];


 $sub_array = array();
 $sub_array[] = "<b><div content class='update' data-id='' data-column='client_code'>$client_code</div>";
 $sub_array[] = "<div content class='update' data-id='' data-column='drug_name'>$drug_name</div>";
 $sub_array[] = "<div content class='update' data-id='' data-column='date_next_fill'>$date_next_fill</div>";
 $data[] = $sub_array; 
}

function get_all_data($conn)
{
 $query = "SELECT * FROM hact.view_refill";
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
