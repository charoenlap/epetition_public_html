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

    <section class="content">
        <?php if($active_view){ ?>
        <div class="container-fluid">
            <?php if($error){ ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger"><?php echo $error;?></div>
                </div>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo $title; ?></h4>
                            <a href="<?php echo route('appeal/opm'); ?>" class="float-right btn btn-dark btn-sm">ย้อนกลับ</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered table-primary">
                                        <tbody>
                                            <tr>
                                                <td>Case code : <?php echo $case_code; ?></td>
                                            </tr>
                                            <tr>
                                                <td>วันที่เรื่องร้องเรียนเข้าระบบ : <?php echo (isset($getCase['ShowDateTime'])?$getCase['ShowDateTime']:'');?></td>
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
                                                <td colspan="2">เลขประจำตัวประชาชน : <?php echo (isset($getCase['account']['citizen_id'])?$getCase['account']['citizen_id']:''); ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">ประเภทผู้ร้องเรียน : <?php echo (isset($getCase['account']['account_type_text'])?$getCase['account']['account_type_text']:''); ?></td>
                                            </tr>
                                            <tr>
                                                <td width="50%">ชื่อสกุล : <?php echo (isset($getCase['account']['firstname_th'])?$getCase['account']['firstname_th']:'').' '.(isset($getCase['account']['lastname_th'])?$getCase['account']['lastname_th']:''); ?></td>
                                                <td>อายุ :  ปี</td>
                                            </tr>
                                            <?php
                                            if(isset($getCase['account']['list_account_detail'])){
                                            foreach($getCase['account']['list_account_detail'] as $lcd){ ?>
                                            <tr>
                                                <td>รายละเอียดติดต่อเพิ่มเติม</td>
                                                <td><?php echo $lcd['detail']; ?></td>
                                            </tr>
                                            <?php } ?>
                                            <?php } ?>
                                            <tr>
                                                <td>บ้านเลขที่ : <?php echo (isset($getCase['account']['address'])?$getCase['account']['address']:''); ?></td>
                                                <td>หมู่ที่ : </td>
                                            </tr>
                                            <tr>
                                                <td>ชื่อหมู่บ้าน :  </td>
                                                <td>ซอย : </td>
                                            </tr>
                                            <tr>
                                                <td>ถนน : </td>
                                                <td>จังหวัด : <?php echo (isset($getCase['account']['province_text'])?$getCase['account']['province_text']:''); ?></td>
                                            </tr>
                                            <tr>
                                                <td>อำเภอ/เขต : <?php echo (isset($getCase['account']['district_text'])?$getCase['account']['district_text']:''); ?></td>
                                                <td>ตำบล/แขวง : <?php echo (isset($getCase['account']['subdistrict_text'])?$getCase['account']['subdistrict_text']:''); ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">รหัสไปรษณีย์ : <?php echo (isset($getCase['account']['postcode'])?$getCase['account']['postcode']:''); ?></td>
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
                                                <td>รหัสเรื่องร้องเรียน </td>
                                                <td><?php echo (isset($getCase['case_code'])?$getCase['case_code']:'');?></td>
                                            </tr>
                                            <tr>
                                                <td>บุคคล/หน่วยงาน/สถานที่ที่ต้องการร้องเรียน </td>
                                                <td><?php echo (isset($getCase['inform_to_text'])?$getCase['inform_to_text']:'');?></td>
                                            </tr>
                                            <tr>
                                                <td>บริเวณที่เกิดเหตุ</td>
                                                <td><?php echo (isset($getCase['type_text'])?$getCase['type_text']:'');?></td>
                                            </tr>
                                            <tr>
                                                <td>หัวข้อเรื่องร้องเรียน</td>
                                                <td><?php echo (isset($getCase['summary'])?$getCase['summary']:'');?></td>
                                            </tr>
                                            <tr>
                                                <td>สิ่งที่ต้องการให้กระทรวงพลังงานดำเนินการ</td>
                                                <td><?php echo (isset($getCase['detail'])?$getCase['detail']:'');?></td>
                                            </tr>
                                            <tr>
                                                <td>สถานะเรื่องร้องเรียน</td>
                                                <td><?php echo (isset($getCase['status_text'])?$getCase['status_text']:'');?></td>
                                            </tr>
                                            <?php if(isset($getCase['list_case_attachment'])){ ?>
                                            <tr>
                                                <td>เอกสารแนบ</td>
                                                <td>
                                                    <?php foreach($getCase['list_case_attachment'] as $attach){?>
                                                    <p><a href="<?php echo $attach['attachment_id'];?>"><?php echo $attach['file_name'];?></a></p>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
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
                                            <?php 
                                            if($result_TimelineOperating){
                                                $i=1;
                                                foreach($result_TimelineOperating as $val){
                                                ?>
                                                <tr>
                                                    <td><?php echo $i++;?></td>
                                                    <td>
                                                        <?php echo $val['operating_date'];?><br>
                                                    <?php echo $val['operating_code']; ?></td>
                                                    
                                                    <td>
                                                        <p><img src="<?php echo $val['image_base_64'];?>" class="img-circle " alt="" width="30px;"height="auto"> <?php echo $val['officer_text'];?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $val['org_text'];?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $val['operating_objective_text']; ?></p>
                                                        <p><?php echo $val['status_text'];?></p>
                                                        </p>                                                <p><?php echo $val['operating_type_text']; ?></p>
                                                        <?php echo $val['detail'];?>
                                                    </td>
                                                    <td>
                                                        <?php if($val['attachments']){ ?>
                                                        <?php foreach($val['attachments'] as $att){?>
                                                        <a href="<?php echo $att['attachment_id'];?>"><?php echo $att['file_name'];?></a>
                                                        <?php } ?>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            <?php }else{?>
                                                <tr>
                                                    <td colspan="100">ไม่พบความก้าวหน้า</td>
                                                </tr>
                                            <?php } ?>
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
                                <?php if(isset($getCase['list_case_org_owner'])){ ?>
                                <?php foreach($getCase['list_case_org_owner'] as $val){ ?>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <h4 class="card-title"><?php echo $val['org_text']; ?></h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <p><?php echo $val['case_org_status_text']; ?></p>
                                                </div>
                                                <div class="col-9">
                                                    <?php echo $val['case_org_summary_result'];?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php }else{?>
                                    <div class="col-12">ไม่มีความคิดเห็น</div>
                                <?php } ?>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <label for="">กรอกข้อมูล/ความเห็น</label>
                                    <textarea name="" id="summernote" cols="30" rows="30"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="file" class="btn btn-info">เอกสารแนบ</label>
                                    <input type="file" class="form-control d-none" id="file">
                                    รองรับไฟล์การอัพโหลด  word, pdf, excel , jpeg เท่านั้น
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary">บันทึก</button>
                                    <a href="" class="btn btn-danger">ยกเลิก</a>
                                </div>
                            </div> -->
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
                                    <a href="" class="btn btn-danger">ยกเลิก</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <?php if($active_add){?>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">บันทึกผลสรุปการปฏิบัติงานของหน่วยงาน</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <select name="" id="status_id" class="form-control">
                            <option value="0">อยู่ระหว่างดำเนินการ</option>
                            <option value="1">ยุติเรื่อง</option>
                            <option value="2">รับทราบไว้ชั้นต้น</option>
                            <option value="3">ไม่อยู่ในอำนาจหน้าที่</option>
                        </select>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label for="">ผลกํารปฏิบัติงานแจ้งผู้ร้อง</label>
                            <textarea name="" id="result" cols="10" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <input type="button" class="btn btn-primary" value="บันทึกสถานะ" id="btn-save-status">
                            <div class="alert alert-success mt-2 d-none" id="text-response"></div>
                        </div>
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
                <script>
                $(document).on('click','#btn-save-status',function(e){
                $.ajax({
                url: 'index.php?route=home/setOrgSummaryResult',
                type: 'GET',
                dataType: 'json',
                data: {
                token_id: '<?php echo $token_id;?>',
                case_id: '<?php echo $case_id;?>',
                status_id: $('#status_id').val(),
                result: $('#result').val()
                },
                })
                .done(function(json) {
                $('#text-response').removeClass('d-none');
                console.log(json);
                $('#text-response').text('Response form OPM API: '+json);
                console.log("success");
                })
                .fail(function() {
                console.log("error");
                })
                .always(function() {
                console.log("complete");
                });
                
                });
                $('#appeal').addClass('active');
                $('#summernote').summernote({
                height: 300
                });
                </script>