<div class="breadcrumb-theme">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul>
          <li><a href="<?php echo route('home'); ?>">หน้าหลัก</a></li>
          <li class="active" aria-current="page">หัวข้อเรื่องร้องเรียน</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<section class="py-5">
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <h3 class="text-theme font-weight-bold">ประเภทเรื่องร้องเรียน</h3>
            </div>
        </div>
        <div class="row">
            <?php 
              $i = 1;
              foreach($topic as $key => $value){ 
            ?>
            <div class="col-md-12">
              <a href="<?php echo route('home/addTopic&id='.$value['id']); ?>" class="text-link">
                <p><?php echo $i++; ?>.<?php echo $value['topic_title']; ?></p>
              </a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>