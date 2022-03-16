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
                <div class="row">
                    <div class="col-md-12">
                        <h3><i class="fa fa-circle text-success"></i> <?php echo $FIRSTNAME.' '.$LASTNAME; ?></h3>
                        <!-- <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>วันที่เข้าสู่ระบบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>19/12/2021 12:20</td>
                                </tr>
                                <tr>
                                    <td>19/12/2021 13:10</td>
                                </tr>
                                <tr>
                                    <td>19/12/2021 15:43</td>
                                </tr>
                            </tbody>
                        </table> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>