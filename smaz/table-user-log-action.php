<style>td {white-space:nowrap}</style>
           <table id="example1" class="table table-bordered table-striped" width="100%">
    <thead>
        <tr>
            <th width="30%">time</th>
            <th width="30%">Controller</th>
            <th width="30%">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include("dbconfig/dbconfig.php");
        if($dbConnected){
            $sqlselect = "SELECT runtimeerrors.smazaction, runtimeerrors.created FROM runtimeerrors JOIN users ON users.id = runtimeerrors.user_id WHERE users.id = '".$_GET['id']."' AND runtimeerrors.smazcontroller = '".$_GET['controller']."' ORDER BY runtimeerrors.created DESC LIMIT 10";
            $result=mysqli_query($dbConnected, $sqlselect); 
        }
        while($row=mysqli_fetch_assoc($result)){
            echo "
                <tr style='font-size: 14px'>
                    <td>".$row['created']."</td>
                    <td>".$row['smazcontroller']."</td>
                    <td>".$row['smazaction']."</td>
                </tr>
            ";                                                         
        }   
        ?>
    </tbody>
</table>
