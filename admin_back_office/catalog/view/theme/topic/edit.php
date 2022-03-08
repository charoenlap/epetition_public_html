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
      <form action="<?php echo route('topic/edit&id='.$data['id']); ?>" method="POST">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-12">
                                   <label for="">ประเภทเรื่องร้องเรียน</label>
                                   <textarea name="topic_title" id="" rows="5" class="form-control"><?php echo $data['topic_title']; ?></textarea>
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-11">
                              <h3>หัวข้อย่อย</h3>
                            </div>
                            <div class="col-1">
                              <a href="#" class="btn btn-primary btn-block" id="btn-add">+ เพิ่ม</a>
                            </div>
                          </div>
                          <div id="panel-sub">
                            <?php foreach($lists_sub as $val){?>
                            <div class="row mb-2 row-sub">
                              <div class="col-md-11">
                                <input type="text" name="sub[]" value="<?php echo $val['title'];?>" class="form-control">
                              </div>
                              <div class="col-md-1">
                                <a href="#" class="btn btn-danger btn-block btn-del-sub">ลบ</a>
                              </div>
                            </div>
                            <?php }?>
                          </div>
                          <div class="row mt-4">
                            <div class="col-md-12">
                              <button class="btn btn-primary" type="submit">บันทึก</button>
                              <a href="<?php echo route('topic'); ?>" class="btn btn-secondary">ยกเลิก</a>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
      </form>
    </section>
        <!-- /.content -->
</div>
<script>
    $('#pageTopic').addClass('active');
    $(document).on('click','#btn-add',function(e){
      var html = '<div class="row mb-2 row-sub">'+
                    '<div class="col-md-11">'+
                      '<input type="text" name="sub[]" value="" class="form-control">'+
                    '</div>'+
                    '<div class="col-md-1">'+
                      '<a href="#" class="btn btn-danger btn-block btn-del-sub">ลบ</a>'+
                    '</div>'+
                  '</div>';
      $('#panel-sub').append(html);
    });
    $(document).on('click','.btn-del-sub',function(e){
      $(this).parents('.row-sub').remove();
    });
</script>