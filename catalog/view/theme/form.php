<div class="breadcrumb-theme">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul>
            <li><a href="<?php echo route('home'); ?>">หน้าหลัก</a></li>
            <li class="active" aria-current="page">แจ้งเรื่องร้องเรียน</li>
          </ul>
        </div> 
      </div>
    </div>
</div>
<section class="py-5">
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <h5 class="text-theme font-weight-bold">ข้อมูลผู้ร้องเรียน</h5>
            </div>
        </div>
        <form action="<?php echo route('home/form'); ?>" method="post">
            <input type="hidden" name="topic_id" value="<?php echo $topic_id;?>">
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="">เลขประจำตัวประชาชน <span class="text-danger">*</span></label>
                <input type="text" name="id_card" id="id_card" class="form-control" placeholder="x-xxxxx-xxxxx-xx-x" required 
                size="30" onkeyup="idcard(this)"  minlength="15" maxlength="25" >
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
            <div class="col-md-6">
                <label for="">อายุ</label>
                <input type="text" name="age" class="form-control" placeholder="อายุ">
            </div>
            <div class="col-md-6">
                <label for="">โทรศัพท์บ้าน</label>
                <input type="text" name="tel" class="form-control" placeholder="โทรศัพท์บ้าน" 
                size="25" onkeyup="home(this)"  minlength="9" maxlength="11"
                >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="">โทรศัพท์มือถือ <span class="text-danger">*</span></label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="โทรศัพท์มือถือ" required
                size="25" onkeyup="phoneTab(this)"  minlength="10" maxlength="12" >
            </div>
            <div class="col-md-6">
                <label for="">e-mail</label>
                <input type="text" name="email" class="form-control" placeholder="e-mail">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="">บ้านเลขที่</label>
                <input type="text" name="address_no" class="form-control" placeholder="บ้านเลขที่">
            </div>
            <div class="col-md-6">
                <label for="">หมู่ที่</label>
                <input type="text" name="moo" class="form-control" placeholder="หมู่ที่">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="">ชื่อหมู่บ้าน</label>
                <input type="text" name="housename" class="form-control" placeholder="ชื่อหมู่บ้าน">
            </div>
            <div class="col-md-6">
                <label for="">ซอย</label>
                <input type="text" name="soi" class="form-control" placeholder="ซอย">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="">ถนน</label>
                <input type="text" name="road" class="form-control" placeholder="ถนน">
            </div>
            <div class="col-md-6">
                <label for="">ภาค</label>
                <select name="id_geographies" id="geographies" class="form-control">
                    <option value="">-- เลือก --</option>
                    <?php foreach($geographies as $key => $value){ ?>
                        <option value="<?php echo $value['name']; ?>" data-id="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                    <?php } ?>
                </select>
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
                <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="รหัสไปรษณีย์">
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
                    <input class="form-check-input" type="radio" name="name_topic" id="exampleRadios1" value="1">
                    <label class="form-check-label" for="exampleRadios1">
                        บุคคล
                    </label>
                </div>
            </div>
            <div class="col-md-5">
                <input type="text" name="note_topic" class="form-control note-1" placeholder="ชื่อ" disabled>
            </div>
            <div class="col-md-5">
                <input type="text" name="note_topic" class="form-control note-1" placeholder="นามสกุล" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="name_topic" id="exampleRadios2" value="2">
                    <label class="form-check-label" for="exampleRadios2">
                        กลุ่ม/คณะบุคคล
                    </label>
                </div>
            </div>
            <div class="col-md-10">
                <textarea name="note_topic" id="" cols="30" rows="3" class="form-control note-2" disabled></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="name_topic" id="exampleRadios3" value="3">
                    <label class="form-check-label" for="exampleRadios3">
                        หน่วยงาน
                    </label>
                </div>
            </div>
            <div class="col-md-10">
                <textarea name="note_topic" id="" cols="30" rows="3" class="form-control note-3" disabled></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="name_topic" id="exampleRadios4" value="4">
                    <label class="form-check-label" for="exampleRadios4">
                        บริษัท/ห้างร้าน
                    </label>
                </div>
            </div>
            <div class="col-md-10">
                <textarea name="note_topic" id="" cols="30" rows="3" class="form-control note-4" disabled></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="name_topic" id="exampleRadios5" value="5">
                    <label class="form-check-label" for="exampleRadios5">
                        อื่น ๆ
                    </label>
                </div>
            </div>
            <div class="col-md-10">
                <textarea name="note_topic" id="" cols="30" rows="3" class="form-control note-5" disabled></textarea>
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
                <h5>ประเด็นที่ท่านต้องการร้องเรียน/แจ้งข้อเสนอแนะ <span class="text-danger">*</span></h5>
                <textarea name="complain_name" id="" cols="30" rows="10" class="form-control" required></textarea>
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
            <div class="col-md-6">
                <label for="">ภาค <span class="text-danger">*</span></label>
                <select name="t_id_geographies" id="t_geographies" class="form-control" required>
                    <option value="">-- เลือก --</option>
                    <?php foreach($geographies as $key => $value){ ?>
                        <option value="<?php echo $value['name']; ?>" data-id="<?php echo $value['id'] ?>"><?php echo $value['name']; ?></option>
                    <?php } ?>
                </select>
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
                <label for="">จุดสังเกตหรือสถานที่ใกล้เคียงที่สำคัญ (โปรดระบุ หากท่านทราบข้อมูล)</label>
                <textarea name="place_landmarks" id="" cols="30" rows="5" class="form-control"></textarea>
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
                <p class="text-danger">หมายเหตุ : รายการข้อมูลทั้งหมดทางระบบจะเก็บเป็นความลับ ตามพระราชบัญญัติคอมพิวเตอร์ พ.ศ. 2551</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-theme  g-recaptcha" style="min-width:180px;">ส่งเรื่อง</button>
            </div>
        </div>
        </form>
    </div>
</section>

<div class="mockup-recapcha">
    <img src="images/RecaptchaLogo.png" alt="">
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
<!-- script -->
<script src="assets/js/form.js?time=<?php echo time();?>"></script>
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
// document.getElementById("btnLoad").addEventListener("click", function showFileSize() {
//     // (Can't use `typeof FileReader === "function"` because apparently it
//     // comes back as "object" on some browsers. So just see if it's there
//     // at all.)
//     if (!window.FileReader) { // This is VERY unlikely, browser support is near-universal
//         console.log("The file API isn't supported on this browser yet.");
//         return;
//     }

//     var input = document.getElementById('fileinput');
//     if (!input.files) { // This is VERY unlikely, browser support is near-universal
//         console.error("This browser doesn't seem to support the `files` property of file inputs.");
//     } else if (!input.files[0]) {
//         addPara("Please select a file before clicking 'Load'");
//     } else {
//         var file = input.files[0];
//         addPara("File " + file.name + " is " + file.size + " bytes in size");
//     }
// });

// function addPara(text) {
//     var p = document.createElement("p");
//     p.textContent = text;
//     document.body.appendChild(p);
// }
</script>
<style>
    .file-upload-wrapper {
  position: relative;
  width: 100%;
  height: 60px;
}
.file-upload-wrapper:after {
  content: attr(data-text);
  font-size: 18px;
  position: absolute;
  top: 0;
  left: 0;
  background: #fff;
  padding: 10px 15px;
  display: block;
  width: calc(100% - 40px);
  pointer-events: none;
  z-index: 20;
  height: 40px;
  line-height: 40px;
  color: #999;
  border-radius: 5px 10px 10px 5px;
  font-weight: 300;
}
.file-upload-wrapper:before {
  content: "Upload";
  position: absolute;
  top: 0;
  right: 0;
  display: inline-block;
  height: 60px;
  background: #4daf7c;
  color: #fff;
  font-weight: 700;
  z-index: 25;
  font-size: 16px;
  line-height: 60px;
  padding: 0 15px;
  text-transform: uppercase;
  pointer-events: none;
  border-radius: 0 5px 5px 0;
}
.file-upload-wrapper:hover:before {
  background: #3d8c63;
}
.file-upload-wrapper input {
  opacity: 0;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 99;
  height: 40px;
  margin: 0;
  padding: 0;
  display: block;
  cursor: pointer;
  width: 100%;
}
</style>