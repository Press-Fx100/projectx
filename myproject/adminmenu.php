<!DOCTYPE html>
<html>
<head><title>Admin - Menu</title>
<br><header><center><b>ADMIN</b></center></header></br><hr>
<?php
include('dbconfig/dbconfig.php');
?>
</head>
<body>
<form method="post">
<center><table border='0'cellspacing='5' cellpadding='5'>
<tr>
<td colspan='2'><center><b>USER</b></center></td>
</tr>
<tr>
<td>username:</td>
<td><input type='text' name='user' autocomplete=off></td>
<td><button name='search_user'>search</button></td>
<td><button name='table_user'>open user table</button></td>
<td><button name='log_out'>log out</button></td>
</tr>
</center></form>

<?php
if($dbConnected){
    if(array_key_exists('search_user',$_POST)){
        if(empty($_POST['user'])){
            echo"<script>alert('please fill in the username')</script>";
        }else{
            $sqlselect = "SELECT * FROM user WHERE username LIKE '%".$_POST['user']."%'";
            $result=mysqli_query($dbConnected, $sqlselect);
            if(mysqli_num_rows($result) == 1){
                $row=mysqli_fetch_assoc($result);
                if($row['level'] == 1){
                    if($row['username'] == $_POST['user']){
                        header('Location:user_data.php?id='.$row['id']);
                    }else{
                        echo"
                        <center><table border='1' cellspacing='5' cellpadding='5'>
                        <tr>
                        <td>id</td>
                        <td>username</td>
                        <td>status</td>
                        <td>name</td>
                        <td>gender</td>
                        <td>age</td>
                        <td>address</td>
                        <td>occupation</td>
                        </tr>

                        <tr>
                        <td>".$row['id']."</td>
                        <td><a href='user_data.php?id=".$row['id']."'>".$row['username']."</a></td>
                        <td>".$row['status']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['gender']."</td>
                        <td>".$row['age']."</td>
                        <td>".$row['address']."</td>
                        <td>".$row['occupation']."</td>
                        </tr>
                        ";        
                    }  
                }else{
                    echo"<script>alert('no available data')</script>";
                }  
            }else if(mysqli_num_rows($result)>0){    
                echo"
                <center><table border='1' cellspacing='5' cellpadding='5'>
                <tr>
                <td>id</td>
                <td>username</td>
                <td>status</td>
                <td>name</td>
                <td>gender</td>
                <td>age</td>
                <td>address</td>
                <td>occupation</td>
                </tr>
                ";            
                while($row=mysqli_fetch_assoc($result)){                  
                    if($row['level'] != 0){
                        echo "
                        <tr>
                        <td>".$row['id']."</td>
                        <td><a href='user_data.php?id=".$row['id']."'>".$row['username']."</a></td>
                        <td>".$row['status']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['gender']."</td>
                        <td>".$row['age']."</td>
                        <td>".$row['address']."</td>
                        <td>".$row['occupation']."</td>
                        </tr>
                        ";
                    }                       
                }
            }else{
                echo"<script>alert('no available data')</script>";
            }            
        }
    }else if(array_key_exists('log_out',$_POST)){
        unset($_SESSION['log in']);
        session_destroy();
        header('Location:login.php');
    }
}

?>    
</body>
</html>