<div class="breadcrumb-theme">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul>
          <li><a href="<?php echo route('home'); ?>">หน้าหลัก</a></li>
          <li class="active" aria-current="page">ติดตามเรื่องร้องเรียน</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<section class="py-5 h-75">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3>ติดตามเรื่องร้องเรียน</h3>
                <form action="<?php echo route('ticket/ticketStatus');?>" method="POST">
                  <input type="text" class="form-control form-control-lg mb-3" placeholder="กรอกข้อมูลสำหรับค้นหา" name="case_code">
                  <input type="radio" name="rdoType" value="ticket" id="ticket" checked>
                  <label for="ticket">รหัสเรื่องร้องเรียน</label>
                  <input type="radio" name="rdoType" value="idno" id="idno">
                  <label for="idno">เลขบัตรประจำตัวประชาชน</label>
                  <button class="btn btn-theme btn-lg btn-block"  type="submit">ค้นหา</button>
                </form>
            </div>
        </div>
    </div>
</section>