
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">เพิ่มผู้ใช้งาน</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">เพิ่มผู้ใช้งาน</li>
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
                            <h4 class="card-title">ข้อมูลผู้ใช้งาน</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">username</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">ชื่อ</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">นามสกุล</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">เบอร์</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary">บันทึก</button>
                                    <a href="<?php echo route('user'); ?>" class="btn btn-dark">ยกเลิก</a>
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
    $('#pageUser').addClass('active');
</script>
