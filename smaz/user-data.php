<?php
include("dbconfig/dbconfig.php");
if($dbConnected->connect_errno) echo "Failed to connect to MySQL: " . $dbConnected->connect_errno;

$getData = "SELECT users.tel1, users.username, users.fullname, users.password, users.jawatan, users.ic, users.unit, users.email, runtimeerrors.xcawangan_id FROM runtimeerrors RIGHT JOIN users ON runtimeerrors.user_id = users.id WHERE users.id = '".$_GET['id']."'";

$rows = $dbConnected->query($getData);
$rowcount = $rows->num_rows;
$r = $rows->fetch_assoc();

if($rowcount <= 0){
    echo "
    <center>no user available</center>

    <script>window.stop()</script>
    ";
}
?>

<div class="row">
    <div class="col">
        <div class="form-group">
            <p><b>ID: <?php echo $_GET['id'] ?></b></p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label>Username</label>
            <input type="username" class="form-control" id="inputUsername" placeholder="username" value="<?php echo $r['username'] ?>">
        </div>
        <div class="form-group">
            <label>Email address</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="email" value="<?php echo $r['email'] ?>">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="password" value="<?php echo $r['password'] ?>">
        </div>
        <div class="form-group">
            <label>Tel No.</label>
            <input type="tel" class="form-control" id="inputTel" placeholder="tel. no" value="<?php echo $r['tel1'] ?>">
        </div>
    </div>
    <div class="col">
        
        <div class="form-group">
            <label>Name</label>
            <input type="name" class="form-control" id="inputName" placeholder="name" value="<?php echo $r['fullname'] ?>">
        </div>
        <div class="form-group">
            <label>IC</label>
            <input type="ic" class="form-control" id="inputIc" placeholder="ic" value="<?php echo $r['ic'] ?>">
        </div>
        <div class="form-group">
            <label>Jawatan</label>
            <input type="jawatan" class="form-control" id="inputJawatan" placeholder="jawatan" value="<?php echo $r['jawatan'] ?>">
        </div>
        <div class="form-group">
            <label>Unit</label>
            <input type="unit" class="form-control" id="inputUnit" placeholder="unit" value="<?php echo $r['unit'] ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="btn-group">
        <a type="button" class="btn btn-primary" href="javascript:updateUser()"><font color="white">Update</font></a>
        <a type="button" class="btn btn-default" href="page-user-table.php">Back</a>
        <a type="button" class="btn btn-danger" href="javascript:deleteUser()"><font color="white">Delete</font></a>
    </div>
</div>

<?php
?>
<script>
    function updateUser() {
        if (confirm('Are you sure you want to update user information?')) {
            $.ajax({
                type: 'post',
                url: 'user-data-update.php',
                data: {
                    id: <?php echo $_GET['id'] ?>,
                    username: document.getElementById('inputUsername').value,
                    email: document.getElementById('inputEmail').value,
                    password: document.getElementById('inputPassword').value,
                    tel: document.getElementById('inputTel').value,
                    name: document.getElementById('inputName').value,
                    ic: document.getElementById('inputIc').value,
                    jawatan: document.getElementById('inputJawatan').value,
                    unit: document.getElementById('inputUnit').value,
                },
                success: function (response) {
                    window.alert(response);
                }
            }); 
        }else{
            alert("Update Cancelled");
        }
    }
    function deleteUser() {
        if (prompt('Are you sure you want to delete user information? Enter "Delete"') == "Delete") {
            $.ajax({
                type: 'post',
                url: 'user-data-delete.php',
                data: {
                    id: <?php echo $_GET['id'] ?>,
                },
                success: function (response) {
                    window.alert(response);
                    location.href = "page-user-table.php";
                }
            }); 
        }else{
            alert("Delete Cancelled");
        }
    }
</script>

<?php

?>