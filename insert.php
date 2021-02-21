<?php
include 'includes/connection.php';

    $client_code = mysqli_real_escape_string($conn, $_POST["client_code"]);
    $date_started = mysqli_real_escape_string($conn, $_POST["date_started"]);
    $regimen = mysqli_real_escape_string($conn, $_POST["regimen"]);
    $refill = mysqli_real_escape_string($conn, $_POST["refill"]);
    $cd4 = mysqli_real_escape_string($conn, $_POST["cd4"]);
    $vl_date = mysqli_real_escape_string($conn, $_POST["vl_date"]);
    $side_effect = mysqli_real_escape_string($conn, $_POST["side_effect"]);
   

    
    $sqlnum = "SELECT id, patient_code from hact.client where patient_code = '$client_code'";
    $resultnum = $conn->query($sqlnum);
    $row = mysqli_fetch_array($resultnum);  

    if($resultnum->num_rows > 0) {
        $hnum =  $row['patient_code'];
        echo json_encode(['code'=>404, 'msg'=>"Client Code $hnum already exists!"]);
    } else {
        $query = "INSERT INTO hact.client(patient_code, date_started, regimen, refill, cd4, vl_date, side_effect) VALUES ('$client_code', '$date_started','$regimen','$refill' ,'$cd4', '$vl_date', '$side_effect')";
        if(mysqli_query($conn, $query)){
            echo json_encode(['code'=>200, 'msg'=>'Data Inserted']);
            // exit;
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
?>
