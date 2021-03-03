
<?php
include 'includes/connection.php';
// include 'includes/select.php';
$clientcode = $_POST['client_id'];

$columns = array('id', 'client_code', 'drug_name', 'dh_date_dispensed', 'dh_no_pills_dispensed', 'dh_pills_on_hand', 'dh_pills_missed', 'date_next_fill', 'disbursed_by');

//$query = "SELECT * FROM view_transaction WHERE id='$clientcode'";

if(!empty($_POST["search"]["value"]))
{
 $query = 'SELECT * FROM view_transaction WHERE id='.$clientcode.' && dh_date_dispensed LIKE "%'.$_POST["search"]["value"].'%" 
 OR date_next_fill LIKE "%'.$_POST["search"]["value"].'%" 
 ';
} else {
    $query = "SELECT * FROM view_transaction WHERE id='$clientcode'";
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY dh_date_dispensed DESC ';
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
    $drugs_name = $row['drug_name'];
    $dh_date_dispensed = $row['dh_date_dispensed'];
    $dh_no_pills_dispensed = $row['dh_no_pills_dispensed'];
    $dh_pills_on_hand = $row['dh_pills_on_hand'];
    $dh_pills_missed = $row['dh_pills_missed'];
    $date_next_fill = $row['date_next_fill'];
    $disbursed_by = $row['disbursed_by'];
 
    if($drugs_name == "name"){
        $color = "primary";
    } else if($drugs_name == 2){
        $color = "success";
    } else if($drugs_name == 3){
        $color = "info";
    } else if($drugs_name == 4){
        $color = "warning";
    } else if($drugs_name == 5){
        $color = "danger";
    } else if($drugs_name == 6){
        $color = "secondary";
    } else{
        $color = "dark";
    }
 $sub_array = array();
 $sub_array[] = "<b><div contenteditable class='update' data-id='' data-column='patient_code'><span class='text-$color'>$client_code</span></div>";
 $sub_array[] = "<div contenteditable class='update' data-id='' data-column='drug_name'>$drugs_name</div>";
 $sub_array[] = "<div contenteditable class='update' data-id='' data-column='dh_date_dispensed'>$dh_date_dispensed</div>";
 $sub_array[] = "<div contenteditable class='update' data-id='' data-column='dh_no_pills_dispensed'>$dh_no_pills_dispensed</div>";
 $sub_array[] = "<div contenteditable class='update' data-id='' data-column='dh_pills_on_hand'>$dh_pills_on_hand</div>";
 $sub_array[] = "<div contenteditable class='update' data-id='' data-column='dh_pills_missed'>$dh_pills_missed</div>";
 $sub_array[] = "<div contenteditable class='update' data-id='' data-column='date_next_fill'>$date_next_fill</div>";
 $sub_array[] = "<div contenteditable class='update' data-id='' data-column='disbursed_by'>$disbursed_by</div>";
 

 $sub_array[] = "<button type='button' name='delete' class='btn btn-danger  delete btn-xs' data-patient_code='$client_code' data-id='$id' id='$id'>Edit</button>";
 $data[] = $sub_array; 
}

function get_all_data($conn)
{
 $query = "SELECT * FROM HACT.view_transaction";
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
