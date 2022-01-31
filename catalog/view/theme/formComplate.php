<div class="breadcrumb-theme">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="<?php echo route('home'); ?>">หน้าหลัก</a></li>
                    <li class="active" aria-current="page">เรื่องร้องเรียน/ร้องทุกข์</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="py-5 h-75">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h1 class="text-success">แจ้งเรื่องร้องเรียนสำเร็จ</h1>
                                <h3>Ticket ID : <?php echo $case_code;?></h3>
                                <span class="text-danger">กรุณาบันทึกหรือเก็บ Ticket ID ของท่านไว้เผื่อติดตามสถานะเรื่องร้องเรียนของท่าน</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h1 class="text-success">วิธีการติดตามเรื่องร้องเรียนของท่าน</h1>
                                <h4>1. บันทึกหมายเลข Ticket ID ของท่านไว้ที่ขึ้นอยู่ด้านบน</h4>
                                <h4>2. นำ Ticket ID ของท่านไปกรอกที่หน้าเว็บตามภาพด้านล่าง</h4>
                                <a href="<?php echo route('home'); ?>" class="btn btn-warning btn-lg">กลับหน้าหลัก</a>
                                <!-- <img src="images/exampleTicket.png" alt="" class="w-100">
                                <p>หรือกดที่ลิงค์ <a href="<?php echo route('ticket'); ?>">ที่นี้</a></p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>