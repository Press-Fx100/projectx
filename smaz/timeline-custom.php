            <?php
            include("dbconfig/dbconfig.php");
            if($dbConnected->connect_errno) echo "Failed to connect to MySQL: " . $dbConnected->connect_errno;
    /*
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
            */
            ?>
            
            <!-- The time line -->
            <div class="timeline">
                <?php
                $getData = "SELECT runtimeerrors.created, runtimeerrors.smazaction, runtimeerrors.smazcontroller, runtimeerrors.xcawangan_id, users.username
                FROM runtimeerrors JOIN users ON runtimeerrors.user_id = users.id";

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
                  $getData .= " WHERE runtimeerrors.xcawangan_id BETWEEN '1' AND '3' 
                  AND runtimeerrors.user_id BETWEEN '1' AND '107'";
                }else{
                  if($controller == "-"){
                    $getData .= " WHERE runtimeerrors.xcawangan_id = '$cawangan' 
                    AND runtimeerrors.user_id BETWEEN '1' AND '107'";                   
                  }else{
                    if($action == "-"){
                      $getData .= " WHERE runtimeerrors.xcawangan_id = '$cawangan' 
                      AND runtimeerrors.smazcontroller = '$controller' 
                      AND runtimeerrors.user_id BETWEEN '1' AND '107'";
                    }else{
                      $getData .= " WHERE runtimeerrors.xcawangan_id = '$cawangan' 
                      AND runtimeerrors.smazcontroller = '$controller' 
                      AND runtimeerrors.smazaction = '$action'
                      AND runtimeerrors.user_id BETWEEN '1' AND '107'";
                    }
                  }
                }
                
                
                if($time != "-"){
                  if($time1 == $time2){
                    $time = str_replace("/","-",$time1);
                    $getData .= " AND runtimeerrors.created  LIKE '$time %'";
                  }else if($time1 != "" || $time2 != ""){
                    $getData .= " AND runtimeerrors.created BETWEEN DATE('$time1') AND DATE('$time2')";
                  }
                }
                
                if($ip != "-"){
                  $getData .= " AND INET_ATON(runtimeerrors.ip_address) BETWEEN INET_ATON('$ip1') AND INET_ATON('$ip2')";
                }
                $getData .= " LIMIT 10";

                $rows = $dbConnected->query($getData);
                $rowcount = $rows->num_rows;
                if($rowcount > 0) {
                    $date = "";
                    while($r = $rows->fetch_assoc()) {
                        if($date != explode(" ",$r['created'])[0]){
                            $date = explode(" ",$r['created'])[0];
                            echo "
                            <div class='time-label'>
                                <span class='bg-secondary'>$date</span>
                            </div>
                        "; 
                        }
                        echo"
                        <div>
                            <i class='fas fa-user bg-secondary'></i>
                            <div class='timeline-item'>
                              <span class='time'><i class='fas fa-clock'></i> ".explode(" ",$r['created'])[1]."</span>
                              <h3 class='timeline-header'><a href='#'>".$r['username']."</a></h3>
                              <div class='timeline-body'>
                                controller: ".$r['smazcontroller']."<br>action: ".$r['smazaction']."<br>cawangan: ".$r['xcawangan_id']."
                              </div>
                            </div>
                        </div>
                        ";
                        
                    $i++;
                    }
                }else{
                    echo"
                    no data
                    ";
                }
                ?>
            </div>