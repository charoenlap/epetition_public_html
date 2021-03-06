<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">แผงควบคุม (<?php echo $agency_title;?>)</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">แผงควบคุม</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <?php if($active_view){ ?>
    <div class="container-fluid">
      <?php if($user_shortcut){ ?>
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $status_total['all']; ?></h3>
              <p>ทั้งหมด</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo route('appeal'); ?>" class="small-box-footer">รายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $status_total['process']; ?></h3>
              <p>อยู่ระหว่างการดำเนินการ</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo route('appeal&status_id=2'); ?>" class="small-box-footer">รายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $status_total['complete']; ?></h3>
              <p>ดำเนินการแล้วเสร็จ</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo route('appeal&status=1'); ?>" class="small-box-footer">รายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $status_total['incomplete']; ?></h3>

              <p>ดำเนินการล้าช้า</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo route('appeal&status_id=4'); ?>" class="small-box-footer">รายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php if($user_graph){ ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <!--  -->
                <div class="col-md-12">
                  <div id="chart_div_combo" style="height: 500px;"></div>
                </div>
                <div class="col-md-12">
                  <div id="piechart" style="width: 100%; height: 500px;"></div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div id="vmap" style="width: 100%; height: 800px;"></div>
                </div>
                <div class="col-md-7">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td>ชื่อจังหวัด</td>
                        <td id="map_province_name">กรุณาเลือกจังหวัด</td>
                      </tr>
                      <tr>
                        <td>จำนวนเรื่อง</td>
                        <td id="map_unit"></td>
                      </tr>
                      <tr>
                        <td>รับเรื่อง</td>
                        <td id="status_0"></td>
                      </tr>
                      <tr>
                        <td>ดำเนินการเสร็จสิ้นแล้ว</td>
                        <td id="status_1"></td>
                      </tr>
                      <tr>
                        <td>อยู่ระหว่างการดำเนินการ</td>
                        <td id="status_2"></td>
                      </tr>
                      <tr>
                        <td>อีก 7 วันจะครบกำหนด</td>
                        <td id="status_3"></td>
                      </tr>
                      <tr>
                        <td>ยังไม่เสร็จ และช้ากว่ากำหนด</td>
                        <td id="status_4"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
      <?php } ?>
    </div>
    <?php }else{?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            กลุ่มผู้ใช้งานของท่านไม่สามารถดูได้
          </div>
        </div>
      </div>
    <?php } ?>
  </section>
  <!-- /.content -->
</div>
<script>
  $('#dashbord').addClass('active');
</script>
<?php if($user_graph){ ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawVisualization);
  function drawVisualization() {
    var data = google.visualization.arrayToDataTable([
      ['หน่วยงาน', 'ได้รับเรื่องร้องเรียน', 'ยังไม่เริ่มดำเนินการ', 'อยู่ระหว่างการดำเนินการ', 'ดำเนินการแล้วเสร็จ', 'รอดำเนินการ','7 วันจะครบกำหนด'],
        <?php foreach($report as $val){ ?>
          ['<?php echo $val['title'];?>',<?php echo $val['count_all'];?>,<?php echo $val['over'];?>,<?php echo $val['process'];?>,<?php echo $val['complete'];?>,<?php echo $val['waiting'];?>,<?php echo $val['day7'];?>],
        <?php } ?>
    ]);

    var options = {
      title : 'แยกตามหัวข้อ',
      vAxis: {title: 'จำนวนเรื่องร้องเรียน'},
      hAxis: {title: 'หัวข้อปัญหา'},
      seriesType: 'bars',
      series: {6: {type: 'line'}}
    };
    var chart = new google.visualization.ComboChart(document.getElementById('chart_div_combo'));
    chart.draw(data, options);
  }
</script>
<?php } ?>
<style>
  .jqvmap-zoomin, .jqvmap-zoomout{
    width: 20px;
    height: 20px;
  }
</style>  
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

  var data = google.visualization.arrayToDataTable([
      ['', ''],
      ['อยู่ระหว่างการดำเนินการ', <?php echo $status_total['process']; ?>],
      ['ดำเนินการล้าช้า', <?php echo $status_total['incomplete']; ?>],
      ['ดำเนินการแล้วเสร็จ', <?php echo $status_total['complete']; ?>],
  ]);

  var options = {
      title: 'รายงานเวลาเฉลี่ยของแต่ละประเภทปัญหา'
  };

  var chart = new google.visualization.PieChart(document.getElementById('piechart'));

  chart.draw(data, options);
  }

  google.charts.setOnLoadCallback(drawVisualization);

  jQuery('#vmap').vectorMap(
  {
      map: 'thai_en',
      backgroundColor: '#fff',
      borderColor: '#F3F0D7',
      borderOpacity: 0.25,
      borderWidth: 1,
      color: '#CEE5D0',
      enableZoom: true,
      hoverColor: '#FF7878',
      hoverOpacity: null,
      normalizeFunction: 'linear',
      scaleColors: ['#b6d6ff', '#005ace'],
      selectedColor: '#c9dfaf',
      selectedRegion: true,
      showTooltip: true,
      showLabels: true,
      onRegionClick: function(element, code, region)
      {
        console.log(element);
          // var message = 'จังหวัด ">'+region+'< '+code+' ' +'" เรื่องร้องเรียนทั้งหมด 0 เรื่อง' 
          // alert(message);
          var province_name = region;
          $.ajax({
            url: 'index.php?route=home/getDataMap',
            type: 'POST',
            dataType: 'json',
            data: {provinceName: province_name},
          })
          .done(function(data) {
            console.log("success");
            console.log(data);
            $('#map_province_name').text(province_name);
            $('#map_unit').text(data.total_case);
            $('#status_0').text(data.status_0);
            $('#status_1').text(data.status_1);
            $('#status_2').text(data.status_2);
            $('#status_3').text(data.status_3);
            $('#status_4').text(data.status_4);
          })
          .fail(function(a,b,c) {
            console.log("error");
            console.log(a);
            console.log(b);
            console.log(c);
          })
          .always(function() {
            console.log("complete");
          });
          
      }
  });
</script>