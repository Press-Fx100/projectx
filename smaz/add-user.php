<div class="row">
    <div class="col">
        <div class="form-group">
            <label>Username</label>
            <input type="username" class="form-control" id="inputUsername" placeholder="username" value="">
        </div>
        <div class="form-group">
            <label>Email address</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="email" value="">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="password" value="">
        </div>
        <div class="form-group">
            <label>Tel No.</label>
            <input type="tel" class="form-control" id="inputTel" placeholder="tel. no" value="">
        </div>
    </div>
    <div class="col">
        
        <div class="form-group">
            <label>Name</label>
            <input type="name" class="form-control" id="inputName" placeholder="name" value="">
        </div>
        <div class="form-group">
            <label>IC</label>
            <input type="ic" class="form-control" id="inputIc" placeholder="ic" value="">
        </div>
        <div class="form-group">
            <label>Jawatan</label>
            <input type="jawatan" class="form-control" id="inputJawatan" placeholder="jawatan" value="">
        </div>
        <div class="form-group">
            <label>Unit</label>
            <input type="unit" class="form-control" id="inputUnit" placeholder="unit" value="">
        </div>
    </div>
</div>
<div class="row">
    <div class="btn-group">
        <a type="button" class="btn btn-default" href="page-user-table.php">Back</a>
        <a type="button" class="btn btn-primary" href="javascript:addUser()"><font color="white">Add</font></a>
    </div>
</div>

<?php
?>
<script>
    function addUser() {
        if(document.getElementById('inputUsername').value == ""){
            alert("please fill in username");
        }else if(document.getElementById('inputPassword').value == ""){
            alert("please fill in password");
        }else{
            if (confirm('Are you sure you want to add this user information?')) {
                $.ajax({
                    type: 'post',
                    url: 'user-data-add.php',
                    data: {
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
                        location.href = "page-user-table.php";
                    }
                }); 
            }else{
                alert("Add Cancelled");
            }
        }
        
    }
</script>

<?php

?>