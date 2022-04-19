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
                        <a class="nav-link active"  href="#tabs-1-2">
                            ปรับแต่งแบนเนอร์
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
                            บังคับกรอก
                        </a>
                    </li>
                </ul>
                <div id="tabs-1">
                    <form action="<?php echo route('setting/submitContent'); ?>" method="POST" id="formContent">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">ช่องทางการติดต่อ</label>
                                        <textarea name="contact" id="" cols="30" rows="10" class="summernote"><?php echo $data['contact']; ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">ด้านล่าง</label>
                                        <textarea name="footer" id="" cols="30" rows="10" class="summernote"><?php echo $data['footer']; ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">ข้อตกลงหลักเกณฑ์รับเรื่องร้องเรียน/ร้องทุกข์</label>
                                        <textarea name="agreement" id="" cols="30" rows="10" class="summernote"><?php echo $data['agreement']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="tabs-1-2">
                    <form action="<?php echo route('setting/submitBanner'); ?>" method="POST" id="formBanner" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">แบนเนอร์</label>
                                        <input type="file" name="banner[]" id="banner" multiple>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php foreach($banners as $banner){?>
                                    <div class="col-2 mb-2 col-img-banner">
                                        <div style="background:url('<?php echo $banner['file'];?>');background-position:center;background-size: cover;height:100px;">
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-danger del-banner btn-block" data-id="<?php echo $banner['id'];?>">ลบ</a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="tabs-2">
                    <form action="<?php echo route('setting/submitMaster'); ?>" method="POST" id="masterSetting">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">กำหนดขนาดไฟล์ การอัพโหลด</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="">เลือกขนาดไฟล์ (MB)</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="limitFile" id="limitFile" class="form-control">
                                            <option value="">เลือกขนาดไฟล์ MB</option>
                                            <?php for($i=1;$i<=5;$i++){ ?>
                                            <option value="<?php echo $i; ?>" <?php echo ($i==$limitFile?'selected':'')?>><?php echo $i; ?></option>
                                            <?php } ?>
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
                    </form>
                </div>
                <div id="tabs-3">
                    <form action="<?php echo route('setting/submitBackup'); ?>" method="POST" id="backupRecovery">
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
                                        <button class="btn btn-primary " id="btnUpdate">อัพเดทโปรแกรม</button>
                                        <label for="" id="resultUpdateSoftware"></label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        Backup ฐานข้อมูล
                                    </div>
                                    <div class="col-md-9">
                                        <button class="btn btn-primary " disabled id="">Backup ฐานข้อมูล</button>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        Recovery ฐานข้อมูล
                                    </div>
                                    <div class="col-md-3">
                                        <select name="recoveryFile" id="recoveryFile" class="form-control">
                                            <option value="">ไม่พบการ Backup</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary " disabled id="">ยืนยัน Recovery ฐานข้อมูล</button>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        ตั้งเวลา Backup ฐานข้อมูล
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Minute</label>
                                        <select name="m" id="m" class="form-control">
                                            <option value="*">*</option>
                                            <?php for($i=1;$i<=59;$i++){ ?>
                                            <option value="<?php echo $i;?>" <?php echo ($m==$i?'selected':'');?>><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Hour</label>
                                        <select name="h" id="h" class="form-control">
                                            <option value="*">*</option>
                                            <?php for($i=1;$i<=23;$i++){ ?>
                                            <option value="<?php echo $i;?>" <?php echo ($h==$i?'selected':'');?>><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Day</label>
                                        <select name="d" id="d" class="form-control">
                                            <option value="*">*</option>
                                            <?php for($i=1;$i<=31;$i++){ ?>
                                            <option value="<?php echo $i;?>" <?php echo ($d==$i?'selected':'');?>><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Month</label>
                                        <select name="month" id="month" class="form-control">
                                            <option value="*">*</option>
                                            <?php for($i=1;$i<=31;$i++){ ?>
                                            <option value="<?php echo $i;?>" <?php echo ($month==$i?'selected':'');?>><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Week</label>
                                        <select name="week" id="week" class="form-control">
                                            <option value="*">*</option>
                                            <?php for($i=1;$i<=6;$i++){ ?>
                                            <option value="<?php echo $i;?>" <?php echo ($week==$i?'selected':'');?>><?php echo $i;?></option>
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
                                        <select name="m_code" id="m" class="form-control">
                                            <option value="*">*</option>
                                            <?php for($i=1;$i<=59;$i++){ ?>
                                            <option value="<?php echo $i;?>" <?php echo ($m_code==$i?'selected':'');?>><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Hour</label>
                                        <select name="h_code" id="h" class="form-control">
                                            <option value="*">*</option>
                                            <?php for($i=1;$i<=23;$i++){ ?>
                                            <option value="<?php echo $i;?>" <?php echo ($h_code==$i?'selected':'');?>><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Day</label>
                                        <select name="d_code" id="d_code" class="form-control">
                                            <option value="*">*</option>
                                            <?php for($i=1;$i<=31;$i++){ ?>
                                            <option value="<?php echo $i;?>" <?php echo ($d_code==$i?'selected':'');?>><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Month</label>
                                        <select name="month_code" id="month" class="form-control">
                                            <option value="*">*</option>
                                            <?php for($i=1;$i<=31;$i++){ ?>
                                            <option value="<?php echo $i;?>" <?php echo ($month_code==$i?'selected':'');?>><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Week</label>
                                        <select name="week_code" id="week" class="form-control">
                                            <option value="*">*</option>
                                            <?php for($i=1;$i<=6;$i++){ ?>
                                            <option value="<?php echo $i;?>" <?php echo ($week_code==$i?'selected':'');?>><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="tabs-4">
                    <form action="<?php echo route('setting/submitConfigDays'); ?>" method="POST" id="submitConfigDays">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ตั้งค่าสถานะ</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h3>ตั้งค่าหลัก</h3>
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
                                                        <input type="text" value="30" class="form-control" name="master_process">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    เรื่องร้องเรียน/ร้องทุกข์อีก x วันจะครบกำหนด
                                                    </td>
                                                    <td>
                                                        <input type="text" value="7" class="form-control" name="master_end">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h3>ตั้งค่าหลักย่อยระดับประเภท</h3>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        ประเภทเรื่องร้องเรียน
                                    </div>
                                    <div class="col-md-3">
                                        <select name="topic" id="topic" class="form-control">
                                            <option value="">เลือกประเภทเรื่องร้องเรียน</option>
                                            <?php foreach($topic as $val){?>
                                                <option value="<?php echo $val['id'];?>"><?php echo $val['topic_title'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        ประเภทเรื่องร้องเรียนย่อย
                                    </div>
                                    <div class="col-md-3">
                                        <select name="topic_sub" id="topic_sub" class="form-control">
                                            <option value="">เลือกประเภทย่อย</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        เรื่องร้องเรียน/ร้องทุกข์อีก x วันจะครบกำหนด
                                    </div>
                                    <div class="col-3">
                                        <input type="text" class="form-control" id="days_process">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        เรื่องร้องเรียน/ร้องทุกข์อยู่ระหว่างการดำเนินการ
                                    </div>
                                    <div class="col-3">
                                        <input type="text" class="form-control" id="days_end">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="tabs-5">
                     <form action="<?php echo route('setting/submitConfigEmail'); ?>" method="POST" id="submitConfigEmail">
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
                                        <textarea name="mail_agency" id="" cols="30" rows="10" class="summernote"><?php echo $mail_agency; ?></textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <table class="table table-striped">
                                            <tr>
                                                <td>{{subject}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        ส่งอีเมลไปยังกรม
                                    </div>
                                    <div class="col-md-6">
                                        <textarea name="mail_agency_sub" id="" cols="30" rows="10" class="summernote"><?php echo $mail_agency_sub; ?></textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <table class="table table-striped">
                                            <tr>
                                                <td>{{subject}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{comment}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        ส่งอีเมลไปยังประชาชน
                                    </div>
                                    <div class="col-md-6">
                                        <textarea name="mail_people" id="" cols="30" rows="10" class="summernote"><?php echo $mail_people; ?></textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <table class="table table-striped">
                                            <table class="table table-striped">
                                            <tr>
                                                <td>{{ticket_id}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{id_card}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{name_title}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{name}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{lastname}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{age}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{tel}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{phone}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{email}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{complain_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{response_person}}</td>
                                            </tr>
                                        </table>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        Host
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="<?php echo $email_host;?>" name="host" id="host" >
                                    </div>
                                    <div class="col-md-3">
                                        Port
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="<?php echo $email_port;?>" name="post" id="post" >
                                    </div>
                                </div>
                                <div class="row mt-2 mb-2">
                                    <div class="col-md-3">
                                        User
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="<?php echo $email_user;?>" name="user" id="user" >
                                    </div>
                                    <div class="col-md-3">
                                        Pass
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="<?php echo $email_pass;?>" name="pass" id="pass" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                        <option value="">เลือก Log ที่ต้องการ</option>
                                        <option value="login">การเข้าใช้งานระบบ</option>
                                        <option value="auth.log">auth.log</option>
                                        <option value="fail2ban.log">fail2ban.log</option>
                                        <option value="mail.log">mail.log</option>
                                        <option value="syslog">syslog</option>
                                    </select>
                                    <div class="mt-4">
                                        <label for="">รายละเอียด</label>
                                        <textarea name="print_log" id="print_log" cols="30" rows="10" class="form-control"><?php //echo $data['email_agency']; ?></textarea>
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
                                    <select name="hide_topic" id="hide_topic" class="form-control">
                                        <option value="">เลือกประเภทเรื่องร้องเรียน</option>
                                            <?php foreach($topic as $val){?>
                                                <option value="<?php echo $val['id'];?>"><?php echo $val['topic_title'];?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    ประเภทเรื่องร้องเรียนย่อย
                                </div>
                                <div class="col-md-3">
                                    <select name="hide_topic_sub" id="hide_topic_sub" class="form-control">
                                        <option value="">เลือกประเภทย่อย</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>เนื้อหาที่ปกปิด</th>
                                            <th width="150px;">สถานะ</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach($listField as $val){ ?>
                                            <tr>
                                                <td><?php echo $val['name_th'] ?></td>
                                                <td>
                                                    <select 
                                                        name="<?php echo $val['name_en'] ?>" 
                                                        data-id="<?php echo $val['id'] ?>" 
                                                        id="hide<?php echo $val['id'] ?>"
                                                        class="form-control changeHide">
                                                        <option value="0">เปิด</option>
                                                        <option value="1">ปิด</option>
                                                    </select>
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
                <div id="tabs-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>หัวข้อที่ต้องการให้บังคับกรอก</th>
                                            <th width="100px;">ตั้งค่า</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach($listField as $val){ ?>
                                            <tr>
                                                <td><?php echo $val['name_th'] ?></td>
                                                <td>
                                                    <select 
                                                        name="<?php echo $val['name_en'] ?>" 
                                                        data-id="<?php echo $val['id'] ?>" 
                                                        class="form-control changeRequire">
                                                        <option value="0" <?php echo ($val['required']==0?'selected':'') ?>>เปิด</option>
                                                        <option value="1" <?php echo ($val['required']==1?'selected':'') ?>>ปิด</option>
                                                    </select>
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
            <?php if($active_edit){ ?>
            <div class="row">
                <div class="col-12">
                    <input class="btn btn-primary btn-block" id="submitForm" type="submit" value="บันทึกการตั้งค่า">
                </div>
            </div>
            
            <div class="row mt-2">
                <div class="col-12">
                    <div class="alert alert-success d-none" id="alert-status">
                        <span id="result_html_content"></span>
                        <span id="result_html_banner"></span>
                    </div>
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
</div>
<style>
    /*.ui-tabs-active.ui-state-active a{
        color:#007bff;
    }*/
    .nav-item.ui-tabs-tab.ui-corner-top.ui-state-default.ui-tab.ui-tabs-active.ui-state-active a{
        color: #fff !important;
        background-color: #007bff !important;
        border-color: #007bff !important;
    }
</style>
<script>
    $(document).on('change','#hide_topic_sub',function(e){
        var topic_sub_id = $(this).val();
        $.ajax({
            url: 'index.php?route=setting/getHideTopicSub',
            type: 'POST',
            dataType: 'json',
            data: {id: topic_sub_id},
        })
        .done(function(json) {
            console.log(json);
            if(json.status=="success"){
                $.each(json.desc, function(index, val) {
                    $('#hide'+val.id_hide_data).val(val.status);
                    console.log('#hide'+val.id);
                })
            }
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    });

    // var $toast = toastr('test', title);
    $(document).on('change','.changeHide',function(e){
        var id = $(this).attr('data-id');
        var val = $(this).val();
        var hide_topic = $('#hide_topic').val();
        var hide_topic_sub = $('#hide_topic_sub').val();
        if(hide_topic != '' && hide_topic_sub!=''){
            $.ajax({
                url: 'index.php?route=setting/changeHide',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    val: val,
                    id_topic: hide_topic,
                    id_topic_sub: hide_topic_sub
                },
            })
            .done(function() {
                toastr.success('บันทึกสถานะเรียบร้อย');
                console.log("success");
            })
            .fail(function(a,b,c) {
                console.log("error");
                console.log(a);
                console.log(b);
                console.log(c);
            })
            .always(function() {
                console.log("complete");
            });
        }
        
    });
    $(document).on('change','.changeRequire',function(e){
        var id = $(this).attr('data-id');
        var val = $(this).val();
        $.ajax({
            url: 'index.php?route=setting/changeRequire',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                val: val
            },
        })
        .done(function() {
            toastr.success('บันทึกสถานะเรียบร้อย');
            console.log("success");
        })
        .fail(function(a,b,c) {
            console.log("error");
            console.log(a);
            console.log(b);
            console.log(c);
        })
        .always(function() {
            console.log("complete");
        });
        
    });
    $(document).on('change','#log',function(e){
        var val = $(this).val();
        $.ajax({
             url: 'index.php?route=setting/getLog',
             type: 'POST',
             dataType: 'json',
             data: {val: val},
         })
         .done(function(json) {
             if(json.status=="success"){
                $('#print_log').val(json.desc);
                // $('#day_process').val(json.days_process);
                // $('#day_end').val(json.days_end);
                 console.log(json);
             }
             console.log("success");
         })
         .fail(function(a,b,c) {
            console.log("error");
            $('#print_log').val(a.responseText);
            console.log(a);
            console.log(b);
            console.log(c);
        })
         .always(function() {
             console.log("complete");
         });
    });
     $(document).on('change','#topic_sub',function(e){
         var id = $(this).val();
         $.ajax({
             url: 'index.php?route=setting/getSubTopicConfig',
             type: 'POST',
             dataType: 'json',
             data: {id: id},
         })
         .done(function(json) {
             if(json.status=="success"){
                $('#day_process').val(json.days_process);
                $('#day_end').val(json.days_end);
                 console.log(json);
             }
             console.log("success");
         })
         .fail(function(a,b,c) {
            console.log("error");
            console.log(a);
            console.log(b);
            console.log(c);
         })
         .always(function() {
             console.log("complete");
         });
     });
     $(document).on('keyup','#days_process',function(e){
         var val = $(this).val();
         console.log(val);
        if($('#topic_sub').val()!=''){
             $.ajax({
                 url: 'index.php?route=setting/setSubTopicConfigDaysProcess',
                 type: 'POST',
                 dataType: 'json',
                 data: {
                    topic_sub:$('#topic_sub').val(),
                    val: val
                },
             })
             .done(function(json) {
                 if(json.status=="success"){
                     // console.log(json.detail);
                 }
                 console.log("success");
             })
             .fail(function(a,b,c) {
                console.log("error");
                console.log(a);
                console.log(b);
                console.log(c);
             })
             .always(function() {
                 console.log("complete");
             });
        }
     });
     $(document).on('keyup','#days_end',function(e){
         var val = $(this).val();
          if($('#topic_sub').val()!=''){
             $.ajax({
                 url: 'index.php?route=setting/setSubTopicConfigDaysEnd',
                 type: 'POST',
                 dataType: 'json',
                 data: {
                    topic_sub:$('#topic_sub').val(),
                    val: val
                },
             })
             .done(function(json) {
                 if(json.status=="success"){
                     // console.log(json.detail);
                 }
                 console.log("success");
             })
             .fail(function(a,b,c) {
                console.log("error");
                console.log(a);
                console.log(b);
                console.log(c);
            })
             .always(function() {
                 console.log("complete");
             });
        }
     });
     $(document).on('change','#hide_topic',function(e){
         var id = $(this).val();
         $.ajax({
             url: 'index.php?route=setting/getSubTopic',
             type: 'POST',
             dataType: 'json',
             data: {id: id},
         })
         .done(function(json) {
             if(json.status=="success"){
                 console.log(json.detail);
                  $('#hide_topic_sub').empty();
                  $('#hide_topic_sub').append('<option value="">เลือกประเภทย่อย</option>');
                 $.each(json.detail, function(index, val) {
                      $('#hide_topic_sub').append('<option value="'+val.id+'">'+val.title+'</option>');
                 });
             }
             console.log("success");
         })
         .fail(function(a,b,c) {
            console.log("error");
            console.log(a);
            console.log(b);
            console.log(c);
        })
         .always(function() {
             console.log("complete");
         });
        
     });
     $(document).on('change','#topic',function(e){
         var id = $(this).val();
         $.ajax({
             url: 'index.php?route=setting/getSubTopic',
             type: 'POST',
             dataType: 'json',
             data: {id: id},
         })
         .done(function(json) {
             if(json.status=="success"){
                 console.log(json.detail);
                  $('#topic_sub').empty();
                  $('#topic_sub').append('<option value="">เลือกประเภทย่อย</option>');
                 $.each(json.detail, function(index, val) {
                      $('#topic_sub').append('<option value="'+val.id+'">'+val.title+'</option>');
                 });
             }
             console.log("success");
         })
         .fail(function(a,b,c) {
            console.log("error");
            console.log(a);
            console.log(b);
            console.log(c);
        })
         .always(function() {
             console.log("complete");
         });
        
     });
    $(document).on('submit','#backupRecovery',function(e){
        var result_html = '';
        var result_html_content = '';
        var data =  $('#backupRecovery').serialize();
        console.log(data);
        $.ajax({
            url: 'index.php?route=setting/submitBackup',
            type: 'POST',
            dataType: 'json',
            data:data,
            async:false, 
        })
        .done(function(json) {
            $('#alert-status').removeClass('d-none');
            console.log(json);
            if(json.status=="success"){
                result_html_content = 'อัพเดทการตั้งค่า Backup & Recoveryเรียบร้อย<br>';
                $('#result_html_content').html(result_html_content);
            }
            console.log(json.status);
            console.log("success");
        })
        .fail(function(a,b,c) {
            console.log("error");
            console.log(a);
            console.log(b);
            console.log(c);
        })
        .always(function() {
            console.log("complete");
        });
        e.preventDefault();
    });
    $(document).on('submit','#submitConfigDays',function(e){
        var result_html = '';
        var result_html_content = '';
        var data =  $('#submitConfigDays').serialize();
        console.log(data);
        $.ajax({
            url: 'index.php?route=setting/submitConfigDays',
            type: 'POST',
            dataType: 'json',
            data:data,
            async:false, 
        })
        .done(function(json) {
            $('#alert-status').removeClass('d-none');
            console.log(json);
            if(json.status=="success"){
                result_html_content = 'อัพเดทการตั้งค่า ประเภทวัน เรียบร้อย<br>';
                $('#result_html_content').html(result_html_content);
            }
            console.log(json.status);
            console.log("success");
        })
        .fail(function(a,b,c) {
            console.log("error");
            console.log(a);
            console.log(b);
            console.log(c);
        })
        .always(function() {
            console.log("complete");
        });
        e.preventDefault();
    });
    $(document).on('submit','#submitConfigEmail',function(e){
        var result_html = '';
        var result_html_content = '';
        var data =  $('#submitConfigEmail').serialize();
        console.log(data);
        $.ajax({
            url: 'index.php?route=setting/submitConfigEmail',
            type: 'POST',
            dataType: 'json',
            data:data,
            async:false, 
        })
        .done(function(json) {
            $('#alert-status').removeClass('d-none');
            console.log(json);
            if(json.status=="success"){
                result_html_content = 'อัพเดทการตั้งค่า อีเมล เรียบร้อย<br>';
                $('#result_html_content').html(result_html_content);
            }
            console.log(json.status);
            console.log("success");
        })
        .fail(function(a,b,c) {
            console.log("error");
            console.log(a);
            console.log(b);
            console.log(c);
        })
        .always(function() {
            console.log("complete");
        });
        e.preventDefault();
    });
    $(document).on('submit','#formContent',function(e){
        var result_html = '';
        var result_html_content = '';
        $.ajax({
            url: 'index.php?route=setting/submitContent',
            type: 'POST',
            dataType: 'json',
            data: $('#formContent').serialize(),
            async:false, 
        })
        .done(function(json) {
            $('#alert-status').removeClass('d-none');
            console.log(json);
            if(json.status=="success"){
                result_html_content = 'อัพเดทการตั้งค่าเนื้อหาปรับแต่งหน้าเว็บไซต์เรียบร้อย<br>';
                $('#result_html_content').html(result_html_content);
            }
            console.log(json.status);
            console.log("success");
        })
        .fail(function(a,b,c) {
            console.log("error");
            console.log(a);
            console.log(b);
            console.log(c);
        })
        .always(function() {
            console.log("complete");
        });
        e.preventDefault();
    });
    $(document).on('submit','#masterSetting',function(e){
        var result_html = '';
        var result_html_content = '';
        $.ajax({
            url: 'index.php?route=setting/submitMaster',
            type: 'POST',
            dataType: 'json',
            data: $('#masterSetting').serialize(),
            async:false, 
        })
        .done(function(json) {
            $('#alert-status').removeClass('d-none');
            console.log(json);
            if(json.status=="success"){
                result_html_content = 'อัพเดทการตั้งค่าเนื้อหาปรับแต่งตั้งค่าระบบเรียบร้อย<br>';
                $('#result_html_content').html(result_html_content);
            }
            console.log(json.status);
            console.log("success");
        })
        .fail(function(a,b,c) {
            console.log("error");
            console.log(a);
            console.log(b);
            console.log(c);
        })
        .always(function() {
            console.log("complete");
        });
        e.preventDefault();
    });
    $(document).on('submit','#formBanner',function(e){
        var result_html = '';
        var result_html_banner = '';
        //formBanner
        var file = document.getElementById("banner");
        if(file.files.length > 0){
            var form_data = new FormData();
           var totalfiles = document.getElementById('banner').files.length;
           for (var index = 0; index < totalfiles; index++) {
              form_data.append("banner[]", document.getElementById('banner').files[index]);
           }
           
            $.ajax({
                url: 'index.php?route=setting/submitBanner',
                type: 'POST',
                dataType: 'json',
                data: form_data,
                contentType: false,
                processData: false,
            })
            .done(function(json) {
                $('#alert-status').removeClass('d-none');
                console.log(json);
                if(json.status=="success"){
                    result_html_banner = 'อัพเดทการตั้งค่าเนื้อหาปรับแต่งแบนเนอร์เรียบร้อย<br>';
                    $('#result_html_banner').html(result_html_banner);
                }
                console.log(json.status);
                console.log("success");
            })
            .fail(function(a,b,c) {
                console.log("error");
                console.log(a);
                console.log(b);
                console.log(c);
            })
            .always(function() {
                console.log("complete");
            });
        }
        e.preventDefault();
    });
    $(document).on('click','#submitForm',function(e){
        $('#formContent').submit();
        $('#formBanner').submit();
        $('#masterSetting').submit();
        $('#backupRecovery').submit();
        $('#submitConfigDays').submit();
        $('#submitConfigEmail').submit();
        e.preventDefault();
    });
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
    $(document).on('click','.del-banner',function(e){

        var id = $(this).attr('data-id');
        var ele = $(this);
        // alert(id);
        $.ajax({
            url: 'index.php?route=setting/delBanner&id=',
            type: 'POST',
            dataType: 'json',
            data: {id: id},
        })
        .done(function(json) {
            console.log(json);
            ele.parents('.col-img-banner').remove();
            console.log("success");
        })
        .fail(function(a,b,c) {
            console.log("error");
            console.log(a);
            console.log(b);
            console.log(c);
        })
        .always(function() {
            console.log("complete");
        });
        
        <?php // echo route('setting/delSetting&id='.$val['id']);?>
    });
    $(document).on('click','#btnUpdate',function(e){
        $.ajax({
            url: 'index.php?route=setting/btnUpdateGit',
            type: 'POST',
            dataType: 'json',
            // data: {param1: 'value1'},
        })
        .done(function(json) {
            console.log("success");
            console.log(json);
            $('#resultUpdateSoftware').text(json.desc);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        e.preventDefault();
    });
</script>