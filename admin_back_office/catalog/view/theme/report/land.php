<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">แยกตามภูมิภาคและจังหวัด</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">แยกตามภูมิภาคและจังหวัด</li>
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
          <div class="row">
              <!-- <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ข้อมูลที่ต้องการค้นหา</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">การแสดงผล</label>
                                <select name="" id="" class="form-control">
                                    <option value="">แสดงทั้งหมด</option>
                                    <option value="">ตามปีงบประมาณ</option>   
                                    <option value="">ตามปีปฎิทิน</option>
                                    <option value="">ตามช่วงเวลา</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                              <label for="">ค้นหาช่วงเวลา</label>
                              <input type="date" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="">&nbsp</label><br>
                                <button type="submit" class="btn btn-primary">ค้นหา</button>
                                <button type="submit" class="btn btn-primary">Preview</button>
                            </div>
                        </div>
                    </div>
                </div>
              </div> -->
              <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">แยกตามภูมิภาคและจังหวัด</h3>
                            <!-- <a href="" class="btn btn-info btn-sm float-right"><i class="fas fa-file"></i> export excel</a> -->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="chart_div_combo" style="height: 300px;"></div>
                                </div>
                                <div class="col-md-6">
                                    <div id="chart_div_combo_two" style="height: 300px;"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                  <?php // var_dump($reportLand); ?>
                                    <table class="table table-bordered" id="datatable">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center align-middle" width="10%">ลำดับ</th>
                                                <th class="text-center align-middle">จังหวัด</th>
                                                <th class="text-center align-middle">ได้รับเรื่องร้องเรียน</th>
                                                <th class="text-center">ดำเนินการแล้วเสร็จ</th>
                                                <th class="text-center">อยู่ระหว่างการดำเนินการ</th>
                                                <th class="text-center">ยังไม่เริ่มดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php $i=1;foreach($reportLand as $val){ ?>
                                            <tr>
                                              <td class="text-center"><?php echo $i++;?></td>
                                              <td><?php echo $val['title']; ?></td>
                                              <td class="text-center"><?php echo $val['count_all'] ?></td>
                                              <td class="text-center"><?php echo $val['complete'] ?></td>
                                              <td class="text-center"><?php echo $val['process'] ?></td>
                                              <td class="text-center"><?php echo $val['over'] ?></td>
                                          </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
          </div>
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
  $('#report').addClass('active');
  $('#land').addClass('active');
  $('#report').parent().addClass('menu-is-opening menu-open');

  $(document).ready(function() {
    $('#datatable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawVisualization);
    function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['mission', 'เรื่องร้องเรียน'],
          <?php $i=1;foreach($reportLandLimit5 as $val){ ?>
          ['<?php echo $val['title'];?>',  <?php echo $val['count_all'] ?>,],
          <?php } ?>
        ]);

        var options = {
          title : 'จังหวัดที่มีเรื่องร้องเรียน มากที่สุด 5 อันดับ',
          vAxis: {title: 'จำนวนเรื่องร้องเรียน'},
          hAxis: {title: 'เรื่องร้องเรียน'},
          seriesType: 'bars',
          legend: 'none',
          colors: ['#e0440e']
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div_combo'));
        chart.draw(data, options);
    }
    // google.charts.setOnLoadCallback(drawVisualizationTwo);
    // function drawVisualizationTwo() {
    //     // Some raw data (not necessarily accurate)
    //     var data = google.visualization.arrayToDataTable([
    //       ['mission', 'เรื่องร้องเรียน'],
    //       ['พิษณุโลก',  265,],
    //       ['ตาก',  235,],
    //       ['แพร่',  257,],
    //       ['แพร่',  239,],
    //       ['กำแพงเพชร',  239,]
    //     ]);

    //     var options = {
    //       title : 'จังหวัดที่มีเรื่องร้องเรียน น้อยที่สุด 5 อันดับ',
    //       vAxis: {title: 'จำนวนเรื่องร้องเรียน'},
    //       hAxis: {title: 'เรื่องร้องเรียน'},
    //       seriesType: 'bars',
    //       legend: 'none',
    //     };

    //     var chart = new google.visualization.ComboChart(document.getElementById('chart_div_combo_two'));
    //     chart.draw(data, options);
    // }
</script>

