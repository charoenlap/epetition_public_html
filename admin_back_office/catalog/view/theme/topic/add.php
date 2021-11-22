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
                            <form action="<?php echo route('topic/add'); ?>" method="POST">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                   <label for="">ประเภทเรื่องร้องเรียน</label>
                                   <textarea name="topic_title" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">บันทึก</button>
                                    <a href="<?php echo route('topic'); ?>" class="btn btn-secondary">ยกเลิก</a>
                                </div>
                            </div>
                            </form>
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