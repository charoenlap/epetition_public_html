<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="images/beach.png" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>สำนักงานปลัดกระทรวงพลังงาน</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/beach.png" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>สำนักงานปลัดกระทรวงพลังงาน</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/beach.png" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>สำนักงานปลัดกระทรวงพลังงาน</h1>
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
<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="text-theme font-weight-bold">ช่องทางที่ท่านสามารถแจ้งเรื่องร้องเรียนต่อสำนักงานปลัดกระทรวงพลังงาน มีดังนี้</h4>
        <ul>
          <li>เว็บไซต์ </li>
          <li>จดหมายอิเล็กทรอนิกส์ (E-Mail) : </li>
          <li>ส่งหนังสือร้องเรียนมาที่สำนักงานปลัดกระทรวงพลังงาน อาคาร บี ศูนย์เอนเนอร์ยี่ คอมเพล็กซ์ 555/2 ถนนวิภาวดีรังสิต แขวงจตุจักร เขตจตุจักร กรุงเทพฯ จตุจักร จตุจักร กรุงเทพมหานคร 10900</li>
          <li>ข้อมูลการติดต่อ : โทรศัพท์ 0-2140-6000 โทรสาร 02-140-6228</li>
          <li>Application โดยสามารถดาวน์โหลด Application ได้ที่</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<script>
    $('.carousel').carousel();
</script>
