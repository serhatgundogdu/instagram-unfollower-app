<? if(!isAjaxRequest()){?>
<?php require view('static/header')?>
<? } ?>

<div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Takipçi Sayısı</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$count_followers?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Takip Edilen Sayısı</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$count_followings?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Geri Takip Oranı</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$gtpercent?>%</div>
              </div>
              <div class="col">
                <div class="progress progress-sm mr-2">
                  <div class="progress-bar bg-info" role="progressbar" style="width: <?=$gtpercent?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Paylaşım Sayısı</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$count_feed?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-comments fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<div class="row">
  <div class="col-md-8">
    <form role="form" method="POST" onsubmit="return false;" action="" id="assign_now">
      <div class="box-body">
        <div class="form-group">
           <input type="text" name="hiddenn" value="true" hidden>
           <button type="submit"  value="1" onclick="findit('#assign_now')" name="autoass" class="btn btn-primary btn-flat btn-lg col-md-12 col-sm-12 col-lg-12">Takipten Çıkanları Bul!</button>
        </div>
        <div id="loading"></div>
      </div>
    </form>
    <div id="salaklar"></div>  

    <!-- Area Chart -->
    <div class="card shadow mb-4">
     <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Aylık Takipçi Kaybı</h6>
      </div>
      <div class="card-body">
        <div class="chart-area">
          <canvas id="myAreaChart"></canvas>
         </div>
      </div>
    </div>
  </div>
  
  <style>
    .takip-list{
      display: flex;
    }
    .item{
      padding: 0px 2px;
      display: flex;
      flex-direction: column;
      box-sizing: border-box;
    }
    .item .user{
      flex-direction: column;
      padding: 0;
    }
    .item .user img{
      max-width: 80%;
      height: auto;
      border-radius: 200px;
    
    }
    .item a{
      font-weight: 600;
      color: #444;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
      display: flex;
      flex-direction: column;
    }
  
  </style>
  <div class="col-md-4">
    <div class="card card-header-actions">
      <div class="card-header">
          Takipten Son Çıkanlar
      <btn class="btn btn-primary" style="float: right;" data-ajax onclick="request('unfollowers', '.ajax-change', this , '.nav-item')"><i>Tümünü Gör</i></btn> 
      </div>
      <div class="card-body">		 
      <div class="takip-list takipcikanlist"></div>
      </div>
    </div>    


  
  </div>


</div>

<? if(!isAjaxRequest()){?>
<?php require view('static/footer')?>
<? } ?>
<script>
function findit(formId){
  var data = $(formId).serialize();
  $("#salaklar").html("");
  $("#salaklar").html("<div class='alert alert-dark' role='alert'><div class='alert-text'><h4 class='alert-heading'><i class='flaticon-warning'></i> Lütfen Bekleyin!</h4>Takipçi bilgileri yükleniyor. Bu biraz zaman alabilir...</div></div>");
  $.post('<?=site_url('api')?>/find_followers', data , function (response){
    if(response.error){
      $("#salaklar").html("");
      $("#salaklar").html("<div class='alert alert-danger text-center'>"+response.error+"</div>");
  
    }else{
      $("#salaklar").html("");
      $("#salaklar").html(response.html);
  
  
    }
    refreshLast();
  },'json');

  }
  refreshLast();
  function refreshLast() {
    var MemberData = {
        'data_id'             : '<?=rand();?>'
    };
    $.ajax({
        type        : 'POST',
        url         : '<?=site_url('api')?>/get_followers',
        data        : MemberData,
    })
    .done(function(data) {
        var $container = $(".takipcikanlist");
        $container.html(data);
    });
}
setInterval(refreshLast, 5000);
</script>

<script>
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"],
    datasets: [{
      label: "Followers",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [<?=$months[0]?>, <?=$months[1]?>, <?=$months[2]?>, <?=$months[3]?>, <?=$months[4]?>, <?=$months[5]?>, <?=$months[6]?>, <?=$months[7]?>, <?=$months[8]?>, <?=$months[9]?>, <?=$months[10]?>, <?=$months[11]?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7 
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

</script>