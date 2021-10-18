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
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="">เลขประจำตัวประชาชน</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <label for="">คำนำหน้า</label>
                <select name="" id="" class="form-control">
                    <option value="">นาย</option>
                </select>
            </div>
            <div class="col-md-5">
                <label for="">ชื่อ</label>
                <input type="text" class="form-control" placeholder="ชื่อ">
            </div>
            <div class="col-md-5">
                <label for="">นามสกุล</label>
                <input type="text" class="form-control" placeholder="นามสกุล">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="">เพศ</label>
                <select name="" id="" class="form-control">
                    <option value="">ชาย</option>
                    <option value="">หญิง</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="">อายุ</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="">โทรศัพท์บ้าน</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="">โทรศัพท์มือถือ</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="">e-mail</label>
                <input type="text" class="form-control">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="">บ้านเลขที่</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="">หมู่ที่</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="">ชื่อหมู่บ้าน</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="">ซอย</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="">ถนน</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="">จังหวัด</label>
                <select name="" id="" class="form-control">
                    <option value="">-- จังหวัด --</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="">อำเภอ/เขต</label>
                <select name="" id="" class="form-control">
                    <option value="">-- อำเภอ/เขต --</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="">ตำบล/แขวง</label>
                <select name="" id="" class="form-control">
                    <option value="">-- ตำบล/แขวง --</option>
                </select>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-6">
                <label for="">รหัสไปรษณีย์</label>
                <input type="text" class="form-control">
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
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        บุคคล
                    </label>
                </div>
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" placeholder="ชื่อ">
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" placeholder="นามสกุล">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        กลุ่ม/คณะบุคคล
                    </label>
                </div>
            </div>
            <div class="col-md-10">
                <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                    <label class="form-check-label" for="exampleRadios3">
                        หน่วยงาน
                    </label>
                </div>
            </div>
            <div class="col-md-10">
                <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="option4">
                    <label class="form-check-label" for="exampleRadios4">
                        บริษัท/ห้างร้าน
                    </label>
                </div>
            </div>
            <div class="col-md-10">
                <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios5" value="option5">
                    <label class="form-check-label" for="exampleRadios5">
                        อื่น ๆ
                    </label>
                </div>
            </div>
            <div class="col-md-10">
                <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <h5>ประเด็นที่ท่านต้องการร้องเรียน/แจ้งข้อเสนอแนะ</h5>
                <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
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
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="">หมู่ที่</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="">ชื่อหมู่บ้าน</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="">ซอย</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="">ถนน</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="">จังหวัด</label>
                <select name="" id="" class="form-control">
                    <option value="">-- จังหวัด --</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="">อำเภอ/เขต</label>
                <select name="" id="" class="form-control">
                    <option value="">-- อำเภอ/เขต --</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="">ตำบล/แขวง</label>
                <select name="" id="" class="form-control">
                    <option value="">-- ตำบล/แขวง --</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="">จุดสังเกตหรือสถานที่ใกล้เคียงที่สำคัญ (โปรดระบุ หากท่านทราบข้อมูล)</label>
                <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="">สิ่งที่ต้องการให้กระทรวงพลังงานดำเนินการ</label>
                <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <h5>เอกสารหรือภาพประกอบการร้องเรียน</h5>
                <label for="actual-btn" class="btn btn-upload"><i class="fas fa-folder-plus"></i> แนบไพล์</label>
                <input type="file" id="actual-btn" hidden/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-danger">หมายเหตุ : รายการข้อมูลทั้งหมดทางระบบจะเก็บเป็นความลับ ตามพระราชบัญญัติคอมพิวเตอร์ พ.ศ. 2551</p>
            </div>
            <div class="col-md-3">
                <button class="btn btn-theme w-100">ส่งเรื่อง</button>
            </div>
        </div>
    </div>
</section>