

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
                            <a href="<?php echo route('appeal/detail&id='.$id);?>" class="float-right btn btn-dark btn-sm ml-2">ย้อนกลับ</a> 

                            <!-- <a href="<?php echo route('appeal/del&id='.$id); ?>" class="float-right btn btn-danger btn-sm ml-2 btn-del">ลบ</a> --> 
                        </div>
                        <div class="card-body">
                            <?php $addBy = (int)$data['addBy']; ?>
                            <form action="<?php echo route('appeal/edit&id='.$data['id']); ?>" method="post">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="">ช่องทางการร้องเรียน</label>   
                                        <select name="addBy" id="addBy" class="form-control">
                                            <option value="0" <?php echo ($data['addBy']==0?'selected':'');?>>เว็บไซต์</option>
                                            <option value="1" <?php echo ($data['addBy']==1?'selected':'');?>>แอฟพิเคชั่น</option>
                                            <option value="2" <?php echo ($data['addBy']==2?'selected':'');?>>สปน</option>
                                            <option value="3" <?php echo ($data['addBy']==3?'selected':'');?>>ยื่นหนังสือด้วยตนเอง</option>
                                            <option value="4" <?php echo ($data['addBy']==4?'selected':'');?>>จดหมาย</option>
                                            <option value="5" <?php echo ($data['addBy']==5?'selected':'');?>>หมายเลขโทรศัพท์</option>
                                            <option value="6" <?php echo ($data['addBy']==6?'selected':'');?>>สายด่วน</option>
                                            <option value="7" <?php echo ($data['addBy']==7?'selected':'');?>>อีเมล</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">หัวข้อเรื่องร้องเรียน <span class="text-danger">*</span></label>
                                        <select name="topic_id" id="" class="form-control">
                                            <?php foreach($title_topic as $key => $value){ ?>
                                            <option value="<?php echo $value['id']; ?>" <?php if($data['topic_id']==$value['id']){ echo "selected"; } ?>><?php echo $value['topic_title']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">เลขประจำตัวประชาชน</label>
                                        <input type="text" name="id_card" class="form-control" placeholder="เลขประจำตัวประชาชน" value="<?php echo $data['id_card']; ?>" onkeyup="idcard(this);" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="">คำนำหน้า <span class="text-danger">*</span></label>
                                        <select name="name_title" id="" class="form-control" <?php echo ($addBy==0?'readonly':'')?>>
                                            <option value="นาย" <?php if($data['name_title']=="นาย"){ echo "selected"; } ?>>นาย</option>
                                            <option value="นาง" <?php if($data['name_title']=="นาง"){ echo "selected"; } ?>>นาง</option>
                                            <option value="นางสาว" <?php if($data['name_title']=="นางสาว"){ echo "selected"; } ?>>นางสาว</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">ชื่อ <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" placeholder="ชื่อ" value="<?php echo $data['name']; ?>" <?php echo ($addBy==0?'readonly':'')?>>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">นามสกุล <span class="text-danger">*</span></label>
                                        <input type="text" name="lastname" class="form-control" placeholder="นามสกุล" value="<?php echo $data['lastname']; ?>" <?php echo ($addBy==0?'readonly':'')?>>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="">อายุ</label>
                                        <input type="text" name="age" class="form-control" placeholder="อายุ" value="<?php echo $data['age']; ?>" <?php echo ($addBy==0?'readonly':'')?>>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">โทรศัพท์บ้าน</label>
                                        <input type="text" name="tel" class="form-control" placeholder="โทรศัพท์บ้าน" value="<?php echo $data['tel']; ?>" <?php echo ($addBy==0?'readonly':'')?>>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">โทรศัพท์มือถือ <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" class="form-control" 
                                        oninvalid="this.setCustomValidity('โปรดระบุข้อมูลให้ครบถ้วน')"
                                        oninput="this.setCustomValidity('')" 
                                        size="25" 
                                        onkeyup="phoneTab(this)"  minlength="10" maxlength="12" 
                                        value="<?php echo $data['phone']; ?>" <?php echo ($addBy==0?'readonly':'')?>>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">e-mail</label>
                                        <input type="text" name="email" class="form-control" placeholder="e-mail" value="<?php echo $data['email']; ?>" <?php echo ($addBy==0?'readonly':'')?>>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="">บ้านเลขที่</label>
                                        <input type="text" name="address_no" class="form-control" placeholder="บ้านเลขที่" value="<?php echo $data['address_no']; ?>" <?php echo ($addBy==0?'readonly':'')?>>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">หมู่ที่</label>
                                        <input type="text" name="moo" class="form-control" placeholder="หมู่ที่" value="<?php echo $data['moo']; ?>" <?php echo ($addBy==0?'readonly':'')?>>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">ชื่อหมู่บ้าน</label>
                                        <input type="text" name="housename" class="form-control" placeholder="ชื่อหมู่บ้าน" value="<?php echo $data['housename']; ?>" <?php echo ($addBy==0?'readonly':'')?>>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">ซอย</label>
                                        <input type="text" name="soi" class="form-control" placeholder="ซอย" value="<?php echo $data['soi']; ?>" <?php echo ($addBy==0?'readonly':'')?>>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="">ถนน</label>
                                        <input type="text" name="road" class="form-control" placeholder="ถนน" value="<?php echo $data['road']; ?>" <?php echo ($addBy==0?'readonly':'')?>>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="">จังหวัด</label>
                                        <select name="id_provinces" id="provinces" class="form-control" <?php echo ($addBy==0?'readonly':'')?>>
                                            <option value="<?php echo $data['id_provinces']; ?>"><?php echo $data['id_provinces']; ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">อำเภอ/เขต</label>
                                        <select name="id_amphures" id="amphures" class="form-control" <?php echo ($addBy==0?'readonly':'')?>>
                                            <option value="<?php echo $data['id_provinces']; ?>"><?php echo $data['id_amphures']; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <label for="">ตำบล/แขวง</label>
                                        <select name="id_districts" id="districts" class="form-control" <?php echo ($addBy==0?'readonly':'')?>>
                                            <option value="<?php echo $data['id_provinces']; ?>"><?php echo $data['id_districts']; ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">รหัสไปรษณีย์</label>
                                        <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="รหัสไปรษณีย์" value="<?php echo $data['zipcode']; ?>" <?php echo ($addBy==0?'readonly':'')?>>
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
                                            <input class="form-check-input" type="radio" name="name_topic" id="exampleRadios1" value="1" <?php if($data['name_topic']=="1"){ echo "checked"; } ?>>
                                            <label class="form-check-label" for="exampleRadios1">
                                                บุคคล
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="note_topic" class="form-control note-1" placeholder="ชื่อ-นามสกุล" value="<?php echo ($data['name_topic']=="1"?$data['note_topic']:''); ?>" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="name_topic" id="exampleRadios2" value="2" <?php if($data['name_topic']=="2"){ echo "checked"; } ?>>
                                            <label class="form-check-label" for="exampleRadios2">
                                                กลุ่ม/คณะบุคคล
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="note_topic" id="" cols="30" rows="3" class="form-control note-2" disabled><?php echo ($data['name_topic']=="2"?$data['note_topic']:''); ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="name_topic" id="exampleRadios3" value="3" <?php if($data['name_topic']=="3"){ echo "checked"; } ?>>
                                            <label class="form-check-label" for="exampleRadios3">
                                                หน่วยงาน
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="note_topic" id="" cols="30" rows="3" class="form-control note-3" disabled><?php echo ($data['name_topic']=="3"?$data['note_topic']:''); ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="name_topic" id="exampleRadios4" value="4" <?php if($data['name_topic']=="4"){ echo "checked"; } ?>>
                                            <label class="form-check-label" for="exampleRadios4">
                                                บริษัท/ห้างร้าน
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="note_topic" id="" cols="30" rows="3" class="form-control note-4" disabled><?php echo ($data['name_topic']=="4"?$data['note_topic']:''); ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="name_topic" id="exampleRadios5" value="5" <?php if($data['name_topic']=="5"){ echo "checked"; } ?>>
                                            <label class="form-check-label" for="exampleRadios5">
                                                อื่น ๆ
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="note_topic" id="" cols="30" rows="3" class="form-control note-5" disabled><?php echo ($data['name_topic']=="5"?$data['note_topic']:''); ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">อ้างอิงเลขหนังสือ</label>
                                        <input type="text" name="number_topic" class="form-control" value="<?php echo $data['number_topic']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <h5>ประเด็นที่ท่านต้องการร้องเรียน/แจ้งข้อเสนอแนะ <span class="text-danger">*</span></h5>
                                        <textarea name="complain_name" id="" cols="30" rows="10" class="form-control"><?php echo $data['complain_name']; ?></textarea>
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
                                        <input type="text" name="t_address_no" class="form-control" value="<?php echo $data['t_address_no']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">หมู่ที่</label>
                                        <input type="text" name="t_moo" class="form-control" value="<?php echo $data['t_moo']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="">ชื่อหมู่บ้าน</label>
                                        <input type="text" name="t_housename" class="form-control" value="<?php echo $data['t_housename']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">ซอย</label>
                                        <input type="text" name="t_soi" class="form-control" value="<?php echo $data['t_soi']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="">ถนน</label>
                                        <input type="text" name="t_road" class="form-control" value="<?php echo $data['t_road']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="">จังหวัด <span class="text-danger">*</span></label>
                                        <select name="t_id_provinces" id="t_provinces" class="form-control">
                                            <option value="<?php echo $data['t_id_provinces']; ?>"><?php echo $data['t_id_provinces']; ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">อำเภอ/เขต <span class="text-danger">*</span></label>
                                        <select name="t_id_amphures" id="t_amphures" class="form-control">
                                            <option value="<?php echo $data['t_id_amphures']; ?>"><?php echo $data['t_id_amphures']; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="">ตำบล/แขวง <span class="text-danger">*</span></label>
                                        <select name="t_id_districts" id="t_districts" class="form-control">
                                            <option value="<?php echo $data['t_id_districts']; ?>"><?php echo $data['t_id_districts']; ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">รหัสไปรษณีย์</label>
                                        <input type="text" name="t_zipcode" id="t_zipcode" class="form-control" placeholder="รหัสไปรษณีย์" value="<?php echo $data['t_id_districts']; ?>">
                                    </div> 
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">จุดสังเกตหรือสถานที่ใกล้เคียงที่สำคัญ (โปรดระบุหากท่านทราบข้อมูล)</label>
                                        <textarea name="place_landmarks" id="" cols="30" rows="5" class="form-control"><?php echo $data['place_landmarks']; ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">สิ่งที่ต้องการให้กระทรวงพลังงานดำเนินการ <span class="text-danger">*</span></label>
                                        <textarea name="response_person" id="" cols="30" rows="5" class="form-control"><?php echo $data['response_person']; ?></textarea>
                                    </div>
                                </div>
                                <?php /* ?>
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
                                <?php */?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-danger">หมายเหตุ: พรบ. คอมพิวเตอร์เป็นพระราชบัญญัติคุ้มครองข้อมูลส่วนบุคคล พ.ศ.2562</p>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-theme btn-lg">ส่งเรื่อง</button>
                                        <a href="<?php echo route('appeal'); ?>" class="btn btn-dark btn-lg">ยกเลิก</a>
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
      $('.btn-del').click(function(event){
        if(confirm('ลบข้อมูล')==true){
            window.location.href = $(this).attr('href');
        }else{
            event.preventDefault();
        }
    });
</script>
<script>

    $('#appeal').addClass('active');
function idcard(obj){  
    // var txtbox = obj;
    // obj.value = a;
    // console.log(a);
    // var vchar = String.fromCharCode(obj.keyCode);
    // console.log(vchar);
    // if ((vchar<'0' || vchar>'9') && (vchar != '-')) return false;
    // obj.onKeyPress=vchar;


    var pattern=new String("_-____-_____-__-_"); // กำหนดรูปแบบในนี้  
    var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้  
    var returnText=new String("");  
    var obj_l=obj.value.length;  
    var obj_l2=obj_l-1;  
    for(i=0;i<pattern.length;i++){             
        if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){  
            returnText+= obj.value+pattern_ex;  
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
    // var value = $('input[name=name_topic]:checked').val();
    // if(value=="1"){
    //     $('.note-1').removeAttr('disabled');
    //     $('.note-2').val('');
    //     $('.note-3').val('');
    //     $('.note-4').val('');
    //     $('.note-5').val('');
    // }else if(value=="2"){
    //     $('.note-2').removeAttr('disabled');
    //     $('.note-1').val('');
    //     $('.note-3').val('');
    //     $('.note-4').val('');
    //     $('.note-5').val('');
    // }else if(value=="3"){
    //     $('.note-3').removeAttr('disabled');
    //     $('.note-1').val('');
    //     $('.note-2').val('');
    //     $('.note-4').val('');
    //     $('.note-5').val('');
    // }else if(value=="4"){
    //     $('.note-4').removeAttr('disabled');
    //     $('.note-1').val('');
    //     $('.note-2').val('');
    //     $('.note-3').val('');
    //     $('.note-5').val('');
    // }else if(value=="5"){
    //     $('.note-5').removeAttr('disabled');
    //     $('.note-1').val('');
    //     $('.note-2').val('');
    //     $('.note-3').val('');
    //     $('.note-4').val('');
    // }
</script>
<script src="../assets/js/form.js"></script>