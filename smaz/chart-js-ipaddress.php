  <?php
  if($_GET['level'] == 2){
    $ip1 = 168428033;
    $ip2 = 168428287;
  }else if($_GET['level'] == 3){
    $ip1 = 168428289;
    $ip2 = 168428543;
  }else if($_GET['level'] == 4){
    $ip1 = 168428545;
    $ip2 = 168428799;
  }else if($_GET['level'] == 6){
    $ip1 = 168429057;
    $ip2 = 168429311;
  }else if($_GET['level'] == 7){
    $ip1 = 168429313;
    $ip2 = 168429567;
  }else if($_GET['level'] == 8){
    $ip1 = 168429569;
    $ip2 = 168429823;
  }else if($_GET['level'] == 11){
    $ip1 = 168430337;
    $ip2 = 168430591;
  }else if($_GET['level'] == 12){
    $ip1 = 168430593;
    $ip2 = 168430847;
  }else if($_GET['level'] == 'G'){
    $ip1 = 168432641;
    $ip2 = 168432895;
  }else if($_GET['level'] == 1){
    $ip1 = 168432897;
    $ip2 = 168433151;
  }else if($_GET['level'] == 19){
    $ip1 = 168433153;
    $ip2 = 168433407;
  }else if($_GET['level'] == 20){
    $ip1 = 168433409;
    $ip2 = 168433663;
  }else if($_GET['level'] == 22){
    $ip1 = 168433665;
    $ip2 = 168433919;
  }else if($_GET['level'] == 25){
    $ip1 = 168433921;
    $ip2 = 168434175;
  }
  ?>
<div class="col" id="divChart">
  <!-- CHART GOES HERE -->
  &nbsp;Please Wait...
  <div id="myProgress">
    <div id="myBar"></div>
  </div>
</div>

<!--css loading-->
<style>
#myProgress {
  width: 100%;
  background-color: #9A9D9B;
}

#myBar {
  width: 1%;
  height: 30px;
  background-color: #464846;
}
</style>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>

<script>

//loading bar
var i = 1;
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 99) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
      }
    }
    let ip1 = 'ip1= <?php echo $ip1 ?>';
    let ip2 = 'ip2= <?php echo $ip2 ?>';

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'chart-js-ipaddress-queries.php');
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(ip1 + "&" + ip2);
    xhr.onreadystatechange = function() {
      if(xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById('divChart').innerHTML = '<canvas id="cnvChart"></canvas>';
        
        let r = JSON.parse(this.response);

        let chart_settings = {
          type: "bar",
          data: {
            labels: r.month.split(','),
            datasets: [{
              backgroundColor: "#444",
              borderColor: "#444",
              data: r.personnel.split(',')
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                    beginAtZero: true
                }
              }]
            },
            legend: {
              display: false
            }
          }
        }
        let chart = new Chart(document.getElementById('cnvChart'), chart_settings);
      }
    }    
</script>