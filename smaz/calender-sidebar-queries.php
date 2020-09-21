<?php
include("dbconfig/dbconfig.php");

$date = $_POST['date'];

echo "
    <h2 class='sidebar__heading'>".date("l", strtotime($date))."<br>".
    date("F d", strtotime($date)).", <br>".
    date("Y", strtotime($date))."</h2>
"; 
     
$getData = "SELECT DISTINCT ip_address 
FROM runtimeerrors 
WHERE created LIKE '".$date."%' 
AND xcawangan_id = '1' 
AND user_id BETWEEN '1' AND '107' 
LIMIT 8";

$result = $dbConnected->query($getData); 
echo "test ";
echo "
        <ul class='sidebar__list'>
        <li class='sidebar__list-item sidebar__list-item--complete'>Events</li>
    "; 
?>