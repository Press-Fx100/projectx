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
    let userid = 'id=<?php echo $_GET['id'] ?>';
    
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'chart-js-user-queries.php');
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(userid);

    //bar chart ready
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
          }
          
        }
        let chart = new Chart(document.getElementById('cnvChart'), chart_settings);
      }
    }
    function graphClickEvent(event, array){
    if(array[0]){
       foo.bar;
    }
}
</script> 