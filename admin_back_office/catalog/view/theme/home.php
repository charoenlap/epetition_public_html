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
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <?php if($active_view){ ?>
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <?php if($user_shortcut){ ?>
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $total_case;?></h3>
              <p>เรื่องร้องเรียน</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo route('appeal'); ?>" class="small-box-footer">รายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $total_case_process;?></h3>
              <p>ความก้าวหน้าของเรื่องร้องเรียน</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo route('appeal&status=1'); ?>" class="small-box-footer">รายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $total_report;?></h3>
              <p>รายงาน</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo route('report/department'); ?>" class="small-box-footer">รายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $total_user;?></h3>

              <p>ผู้ใช้งานระบบ</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">รายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
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
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div id="vmap" style="width: 100%; height: 800px;"></div>
                </div>
                <div class="col-md-7">
                  <table class="table table-striped">
                    <thead>
                      <th>ชื่อจังหวัด</th>
                      <th>จำนวนเรื่อง</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td id="map_province_name">กรุณาเลือกจังหวัด</td>
                        <td id="map_unit"></td>
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
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });
          
      }
  });
</script>