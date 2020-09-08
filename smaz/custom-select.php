<!--table-->
<table class="table table-borderless" width="100%">

<tr>
    <td colspan="3" width="50%"></td>
    <td colspan="3" width="50%"></td>
</tr>

<tr>
<td colspan="3">
Cawangan:<br>
    <select class="form-control select2bs4" id="selCawangan">
        <option value="-">-Kosong-</option>
        <option value="1">Kuala Lumpur</option>
        <option value="2">Labuan</option>
        <option value="3">Putrajaya</option>
    </select>
</td>
<td width="45%" colspan="2">
Date:<br>
    <!-- Date range -->
<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="far fa-calendar-alt"></i>
            </span>
        </div>
        <input type="text" class="form-control float-right" id="date">
    </div>
    <!-- /.input group -->
</div>
<!-- /.form group -->
</td>
<td width="5%" style="vertical-align: middle">
<div class="icheck-primary d-inline">
    <input type="checkbox" id="checkboxDate" onclick="">
    <label for="checkboxDate"></label>
</div>
</td>
</tr>

<tr>
<td colspan="3">
Controller:<br>
    <select class="form-control select2bs4" id="selController">
        <option value="-">-Kosong-</option>
    </select>  
</td>

<td colspan="3">
Action:<br>
    <select class="form-control select2bs4" id="selAction">
        <option value="-">-Kosong-</option>
    </select>
</td>
</tr>

<tr>
<td width="45%" colspan="2" style="vertical-align: bottom">
IP Address:
<input type='text' class="form-control form-control-sm" style="text-align:center" id='txtip1'>
</td>
<td width="5%" style="vertical-align: middle; text-align:center">to</td>
<td colspan="2" style="vertical-align: bottom">
<input type='text' class="form-control form-control-sm" style="text-align:center" id='txtip2'>
</td>
<td width="5%" style="vertical-align: bottom">
    <div class="icheck-primary d-inline">
    <input type="checkbox" id="checkboxIP">
    <label for="checkboxIP"></label>
</div>
</td>
</tr>


</table>

<br>
<a type="button" class="btn btn-block btn-default col-3" href="javascript:click()">Click Me</a>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>

<!--script-->
<script>
    //disable
    $(document).ready(function() {
        document.getElementById('selAction').setAttribute('disabled', true);
        document.getElementById('selController').setAttribute('disabled', true);
        document.getElementById('date').setAttribute('disabled', true);
        document.getElementById('txtip1').setAttribute('disabled', true);
        document.getElementById('txtip2').setAttribute('disabled', true);
    });

    
    

    if((document.getElementById("checkboxDate")).checked == true){
        document.getElementById('date').setAttribute('disabled', true);
    }else{
        document.getElementById('date').disabled=false;
    }
    if((document.getElementById("checkboxIP")).checked == true){
        document.getElementById('txtip1').setAttribute('disabled', true);
        document.getElementById('txtip2').setAttribute('disabled', true);
    }else{
        document.getElementById('txtip1').disabled=false;
        document.getElementById('txtip2').disabled=false;
    }

    //checkbox date
    $('#checkboxDate').change(function() {
        if(document.getElementById('checkboxDate').checked == false) {
            document.getElementById('date').setAttribute('disabled', true);
        }else{
            document.getElementById('date').disabled=false;
        }
    });

    //checkbox ip
    $('#checkboxIP').change(function() {
        if(document.getElementById('checkboxIP').checked == false) {
            document.getElementById('txtip1').setAttribute('disabled', true);
            document.getElementById('txtip2').setAttribute('disabled', true);
        }else{
            document.getElementById('txtip1').disabled=false;
            document.getElementById('txtip2').disabled=false;
        }
    });
    
    //onchange
    document.getElementById('selCawangan').onchange = function() {
        resetCawangan();
        $.ajax({
            type: 'post',
            url: 'custom-get.php',
            data: {
                cawangan: document.getElementById('selCawangan').value,
            },
            success: function (response) {
                // We get the element having id of display_info and put the response inside it
                $( '#selController' ).html(response);
                if(document.getElementById('selCawangan').value != "-"){
                    document.getElementById('selController').disabled=false;
                }
            }
        }); 
    }
    document.getElementById('selController').onchange = function() {
        resetController();
        $.ajax({
            type: 'post',
            url: 'custom-get-action.php',
            data: {
                cawangan: document.getElementById('selCawangan').value,
                controller: document.getElementById('selController').value,
            },
            success: function (response) {
                // We get the element having id of display_info and put the response inside it
                $( '#selAction' ).html(response);
                if(document.getElementById('selController').value != "-"){
                    document.getElementById('selAction').disabled=false;
                }
            }
        });
    }
    function resetCawangan(){
        $.ajax({
            type: 'post',
            url: 'custom-reset.php',
            success: function (response) {
                //reset
                $( '#selAction' ).html(response);
                $( '#selController' ).html(response);
                document.getElementById('selAction').setAttribute('disabled', true);
                document.getElementById('selController').setAttribute('disabled', true);
            }
        });
    }
    function resetController(){
        $.ajax({
            type: 'post',
            url: 'custom-reset.php',
            success: function (response) {
                //reset
                $( '#selAction' ).html(response);
                document.getElementById('selAction').setAttribute('disabled', true);
            }
        });     
    }
    function click(){
        let time = "-"; let ip = "-";
        
        if((document.getElementById("checkboxDate")).checked == true){
            time = (document.getElementById('date').value).replace(/ /g, '');
        }
        if((document.getElementById("checkboxIP")).checked == true){
            ip =  document.getElementById('txtip1').value + "-" +document.getElementById('txtip2').value;
        }
        
        let cawangan = document.getElementById('selCawangan').value;
        let controller = document.getElementById('selController').value;
        let action = document.getElementById('selAction').value;

        location.href = "report-custom-chart.php?cawangan="+cawangan+"&controller="+controller+"&action="+action+"&time="+time+"&ip="+ip;
    }
</script> 

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Date range picker
    $('#date').daterangepicker({
      locale: {
        format: 'YYYY/MM/DD'
      }
    })

    


  })
</script>