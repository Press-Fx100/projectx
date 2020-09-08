
    <option value="-">-Kosong-</option>
<?php
if($_POST['cawangan'] != "-"){

    $cawangan = $_POST['cawangan'];

    include("dbconfig/dbconfig.php");

    $getData = " SELECT DISTINCT smazcontroller FROM runtimeerrors WHERE xcawangan_id = '$cawangan'";

    $rows = $dbConnected->query($getData);
    $rowcount = $rows->num_rows;

    if($rowcount > 0) {
        while($r = $rows->fetch_assoc()) {
            echo "<option value='".$r['smazcontroller']."'>".$r['smazcontroller']."</option>";
        }
    }
}
?>