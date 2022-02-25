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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-12 text-right">
                                    <a href="<?php echo route('topic/add'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> เพิ่มประเภทเรื่องร้องเรียน</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="50px;" class="text-center">#</th>
                                                <th>ชื่อ</th>
                                                <th class="text-center" width="100px;">ลำดับ</th>
                                                <th width="100px;"></th>
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
                                                <td>
                                                    <form name="frm<?php echo $value['id']; ?>" action="<?php echo route('topic/sort&id='.$value['id']); ?>" method="POST" class="mb-0">
                                                        <input type="text" class="form-control mb-0 text-center" name="sort" value="<?php echo $value['sort']; ?>" onblur="frm<?php echo $value['id'] ?>.submit();">
                                                    </form>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo route('topic/edit&id='.$value['id']); ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
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
    </section>
        <!-- /.content -->
</div>
<script>
    $('#pageTopic').addClass('active');
</script>