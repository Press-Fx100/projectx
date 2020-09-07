<?php
include('../dbconfig/dbconfig.php');;

isset($_POST["mode"]) ? $mode = $_POST["mode"] : $mode = "";
isset($_POST["link_id"]) ? $link_id = $_POST["link_id"] : $link_id = "";

if($mode == "get details"){
  $qry = "SELECT * FROM user WHERE id = $link_id";
  $rows = $dbConnected->query($qry);
  $rowcount = $rows->num_rows;
  
  if($rowcount > 0){
    $r = $rows->fetch_assoc();
    
    $arr = array(
      "full_name" => $r["name"],
      "age" => $r["age"],
      "gender" => $r["gender"],
      "address" => $r["address"],
      "occupation" => $r["occupation"],
      "password" => $r["password"]
    );
    
    echo json_encode($arr);
  }
}
?>