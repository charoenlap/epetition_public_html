<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">แยกตามกลุ่มภารกิจ</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">แยกตามกลุ่มภารกิจ</li>
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
              </div>
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">แยกตามกลุ่มภารกิจ</h3>
                          <a href="" class="btn btn-info btn-sm float-right"><i class="fas fa-file"></i> export excel</a>
                      </div>
                      <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                                <div id="chart_div_combo" style="height: 500px;"></div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <table class="table table-bordered">
                                      <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center align-middle" width="10%" rowspan="2">ลำดับ</th>
                                                <th class="text-center align-middle" rowspan="2">หน่วยงาน</th>
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
                                            <td>หน่วยงานราชการ</td>
                                            <td class="text-center">193</td>
                                            <td class="text-center">37</td>
                                            <td class="text-center">153</td>
                                            <td class="text-center">3</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="pl-4">1.1  สำนักงานรัฐมนตรี</td>
                                            <td class="text-center">193</td>
                                            <td class="text-center">37</td>
                                            <td class="text-center">153</td>
                                            <td class="text-center">3</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td>องค์กรอิสระ</td>
                                            <td class="text-center">193</td>
                                            <td class="text-center">37</td>
                                            <td class="text-center">153</td>
                                            <td class="text-center">3</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td>องค์การมหาชนที่จัดตั้งตาม พ.ร.บ. เฉพาะในกำกับรัฐมนตรีว่าการกระทรวง</td>
                                            <td class="text-center">193</td>
                                            <td class="text-center">37</td>
                                            <td class="text-center">153</td>
                                            <td class="text-center">3</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">4</td>
                                            <td>รัฐวิสาหกิจและบริษัทมหาชนในกำกับดูแล</td>
                                            <td class="text-center">193</td>
                                            <td class="text-center">37</td>
                                            <td class="text-center">153</td>
                                            <td class="text-center">3</td>
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
<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawVisualization);
    function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['mission', 'หน่วยงาน'],
          ['หน่วยงานราชการ',  165,],
          ['องค์กรอิสระ',  135,],
          ['องค์การมหาชนที่จัดตั้งตาม พ.ร.บ. เฉพาะในกำกับรัฐมนตรีว่าการกระทรวง',  157,],
          ['รัฐวิสาหกิจและบริษัทมหาชนในกำกับดูแล',  139,]
        ]);

        var options = {
          title : 'รายงานเรื่องร้องเรียนที่ได้รับ แยกตามกลุ่มภารกิจ',
          vAxis: {title: 'จำนวนเรื่องร้องเรียน'},
          hAxis: {title: 'กลุ่มภารกิจ'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div_combo'));
        chart.draw(data, options);
    }
</script>