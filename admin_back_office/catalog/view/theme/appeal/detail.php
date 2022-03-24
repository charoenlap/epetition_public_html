    <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active"><?php echo $title; ?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo $title; ?></h4>
                            <a href="<?php echo route('appeal'); ?>" class="float-right btn btn-dark btn-sm ml-2">ย้อนกลับ</a> 
                            <a href="#" class="float-right btn btn-danger btn-sm ml-2">ลบ</a> 
                            <a href="#" class="float-right btn btn-warning btn-sm ml-2">แก้ไข</a> 
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
                                                <th>หัวข้อ</th>
                                                <th>หน่วยงานระดับสำนัก</th>
                                                <th>รายละเอียดความก้าวหน้า</th>
                                                <th>ไฟล์แนบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;foreach($getResponse as $val){ ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $val['date_create']; ?></td>
                                                <td><?php echo $val['appeal_title'];?></td>
                                                <td><?php echo $val['agency_minor_title'];?></td>
                                                <td><?php echo $val['note'];?></td>
                                                <td>
                                                    <?php if($val['file']){?>
                                                        <a href="#" class="btn btn-primary btn-xs">ไฟล์แนบ</a>
                                                    <?php }else{?>
                                                        -
                                                    <?php } ?>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ความคิดเห็น</h4>
                        </div>
                        <div class="card-body">
                            <form action="#" method="POST"  id="form-sender">
                                <input type="hidden" name="id_response" value="<?php echo $id;?>">
                                <?php foreach($getComment as $val){ ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-primary">
                                                <h4 class="card-title"><?php echo $val['agency_minor_title']; ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <p><?php echo $val['FIRSTNAME'].' '.$val['LASTNAME']; ?></p>
                                                    </div>
                                                    <div class="col-10">
                                                        <small>วันที่ : <?php echo $val['date_create']; ?></small>
                                                        <?php echo $val['note']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">กรอกข้อมูล/ความเห็น</label>
                                        <textarea name="note" id="summernote" cols="30" rows="30"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="checkbox">
                                        <label for="">อนุมัติเรื่อง</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="checkbox">
                                        <label for="">ส่งต่อไปยังกรม</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" placeholder="ข้อความเพิ่มเติม">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="file" class="btn btn-info">เอกสารแนบ</label>
                                        <input type="file" class="form-control d-none" id="file" accept="image/*,video/*">
                                        รองรับไฟล์การอัพโหลด  doc , docx , pdf , xls , xlsx , jpeg , png , mp4 , wav เท่านั้น
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <select name="status" id="status" class="form-control">
                                            <option value="2" <?php echo ($status=="2"?'selected':''); ?> >เรื่องร้องเรียน/ร้องทุกข์อยู่ระหว่างการดำเนินการ</option>
                                            <option value="3" <?php echo ($status=="3"?'selected':''); ?> >เรื่องร้องเรียน/ร้องทุกข์อีก 7 วันจะครบกำหนด</option>
                                            <option value="4" <?php echo ($status=="4"?'selected':''); ?> >เรื่องร้องเรียน/ร้องทุกข์ที่ยังไม่เสร็จ และช้ากว่ากำหนด</option>
                                            <option value="1" <?php echo ($status=="1"?'selected':''); ?> >เรื่องร้องเรียน/ร้องทุกข์ที่ดำเนินการเสร็จสิ้นแล้ว</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary">บันทึก</button>  
                                        <a href="<?php echo route('appeal');?>" class="btn btn-danger">ยกเลิก</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <form action="" method="post" id="form-sender">
                        <input type="hidden" name="id_response" value="<?php echo $id;?>">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ข้อเสนอแนวทางการพิจารณาดําเนินการ</h4>
                            </div>
                            <div class="card-body">
                                <?php if($active_add){ ?>
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <label for="">ประเด็นเรื่องร้องเรียน</label>
                                        <select name="id_appeal" id="id_appeal" class="form-control">
                                            <option value="">เลือกประเด็นเรื่องร้องเรียน</option>
                                            <?php foreach($appeal->rows as $val){?>
                                                <option value="<?php echo $val['id'];?>"><?php echo $val['appeal_title'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>  
                                    <div class="col-md-3">
                                        <label for="">เลือกหน่วยงาน</label>
                                        <select name="id_agency" id="id_agency" class="form-control">
                                            <option value="">เลือกหน่วยงาน</option>
                                            <?php foreach($agency->rows as $val){?>
                                                <option value="<?php echo $val['id'];?>"><?php echo $val['agency_title'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">เลือกหน่วยงานระดับส่วน</label>
                                        <select name="id_agency_minor" id="id_agency_minor" class="form-control">
                                            <option value="">ทั้งหมด</option>
                                            <?php foreach($agencyMinor->rows as $val){?>
                                                <option value="<?php echo $val['id'];?>"><?php echo $val['agency_minor_title'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-primary" id="addFrom"><i class="fas fa-folder-plus"></i> <br>เพิ่ม</a>
                                    </div>
                                </div>
                                <?php }?>
                                <table class="table-striped table" id="sender">
                                    <thead></thead>
                                    <tbody class="body">
                                        <?php foreach($getResponse as $val){?>
                                            <tr>
                                                <td><?php echo $val['appeal_title'];?></td>
                                                <td><?php echo $val['agency_minor_title'];?></td>
                                                <td>
                                                    <?php if($active_del){ ?>
                                                    <a href="#" class="btn btn-danger delForm" data-id="<?php echo $val['id'];?>">ลบ</a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php if($active_add){ ?>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <input type="checkbox" id="chkSendEmail" checked>
                                        <label for="chkSendEmail">ส่งอีเมลแจ้งเตือนให้หน่วยงาน</label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-dark" style="width:150px;" id="btn-sender" type="submit">ส่งเรื่อง</button>
                                        <a href="<?php echo route('appeal');?>" class="btn btn-light">กลับหน้าหลัก</a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </form>
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
    $(document).on('submit','#form-sender',function(e){
        var form = $(this);
        $.ajax({
            url: 'index.php?route=appeal/sender',
            type: 'POST',
            dataType: 'json',
            data: form.serialize(),
        })
        .done(function(data) {
            console.log(data);
            // alert('บันทึกเรียบร้อย');
            console.log("success");
        })
        .fail(function(a,b,c) {
            console.log(a);
            console.log(b);
            console.log(c);
        })
        .always(function() {
            console.log("complete");
        });
        e.preventDefault();
    });
    $(document).on('click','#addFrom',function (e) { 
        // alert('บันทึกเรียบร้อย');
        var id_appeal = $( "#id_appeal" );
        var id_agency = $( "#id_agency" );
        var id_agency_minor = $( "#id_agency_minor" );
        if(id_appeal.val()!='' && id_agency.val()!=''){
            var html = '<tr>'+
                            '<td>'+$( "#id_appeal option:selected" ).text()+
                                '<input type="hidden" name="id_appeal[]" value="'+id_appeal.val()+'">'+
                            '</td>'+
                            '<td>'+$( "#id_agency option:selected" ).text()+
                                '<input type="hidden" name="id_agency[]" value="'+id_agency.val()+'">'+
                            '</td>'+
                            '<td>'+$( "#id_agency_minor option:selected" ).text()+
                                '<input type="hidden" name="id_agency_minor[]" value="'+id_agency_minor.val()+'">'+
                            '</td>'+
                             '<td>'+
                                '<a href="#" class="btn btn-danger delForm">ลบ</a>'+
                            '</td>'+
                        '</tr>';
            $('#sender').append(html);
        }
    });
    $(document).on( "click",".delForm", function(e) {
        if($(this).attr('data-id')!=''){
            $.ajax({
                url: 'index.php?route=appeal/delSender',
                type: 'POST',
                dataType: 'json',
                data: {id: $(this).attr('data-id')},
            })
            .done(function() {
                console.log("success");
            })
            .fail(function(a,b,c) {
                console.log(a);
                console.log(b);
                console.log(c);
            })
            .always(function() {
                console.log("complete");
            });
            
        }
        $(this).parent().parent().remove();
        e.preventDefault();
    });
    $(document).on('submit','#form-sender',function(e){
        var form = $(this);
        $.ajax({
            url: 'index.php?route=appeal/comment',
            type: 'POST',
            dataType: 'json',
            data: form.serialize(),
        })
        .done(function(data) {
            alert('บันทึกเข้าระบบเรียบร้อย');
            console.log(data);
            console.log("success");
        })
        .fail(function(a,b,c) {
            console.log(a);
            console.log(b);
            console.log(c);
        })
        .always(function() {
            console.log("complete");
        });
        e.preventDefault();
    });
    $('#appeal').addClass('active');


    $('#summernote').summernote({
        height: 300
    });
</script>
