<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol> 
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="images/1.png" alt="First slide">
        <div class="carousel-caption d-none d-md-block" >
          <h1>ศูนย์รับเรื่องร้องเรียนกระทรวงพลังงาน</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/2.png" alt="Second slide">
        <div class="carousel-caption d-none d-md-block" >
          <h1>ศูนย์รับเรื่องร้องเรียนกระทรวงพลังงาน</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/3.png" alt="Third slide">
        <div class="carousel-caption d-none d-md-block" >
          <h1>ศูนย์รับเรื่องร้องเรียนกระทรวงพลังงาน</h1>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div> 
<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <a href="<?php echo route('home/agreement'); ?>" class="btn-form">
          <i class="bi bi-archive"></i>
          <h1>แจ้งเรื่องร้องเรียน</h1>
        </a>
      </div>
      <div class="col-md-6">
        <a href="<?php echo route('ticket'); ?>" class="btn-ticket">
          <i class="bi bi-archive"></i>
          <h1>ติดตามเรื่องร้องเรียน</h1>
        </a>
      </div>
    </div>
  </div>
</section>   
<section class="">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <img src="assets/info.jpg" alt="" class="img-fluid">
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-12">
        <h4 class="text-theme font-weight-bold">ช่องทางที่ท่านสามารถแจ้งเรื่องร้องเรียนต่อศูนย์รับเรื่องร้องเรียนกระทรวงพลังงาน (กองตรวจราชการ) มีดังนี้</h4>
        <ul>
          <li>เว็บไซต์www.energy.go.th</li>
          <li>จดหมายอิเล็กทรอนิกส์ (E-Mail) : inspector_g@energy.go.th</li>
          <li>ส่งหนังสือร้องเรียนมาที่ศูนย์รับข้อร้องเรียนกระทรวงพลังงาน </li>
          <li>ที่อยู่ : กองตรวจราชการ ส านักงานปลัดกระทรวงพลังงาน 555/2 ศูนย์</li>
          เอนเนอร์ยี่คอมเพล็กซ์ อาคารบี ชั้น 23 ถนนวิภาวดีรังสิต แขวงจตุจักร เขตจตุจักร กรุงเทพมหานคร 10900
          <li>ข้อมูลการติดต่อ : โทรศัพท์ 0 2140 6080 - 82</li>
          <li>Application โดยสามารถดาวน์โหลด Application ได้ที่</li>
        </ul>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-6 text-right">
        <a href="https://play.google.com/store/apps/details?id=th.go.energy.epetition" target="_blank">
          <img src="assets/android.png" class="img-fluid" style="max-width: 200px;" alt=""></a>
      </div>
      <div class="col-6">
        <a href="https://apps.apple.com/us/app/e-petition-energy/id1614997528" target="_blank">
          <img src="assets/ios.png" class="img-fluid" style="max-width: 200px;" alt=""></a>
      </div>
    </div>
  </div>
</section>
<script>
    $('.carousel').carousel();
</script>
<style>
  .carousel-caption {
    top:10px;
    left:10px;
  }
  .carousel-caption h1{
    text-align:left;
  }
</style>
