<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">รายงานเวลาเฉลี่ยของแต่ละประเภทปัญหา</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">รายงานเวลาเฉลี่ยของแต่ละประเภทปัญหา</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
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
                            <div class="col-md-2">
                                <label for="">&nbsp</label><br>
                                <button type="submit" class="btn btn-primary">ค้นหา</button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">รายงานเวลาเฉลี่ยของแต่ละประเภทปัญหา</h3>
                            <a href="" class="btn btn-info btn-sm float-right"><i class="fas fa-file"></i> export excel</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="piechart" style="width: 100%; height: 500px;"></div>
                                </div>
                                <div class="col-md-6">
                                    <div id="chart_div_combo" style="height: 300px;"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th width="10%" class="text-center">ลำดับ</th>
                                                <th width="50%">ประเภทปัญหา</th>
                                                <th class="text-center">จำนวนวันดำเนินการ</th>
                                                <th class="text-center">จำนวนวันเฉลี่ยที่ใช้ในการดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>ขยะ/ของเสียอันตราย</td>
                                                <td class="text-center">45</td>
                                                <td class="text-center">96.64</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td>ฝุ่นละออง/ควัน</td>
                                                <td class="text-center">45</td>
                                                <td class="text-center">70.49</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td>กลิ่น</td>
                                                <td class="text-center">45</td>
                                                <td class="text-center">78.74</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">4</td>
                                                <td>เสียง</td>
                                                <td class="text-center">45</td>
                                                <td class="text-center">89.23</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">5</td>
                                                <td>น้ำเสีย</td>
                                                <td class="text-center">45</td>
                                                <td class="text-center">94.40</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
          </div>
      </div>
  </section>
  <!-- /.content -->
</div>
  
<script>
  $('#report').addClass('active');
  $('#report').parent().addClass('menu-is-opening menu-open');
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['ขยะ/ของเสียอันตราย', 96.64],
        ['ฝุ่นละออง/ควัน', 70.49],
        ['กลิ่น', 78.74],
        ['เสียง', 89.23],
        ['น้ำเสีย', 94.40]
    ]);

    var options = {
        title: 'รายงานเวลาเฉลี่ยของแต่ละประเภทปัญหา'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
    }

    google.charts.setOnLoadCallback(drawVisualization);
    function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
            ['Task', 'persen'],
            ['ขยะ/ของเสียอันตราย', 96.64],
            ['ฝุ่นละออง/ควัน', 70.49],
            ['กลิ่น', 78.74],
            ['เสียง', 89.23],
            ['น้ำเสีย', 94.40]
        ]);

        var options = {
          vAxis: {title: 'จำนวนเรื่องร้องเรียน'},
          hAxis: {title: 'เรื่องร้องเรียน'},
          seriesType: 'bars',
          legend: 'none',
          colors: ['#e0440e']
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div_combo'));
        chart.draw(data, options);
    }
</script>


