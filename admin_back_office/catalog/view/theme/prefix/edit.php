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
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ข้อมูล</h3>
            </div>
            <div class="card-body">
                <?php if($status == 'show'){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>สำเร็จ!</strong> บันทึกข้อมูลเรียบร้อย
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-4">
                        <form action="<?php echo route('setting/prefixEdit&id='.$result['id']); ?>" method="POST">
                        <label for="">คำนำหน้า</label>
                        <input type="text" name="title" class="form-control mb-3" value="<?php echo $result['title']; ?>" placeholder="กรอกข้อมูล">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                        <a href="<?php echo route('setting/prefix'); ?>" class="btn btn-light">ยกเลิก</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>