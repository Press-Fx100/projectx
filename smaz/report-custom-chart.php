<!DOCTYPE html>

<html lang="en">

<head>
  <?php include("head.html"); ?>
  <title>SMAZ | Report</title>
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
            <!--<div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>-->
          </div>
          
          <div class="card-body">
           <!--content here-->

           <?php include("timeline-custom.php"); ?>

           </div>     
          <!-- /.card-body -->
        </div>
            </div>
        <div class="col-md-7">
          <!-- left column -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Report</h3>
            <!--<div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>-->
          </div>
           <div class="card-body">
           <!--content here-->

           <?php include("chart-js-custom.php"); ?>

           </div>
          <!-- /.card-body -->
          
          <!--<div class="card-footer">
            Footer
          </div>-->
        <!-- /.card-footer-->
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Table</b></h3>
            <!--<div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>-->
          </div>
          
          <div class="card-body">
           <!--content here-->

           <?php include("table-custom.php"); ?>

           </div>     
          <!-- /.card-body -->
        </div>
        
          
        </div>
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
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "ordering": false,
      "lengthChange": false,
      "searching": false,
      "info": false,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
