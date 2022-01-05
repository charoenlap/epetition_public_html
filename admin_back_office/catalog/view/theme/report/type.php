<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">แยกตามประเภทปัญหา</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">แยกตามประเภทปัญหา</li>
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
                                <button type="submit" class="btn btn-primary">Preview</button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">แยกตามประเภทปัญหา</h3>
                          <a href="" class="btn btn-info btn-sm float-right"><i class="fas fa-file"></i> export excel</a>
                      </div>
                      <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="piechart" style="width: 100%; height: 500px;"></div>
                                </div>
                                <div class="col-md-12">
                                    <div id="chart_div_combo" style="width: 100%; height: 500px;"></div>
                                </div>
                            </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <table class="table table-bordered">
                                      <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center align-middle" width="10%" rowspan="2">ลำดับ</th>
                                                <th class="text-center align-middle" rowspan="2">ประเภทปัญหา</th>
                                                <th class="text-center align-middle" rowspan="2">ได้รับเรื่องร้องเรียน</th>
                                                <th colspan="3" class="text-center">สถานะการดำเนินการเรื่องร้องเรียน</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">ดำเนินการแล้วเสร็จ</th>
                                                <th class="text-center">อยู่ระหว่างการดำเนินการ</th>
                                                <th class="text-center">ยังไม่เริ่มดำเนินการ</th>
                                            </tr>
                                      </thead>
                                      <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>น้ำเสีย</td>
                                                <td class="text-center">1,331</td>
                                                <td class="text-center">1,221</td>
                                                <td class="text-center">75</td>
                                                <td class="text-center">35</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td>สิทธิทำกินในพื้นที่ป่าไม้</td>
                                                <td class="text-center">1,331</td>
                                                <td class="text-center">1,221</td>
                                                <td class="text-center">75</td>
                                                <td class="text-center">35</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td>แนะนำ/ให้ข้อเสนอแนะ</td>
                                                <td class="text-center">1,331</td>
                                                <td class="text-center">1,221</td>
                                                <td class="text-center">75</td>
                                                <td class="text-center">35</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">4</td>
                                                <td>บุกรุกพื้นที่ป่าไม้</td>
                                                <td class="text-center">1,331</td>
                                                <td class="text-center">1,221</td>
                                                <td class="text-center">75</td>
                                                <td class="text-center">35</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">5</td>
                                                <td>พฤติกรรมเจ้าหน้าที่/การบริหารงานบุคคล</td>
                                                <td class="text-center">1,331</td>
                                                <td class="text-center">1,221</td>
                                                <td class="text-center">75</td>
                                                <td class="text-center">35</td>
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
            ['น้ำเสีย', 96.64],
            ['สิทธิทำกินในพื้นที่ป่าไม้', 70.49],
            ['แนะนำ/ให้ข้อเสนอแนะ', 78.74],
            ['บุกรุกพื้นที่ป่าไม้', 89.23],
            ['พฤติกรรมเจ้าหน้าที่/การบริหารงานบุคคล', 94.40]
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
            ['Task', 'Hours per Day'],
            ['น้ำเสีย', 96.64],
            ['สิทธิทำกินในพื้นที่ป่าไม้', 70.49],
            ['แนะนำ/ให้ข้อเสนอแนะ', 78.74],
            ['บุกรุกพื้นที่ป่าไม้', 89.23],
            ['พฤติกรรมเจ้าหน้าที่/การบริหารงานบุคคล', 94.40]
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
