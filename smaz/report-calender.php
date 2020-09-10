<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <?php include("head.html"); include_once("calender.php"); ?>
  <!-- Stylesheet file -->
<link rel="stylesheet" href="assets/style.css">

<!-- jQuery library -->
<script src="assets/jquery.min.js"></script>
  <title>SMAZ | Calender</title>
</head>


<body class="hold-transition layout-top-nav example">
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <!--<li class="breadcrumb-item"><a href="#">Report</a></li>-->
              <li class="breadcrumb-item active">Calender</li>
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
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Calender</h3>
            <!--<div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>-->
          </div>
           <div class="card-body">
           <div id="calendar_div">
                <?php echo getCalender(); ?>
            </div>
           <!--content here-->
           </div>
          <!-- /.card-body -->
          <!--<div class="card-footer">
            Footer
          </div>-->
        <!-- /.card-footer-->
        </div>
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
<script src="assets/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
