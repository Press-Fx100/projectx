<style>td {white-space:nowrap}</style>
           <table id="example1" class="table table-bordered table-striped" width="100%">
    <thead>
        <tr>
            <th width="10%">ID</th>
            <th width="10%">Username</th>
            <th width="35%">Full Name</th>
            <th width="10%">Cawangan</th>
            <th>Email</th>

            <th>Jawatan</th>
            <th>Updated</th>
            <th>Created</th>

        </tr>
    </thead>
    <tbody>
        <?php
        if($dbConnected){
            $sqlselect = "SELECT * FROM users ORDER BY ID ASC";
            $result=mysqli_query($dbConnected, $sqlselect); 
        }
        while($row=mysqli_fetch_assoc($result)){
            if($row['id'] != 1){
                echo "
                    <tr style='font-size: 14px'>
                        <td>".$row['id']."</td>
                        <td><a href='page-user-data.php?id=".$row['id']."' class='names'>".$row['username']."</a></td>
                        <td>".$row['fullname']."</td>
                        
                        <td>".$row['xcawangan_id']."</td>
                        
                        <td>".$row['email']."</td>
                        <td>".$row['jawatan']."</td>
                        <td>".$row['updated']."</td>
                        <td>".$row['created']."</td>
                    </tr>
                ";       
            }                                               
        }   
        ?>
    </tbody>
</table>
<a type="button" class="btn btn-primary" href="page-add-user.php">Add User</a>