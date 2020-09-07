<option value="-">-Kosong-</option>
<?php

if($_POST['controller'] != "-"){

    $cawangan = $_POST['cawangan']; $controller = $_POST['controller'];

    include("dbconfig/dbconfig.php");

    $getData = " SELECT DISTINCT smazaction FROM runtimeerrors WHERE xcawangan_id = '$cawangan' AND smazcontroller = '$controller'";

    $rows = $dbConnected->query($getData);
    $rowcount = $rows->num_rows;

    if($rowcount > 0) {
        while($r = $rows->fetch_assoc()) {
            echo "<option value='".$r['smazaction']."'>".$r['smazaction']."</option>";
        }
    }
}
?>