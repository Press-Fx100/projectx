<?php
include("dbconfig/dbconfig.php");

if($dbConnected->connect_errno) echo "Failed to connect to MySQL: " . $dbConnected->connect_errno;

isset($_POST["itemselect"]) ? $itemselect = $_POST["itemselect"] : $itemselect = "";
isset($_POST["year"]) ? $year = $_POST["year"]."%" : $year = "";

$count = "";
$item = "";

$getData = "SELECT COUNT(smazcontroller) AS count, smazcontroller FROM runtimeerrors WHERE created LIKE '$year' AND xcawangan_id = '$itemselect' GROUP BY smazcontroller";

$rows = $dbConnected->query($getData);
$rowcount = $rows->num_rows;

$rows = $dbConnected->query($getData);
$rowcount = $rows->num_rows;
if($rowcount > 0) {
    while($r = $rows->fetch_assoc()) {
        $count .= $r['count']  . ",";
        $item .= $r['smazcontroller'] . ",";
    }
}else{
    $count = "0";
    $item = "no data ";
}

echo json_encode(
  array(
    "itemselect" => $itemselect,
    "count" => substr($count, 0, -1), //int
    "item" => substr($item, 0, -1) //str
  )
);
?>