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
<section class="py-5 mb-5">
    <div class="container">
        <?php if($ticket){ ?>
        <div class="row">
            <div class="col-12">
                <h3 class="text-theme font-weight-bold ">รายละเอียดเรื่องร้องเรียน</h3>
            </div>
        </div>
        <?php 
        foreach($ticket as $val){ ?>
        <div class="row">
            <div class="col-md-12">
                <?php 
                    if(isset($val['detail']['case_code'])){ 
                        $txt_status = $val['detail']['text_status'];
                        $color = $val['detail']['text_class'];
                ?>
                
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td width="230px;"><b>รหัสเรื่องร้องเรียน (Ticket ID)</b></td>
                            <td><?php echo $val['detail']['case_code']; ?></td>
                        </tr>
                        <tr>
                            <td width="230px;"><b>วันที่แจ้ง</b></td>
                            <td><?php echo (isset($val['detail']['dateadd'])?$val['detail']['dateadd']:''); ?></td>
                        </tr>
                        <tr>
                            <td><b>ชื่อเรื่อง</b></td>
                            <td><?php echo $val['detail']['response_person']; ?></td>
                        </tr>
                        <tr>
                            <td><b>อยู่ระหว่างตรวจสอบข้อมูล เพื่อส่งต่อให้หน่วยงานที่รับผิดชอบ</b></td>
                            <td>
                                <?php 
                                if($val['agency']){
                                    foreach ($val['agency'] as $key => $value) {
                                       echo $value['agency_minor_title'];
                                    } ?>
                                <?php }else{?>
                                    <p>อยู่ระหว่างดำเนินการ</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>สถานะ</b></td>
                            <td class="">
                                <?php echo $txt_status; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    <?php }else{?>
        <div class="row">
            <div class="col-12">
                <h4 class="text-center text-danger">ไม่พบเลขร้องเรียน บนระบบ</h4>
                <p class="text-center">สามารถติดต่อขอรับข้อมูลเพิ่มเติมได้ที่</p>
                <p class="text-center">จดหมายอิเล็กทรอนิกส์ (E-Mail) : inspector_g@energy.go.th</p>
                <p class="text-center">ข้อมูลการติดต่อ : โทรศัพท์ 0 2140 6080 - 82</p>
            </div>
        </div>
    <?php } ?>
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <a href="<?php echo route('ticket');?>">กลับไปค้นหาใหม่อีกครั้ง</a>
                </div>
            </div>
        </div>
    </div>
</section>