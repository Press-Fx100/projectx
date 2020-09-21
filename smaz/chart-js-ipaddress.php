<div class="col text-center" style="margin-top: 25px; margin-bottom: 25px;">
  <select class="custom-select" id="selItemselect">
  <?php

if($_GET['lokasi'] == 'perkim'){
  echo '
  <option value="10.10.20.1-10.10.20.255">Tingkat G</option>
  <option value="10.10.21.1-10.10.21.255">Tingkat 1</option>
  <option value="10.10.2.1-10.10.2.255">Tingkat 2</option>
  <option value="10.10.3.1-10.10.3.255">Tingkat 3</option>
  <option value="10.10.4.1-10.10.4.255">Tingkat 4</option>
  <option value="10.10.6.1-10.10.6.255">Tingkat 6</option>
  <option value="10.10.7.1-10.10.7.255">Tingkat 7</option>
  <option value="10.10.8.1-10.10.8.255">Tingkat 8</option>
  <option value="10.10.11.1-10.10.11.255">Tingkat 11</option>
  <option value="10.10.12.1-10.10.12.255">Tingkat 12</option>
  <option value="10.10.22.1-10.10.22.255">Tingkat 19</option>
  <option value="10.10.23.1-10.10.23.255">Tingkat 20</option>
  <option value="10.10.24.1-10.10.24.255">Tingkat 22</option>
  ';
}else if($_GET['lokasi'] == 'paza'){
  echo '
  <option value="10.110.5.1-10.110.5.255">Setiawangsa</option>
  <option value="10.110.7.1-10.110.7.255">Segambut</option>
  <option value="10.110.4.1-10.110.4.255">Batu</option>
  <option value="10.110.3.1-10.110.3.255">Bandar Tun Razak</option>
  <option value="10.110.1.1-10.110.1.255">Seputeh</option>
  <option value="10.110.8.1-10.110.8.255">Lembah Pantai</option>
  <option value="10.80.1.1-10.80.1.255">Pudu</option>
  <option value="10.110.6.1-10.110.6.255">Keramat</option>
  ';
}else{
  
}
?>
  </select>
</div>
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
    let ip = 'ip=' + document.getElementById('selItemselect').value;

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'chart-js-ipaddress-queries.php');
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(ip);
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
    document.getElementById('selItemselect').onchange = function() {
      let ip = 'ip=' + document.getElementById('selItemselect').value;

      let xhr = new XMLHttpRequest();
      xhr.open('POST', 'chart-js-ipaddress-queries.php');
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.send(ip);
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
              },
              onClick:function (e) {
                var controller = this.getElementsAtEvent(e)[0]._model.label;
                location.href = "report-action.php?controller="+controller+"&cawangan="+document.getElementById('selItemselect').value;
              }
            }
          }
          let chart = new Chart(document.getElementById('cnvChart'), chart_settings);
        }
      }
    }
</script>