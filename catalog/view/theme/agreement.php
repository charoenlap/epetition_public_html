<div class="breadcrumb-theme">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul>
          <li><a href="<?php echo route('home'); ?>">หน้าหลัก</a></li>
          <li class="active" aria-current="page">ข้อตกลงหลักเกณฑ์รับเรื่องร้องเรียน/ร้องทุกข์</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<form src="<?php echo route('home/topic'); ?>" method="get">
    <input type="hidden" name="route" value="home/topic">
    <section class="py-5">
        <?php echo $agreement; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="the-terms">
                       <h5><label class="form-check-label" for="the-terms">
                            <b>ข้าพเจ้าขอรับรองว่าข้อเท็จจริงที่ได้แจ้งเรื่องร้องเรียนต่อศูนย์รับข้อร้องเรียนกระทรวงพลังงานเป็นเรื่องที่เกิดขึ้นจริงทั้งหมดและขอรับผิดชอบต่อข้อเท็จจริงดังกล่าวข้างต้นทุกประการ</b>
                        </label></h5>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button class="btn btn-success " type="submit" id="submitBtn" disabled>ยอมรับเงื่อนไข</button>
                </div>
            </div>
        </div>
    </section>
</form>
<script>
    $(document).ready(function() {
    var the_terms = $("#the-terms");

    the_terms.click(function() {
        if ($(this).is(":checked")) {
            $("#submitBtn").removeAttr("disabled");
        } else {
            $("#submitBtn").attr("disabled", "disabled");
        }
    });
}); 
</script>