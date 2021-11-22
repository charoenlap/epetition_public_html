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
                            <form action="<?php echo route('setting'); ?>" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">ช่องทางการติดต่อ</label>
                                    <textarea name="contact" id="" cols="30" rows="10" class="summernote"><?php echo $data['contacts']; ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <button type="submit" class="btn btn-primary">บันทึก</button>
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
    $('#pageSetting').addClass('active');


    $(document).ready(function() {
      $('.summernote').summernote({
        height: 300
      });
    });
</script>