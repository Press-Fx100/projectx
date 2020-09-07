<!DOCTYPE html>
<html>
<head><title>MyWeb - Login</title>
<br><header><center><b>LOGIN</b></center></header><br><hr>
<?php
include('dbconfig/dbconfig.php');
?>
</head>

<body>

<form method="post">
<center>
<table border='0'cellspacing="5" cellpadding="5">
<tr>
<td>Name:</td>
<td><input type='text' name='username' autocomplete=off></td>
</tr>
<tr>
<td>Password:</td>
<td><input type='password' name='password'></td>
</tr>
<tr>
<td style='text-align:center' colspan='2'><button name='back'>back</button> <button name='login'>login</button></td>
</tr>
</center>
</form>
<?php
if($dbConnected){
    if(array_key_exists('login', $_POST)){
        if(empty($_POST['username'])||empty($_POST['password'])){
            echo"<script>alert('missing username or password')</script>";
        }else{
            $sqlselect="SELECT level, id, password, username FROM user";
            $result=mysqli_query($dbConnected, $sqlselect);

            $user_check=0;

            while($row=mysqli_fetch_assoc($result)){
                if($_POST['username']==$row['username']){

                    $user_check=1;
                    
                    if($_POST['password']==$row['password']){
                        session_start();
                        $_SESSION['id'] = $row['id'];
                        if($row['level']==0){
                            header('Location:adminmenu.php');
                        }else if($row['level']==1){
                            session_start();
                            header('Location:menu.php');                           
                        }else{
                            echo "<script>alert('who are you?')</script>";
                        }
                        exit();
                    }else{
                        echo "<script>alert('wrong password')</script>";
                    }
                    break;
                }
            }
            if($user_check==0){
                echo "<script>alert('wrong username')</script>";
            }
        }    
    }else if(array_key_exists('back', $_POST)){
        header('location:index.php');
    }
}
//session_start();
//$var_value = $_SESSION['login'];
?>
</body>
</html>