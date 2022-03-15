<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active"><?php echo $title; ?></li>
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
                        <div class="card-body">
                            <?php if($active_add){ ?>
                            <div class="row mb-3">
                                <div class="col-md-12 text-right">
                                    <a href="<?php echo route('topic/add'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> เพิ่มประเภทเรื่องร้องเรียน</a>
                                </div>
                            </div>
                            <?php }?>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="50px;" class="text-center">#</th>
                                                <th>ชื่อ</th>
                                                <th class="text-center" width="100px;">ลำดับ</th>
                                                <th class="text-center" width="100px;">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $i = 1;
                                                foreach($lists as $key => $value){
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i++; ?></td>
                                                <td><?php echo $value['topic_title']; ?></td>
                                                <td class="text-center">
                                                    <?php if($active_edit){ ?>
                                                    <form name="frm<?php echo $value['id']; ?>" action="<?php echo route('topic/sort&id='.$value['id']); ?>" method="POST" class="mb-0">
                                                        <input type="text" class="form-control mb-0 text-center" name="sort" value="<?php echo $value['sort']; ?>" onblur="frm<?php echo $value['id'] ?>.submit();">
                                                    </form>
                                                    <?php }else{?>
                                                        <?php echo $value['sort']; ?>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if($active_edit){ ?>
                                                        <a href="<?php echo route('topic/edit&id='.$value['id']); ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                    <?php }else{?>
                                                        <a href="#" class="btn btn-primary btn-sm disabled"><i class="fas fa-edit"></i></a>
                                                    <?php } ?>
                                                    <?php if($active_del){ ?>
                                                        <a href="" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                                    <?php }else{?>
                                                        <a href="#" class="btn btn-danger btn-sm disabled"><i class="fas fa-trash"></i></a>
                                                    <?php } ?>
                                                </td>
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
    $('#pageTopic').addClass('active');
</script>