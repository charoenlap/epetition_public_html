<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">รายงานแยกตามหน่วยงาน</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">รายงานแยกตามหน่วยงาน</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
      
      <?php if($active_view){ ?>
        <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                <!-- <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ข้อมูลที่ต้องการค้นหา</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">การแสดงผล</label>
                                <select name="" id="" class="form-control">
                                    <option value="">แสดงทั้งหมด</option>
                                    <option value="">ตามปีงบประมาณ</option>   
                                    <option value="">ตามปีปฎิทิน</option>
                                    <option value="">ตามช่วงเวลา</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                              <label for="">ค้นหาช่วงเวลา</label>
                              <input type="date" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="">&nbsp</label><br>
                                <button type="submit" class="btn btn-primary">ค้นหา</button>
                                <button type="submit" class="btn btn-primary">Preview</button>
                            </div>
                        </div>
                    </div>
                </div> -->
              </div>
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">รายงานแยกตามหน่วยงาน</h3>
                          <!-- <a href="" class="btn btn-info btn-sm float-right" id="btn-export"><i class="fas fa-file"></i> export</a> -->
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">
                                  <table class="table table-bordered" id="datatable">
                                      <thead class="bg-primary">
                                        <tr>
                                          <th class="text-center align-middle" width="10%">ลำดับ</th>
                                          <th class="text-center align-middle">หน่วยงาน</th>
                                          <th class="text-center align-middle">ได้รับเรื่องร้องเรียน</th>
                                          <th class="text-center">ดำเนินการแล้วเสร็จ</th>
                                          <th class="text-center">อยู่ระหว่างการดำเนินการ</th>
                                          <th class="text-center">ยังไม่เริ่มดำเนินการ</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php $i=1;foreach($gencyMinor as $val){ ?>
                                          <tr>
                                            <td class="text-center"><?php echo $i++; ?></td>
                                            <td><?php echo $val['agency_minor_title'] ?></td>
                                            <td class="text-center"><?php echo $val['count_all'] ?></td>
                                            <td class="text-center"><?php echo $val['complete'] ?></td>
                                            <td class="text-center"><?php echo $val['process'] ?></td>
                                            <td class="text-center"><?php echo $val['over'] ?></td>
                                          </tr>
                                      </tbody>
                                      <?php } ?>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>  
        <?php }else{?>
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                กลุ่มผู้ใช้งานของท่านไม่สามารถดูได้
              </div>
            </div>
          </div>
        <?php } ?>
  </section>
  <!-- /.content -->
</div>

<script>
  $('#report').addClass('active');
  $('#department').addClass('active');
  $('#report').parent().addClass('menu-is-opening menu-open');
  // var dt = $('#datatable').DataTable();

// Export to Word Document
// On element with id="btn-export" clicked
// $('body').on('click', '#btn-export', function(e) {
//     $.fn.DataTable.Export.word(dt, {
//         filename: 'customer-lists',
//         title: 'Report',
//         message: 'Customer lists',
//         header: [
//           'ID',
//           'Name',
//           'Position',
//           'Join Date',
//           'Salary'
//         ],
//         fields: [
//           0,
//           1,
//           4,
//           5,
//           8
//         ]
//     });
// });
$(document).ready(function() {
    $('#datatable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>