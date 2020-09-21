<?php
            include("dbconfig/dbconfig.php");
            $cawangan = $_POST['cawangan'];
            $controller = $_POST['controller'];

            if($dbConnected->connect_errno) echo "Failed to connect to MySQL: " . $dbConnected->connect_errno;
            ?>
            
            <!-- The time line -->
            <div class="timeline">
                <?php
                $getData = "SELECT runtimeerrors.created, runtimeerrors.data, runtimeerrors.smazaction, runtimeerrors.smazcontroller, runtimeerrors.xcawangan_id, users.username, users.id
                FROM runtimeerrors JOIN users ON runtimeerrors.user_id = users.id 
                WHERE runtimeerrors.xcawangan_id = '$cawangan' 
                AND runtimeerrors.smazcontroller = '$controller' 
                AND runtimeerrors.user_id BETWEEN '1' AND '107' LIMIT 10";

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
                              <h3 class='timeline-header'><a href='report-user-chart-controller.php?id=".$r['id']."&username=".$r['username']."'>".$r['username']."</a></h3>
                              <div class='timeline-body'>
                                <table class='table table-borderless'>
                                  <tr>
                                    <td>cawangan[".$r['xcawangan_id']."] &rarr; controller[".$r['smazcontroller']."]<br> &rarr; action[".$r['smazaction']."]</td>
                                    <!--<td>".str_replace(";","<br>",(substr($r['data'],0,50)))."</td>-->
                                  </tr>
                                </table>
                                
                              </div>
                            </div>
                        </div>
                        ";
                    }
                }else{
                    echo"
                    no data
                    ";
                }
                ?>
            </div>