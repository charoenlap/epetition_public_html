

  <!-- Content Wrapper. Contains page content -->
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
                        <div class="card-header">
                            <h4 class="card-title"><?php echo $title; ?></h4>
                            <a href="<?php echo route('appeal'); ?>" class="float-right btn btn-dark btn-sm">ย้อนกลับ</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered table-primary">
                                        <tbody>
                                            <tr>
                                                <td>Ticket ID : <?php echo $ticket; ?></td>
                                            </tr>
                                            <tr>
                                                <td>วันที่เรื่องร้องเรียนเข้าระบบ : <?php echo $dateadd; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-primary">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th colspan="2">ข้อมูลผู้ร้องเรียน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">เลขประจำตัวประชาชน : <?php echo $idCard; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="50%">ชื่อสกุล : <?php echo $fullname; ?></td>
                                                <td>อายุ : <?php echo $age; ?> ปี</td>
                                            </tr>
                                            <tr>
                                                <td>โทรศัพท์บ้าน : <?php echo $tel; ?> ,โทรศัพท์มือถือ : <?php echo $phone; ?></td>
                                                <td>e-mail : <?php echo $email; ?></td>
                                            </tr>
                                            <tr>
                                                <td>บ้านเลขที่ : <?php echo $address_no; ?></td>
                                                <td>หมู่ที่ : <?php echo $moo; ?></td>
                                            </tr>
                                            <tr>
                                                <td>ชื่อหมู่บ้าน :  <?php echo $housename; ?></td>
                                                <td>ซอย : <?php echo $soi; ?></td>
                                            </tr>
                                            <tr>
                                                <td>ถนน : <?php echo $road; ?></td>
                                                <td>จังหวัด : <?php echo $id_provinces; ?></td>
                                            </tr>
                                            <tr>
                                                <td>อำเภอ/เขต : <?php echo $id_amphures; ?></td>
                                                <td>ตำบล/แขวง : <?php echo $id_districts; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">รหัสไปรษณีย์ : <?php echo $zipcode; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered table-success">
                                        <thead class="bg-success">
                                            <tr>
                                                <th colspan="2">รายละเอียดเรื่องร้องเรียน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>บุคคล/หน่วยงาน/สถานที่ที่ต้องการร้องเรียน </td>
                                                <td><?php echo $note_topic; ?></td>
                                            </tr>
                                            <tr>
                                                <td>บริเวณที่เกิดเหตุ</td>
                                                <td><?php echo $topic_address; ?></td>
                                            </tr>
                                            <tr>
                                                <td>จุดสังเกตหรือสถานที่ใกล้เคียงที่สำคัญ (โปรดระบุ หากท่านทราบข้อมูล)</td>
                                                <td><?php echo $place_landmarks; ?></td>
                                            </tr>
                                            <tr>
                                                <td>สิ่งที่ต้องการให้กระทรวงพลังงานดำเนินการ</td>
                                                <td><?php echo $response_person; ?></td>
                                            </tr>
                                            <tr>
                                                <td>เอกสารแนบ</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <h4>ความก้าวหน้าการดำเนินการเรื่องร้องเรียน</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>วันที่รายงาน</th>
                                                <th>หน่วยงานระดับกรม</th>
                                                <th>หน่วยงานระดับสำนัก</th>
                                                <th>รายละเอียดความก้าวหน้า</th>
                                                <th>ไฟล์แนบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>2561-02-01</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><a href="#" class="btn btn-primary btn-xs">ไฟล์แนบ</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ความคิดเห็น</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <h4 class="card-title">เจ้าหน้าที่</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2 w-25 mb-2" alt="User Image">
                                                    <p>เจ้าหน้าที่</p>
                                                </div>
                                                <div class="col-10">
                                                    <small>วันที่ : 17/10/2564 15:49</small>
                                                    <p>ประสานงาน</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-warning">
                                            <h4 class="card-title">สปน.</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2 w-25 mb-2" alt="User Image">
                                                    <p>สปน.</p>
                                                </div>
                                                <div class="col-10">
                                                    <small>วันที่ : 17/10/2564 15:49</small>
                                                    <p>ประสานงาน</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-theme">
                                            <h4 class="card-title">ปกท.ทส/รอง ปทก.ทส</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2 w-25 mb-2" alt="User Image">
                                                    <p>รอง ปทก.ทส</p>
                                                </div>
                                                <div class="col-10">
                                                    <small>วันที่ : 17/10/2564 15:49</small>
                                                    <p>ประสานงาน</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">กรอกข้อมูล/ความเห็น</label>
                                    <textarea name="" id="summernote" cols="30" rows="30"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="file" class="btn btn-info">เอกสารแนบ</label>
                                    <input type="file" class="form-control d-none" id="file">
                                    รองรับไฟล์การอัพโหลด
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary">บันทึก</button>  
                                    <a href="<?php echo route('appeal');?>" class="btn btn-danger">ยกเลิก</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>ความเห็นเจ้าหน้าที่</h4>
                                </div>
                                <div class="col-md-12">
                                    <label for="">กรอกข้อมูล/ความเห็น</label>
                                    <textarea name="" id="summernote" cols="30" rows="30"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="file" class="btn btn-info">เอกสารแนบ</label>
                                    <input type="file" class="form-control d-none" id="file">
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary">บันทึก</button>  
                                    <a href="<?php echo route('appeal');?>" class="btn btn-danger">ยกเลิก</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>

<script>
    $('#appeal').addClass('active');


    $('#summernote').summernote({
        height: 300
    });
</script>
