<?php
include("dbconfig/dbconfig.php");

$getData = "UPDATE users SET username = '".$_POST['username']."', email = '".$_POST['email']."', password = '".$_POST['password']."',tel1 = '".$_POST['tel']."', fullname = '".$_POST['name']."', ic = '".$_POST['ic']."', jawatan = '".$_POST['jawatan']."', unit = '".$_POST['unit']."' WHERE id = '".$_POST['id']."'";

if(mysqli_query($dbConnected, $getData)){
    echo "Update Successful";
}else{
    echo "Update Unsuccessful";
}
?>