<div class="col text-center" style="margin-top: 25px; margin-bottom: 25px;">
  <select class="custom-select" id="selItemselect">
    <option value="1">Kuala Lumpur</option>
    <option value="2">Labuan</option>
    <option value="3">Putrajaya</option>
  </select>
</div>
<div class="col" id="divChart">

&nbsp;Please Wait...
<div id="myProgress">
  <div id="myBar"></div>
</div>

  <!-- CHART GOES HERE -->
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

    //bar chart
    let itemselect = 'itemselect=' + document.getElementById('selItemselect').value;
    
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'chart-js-controller-queries.php');
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(itemselect);

    //bar chart ready
    xhr.onreadystatechange = function() {
      tabletimeline();
      if(xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById('divChart').innerHTML = '<canvas id="cnvChart"></canvas>';
        
        let r = JSON.parse(this.response);
        
        let chart_settings = {
          type: "bar",
          data: {
            labels: r.item.split(','),
            datasets: [{
              label: r.itemselect,
              backgroundColor: "#444",
              borderColor: "#444",
              data: r.count.split(',')
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
    
    //bar chart on change
    document.getElementById('selItemselect').onchange = function() {
      tabletimeline();
      let itemselect = 'itemselect=' + document.getElementById('selItemselect').value;

      let xhr = new XMLHttpRequest();
      xhr.open('POST', 'chart-js-controller-queries.php');
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.send(itemselect);
      xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
          document.getElementById('divChart').innerHTML = '<canvas id="cnvChart"></canvas>';

          let r = JSON.parse(this.response);

          let chart_settings = {
            type: "bar",
            data: {
              labels: r.item.split(','),
              datasets: [{
                label: r.itemselect,
                backgroundColor: "#444",
                borderColor: "#444",
                data: r.count.split(',')
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

    function tabletimeline() {
        $.ajax({
            type: 'post',
            url: 'table-controller.php',
            data: {
                cawangan: document.getElementById('selItemselect').value,
            },
            success: function (response) {
                // We get the element having id of display_info and put the response inside it
                $( '#table-controller' ).html(response);
            }
        }); 
        $.ajax({
            type: 'post',
            url: 'timeline-default-controller.php',
            data: {
                cawangan: document.getElementById('selItemselect').value,
            },
            success: function (response) {
                // We get the element having id of display_info and put the response inside it
                $( '#timeline-controller' ).html(response);
            }
        }); 
    }
</script> 