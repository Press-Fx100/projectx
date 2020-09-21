<!DOCTYPE html>

<html lang="en">

<head>
<?php include("head.html"); ?>
<?php include('dbconfig/dbconfig.php'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <title>SMAZ | Report - Action</title>
  
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
                <h3 class="card-title">Timeline</h3>
              </div>
              <div class="card-body" id="timeline-table-action">
              <!--content here-->
              </div>     
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-md-7">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><small>Cawangan &rarr; Controller &rarr; Action (<?php echo $_GET['actions'] ?>)</small></h3>
              </div>
              <div class="card-body">
              <!--content here-->
                <?php include("table-action.php"); ?>
              </div>     
            <!-- /.card-body -->
            </div>
          </div><!-- /.container-fluid -->
        </div>
      </div>
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
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": false,
    });
  });
</script>

<script>
$.ajax({
    type: 'post',
    url: 'timeline-table-action.php',
    data: {
        cawangan: "<?php echo $_GET['cawangan'] ?>",
        controller: "<?php echo $_GET['controller'] ?>",
        action: "<?php echo $_GET['actions'] ?>",
    },
    success: function (response) {
        // We get the element having id of display_info and put the response inside it
        $( '#timeline-table-action' ).html(response);
    }
});
</script>

</body>
</html>
