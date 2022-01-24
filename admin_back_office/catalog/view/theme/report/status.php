<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">รายงานสรุปผลการดำเนินงาน</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">รายงานสรุปผลการดำเนินงาน</li>
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
                                    <label for="">หน่วยงาน</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">เลือก</option>
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
                            <h3 class="card-title">รายงานสรุปผลการดำเนินงาน</h3>
                            <a href="" class="btn btn-info btn-sm float-right"><i class="fas fa-file"></i> export excel</a>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div id="columnchart_material" style="width: 100%; height: 300px;"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center">อยู่ระหว่างการดำเนินการ</th>
                                                <th class="text-center">อีก 7 วันครบกำหนด</th>
                                                <th class="text-center">ดำเนินการล่าช้ากว่ากำหนด</th>
                                                <th class="text-center">ดำเนินการแล้วเสร็จ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">3,739</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">3,735</td>
                                                <td class="text-center">7,052</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h5>ได้รับเรื่องร้องเรียนทั้งหมด 10,791 เรื่อง</h5>
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
    google.charts.setOnLoadCallback(drawVisualization);
    function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
            ['หัวข้อเรื่องร้องเรียน', 'ช่องทาง'],
            ['อยู่ระหว่างการดำเนินการ', 3739],
            ['อีก 7 วันครบกำหนด', 0],
            ['ดำเนินการล่าช้ากว่ากำหนด', 3735],
            ['ดำเนินการแล้วเสร็จ', 7052],
        ]);

        var options = {
          hAxis: {title: 'เรื่องร้องเรียน'},
          seriesType: 'bars',
          legend: 'none',
          colors: ['#e0440e']
        };

        var chart = new google.visualization.ComboChart(document.getElementById('columnchart_material'));
        chart.draw(data, options);
    }
</script>