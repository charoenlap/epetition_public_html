<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php $i=0;foreach($banners as $banner){ ?>
      <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i==0?'active':'');?>"></li>
      <?php $i++;} ?>
    </ol> 
    <div class="carousel-inner">
      <?php $i=0;foreach($banners as $banner){ ?>
      <div class="carousel-item <?php echo ($i==0?'active':'');?>">
        <div class="d-block w-100" style="background:url('uploads/banner/<?php echo $banner['filename'] ?>');background-size:cover;width:100%;height:500px;background-position: center;"></div>
        <div class="carousel-caption d-none d-md-block" >
          <h1>ศูนย์รับข้อร้องเรียนกระทรวงพลังงาน</h1>
        </div>
      </div>
      <?php $i++;} ?>
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
  <?php echo $contact; ?>
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
