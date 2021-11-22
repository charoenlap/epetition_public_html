
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">ผู้ใช้งาน</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">ผู้ใช้งาน</li>
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
                            <h4 class="card-title d-flex"></h4> 
                            <p class="d-flex float-right mb-0">
                              <a href="<?php echo route('user/add'); ?>" class="btn btn-success">เพิ่มผู้ใช้งาน</a>
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                       <thead class="bg-primary">
                                           <tr>
                                               <th style="width:70px;" class="text-center">#</th>
                                               <th>ชื่อ</th>
                                               <th>นามสกุล</th>
                                               <th style="width:130px;">ตำแหน่ง</th>
                                               <th style="width:220px;"></th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                         <?php for($i=1;$i<=5;$i++){?>
                                          <tr>
                                             <td class="text-center"><?php echo $i; ?></td>
                                             <td>สมชาย</td>
                                             <td>ใจดี</td>
                                             <td>หัวหน้า</td>
                                             <td class="text-center">
                                              <a href="#" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="รายละเอียด"><i class="fas fa-eye"></i></a>
                                              <a href="<?php echo route('user/edit'); ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="แก้ไข"><i class="fas fa-edit"></i></a>
                                              <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="ลบ"><i class="far fa-trash-alt"></i></a>
                                             </td>
                                           </tr>
                                         <?php } ?>
                                       </tbody>
                                    </table>
                                </div> 
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <ul class="pagination">
                                  <li class="page-item">
                                  <a class="page-link" href="#" aria-label="Previous">
                                      <span aria-hidden="true">«</span>
                                      <span class="sr-only">Previous</span>
                                  </a>
                                  </li>
                                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                  <li class="page-item">
                                  <a class="page-link" href="#" aria-label="Next">
                                      <span aria-hidden="true">»</span>
                                      <span class="sr-only">Next</span>
                                  </a>
                                  </li>
                              </ul>
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
