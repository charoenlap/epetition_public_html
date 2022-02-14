<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">ตั้งค่า</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">ตั้งค่า</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">ไม่แสดงข้อมูลของผู้ร้องเรียน</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="">ข้อมูลผู้ร้องเรียน</label>
                        </div>
                        <div class="col-md-5">
                            <select name="" id="" class="form-control">
                                <option value="">เลือกปิดข้อมูลส่วนตัว</option>
                                <option value="">เลขประจำตัวประชาชน</option>
                                <option value="">ชื่อสกุล</option>
                                <option value="">เบอร์โทร</option>
                                <option value="">บ้านเลขที่</option>
                            </select>
                            <!-- <button class="btn btn-primary">เลือกหน่วยงาน</button> -->
                        </div>
                        
                        <div class="col-md-2">
                            <button class="btn btn-primary" id="addFrom"><i class="fas fa-folder-plus"></i> เพิ่ม</button>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>รายการ</th>
                                        <th style="width:100px;">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>ชื่อ</td>
                                        <td><a href="#" class="btn btn-primary">ลบ</a></td>
                                    </tr>
                                </tbody>
                            </table>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>