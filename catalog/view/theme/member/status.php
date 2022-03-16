<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="<?php echo route('home/agreement'); ?>">แจ้งเรื่องร้องเรียน</a></li>
                    <li class="list-group-item"><a href="<?php echo route('member/status'); ?>">ติดตามเรื่องร้องเรียน</a></li>
                    <li class="list-group-item"><a href="<?php echo route('member/signout'); ?>">ออกจากระบบ</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <?php foreach($ticket  as $val){ ?>
                    <?php 
                        if(isset($val['case_code'])){ 
                            $txt_status = $val['text_status'];
                            $color = $val['text_class'];
                    ?>
                    <table class="table table-bordered mb-2">
                        <tbody>
                            <tr>
                                <td width="200px;"><b>รหัสเรื่อง (Case ID)</b></td>
                                <td><?php echo $val['case_code']; ?></td>
                            </tr>
                            <tr>
                                <td><b>ชื่อเรื่อง</b></td>
                                <td><?php echo $val['response_person']; ?></td>
                            </tr>
                            <tr>
                                <td><b>หน่วยงานดำเนินการ</b></td>
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
                                <td class="text-<?php echo $color;?>">
                                    <?php echo $txt_status; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php }else{?>
                    <h4 class="text-center">ไม่พบเลขร้องเรียน " <?php echo $case_code;?> " บนระบบ</h4>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>