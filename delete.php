
<?php

include 'includes/connection.php';

$client_delete = $_POST['client_delete'];

    $query_ab = "DELETE FROM client WHERE patient_code = '$client_delete'";
    if(mysqli_query($conn, $query_ab)){

                            echo 'Data Deleted';
                        }

?>