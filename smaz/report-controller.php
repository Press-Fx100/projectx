<!DOCTYPE html>

<html lang="en">

<head>
  <?php include("head.html"); ?>
  <title>SMAZ | Report - controller</title>
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
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Report</li>
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
        <div class="row">
            <div class="col-md-5">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Timeline</b></h3>
                </div>
                <div id="timeline-controller" class="card-body">
                  <!--content here-->
                </div>     
                <!-- /.card-body -->
              </div>
            </div>
            <div class="col-md-7">
              <!-- left column -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Report</h3>
                </div>
                <div class="card-body">
                  <!--content here-->
                  <?php include("chart-js-controller.php"); ?>
                </div>
                <!-- /.card-body -->
                <!-- /.card-footer-->
              </div>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Table</b></h3>
                </div>
                <div id="table-controller" class="card-body">
                  <!--content here-->
                </div>     
                <!-- /.card-body -->
              </div>
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
      </div>
    </div>

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
