<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">รายงาน</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">รายงาน</li>
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
                          <h3 class="card-title">รายงาน</h3>
                      </div>
                      <div class="card-body">
                          <div class="row mb-3">
                            <div class="col-md-12 text-right">
                              <a href="" class="btn btn-info"><i class="fas fa-file"></i> export excel</a>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <table class="table table-bordered">
                                      <thead>
                                          <tr>
                                              <th class="text-center" width="10%">ลำดับ</th>
                                              <th>ชื่อผู้ร้องเรียน</th>
                                              <th>หัวข้อร้องเรียน</th>
                                              <th>วันที่ร้องเรียน</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php for($i=1; $i<=10; $i++){ ?>
                                          <tr>
                                            <td class="text-center"><?php echo $i; ?></td>
                                            <td>นายฉัตร ฉลอง</td>
                                            <td>แจ้งเรื่องร้องเรียน ประเด็นอื่น ๆ</td>
                                            <td>13/10/2021</td>
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
</script>