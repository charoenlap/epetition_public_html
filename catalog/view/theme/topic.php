<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
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
        <div class="row" id="accordion">
            <?php 
              $i = 1;
              foreach($topic as $key => $value){ 
            ?>
            <h3 class="text-link text-topic-link btn-block">
              <?php echo $value['rows']['topic_title']; ?>
            </h3>
              
              <div class="col-md-12">
                <?php foreach($value['sub'] as $v){ ?>
                <a href="<?php echo route('home/form&topic_id='.$value['rows']['id'].'&sub_topic_id='.$v['id']); ?>" >
                  <p><?php echo $v['title']; ?></p>
                </a>
                <?php } ?>
              </div>
              
            <?php } ?>
        </div>
    </div>
</section>
<script>
  $(function(){
    $( "#accordion" ).accordion();
  });
</script>
<style>
 .col-md-12.ui-accordion-content.ui-corner-bottom.ui-widget-content{
height:100% !important;
transition: all .25s ease;
 } 
</style>