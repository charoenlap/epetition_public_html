<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">แบ่งตามพื้นที่เขตตรวจราชการ</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">แบ่งตามพื้นที่เขตตรวจราชการ</li>
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
                            <h3 class="card-title">แบ่งตามพื้นที่เขตตรวจราชการ</h3>
                            <a href="" class="btn btn-info btn-sm float-right"><i class="fas fa-file"></i> export excel</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center align-middle" width="10%" rowspan="2">ลำดับ</th>
                                                <th class="text-center align-middle" rowspan="2">เขตตรวจราชการ/จังหวัด</th>
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
                                                <td>เขตตรวจราชการที่ 2</td>
                                                <td class="text-center">573</td>
                                                <td class="text-center">493</td>
                                                <td class="text-center">78</td>
                                                <td class="text-center">2</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="pl-4">1.1 นครปฐม</td>
                                                <td class="text-center">200</td>
                                                <td class="text-center">195</td>
                                                <td class="text-center">5</td>
                                                <td class="text-center">0</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="pl-4">1.2 นนทบุรี </td>
                                                <td class="text-center">200</td>
                                                <td class="text-center">195</td>
                                                <td class="text-center">5</td>
                                                <td class="text-center">0</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="pl-4">1.3 ปทุมธานี  </td>
                                                <td class="text-center">200</td>
                                                <td class="text-center">195</td>
                                                <td class="text-center">5</td>
                                                <td class="text-center">0</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="pl-4">1.4 สมุทรปราการ </td>
                                                <td class="text-center">200</td>
                                                <td class="text-center">195</td>
                                                <td class="text-center">5</td>
                                                <td class="text-center">0</td>
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
  $('#report').parent().addClass('menu-is-opening menu-open');
</script>

