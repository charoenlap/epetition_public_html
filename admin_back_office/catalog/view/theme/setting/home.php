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
                        <li class="nav-item">
                            <a class="nav-link active"  href="#tabs-3">
                                Backup&Recovery
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"  href="#tabs-4">
                                ตั้งค่าสถานะ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"  href="#tabs-5">
                                ตั้งค่าอีเมล
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"  href="#tabs-6">
                                Log
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"  href="#tabs-7">
                                ปิดข้อมูล
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"  href="#tabs-8">
                                Required field
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
                    <div id="tabs-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Backup & Recovery</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        อัพเดทโปรแกรม
                                    </div>
                                    <div class="col-md-9">
                                        <button class="btn btn-primary " disabled id="btnUpdate">Version ปัจจุบัน</button>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        Backup ฐานข้อมูล
                                    </div>
                                    <div class="col-md-9">
                                        <button class="btn btn-primary " disabled id="btnUpdate">Backup ฐานข้อมูล</button>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        Recovery ฐานข้อมูล
                                    </div>
                                    <div class="col-md-3">
                                        <select name="recovery" id="recovery" class="form-control">
                                            <option value="">2022-03-24 21:20:36</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary " disabled id="btnUpdate">ยืนยัน Recovery ฐานข้อมูล</button>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        ตั้งเวลา Backup ฐานข้อมูล
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Minute</label>
                                        <select name="m" id="m" class="form-control">
                                            <option value="">*</option>
                                            <?php for($i=0;$i<=59;$i++){ ?>
                                            <option value=""><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Hour</label>
                                        <select name="h" id="h" class="form-control">
                                            <option value="">*</option>
                                            <?php for($i=0;$i<=23;$i++){ ?>
                                            <option value=""><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Day</label>
                                        <select name="h" id="h" class="form-control">
                                            <option value="">*</option>
                                            <?php for($i=1;$i<=31;$i++){ ?>
                                            <option value=""><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Month</label>
                                        <select name="month" id="month" class="form-control">
                                            <option value="">*</option>
                                            <?php for($i=1;$i<=31;$i++){ ?>
                                            <option value=""><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Week</label>
                                        <select name="week" id="week" class="form-control">
                                            <option value="">*</option>
                                            <?php for($i=0;$i<=6;$i++){ ?>
                                            <option value=""><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        ตั้งเวลา Update source code
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Minute</label>
                                        <select name="m" id="m" class="form-control">
                                            <option value="">*</option>
                                            <?php for($i=0;$i<=59;$i++){ ?>
                                            <option value=""><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Hour</label>
                                        <select name="h" id="h" class="form-control">
                                            <option value="">*</option>
                                            <?php for($i=0;$i<=23;$i++){ ?>
                                            <option value=""><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Day</label>
                                        <select name="h" id="h" class="form-control">
                                            <option value="">*</option>
                                            <?php for($i=1;$i<=31;$i++){ ?>
                                            <option value=""><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Month</label>
                                        <select name="month" id="month" class="form-control">
                                            <option value="">*</option>
                                            <?php for($i=1;$i<=31;$i++){ ?>
                                            <option value=""><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Week</label>
                                        <select name="week" id="week" class="form-control">
                                            <option value="">*</option>
                                            <?php for($i=0;$i<=6;$i++){ ?>
                                            <option value=""><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tabs-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ตั้งค่าสถานะ</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        ประเภทเรื่องร้องเรียน
                                    </div>
                                    <div class="col-md-3">
                                        <select name="topic" id="topic" class="form-control">
                                            <option value="">เลือกประเภทเรื่องร้องเรียน</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        ประเภทเรื่องร้องเรียนย่อย
                                    </div>
                                    <div class="col-md-3">
                                        <select name="topic" id="topic" class="form-control">
                                            <option value="">เลือกประเภทย่อย</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
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
                    <div id="tabs-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ตั้งค่าอีเมล</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        ส่งอีเมลไปยังหน่วยงาน
                                    </div>
                                    <div class="col-md-6">
                                        <textarea name="email_agency" id="" cols="30" rows="10" class="summernote"><?php //echo $data['email_agency']; ?></textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <table class="table table-striped">
                                            <tr>
                                                <td>{{name}}</td>
                                                <td>ชื่อที่อยู่ในระบบ</td>
                                            </tr>
                                            <tr>
                                                <td>{{email}}</td>
                                                <td>อีเมลที่อยู่ในระบบ</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        ส่งอีเมลไปยังประชาชน
                                    </div>
                                    <div class="col-md-6">
                                        <textarea name="email_person" id="" cols="30" rows="10" class="summernote"><?php //echo $data['email_agency']; ?></textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <table class="table table-striped">
                                            <tr>
                                                <td>{{name}}</td>
                                                <td>ชื่อที่อยู่ในระบบ</td>
                                            </tr>
                                            <tr>
                                                <td>{{email}}</td>
                                                <td>อีเมลที่อยู่ในระบบ</td>
                                            </tr>
                                            <tr>
                                                <td>{{phone}}</td>
                                                <td>อีเมลที่อยู่ในระบบ</td>
                                            </tr>
                                            <tr>
                                                <td>{{topic}}</td>
                                                <td>หัวข้อเรื่องร้องเรียน</td>
                                            </tr>
                                            <tr>
                                                <td>{{comment}}</td>
                                                <td>ข้อเสนอแนะ</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tabs-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Log</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        ประเภท Log
                                    </div>
                                    <div class="col-md-9">
                                        <select name="log" id="log" class="form-control">
                                            <option value="">การเข้าใช้งานระบบ</option>
                                            <option value="">auth.log</option>
                                            <option value="">fail2ban.log</option>
                                            <option value="">mail.log</option>
                                            <option value="">syslog</option>
                                        </select>
                                        <div class="mt-4">
                                            <label for="">รายละเอียด</label>
                                            <textarea name="print_log" id="" cols="30" rows="10" class="form-control"><?php //echo $data['email_agency']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tabs-7">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ปิดข้อมูล</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        ประเภทเรื่องร้องเรียน
                                    </div>
                                    <div class="col-md-3">
                                        <select name="topic" id="topic" class="form-control">
                                            <option value="">เลือกประเภทเรื่องร้องเรียน</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        ประเภทเรื่องร้องเรียนย่อย
                                    </div>
                                    <div class="col-md-3">
                                        <select name="topic" id="topic" class="form-control">
                                            <option value="">เลือกประเภทย่อย</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        เนื้อหาที่จะปิด
                                    </div>
                                    <div class="col-md-3">
                                        <select name="topic" id="topic" class="form-control">
                                            <option value="">เลือกเนื้อหา</option>
                                            <option value="">ชื่อ</option>
                                            <option value="">นามสกุล</option>
                                            <option value="">เบอร์โทร</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <th>เนื้อหาที่ปกปิด</th>
                                                <th width="50px;">ลบ</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>ชื่อ</td>
                                                    <td><a href="#" class="btn btn-danger">ลบ</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tabs-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Required field</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        เลือกหัวข้อที่ต้องการให้บังคับกรอก
                                    </div>
                                    <div class="col-md-3">
                                        <select name="required" id="required" class="form-control">
                                            <option value="">เลือกหัวข้อ</option>
                                            <option value="">ชื่อ</option>
                                            <option value="">นามสกุล</option>
                                            <option value="">เบอร์โทร</option>
                                            <option value="">อีเมล</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <th>หัวข้อที่ต้องการให้บังคับกรอก</th>
                                                <th width="50px;">ลบ</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>ชื่อ</td>
                                                    <td><a href="#" class="btn btn-danger">ลบ</a></td>
                                                </tr>
                                                <tr>
                                                    <td>นามสกุล</td>
                                                    <td><a href="#" class="btn btn-danger">ลบ</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($active_edit){ ?>
                <div class="row">
                    <div class="col-12">
                        <input class="btn btn-primary btn-block" type="submit" value="บันทึกการตั้งค่า">
                    </div>
                </div>
                <?php } ?>
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