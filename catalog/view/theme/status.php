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
<section class="py-5 mb-250">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <a href="<?php echo route('ticket'); ?>" class="btn btn-theme">กรอก Ticket</a>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="10%" class="text-center">#</th>
                            <th>ชื่อเรื่อง</th>
                            <th>สภานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>ร้องเรียนเรื่อง</td>
                            <td><i class="fas fa-circle text-success"></i> เรื่องร้องเรียน/ร้องทุกข์ที่ดำเนินการเสร็จสิ้นแล้ว</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>ร้องเรียนเรื่อง</td>
                            <td><i class="fas fa-circle text-warning"></i> เรื่องร้องเรียน/ร้องทุกข์อยู่ระหว่างดำเนินการ</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>ร้องเรียนเรื่อง</td>
                            <td><i class="fas fa-circle text-orange"></i>  เรื่องร้องเรียน/ร้องทุกข์ที่อีก 7 วันจะครบกำหนด</td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>ร้องเรียนเรื่อง</td>
                            <td><i class="fas fa-circle text-danger"></i>  เรื่องร้องเรียน/ร้องทุกข์ที่ยังไม่แล้วเสร็จ และล่าช้ากว่ากำหนด</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>