<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">กลุ่มผู้ใช้งาน</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo route('home');?>">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">กลุ่มผู้ใช้งาน</li>
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
              <h4 class="card-title">กลุ่มผู้ใช้งาน</h4>
              <?php if($active_add){ ?>
                <a href="<?php echo route('user/addGroup');?>" class="btn btn-primary float-right">เพิ่มกลุ่มผู้ใช้งาน</a>
              <?php } ?>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered">
                    <thead class="bg-primary">
                      <tr>
                        <th width="10%" class="text-center">ลำดับ</th>
                        <th width="70%">ชื่อ</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($getGroups){ ?>
                      <?php $i=1;foreach($getGroups->rows as $val){ ?>
                      <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td><?php echo $val['GROUP_NAME'];?></td>
                        <td class="text-right">
                          <?php if($active_edit){ ?>
                            <a href="<?php echo route('user/setting&group_id='.$val['USER_GROUP_ID']);?>" class="btn btn-primary"><i class="fas fa-cog"></i></a>
                          <?php }?>
                          <?php if($active_del){ ?>
                            <a href="<?php echo route('user/delGroup&group_id='.$val['USER_GROUP_ID']);?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                          <?php }?>
                        </td>
                      </tr>
                      <?php } ?>
                      <?php }else{?>
                          <tr>
                            <td colspan="20">ไม่พบผู้ใช้งาน</td>
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
  $('#pagePermission').addClass('active');
</script>