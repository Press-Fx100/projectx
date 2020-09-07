<html>
<head><title>MyWeb</title></head>
<br><header><center><b>WELCOME TO MY-WEB</b></center></header><br><hr>
<body>


<form method = 'post'>
<center><table border='0' cellspacing='5' cellpadding='5'>
    <tr><td><button name='Login'/>Login</td><td>login if you already registered</td></tr>
    <tr><td colspan='2' style='text-align:center'><I><a href='register.php'>new here? register now</a></I></td></tr>
</center></form>

<?php
if(array_key_exists('Login',$_POST)){
    header('Location:login.php');
}
?>


</body>
</html>