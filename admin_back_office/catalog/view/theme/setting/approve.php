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
    <form action="<?php echo route('setting'); ?>" method="POST">
        <section class="content">
            <?php if($active_view){ ?>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <label for="">ช่วงวันที่ต้องการมอบหมายแทน</label>
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-3">
                                <label for="">มอบหมายให้ บุคคลทำหน้าที่แทน</label>
                            </div>
                            <div class="col-6">
                                <select name="" id="" class="form-control">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <input type="submit" class="btn btn-primary" value="บันทึก">
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
    </form>
</div>