<?php
include("dbconfig/dbconfig.php");

$username = $_POST['username'];
$name = $_POST['name'];
$ic = $_POST['ic'];
$password = $_POST['password'];
$jawatan = $_POST['jawatan'];
$unit = $_POST['unit'];
$tel = $_POST['tel'];
$email = $_POST['email'];

$getData = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";

date_default_timezone_set("Asia/Kuala_Lumpur");

$rows = $dbConnected->query($getData);
$rowcount = $rows->num_rows;
if($rowcount > 0) {
    echo "Email or Username Already Exist";
}else{
    $getData = "INSERT INTO users ( username, fullname, ic, password, jawatan, unit, tel1, email, created, updated ) 
    VALUES ('$username', '$name', '$ic', '$password', '$jawatan', '$unit', '$tel', '$email', '" . date("Y-m-d") . "', '".date("Y-m-d H:i:s")."')";
    
    if(mysqli_query($dbConnected, $getData)){
        echo "Add Successful";
    }else{
        echo "Add Unsuccessful";
    }
}
?>