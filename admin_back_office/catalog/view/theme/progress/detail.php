
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">รายงานความก้าวหน้าของการดำเนินการเรื่องร้องเรียน</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">รายงานความก้าวหน้าของการดำเนินการเรื่องร้องเรียน</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">รายงานความก้าวหน้าของการดำเนินการเรื่องร้องเรียน <?php echo $year.'/'.$month; ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                              <div class="col-md-12 text-right mb-3">
                                <a href="<?php echo route('progress'); ?>" class="btn btn-dark">ย้อนกลับ</a>
                              </div>
                              <div class="col-md-12">
                                <table class="table table-bordered table-striped">
                                  <thead class="bg-primary">
                                    <tr>
                                      <th>ลำดับ</th>
                                      <th>รหัส Ticket ID</th>
                                      <th>ผู้ร้องเรียน/ประเด็นสำคัญของเรื่อง</th>
                                      <th>จังหวัดที่เกิดเหตุ</th>
                                      <th>วันที่รายงาน</th>
                                      <th>หน่วยงาน</th>
                                      <th>หน่วยงานระดับสำนัก/กอง/ศูนย์ที่ได้รับมอบหมาย</th>
                                      <th>หน่วยงานระดับส่วน/ฝ่าย/กลุ่มที่ได้รับมอบหมาย</th>
                                      <th>เจ้าหน้าที่ของส่วน/ฝ่าย/กลุ่มที่ได้รับมอบหมาย(2 คน)</th>
                                      <th>เบอร์โทรศัพท์สำนักงาน/มือถือ</th>
                                      <th>ความก้าวหน้าผลการดำเนินงาน</th>
                                      <th>ปัญหาอุปสรรคในการดำเนินงาน</th>
                                      <th>เอกสารแนบ</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $i=1;foreach($listProgress as $val){ ?>
                                    <tr>
                                      <td><?php echo $i++;?></td>
                                      <td><?php echo $val['case_code'];?></td>
                                      <td>
                                        <?php echo $val['topic_title'];?>
                                      </td>
                                      <td><?php echo $val['PROVINCE_NAME'];?></td>
                                      <td><?php echo $val['dateadd'];?></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>

<script>
    $('#progress').addClass('active');
</script>
