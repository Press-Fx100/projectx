<?php
include("dbconfig/dbconfig.php");

if($dbConnected->connect_errno) echo "Failed to connect to MySQL: " . $dbConnected->connect_errno;

isset($_POST["ip1"]) ? $ip1 = $_POST["ip1"] : $ip1 = "";
isset($_POST["ip2"]) ? $ip2 = $_POST["ip2"] : $ip2 = "";

$personnel = "";
$month = "";

$getData = "SELECT DISTINCT users.username, COUNT(runtimeerrors.user_id) AS count FROM runtimeerrors JOIN users ON users.id = runtimeerrors.user_id WHERE  INET_ATON(ip_address) BETWEEN '$ip1' AND '$ip2' GROUP BY users.username";

$rows = $dbConnected->query($getData);
$rowcount = $rows->num_rows;
if($rowcount > 0) {
    while($r = $rows->fetch_assoc()) {
        $personnel .= $r['count']  . ",";
        $month .= $r['username'] . ",";
    }
}else{
  $count = "0";
  $item = "no data ";
}

echo json_encode(
  array(
    "personnel" => substr($personnel, 0, -1), //int
    "month" => substr($month, 0, -1) //str
  )
);
?>