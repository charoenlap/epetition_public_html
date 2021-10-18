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
<section class="py-5 h-75 mt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7">
        <h3>ติดตามเรื่องร้องเรียน</h3>
        <input type="text" class="form-control mb-3 py-3" placeholder="กรอก Ticket ID สำหรับค้นหา">
        <a href="<?php echo route('home/status'); ?>" class="btn btn-theme w-100">ค้นหา</a>
      </div>
    </div>
  </div>
</section>