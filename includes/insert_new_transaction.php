
<?php
session_start();
include 'connection.php';


$sess = $_SESSION['username'];
if(empty($_SESSION['username'])){
    header("location:login.php");
}
// Turn autocommit off
$conn -> autocommit(FALSE);

$drugs_name = $_POST["drugs_name"];
$date_dispensed = $_POST["date_dispensed"];
$no_dispensed = $_POST["pills_dispensed"];
$no_hand = $_POST["pills_onhand"];
$no_missed = $_POST['pills_missed'];
$client_search = $_POST["client_search"];

for($i=0;$i<count($drugs_name);$i++){
    
    if (!empty($no_dispensed[$i]) || $no_dispensed[$i] > 0 && !empty($date_dispensed[$i])){
        $sql_select = "SELECT drug_frequency from drugs WHERE id='$drugs_name[$i]'";
        $result = $conn->query($sql_select);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $drug_frequency = $row['drug_frequency'];
            $total_pills = $no_hand[$i] + $no_dispensed[$i];
            $days_filled = (( $total_pills - 10)  / $drug_frequency) ;
            if($drugs_name[$i] == '9' || $drugs_name[$i] == '10' || $drugs_name[$i] =='11'){
                $refill_date = '0000-00-00';
            } else {
                $date = date_create($date_dispensed[$i]); 
                date_add($date, date_interval_create_from_date_string("$days_filled days"));
                $refill_date = date_format($date, "Y-m-d");
            }
          
            $conn->query("INSERT INTO dispense_history (dh_client_id, dh_regimen, dh_date_dispensed, dh_no_pills_dispensed, dh_pills_on_hand, dh_pills_missed, total_pills, date_next_fill, disbursed_by) VALUES ('$client_search','$drugs_name[$i]', '$date_dispensed[$i]', '$no_dispensed[$i]', '$no_hand[$i]', '$no_missed[$i]', '$total_pills', '$refill_date', '$sess')");
        }
    }
}

// Commit transaction
if (!$conn -> commit()) {
  //echo "Commit transaction failed";
    echo json_encode([
        'message' => 'Error ' . $conn->error,
    ],400);
  exit();
} else {
    echo json_encode(['message' => 'Saved','client_id' => $client_search],200);
}
                
// Rollback transaction
$conn -> rollback();

$conn -> close();
?>