<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">รายงานแยกตามหน่วยงาน</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">รายงานแยกตามหน่วยงาน</li>
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
                          <h3 class="card-title">รายงานแยกตามหน่วยงาน</h3>
                          <a href="" class="btn btn-info btn-sm float-right"><i class="fas fa-file"></i> export excel</a>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">
                                  <table class="table table-bordered">
                                      <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center align-middle" width="10%" rowspan="2">ลำดับ</th>
                                                <th class="text-center align-middle" rowspan="2">หน่วยงาน</th>
                                                <th class="text-center align-middle" rowspan="2">ได้รับเรื่องร้องเรียน</th>
                                                <th colspan="3" class="text-center">สถานะ</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">ดำเนินการแล้วเสร็จ</th>
                                                <th class="text-center">อยู่ระหว่างการดำเนินการ</th>
                                                <th class="text-center">ยังไม่เริ่มดำเนินการ</th>
                                            </tr>
                                      </thead>
                                      <tbody>
                                          <?php for($i=1; $i<=10; $i++){ ?>
                                          <tr>
                                            <td class="text-center"><?php echo $i; ?></td>
                                            <td class="text-center">กรมป่าไม้</td>
                                            <td class="text-center">877</td>
                                            <td class="text-center">827</td>
                                            <td class="text-center">35</td>
                                            <td class="text-center">15</td>
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
  </section>
  <!-- /.content -->
</div>
  
<script>
  $('#report').addClass('active');
  $('#report').parent().addClass('menu-is-opening menu-open');
</script>