<?php
$hostname = '10.10.1.3';
$username = 'myuser';
$password = 'Laravel@1122';

$database = 'smaz';

$dbConnected= @mysqli_connect($hostname, $username, $password, $database);
?>