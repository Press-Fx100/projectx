<?php
include("dbconfig/dbconfig.php");

$getData = "DELETE FROM runtimeerrors WHERE user_id = '".$_POST['id']."'";
mysqli_query($dbConnected, $getData);
$getData = "DELETE FROM users WHERE id = '".$_POST['id']."'";
if(mysqli_query($dbConnected, $getData)){
    echo "Delete Successful";
}else{
    echo "Delete Unsuccessful";
}
?>