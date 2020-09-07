<!DOCTYPE html>
<html>
<head><title>Admin - UserData</title>
<?php
include('dbconfig/dbconfig.php');
?>
</head>
<body>
<center><b>User-Data</b></center>
<?php
if($dbConnected){
    $sqlselect="SELECT * FROM user WHERE id='".$_GET['id']."'";
    $result=mysqli_query($dbConnected, $sqlselect);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo"
            <center><table border='0' cellspacing='5' cellpadding='5'>
            <tr>
            <td style='text-align:right'>id:</td><td>".$row['id']."</td>
            </tr>
            <tr>
            <td style='text-align:right'>name:</td><td>".$row['name']."</td>
            </tr>
            <tr>
            <td style='text-align:right'>username:</td><td>".$row['username']."</td>
            </tr>
            <tr>
            <td style='text-align:right'>password:</td><td>".$row['password']."</td>
            </tr>
            <tr>
            <td style='text-align:right'>status:</td><td>".$row['status']."</td>
            </tr>
            </table></center>
        ";
    }else{
        echo"<script>alert('no available data')</script>";
    }
}  
?>    
</body>
</html>