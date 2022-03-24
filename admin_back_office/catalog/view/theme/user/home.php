
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
        <?php if($active_view){ ?>
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          <?php if($active_add){ ?>
                            <p class="d-flex float-right mb-0">
                              <a href="<?php echo route('user/add'); ?>" class="btn btn-success">เพิ่มผู้ใช้งาน</a>
                            </p>
                          <?php } ?>
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
                                               <th>กลุ่มผู้ใช้งาน</th>
                                               <th style="width:250px;">สำนัก</th>
                                               <th >สิทธิ์ผู้ใช้งาน</th>
                                               <th style="width:130px;"></th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                        <?php if($lists){ ?>
                                         <?php $i=1;foreach($lists as $val){?>
                                          <tr>
                                             <td class="text-center"><?php echo $i; ?></td>
                                             <td><?php echo $val['FIRSTNAME']; ?></td>
                                             <td><?php echo $val['LASTNAME']; ?></td>
                                             <td><?php echo $val['GROUP_NAME']; ?></td>
                                             <td><?php echo $val['agency_title']; ?></td>
                                             <td>กำหนดตามกลุ่ม</td>
                                             <td class="text-center">
                                              <!-- <a href="#" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="รายละเอียด"><i class="fas fa-eye"></i></a> -->
                                              <?php if($active_edit){ ?>
                                              <a href="<?php echo route('user/edit&id='.$val['AUT_USER_ID']); ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="แก้ไข"><i class="fas fa-edit"></i></a>
                                              <?php } ?>
                                              <?php if($active_del){ ?>
                                                <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="ลบ"><i class="far fa-trash-alt"></i></a>
                                              <?php } ?>
                                             </td>
                                           </tr>
                                         <?php $i++;} ?>
                                       <?php }else{?>
                                          <tr>
                                            <td colspan="20">ไม่พบผู้ใช้งาน</td>
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
    $('#pageUser').addClass('active');
</script>
