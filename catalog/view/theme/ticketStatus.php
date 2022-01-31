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
        <div class="row">
            <div class="col-md-12">
                <?php 
                    if(isset($ticket['case_code'])){ 
                        $status = (int)$ticket['status'];
                        $txt_status = "";
                        $color = "";
                        if($status=="0"){
                            $txt_status = "อยู่ระหว่างดำเนินการ";
                            $color = "warning";
                        }else if($status=="1"){
                            $txt_status = "ดำเนินการแล้วเสร็จ";
                            $color = "success";
                        }else if($status=="2"){
                            $txt_status = "ล่าช้ากว่ากำหนด";
                            $color = "danger";
                        }
                ?>
                <h3 class="text-theme font-weight-bold">รายละเอียดเรื่องร้องเรียน</h3>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><b>รหัสเรื่อง (Case ID)</b></td>
                            <td><?php echo $ticket['case_code']; ?></td>
                        </tr>
                        <tr>
                            <td><b>ชื่อเรื่อง</b></td>
                            <td><?php echo $ticket['response_person']; ?></td>
                        </tr>
                        <tr>
                            <td><b>หน่วยงานดำเนินการ</b></td>
                            <td><?php echo $ticket['agency_minor_title']; ?></td>
                        </tr>
                        <tr>
                            <td><b>สถานะ</b></td>
                            <td class="text-<?php echo $color;?>">
                                <?php echo $txt_status; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php }else{?>
                <h4 class="text-center">ไม่พบเลขร้องเรียน " <?php echo $case_code;?> " บนระบบ</h4>
                <?php } ?>
                <div class="text-center">
                    <a href="<?php echo route('ticket');?>">กลับไปหน้าค้นหา</a>
                </div>
            </div>
        </div>
    </div>
</section>