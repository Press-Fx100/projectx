<?php
include("dbconfig/dbconfig.php");

if($dbConnected->connect_errno) echo "Failed to connect to MySQL: " . $dbConnected->connect_errno;

isset($_POST["cawangan"]) ? $cawangan = $_POST["cawangan"] : $cawangan = "";
isset($_POST["controller"]) ? $controller = $_POST["controller"] : $controller = "";

$count = "";
$item = "";

$getData = "SELECT COUNT(smazaction) AS count, smazaction FROM runtimeerrors WHERE xcawangan_id = '$cawangan' AND smazcontroller = '$controller' GROUP BY smazaction";

$rows = $dbConnected->query($getData);
$rowcount = $rows->num_rows;

if($rowcount > 0) {
    while($r = $rows->fetch_assoc()) {

        $count .= $r['count']  . ",";
        $item .= $r['smazaction'] . ",";
    }
}else{
  $count = "0";
  $item = "no data ";
}

echo json_encode(
  array(
    "controller" => $controller,
    "count" => substr($count, 0, -1), //int
    "item" => substr($item, 0, -1), //str
  )
);

/*function random_color_part() {
  return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
  return random_color_part() . random_color_part() . random_color_part();
}*/
?>