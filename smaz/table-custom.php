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
        if($dbConnected->connect_errno) echo "Failed to connect to MySQL: " . $dbConnected->connect_errno;

        $cawangan = $_GET["cawangan"];
        $controller = $_GET["controller"];
        $action = $_GET["action"];
        $time = $_GET["time"];
        $ip = $_GET["ip"];
        
        $time1 = explode("-",$time)[0];
        $time2 = explode("-",$time)[1];
        
        $ip1 = explode("-",$ip)[0];
        $ip2 = explode("-",$ip)[1];
        
        $count = "";
        $item = "";
        
        if($cawangan == "-"){
          $getData = "SELECT COUNT(xcawangan_id) AS count, xcawangan_id AS item FROM runtimeerrors WHERE xcawangan_id BETWEEN '1' AND '3' AND user_id BETWEEN '1' AND '107'";
          $label = "Cawangan";
        }else{
          if($controller == "-"){
            $getData = "SELECT COUNT(smazcontroller) AS count, smazcontroller AS item FROM runtimeerrors WHERE xcawangan_id = '$cawangan' AND user_id BETWEEN '1' AND '107'";
            $label = $cawangan;
            
          }else{
            if($action == "-"){
              $getData = "SELECT COUNT(smazaction) AS count, smazaction AS item FROM runtimeerrors WHERE xcawangan_id = '$cawangan' AND smazcontroller = '$controller' AND user_id BETWEEN '1' AND '107'";
              $label = $controller;
            }else{
              $getData = "SELECT COUNT(users.id) AS count, users.username AS item
              FROM runtimeerrors JOIN users ON users.id = runtimeerrors.user_id 
              WHERE runtimeerrors.xcawangan_id = '$cawangan' 
              AND runtimeerrors.smazcontroller = '$controller' 
              AND runtimeerrors.smazaction = '$action'
              AND runtimeerrors.user_id BETWEEN '1' AND '107'";
              $label = $action;
            }
          }
        }
        
        
        if($time != "-"){
          if($time1 == $time2){
            $time = str_replace("/","-",$time1);
            if($action == "-"){
              $getData .= " AND created  LIKE '$time %'";
            }else{
              $getData .= " AND runtimeerrors.created  LIKE '$time %'";
            }
          }else if($time1 != "" || $time2 != ""){
            if($action == "-"){
              $getData .= " AND created BETWEEN DATE('$time1') AND DATE('$time2')";
            }else{
              $getData .= " AND runtimeerrors.created BETWEEN DATE('$time1') AND DATE('$time2')";
            }
          }
        }
        
        if($ip != "-"){
          $getData .= " AND INET_ATON(ip_address) BETWEEN INET_ATON('$ip1') AND INET_ATON('$ip2')";
        }
        
        if($cawangan == "-"){
          $getData .= " GROUP BY xcawangan_id ORDER BY xcawangan_id ASC";
        }else{
          if($controller == "-"){
            $getData .= " GROUP BY smazcontroller";
          }else{
            if($action == "-"){
              $getData .= " GROUP BY smazaction";
            }else{
              $getData .= " GROUP BY users.id";
            }
          }
        }
        
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
    </tbody>
</table>