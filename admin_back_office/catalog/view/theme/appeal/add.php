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
                            <form action="<?php echo route('appeal/add'); ?>" method="post">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="">ช่องทางการร้องเรียน</label>   
                                        <select name="" id="" class="form-control">
                                            <option value="">จดหมาย</option> 
                                            <option value="">เว็บไซต์ และ อีเมล์ </option>
                                            <option value="">Call center </option>
                                            <option value="">ยื่นหนังสือด้วยตนเอง</option>
                                            <option value="">facebook </option>
                                            <option value="">ส่วนด่วน</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">หัวข้อเรื่องร้องเรียน <span class="text-danger">*</span></label>
                                        <select name="topic_id" id="" class="form-control">
                                            <?php foreach($title_topic as $key => $value){ ?>
                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['topic_title']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">เลขประจำตัวประชาชน <span class="text-danger">*</span></label>
                                        <input type="text" name="id_card" class="form-control" placeholder="เลขประจำตัวประชาชน" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="">คำนำหน้า <span class="text-danger">*</span></label>
                                        <select name="name_title" id="" class="form-control" required>
                                            <option value="นาย">นาย</option>
                                            <option value="นาง">นาง</option>
                                            <option value="นางสาว">นางสาว</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">ชื่อ <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" placeholder="ชื่อ" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">นามสกุล <span class="text-danger">*</span></label>
                                        <input type="text" name="lastname" class="form-control" placeholder="นามสกุล" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="">อายุ</label>
                                        <input type="text" name="age" class="form-control" placeholder="อายุ">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">โทรศัพท์บ้าน</label>
                                        <input type="text" name="tel" class="form-control" placeholder="โทรศัพท์บ้าน">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">โทรศัพท์มือถือ <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" class="form-control" placeholder="โทรศัพท์มือถือ" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">e-mail</label>
                                        <input type="text" name="email" class="form-control" placeholder="e-mail">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="">บ้านเลขที่</label>
                                        <input type="text" name="address_no" class="form-control" placeholder="บ้านเลขที่">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">หมู่ที่</label>
                                        <input type="text" name="moo" class="form-control" placeholder="หมู่ที่">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">ชื่อหมู่บ้าน</label>
                                        <input type="text" name="housename" class="form-control" placeholder="ชื่อหมู่บ้าน">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">ซอย</label>
                                        <input type="text" name="soi" class="form-control" placeholder="ซอย">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="">ถนน</label>
                                        <input type="text" name="road" class="form-control" placeholder="ถนน">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="">จังหวัด</label>
                                        <select name="id_provinces" id="provinces" class="form-control">
                                            <option value="">-- จังหวัด --</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">อำเภอ/เขต</label>
                                        <select name="id_amphures" id="amphures" class="form-control">
                                            <option value="">-- อำเภอ/เขต --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <label for="">ตำบล/แขวง</label>
                                        <select name="id_districts" id="districts" class="form-control">
                                            <option value="">-- ตำบล/แขวง --</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">รหัสไปรษณีย์</label>
                                        <input type="text" name="zipcode" id="zipcode" class="form-control"
                                            placeholder="รหัสไปรษณีย์">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <h5 class="text-theme font-weight-bold">รายละเอียดเรื่องร้องเรียน</h5>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="name_topic"
                                                id="exampleRadios1" value="1">
                                            <label class="form-check-label" for="exampleRadios1">
                                                บุคคล
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" name="note_topic" class="form-control note-1"
                                            placeholder="ชื่อ" disabled>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" name="note_topic" class="form-control note-1"
                                            placeholder="นามสกุล" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="name_topic"
                                                id="exampleRadios2" value="2">
                                            <label class="form-check-label" for="exampleRadios2">
                                                กลุ่ม/คณะบุคคล
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="note_topic" id="" cols="30" rows="3" class="form-control note-2"
                                            disabled></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="name_topic"
                                                id="exampleRadios3" value="3">
                                            <label class="form-check-label" for="exampleRadios3">
                                                หน่วยงาน
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="note_topic" id="" cols="30" rows="3" class="form-control note-3"
                                            disabled></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="name_topic"
                                                id="exampleRadios4" value="4">
                                            <label class="form-check-label" for="exampleRadios4">
                                                บริษัท/ห้างร้าน
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="note_topic" id="" cols="30" rows="3" class="form-control note-4"
                                            disabled></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="name_topic"
                                                id="exampleRadios5" value="5">
                                            <label class="form-check-label" for="exampleRadios5">
                                                อื่น ๆ
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="note_topic" id="" cols="30" rows="3" class="form-control note-5"
                                            disabled></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">อ้างอิงเลขหนังสือ</label>
                                        <input type="text" name="number_topic" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <h5>ประเด็นที่ท่านต้องการร้องเรียน/แจ้งข้อเสนอแนะ <span
                                                class="text-danger">*</span></h5>
                                        <textarea name="complain_name" id="" cols="30" rows="10" class="form-control"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <h5>สถานที่/บริเวณที่เกิดเหตุหรือที่ท่านพบเห็นเหตุการณ์</h5>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="">เลขที่</label>
                                        <input type="text" name="t_address_no" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">หมู่ที่</label>
                                        <input type="text" name="t_moo" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="">ชื่อหมู่บ้าน</label>
                                        <input type="text" name="t_housename" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">ซอย</label>
                                        <input type="text" name="t_soi" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="">ถนน</label>
                                        <input type="text" name="t_road" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="">จังหวัด <span class="text-danger">*</span></label>
                                        <select name="t_id_provinces" id="t_provinces" class="form-control" required>
                                            <option value="">-- จังหวัด --</option>
                                            <option value="">จังหวัด</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">อำเภอ/เขต <span class="text-danger">*</span></label>
                                        <select name="t_id_amphures" id="t_amphures" class="form-control" required>
                                            <option value="">-- อำเภอ/เขต --</option>
                                            <option value="">อำเภอ/เขต</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="">ตำบล/แขวง <span class="text-danger">*</span></label>
                                        <select name="t_id_districts" id="t_districts" class="form-control" required>
                                            <option value="">-- ตำบล/แขวง --</option>
                                            <option value="">ตำบล/แขวง</option>
                                        </select>
                                    </div>
                                     <div class="col-md-6">
                                        <label for="">รหัสไปรษณีย์</label>
                                        <input type="text" name="t_zipcode" id="t_zipcode" class="form-control" placeholder="รหัสไปรษณีย์">
                                    </div> 
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">จุดสังเกตหรือสถานที่ใกล้เคียงที่สำคัญ (โปรดระบุ
                                            หากท่านทราบข้อมูล)</label>
                                        <textarea name="place_landmarks" id="" cols="30" rows="5"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">สิ่งที่ต้องการให้กระทรวงพลังงานดำเนินการ <span class="text-danger">*</span></label>
                                        <textarea name="response_person" id="" cols="30" rows="5" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <h5>เอกสารหรือภาพประกอบการร้องเรียน</h5>
                                        <!-- <label for="actual-btn" class="btn btn-upload"><i class="fas fa-folder-plus"></i> แนบไพล์</label> -->
                                        <!-- <input type="file" id="actual-btn" hidden/> -->
                                        <div class="file-upload-wrapper" data-text="Select your file!">
                                          <input name="file-upload-field" type="file" 
                                          class="file-upload-field" id="fileinput" value="">
                                        </div>
                                        <div id="showFileSize"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-danger">หมายเหตุ : รายการข้อมูลทั้งหมดทางระบบจะเก็บเป็นความลับ
                                            ตามพระราชบัญญัติคอมพิวเตอร์ พ.ศ. 2551</p>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-success w-100">ส่งเรื่อง</button>
                                        <!-- <a href="<?php echo route('appeal'); ?>" class="btn btn-dark">ยกเลิก</a> -->
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
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ขนาดไฟล์ภาพเกินที่กำหนด
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<script>
    function idcard(obj){  
    var pattern=new String("_-____-_____-__-_"); // กำหนดรูปแบบในนี้  
    var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้  
    var returnText=new String("");  
    var obj_l=obj.value.length;  
    var obj_l2=obj_l-1;  
    for(i=0;i<pattern.length;i++){             
        if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){  
            returnText+=obj.value+pattern_ex;  
            obj.value=returnText;  
        }  
    }  
    if(obj_l>=pattern.length){  
        obj.value=obj.value.substr(0,pattern.length);             
    }  
}  
function phoneTab(obj){  
    var pattern=new String("___-___-____"); // กำหนดรูปแบบในนี้  
    var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้  
    var returnText=new String("");  
    var obj_l=obj.value.length;  
    var obj_l2=obj_l-1;  
    for(i=0;i<pattern.length;i++){             
        if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){  
            returnText+=obj.value+pattern_ex;  
            obj.value=returnText;  
        }  
    }  
    if(obj_l>=pattern.length){  
        obj.value=obj.value.substr(0,pattern.length);             
    }  
}  
function home(obj){  
    var pattern=new String("__-___-____"); // กำหนดรูปแบบในนี้  
    var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้  
    var returnText=new String("");  
    var obj_l=obj.value.length;  
    var obj_l2=obj_l-1;  
    for(i=0;i<pattern.length;i++){             
        if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){  
            returnText+=obj.value+pattern_ex;  
            obj.value=returnText;  
        }  
    }  
    if(obj_l>=pattern.length){  
        obj.value=obj.value.substr(0,pattern.length);             
    }  
}  
$(document).on('change','#fileinput',function(e){
    $(this).parent(".file-upload-wrapper").attr("data-text",$(this).val().replace(/.*(\/|\\)/, '') );
    var input = document.getElementById('fileinput');
    if (!input.files) { // This is VERY unlikely, browser support is near-universal
        console.error("This browser doesn't seem to support the `files` property of file inputs.");
    } else {
        var file = input.files[0];
        var bytes = parseFloat(file.size);
        var kb = bytes/1024;
        var mb = bytes/1024/1024;
        $('#showFileSize').html(  mb + " mb in size");
        if(mb >= 2){
            $('#exampleModal').modal('show');
            $('#fileinput').val('');
            $('#showFileSize').html('');
            $(this).parent(".file-upload-wrapper").attr("data-text",''.replace(/.*(\/|\\)/, '') );
        }
    }
});
    $('#appeal').addClass('active');
    $(function(e){
        $.ajax({
            type: "GET",
            url: "../index.php?route=get/provinces",
            success: function(data,response){
                console.log(response);
                $('#provinces').html(data);
                $('#t_provinces').html(data);
            }
        });
    });
        

    $('#provinces').on("change",function(){
        let value = $('option:selected', this).attr('data-id');
        $.ajax({
            type: "GET",
            url: "../index.php?route=get/amphures",
            data: {idprovinces:value},
            success: function(data,response){
                console.log(response);
                $('#amphures').html(data);
            }
        });
    });

    $('#amphures').on("change",function(){
        let value = $('option:selected', this).attr('data-id');
        let zipcode = $('option:selected', this).attr('zipcode');
        $.ajax({
            type: "GET",
            url: "../index.php?route=get/tambons",
            data: {idamphures:value},
            success: function(data,response){
                $('#zipcode').val(zipcode);
                console.log(response);
                console.log(data);
                $('#districts').html(data);
            }
        });
    });

    $('#t_provinces').on("change",function(){
        let value = $('option:selected', this).attr('data-id');
        console.log(value);
        $.ajax({
            type: "GET",
            url: "../index.php?route=get/amphures",
            data: {idprovinces:value},
            success: function(data,response){
                console.log(response);
                console.log(data);
                $('#t_amphures').html(data);
            }
        });
    });

    $('#t_amphures').on("change",function(){
        let value = $('option:selected', this).attr('data-id');
        let zipcode = $('option:selected', this).attr('zipcode');
        $.ajax({
            type: "GET",
            url: "../index.php?route=get/tambons",
            data: {idamphures:value},
            success: function(data,response){
                $('#t_zipcode').val(zipcode);
                console.log(response);
                $('#t_districts').html(data);
            }
        });
    });
</script>
<script src="../assets/js/form.js"></script>