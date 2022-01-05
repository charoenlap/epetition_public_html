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
   <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">กำหนดขนาดไฟล์</h4>
                        </div>
                        <div class="card-body">
                            <div id="Form">
                                <div class="row mb-3">
                                    <!-- <div class="col-md-5">
                                        <label for="">ประเภทปัญหา</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">เลือกประเภทปัญหา</option>
                                        </select>
                                    </div>   -->
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">เลือกขนาดไฟล์ MB</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="" id="" class="form-control">
                                            <option value="">เลือกขนาดไฟล์ MB</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                        </select>
                                        <!-- <button class="btn btn-primary">เลือกหน่วยงาน</button> -->
                                    </div>
                                    
                                   
                                </div>
                            </div>
                           
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary">ส่งเรื่อง</button>
                                    <a href="<?php echo route('appeal');?>" class="btn btn-danger">ยกเลิก</a>
                                </div>
                            </div> -->
    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ตั้งค่าเงื่อนไขเรื่องร้องเรียน</h4>
                        </div>
                        <div class="card-body">
                            <div id="Form">
                                <div class="row mb-3">
                                    <!-- <div class="col-md-5">
                                        <label for="">ประเภทปัญหา</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">เลือกประเภทปัญหา</option>
                                        </select>
                                    </div>   -->
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">เงื่อนไขเรื่องร้องเรียน</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="" id="" class="form-control">
                                            <option value="">เลือกเงื่อนไขเรื่องร้องเรียน</option>
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
                                                <td>รายละเอียด</td>
                                                <td><a href="#" class="btn btn-primary">ลบ</a></td>
                                            </tr>
                                        </tbody>
                                    </table>   
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary">ส่งเรื่อง</button>
                                    <a href="<?php echo route('appeal');?>" class="btn btn-danger">ยกเลิก</a>
                                </div>
                            </div> -->
                             <section class="content">
                             <section class="content">                     
</div>
<script>
    $('#pageSetting').addClass('active');


    $(document).ready(function() {
      $('.summernote').summernote({
        height: 300
      });
    });
</script>