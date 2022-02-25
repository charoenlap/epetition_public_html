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
            <div class="container-fluid">
                <div id="tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link activea active"  href="#tabs-1">
                                ปรับแต่งหน้าเว็บไซต์
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"  href="#tabs-2">
                                ตั้งค่าระบบ
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link active"  href="#tabs-3">
                                ตั้งค่าเงื่อนไขเรื่องร้องเรียน
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link active"  href="#tabs-4">
                                ตั้งค่าสถานะ
                            </a>
                        </li>
                    </ul>
                    <div id="tabs-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">ช่องทางการติดต่อ</label>
                                        <textarea name="contact" id="" cols="30" rows="10" class="summernote"><?php echo $data['contacts']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tabs-2">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">กำหนดขนาดไฟล์ การอัพโหลด</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="">เลือกขนาดไฟล์ MB</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="" id="" class="form-control">
                                            <option value="">เลือกขนาดไฟล์ MB</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="">อัพเดท จังหวัด อำเภอ ตำบล จาก สปน</label><br>
                                        <small>*ต้องรอจนกว่าจะอัพเดทเสร็จสิ้น</small>
                                    </div>
                                    <div class="col-md-9">
                                        <a href="<?php echo route('appeal/getProvinces');?>" target="_blank" class="btn btn-primary">อัพเดท</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php /* ?>
                    <div id="tabs-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ตั้งค่าเงื่อนไขเรื่องร้องเรียน</h4>
                            </div>
                            <div class="card-body">
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
                            </div>
                        </div>
                    </div>
                    <?php */?>
                    <div id="tabs-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ตั้งค่าสถานะ</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <table class="table">
                                            <thead>
                                                <th>หัวข้อ</th>
                                                <th>จำนวนวัน</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                    เรื่องร้องเรียน/ร้องทุกข์อยู่ระหว่างการดำเนินการ
                                                    </td>
                                                    <td>
                                                        <input type="text" value="30" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    เรื่องร้องเรียน/ร้องทุกข์อีก x วันจะครบกำหนด
                                                    </td>
                                                    <td>
                                                        <input type="text" value="7" class="form-control">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input class="btn btn-primary btn-block" type="submit" value="บันทึกการตั้งค่า">
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>
<style>
    /*.ui-tabs-active.ui-state-active a{
        color:#007bff;
    }*/
</style>
<script>
  $( function() {
    $( "#tabs" ).tabs();
    $('.nav-link.activea').click();
  } );
  </script>
<script>
    $('#pageSetting').addClass('active');


    $(document).ready(function() {
      $('.summernote').summernote({
        height: 300
      });
    });
</script>