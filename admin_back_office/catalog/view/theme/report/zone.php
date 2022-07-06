<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">แยกตามพื้นที่เขตตรวจ</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">แยกตามพื้นที่เขตตรวจ</li>
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
              <!-- <div class="col-md-12">
                <div class="card">
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
                </div>
              </div> -->
              <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">แบ่งตามพื้นที่เขตตรวจราชการ</h3>
                            <!-- <a href="" class="btn btn-info btn-sm float-right"><i class="fas fa-file"></i> export excel</a> -->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="datatable">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center align-middle" width="10%" >ลำดับ</th>
                                                <th class="text-center align-middle" >เขตตรวจราชการ/จังหวัด</th>
                                                <th class="text-center align-middle" >ได้รับเรื่องร้องเรียน</th>
                                                <th class="text-center">ดำเนินการแล้วเสร็จ</th>
                                                <th class="text-center">อยู่ระหว่างการดำเนินการ</th>
                                                <th class="text-center">ยังไม่เริ่มดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php $i=1;foreach($reportZone as $val){ ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i++; ?></td>
                                                <td><?php echo $val['title'].' '.$val['agency']; ?></td>
                                                <td class="text-center"><?php echo $val['count_all']; ?></td>
                                                <td class="text-center"><?php echo $val['complete']; ?></td>
                                                <td class="text-center"><?php echo $val['process']; ?></td>
                                                <td class="text-center"><?php echo $val['waiting']; ?></td>
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
  $('#report').parent().addClass('menu-is-opening menu-open');
  $(document).ready(function() {
    pdfMake.fonts = {
       THSarabun: {
         normal: 'THSarabun.ttf',
         bold: 'THSarabun-Bold.ttf',
         italics: 'THSarabun-Italic.ttf',
         bolditalics: 'THSarabun-BoldItalic.ttf'
       }
    }
    $('#datatable').DataTable( {
      lengthChange: false,
      extend: 'collection',
        // processing: true,
        // serverSide: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'csv',
            { // กำหนดพิเศษเฉพาะปุ่ม pdf
                "extend": 'pdf', // ปุ่มสร้าง pdf ไฟล์
                "text": 'PDF', // ข้อความที่แสดง
                "pageSize": 'A4',   // ขนาดหน้ากระดาษเป็น A4            
                "customize":function(doc){ // ส่วนกำหนดเพิ่มเติม ส่วนนี้จะใช้จัดการกับ pdfmake
                    // กำหนด style หลัก
                    doc.defaultStyle = {
                        font:'THSarabun',
                        fontSize:16                                 
                    };
                    // กำหนดความกว้างของ header แต่ละคอลัมน์หัวข้อ
                    // doc.content[1].table.widths = [ 50, 'auto', '*', '*' ];
                    doc.styles.tableHeader.fontSize = 16; // กำหนดขนาด font ของ header
                    var rowCount = doc.content[1].table.body.length; // หาจำนวนแะวทั้งหมดในตาราง
                    // วนลูปเพื่อกำหนดค่าแต่ละคอลัมน์ เช่นการจัดตำแหน่ง
                    for (i = 1; i < rowCount; i++) { // i เริ่มที่ 1 เพราะ i แรกเป็นแถวของหัวข้อ
                        doc.content[1].table.body[i][0].alignment = 'center'; // คอลัมน์แรกเริ่มที่ 0
                        doc.content[1].table.body[i][1].alignment = 'center';
                        doc.content[1].table.body[i][2].alignment = 'left';
                        doc.content[1].table.body[i][3].alignment = 'right';
                    };                                  
                    console.log(doc); // เอาไว้ debug ดู doc object proptery เพื่ออ้างอิงเพิ่มเติม
                }
            }, // สิ้นสุดกำหนดพิเศษปุ่ม pdf
            'print' , 'pageLength'
        ] 
    } );
} );
</script>

