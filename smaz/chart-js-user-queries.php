<?php
include("dbconfig/dbconfig.php");

if($dbConnected->connect_errno) echo "Failed to connect to MySQL: " . $dbConnected->connect_errno;

isset($_POST["id"]) ? $id = $_POST["id"] : $id = "";

$count = "";
$item = "";

$getData = "SELECT COUNT(runtimeerrors.smazcontroller) AS count, runtimeerrors.smazcontroller AS item FROM runtimeerrors JOIN users ON users.id = runtimeerrors.user_id WHERE users.id = '$id' GROUP BY runtimeerrors.smazcontroller";


$rows = $dbConnected->query($getData);
$rowcount = $rows->num_rows;
if($rowcount > 0) {
    while($r = $rows->fetch_assoc()) {
        $count .= $r['count']  . ",";
        $item .= $r['item'] . ",";
    }
}else{
  $count = "0";
  $item = "no data ";
}

echo json_encode(
  array(
    "itemselect" => "controller",
    "count" => substr($count, 0, -1), //int
    "item" => substr($item, 0, -1) //str
  )
);
?>