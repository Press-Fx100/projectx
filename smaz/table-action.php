<style>td {white-space:nowrap}</style>
           <table id="example1" class="table table-bordered table-striped" width="100%" style="text-align:center">
    <thead>
        <tr>
            <th width="10%">Time</th>
            <th width="10%">IP address</th>
            <th width="15%">Username</th>
            <th width="35%">Full Name</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($dbConnected){
            $sqlselect = "SELECT * FROM users, runtimeerrors WHERE runtimeerrors.xcawangan_id = '".$_GET['cawangan']."' AND smazcontroller = '".$_GET['controller']."' AND smazaction = '".$_GET['actions']."' LIMIT 100";
            $result=mysqli_query($dbConnected, $sqlselect); 
        }
        while($row=mysqli_fetch_assoc($result)){
            echo "
                <tr style='font-size: 14px'>
                    <td>".$row['created']."</td>
                    <td>".$row['ip_address']."</td>
                    <td>".$row['username']."</td>
                    <td>".$row['fullname']."</td>
                </tr>
            ";                                                    
        }   
        ?>
    </tbody>
</table>
<hr>
<center><a type="button" class="btn btn-block btn-default col-3" href="report-controller.php">Back</a></center>