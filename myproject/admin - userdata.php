<!DOCTYPE html>
<html>
<head>
<title>Admin | user data</title>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="../assets/Google Font Source Sans Pro.css" rel="stylesheet">

<?php
include('dbconfig/dbconfig.php');
?>

</head>
<body class="hold-transition sidebar-mini">

<?php
if($dbConnected){
    $sqlselect = "SELECT * FROM user where id='".$_GET['id']."'";
    $result=mysqli_query($dbConnected, $sqlselect);
    $row=mysqli_fetch_assoc($result);
}
?>

<div class="wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">                                
                            <h3 class="card-title">Admin - User Data</h3>
                        </div>
                        <center><form role="form" method="post">
                            <div class="card-body">
                                <div class="col-5">
                                    <div class="form-group">
                                        <table border='0' width='600' height='150'>
                                            <thead>
                                                <tr>
                                                    <th width='15%'></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><label>Username</label></td>
                                                    <td><input type="text" class="form-control" id="in_username" placeholder="Enter Username" value="<?php echo $row['username']?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Password</label></td>
                                                    <td><input type="password" class="form-control" id="in_password" placeholder="Enter Password" value="<?php echo $row['password']?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><label></label></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th><button type="submit" class="btn btn-primary" name="btn_done">Done</button><button type="button" class="btn btn-default float-right" onclick="window.location.href='admin - usertable.php'">Back</button></th>
                                                </tr>
                                            </tfoot>
                                        </table>                                       
                                    </div>
                                    
                                                
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form></center>
                        <!-- Main content -->
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>    
</div>

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

</body>
</html>