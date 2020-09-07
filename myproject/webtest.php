<html>
<head>
<title>[re]test</title>
</head>
<body>
<?php
	
include('../dbconfig/dbconfig.php');
?>
<form method = "post">
<table border="0" cellspacing="5" cellpadding="5">
    <tr><td><input type="submit" name="insert" value="insert"/></td></tr>
    <tr><td><input type="submit" name="update" value="update"/></td></tr>
    <tr><td><input type="submit" name="delete" value="delete"/></td></tr>
    <tr><td><button style="height:20px;width:100px" name="display"/>display</td></tr>
</form> 
<?php
if($dbConnected){
    echo "Connection: OK<br><hr><br>";
    //INSERT DATA IN DATABASE
    if(array_key_exists('insert', $_POST)){
        echo "<header><b>INSERT</b></header><br>";
        $sqlinsert="INSERT INTO user ( name, username ) VALUES ('mohamed', 'mohamadA')";
        if(mysqli_query($dbConnected, $sqlinsert)){
        echo "INSERT: OK<br>";
        }
    }
    $nama='abdullah';
    $id=1;
    //UPDATE DATA IN DATABASE
    if(array_key_exists('update', $_POST)){
        echo "<header><b>UPDATE</b></header><br>";
        //$sqlupdate="UPDATE user SET username = 'kkk' WHERE name = 'khai'";
        print_r($nama);
        print_r($id);
        $sqlupdate="UPDATE user SET name = '".$nama."' WHERE id = '".$id."'";
        print_r($sqlupdate."<br>"); //how to debug
        
        if(mysqli_query($dbConnected, $sqlupdate)){
        echo "UPDATE: OK<br>";
        }
    }
    
    //DELETE DATA IN DATABASE
    if(array_key_exists('delete', $_POST)){
        echo "<header><b>DELETE</b></header><br>";
        //$sqldelete="DELETE FROM user WHERE username = 'mohamadA'";
        $sqldelete="DELETE FROM user WHERE name = '".$nama."'";
        if(mysqli_query($dbConnected, $sqldelete)){
        echo "DELETE: OK<br>";
        }
    }
    //TABLE & SELECT
    if(array_key_exists('display', $_POST)){       
       echo "<header><b>DISPLAY</b></header><br>";
        $sqlselect="SELECT id, name, username FROM user";
        $result=mysqli_query($dbConnected, $sqlselect);
        if(mysqli_num_rows($result)>0){
            echo "
                <table border='0' cellspacing='5' cellpadding='5'>
                <tr>
                <td><center><b>id</b></center></td>
                <td><center><b>name</b></center></td>
                <td><center><b>username</b></center></td>
                </tr>
            ";
            while($row=mysqli_fetch_assoc($result)){
                echo "
                    <tr>
                    <td><center>".$row["id"]."</center></td>
                    <td><center>".$row["name"]."</center></td>
                    <td><center>".$row["username"]."</center></td>
                    </tr>
                ";
            }
        }else{
            echo "no data available";
        } 
    }
    
}else{
    echo "Connection: FAIL<br><hr><br>";
}
if($dbConnected){

    /*//ECHO CAN DO THIS TOO *can do html in php with echo
    echo"
        <input type='text' name='yeah'><input type='submit' value='dont hit me'>
    ";*/
    
    
    
    
    
}
?>
   
</body>
</html>