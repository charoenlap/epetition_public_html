<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ข้อเสนอแนะการใช้งานเว็บไซต์ e-Petition</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ข้อเสนอแนะการใช้งานเว็บไซต์ e-Petition</li>
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
                            <h3 class="card-title">ข้อเสนอแนะการใช้งานเว็บไซต์ e-Petition</h3>
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
                                                <th class="text-center">พอใจมาก</th>
                                                <th class="text-center">พอใจ</th>
                                                <th class="text-center">ควรปรับปรุง</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">127</td>
                                                <td class="text-center">33</td>
                                                <td class="text-center">22</td>
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
    google.charts.setOnLoadCallback(drawVisualization);
    function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
            ['หัวข้อเรื่องร้องเรียน', 'ช่องทาง'],
            ['พอใจมาก', 127],
            ['พอใจ', 33],
            ['ควรปรับปรุง', 22],
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