<?php
 include 'connection.php';

if(!isset($_GET['searchTerm'])){
        $sql = "SELECT id,client_code FROM view_client LIMIT 10"; 
    }else{
        $search = $_GET['searchTerm'];
        $sql = "SELECT id, client_code FROM view_client WHERE client_code LIKE '%".$search."%' LIMIT 10"; 
    }
$result = $conn->query($sql);
$json = [];
while($row = $result->fetch_assoc()){
    $json[] = ['id'=>$row['id'], 'text' =>$row['client_code']];
}


echo json_encode($json);
?>