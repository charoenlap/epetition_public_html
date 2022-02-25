<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">เพิ่มกลุ่มผู้ใช้งาน</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo route('home');?>">หน้าหลัก</a></li>
            <li class="breadcrumb-item"><a href="<?php echo route('user/group');?>">กำหนดสิทธิ์กลุ่มผู้ใช้งาน</a></li>
            <li class="breadcrumb-item active">เพิ่มกลุ่มผู้ใช้งาน</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    ชื่อกลุ่มผู้ใช้งาน
                </div>
                <div class="card-body">
                    <form action="<?php echo $action;?>" method="POST">
                        <div class="row mb-2">
                            <div class="col-md-12 text-right">
                                <input type="text" value="" name="name" class="form-control" placeholder="ชื่อกลุ่มผู้ใช้งาน">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12 text-right">
                                <input type="submit" value="บันทึก" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                    <?php /* ?>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="">ข้อมูลผู้ร้องเรียน</label>
                        </div>
                        <div class="col-md-5">
                            <select name="" id="" class="form-control">
                                <option value="">เลือกปิดข้อมูลส่วนตัว</option>
                                <option value="">เลขประจำตัวประชาชน</option>
                                <option value="">ชื่อสกุล</option>
                                <option value="">เบอร์โทร</option>
                                <option value="">บ้านเลขที่</option>
                            </select>
                            <!-- <button class="btn btn-primary">เลือกหน่วยงาน</button> -->
                        </div>
                        
                        <div class="col-md-2">
                            <button class="btn btn-primary" id="addFrom"><i class="fas fa-folder-plus"></i> เพิ่ม</button>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>รายการ</th>
                                        <th style="width:100px;">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>ชื่อ</td>
                                        <td><a href="#" class="btn btn-primary">ลบ</a></td>
                                    </tr>
                                </tbody>
                            </table>   
                        </div>
                    </div>
                    <?php */?>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).on('click','#checkAll',function(){
        $('.checkboxSend').not(this).prop('checked', this.checked);
        $('.checkboxSend').each(function() {
             if($(this).is(':checked')){
                $('#btn-send-topic').removeClass('disabled');
                $('#btn-send-topic').attr('aria-disabled','false');
                 return false;
             }
        });
    });
</script>