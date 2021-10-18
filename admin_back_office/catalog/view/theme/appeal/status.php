  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">บันทึกรับเรื่องร้องเรียน</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">บันทึกรับเรื่องร้องเรียน</li>
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
                            <h4 class="card-title">บันทึกรับเรื่องร้องเรียน</h4>
                            <a href="<?php echo route('appeal'); ?>" class="float-right btn btn-dark btn-sm">ย้อนกลับ</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered table-primary">
                                        <tbody>
                                            <tr>
                                                <td>Ticket ID : 00001</td>
                                            </tr>
                                            <tr>
                                                <td>วันที่เรื่องร้องเรียนเข้าระบบ : 12/10/2021</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped table-primary">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th colspan="2">ข้อมูลผู้ร้องเรียน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">เลขประจำตัวประชาชน : 123456789123</td>
                                            </tr>
                                            <tr>
                                                <td width="50%">ชื่อ : </td>
                                                <td>นามสกุล : </td>
                                            </tr>
                                            <tr>
                                                <td>เพศ : </td>
                                                <td>อายุ : </td>
                                            </tr>
                                            <tr>
                                                <td>โทรศัพท์บ้าน : 0213546879 ,โทรศัพท์มือถือ : 0213654789</td>
                                                <td>e-mail : </td>
                                            </tr>
                                            <tr>
                                                <td>บ้านเลขที่ : 123</td>
                                                <td>หมู่ที่ : 1</td>
                                            </tr>
                                            <tr>
                                                <td>ชื่อหมู่บ้าน :  ss</td>
                                                <td>ซอย : ss</td>
                                            </tr>
                                            <tr>
                                                <td>ถนน : ss</td>
                                                <td>จังหวัด : ss</td>
                                            </tr>
                                            <tr>
                                                <td>อำเภอ/เขต : ss</td>
                                                <td>ตำบล/แขวง : ss</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">รหัสไปรษณีย์</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered table-striped table-success">
                                        <thead class="bg-success">
                                            <tr>
                                                <th colspan="2">รายละเอียดเรื่องร้องเรียน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>บุคคล/หน่วยงาน/สถานที่ที่ต้องการร้องเรียน </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>บริเวณที่เกิดเหตุ</td>
                                                <td>เลขที่ หมู่บ้าน ซอย ถนน ตำบลบางโพงพาง อำเภอเขตยานนาวา จังหวัดกรุงเทพมหานคร</td>
                                            </tr>
                                            <tr>
                                                <td>จุดสังเกตหรือสถานที่ใกล้เคียงที่สำคัญ (โปรดระบุ หากท่านทราบข้อมูล)</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>สิ่งที่ต้องการให้กระทรวงพลังงานดำเนินการ</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>เอกสารแนบ</td>
                                                <td></td>
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
                            <h4 class="card-title">ประเภทปัญหา</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="">ประเภทปัญหา</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">เลือกประเภทปัญหา</option>
                                    </select>
                                </div>  
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="">เลือกหน่วยงาน</label>
                                </div>
                                <div class="col-md-6">
                                    <select name="" id="" class="form-control">
                                        <option value="">เลือกหน่วยงาน</option>
                                        <option value="">กตร</option>
                                        <option value="">หน่วยงานกรม/รัฐวิสาหกิจ/องค์การมหาชน</option>
                                        <option value="">ทสจ</option>
                                        <option value="">สสภ</option>
                                    </select>
                                    <!-- <button class="btn btn-primary">เลือกหน่วยงาน</button> -->
                                </div>
                                <div class="col-md-6">
                                    <select name="" id="" class="form-control">
                                        <option value="">เลือกหน่วยงาน</option>
                                        <option value="">1. ปม.</option>
                                        <option value="">2. อส.</option>
                                        <option value="">3. ทช.</option>
                                        <option value="">4. ทธ.</option>
                                        <option value="">5. ทน.</option>
                                        <option value="">6. ทบ.</option>
                                        <option value="">7. คพ.</option>
                                        <option value="">8. สผ.</option>
                                        <option value="">9. สส.</option>
                                        <option value="">10. อ.อ.ป.</option>
                                        <option value="">11. อสส.</option>
                                        <option value="">12. อ.ส.พ.</option>
                                        <option value="">13. อบก.</option>
                                        <option value="">14. สพภ.</option>
                                    </select>
                                    <!-- <button class="btn btn-primary">เลือกหน่วยงาน</button> -->
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>หน่วยงาน</th>
                                                <th style="width:100px;">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>อื่นๆ</td>
                                                <td><a href="#" class="btn btn-primary">เลือก</a></td>
                                            </tr>
                                        </tbody>
                                    </table>   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary">ส่งเรื่อง</button>
                                    <a href="<?php echo route('appeal');?>" class="btn btn-danger">ยกเลิก</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
<script>
    $('#appeal').addClass('active');
</script>