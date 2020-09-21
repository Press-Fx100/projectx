<style>td {white-space:nowrap}</style>
           <table id="example1" class="table table-striped table-borderless" width="100%" style="text-align:center">
    <thead>
        <tr>
            <th width="10%">No.</th>
            <th>Item</th>
            <th>Count</th>
        </tr>
    </thead>
    <tbody>
        <?php
include("dbconfig/dbconfig.php");

$cawangan = $_POST['cawangan'];

if($dbConnected->connect_errno) echo "Failed to connect to MySQL: " . $dbConnected->connect_errno;

$count = "";
$item = "";

$getData = "SELECT COUNT(smazcontroller) AS count, smazcontroller AS item FROM runtimeerrors WHERE xcawangan_id = '$cawangan' GROUP BY smazcontroller";

$rows = $dbConnected->query($getData);
$rowcount = $rows->num_rows;
if($rowcount > 0) {
    $i = 1;
    while($r = $rows->fetch_assoc()) {
        echo "
        <tr style='font-size: 14px'>
            <td>" . $i . "</td>
            <td>" . $r['item'] . "</td>
            <td>" . $r['count'] . "</td>
        </tr>
    "; 
    $i++;
    }
}else{
    echo"
    <tr style='font-size: 14px'>
        <td colspan='2'>No Data</td>
    </tr>
    ";
}
?>