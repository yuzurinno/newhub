
<?php

include 'includes/connection.php';

 $value = mysqli_real_escape_string($conn, $_POST["value"]);
 $query = "UPDATE client SET  ".$_POST["column_name"]."='".$value."'  WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($conn, $query))
 {
    echo 'Data Updated';
 

 }


?>