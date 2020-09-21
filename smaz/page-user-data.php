<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <?php include("head.html"); ?>
  <title>SMAZ | Home</title>
</head>


<body class="hold-transition layout-top-nav example">
<script>
//setInterval(function(){alert("Hello")},3000);
</script>
<div class="wrapper">

  <?php include("header.html"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><b> SMAZ </b><small>sistem maklumat agihan zakat</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Report</a></li>-->
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <!-- Default box -->
            <div class='row'><div class='col'>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Home</h3>
                    </div>
                    <div class="card-body">
                    <!--content here-->
                    <?php include("user-data.php") ?>
                    </div>
                <!-- /.card-footer-->
                </div>
            </div></div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("footer.html"); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
