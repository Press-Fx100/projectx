  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="../assets/Google Font Source Sans Pro.css" rel="stylesheet">

<?php
//include('dbconfig/dbconfig.php');
$hostname = '10.10.1.3';
$username = 'myuser';
$password = 'Laravel@1122';

$database = 'smaz';

$dbConnected= @mysqli_connect($hostname, $username, $password, $database);

if($dbConnected){
    $sqlselect = "SELECT * FROM users";
    $result=mysqli_query($dbConnected, $sqlselect); 
}
?>
<table id="example1" class="table table-bordered table-striped table-fix" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>IC</th>
            <th>Full Name</th>
            <th>Jawatan</th>
            <th>Tel.</th>
            <th>Email</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($dbConnected){
            $sqlselect = "SELECT * FROM users";
            $result=mysqli_query($dbConnected, $sqlselect); 
        }
        while($row=mysqli_fetch_assoc($result)){
            if($row['id'] != 1){
                echo "
                    <tr style='font-size: 14px'>
                        <td>".$row['id']."</td>
                        <td><a href='#' class='names' id=".$row['id'].">".$row['username']."</a></td>
                        <td>".$row['ic']."</td>
                        <td>".$row['fullname']."</td>
                        <td>".$row['jawatan']."</td>
                        <td>".$row['tel1']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['created']."</td>
                        <td>".$row['updated']."</td>
                    </tr>
                ";       
            }                                               
        }   
        ?>
    </tbody>
</table>


<!--JSON-->
<div class="modal fade in" role="dialog" id="divDetails">
  <div class="modal-dialog modal-md">
    <div class="modal-content">      
      <div class="modal-header">
        <div class="row">
          <div class="col-12">
            <span class="badge badge-dark">Name:</span> <b><span id="spnName"></span></b>
          </div>
        </div>
      </div>
      
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <p><span class="badge badge-dark">Gender:</span> <span id="spnGender"></span></p>
            <p><span class="badge badge-dark">Age:</span> <span id="spnAge"></span></p>
            <p><span class="badge badge-dark">Address:</span> <span id="spnAddress"></span></p>
            <p><span class="badge badge-dark">Occupation:</span> <span id="spnOccupation"></span></p>
            <p><span class="badge badge-dark">Password:</span> <span id="spnPassword"></span></p>
          </div>
        </div>
      </div>  
    </div>
  </div>
</div>



<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!--JSON popup info-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>

<script>
  $("body").on("click", ".names", function(){
    var link_id = this.id;
  
    $.ajax({
      url: "JSON/queries.php",
      type: "post",
      data: {
        mode: "get details",
        link_id: link_id
      },
      success: function(data){
        var x = JSON.parse(data);
          
        $("#spnName").html(x.full_name);
        $("#spnOccupation").html(x.occupation);
        $("#spnGender").html(x.gender);
        $("#spnAge").html(x.age);
        $("#spnAddress").html(x.address);
        $("#spnPassword").html(x.password);
          
        $("#divDetails").modal("show");
      }
    });
  });
</script>

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
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

