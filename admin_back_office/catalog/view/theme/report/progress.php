<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">รายงานความก้าวหน้า</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">รายงานความก้าวหน้า</li>
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
                                <div class="col-md-4 mb-2">
                                    <label for="">วันที่หน่วยงานได้รับเรื่อง</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="">ถึงวันที่</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="">ประเด็นสำคัญของเรื่อง</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="">หน่วยงาน</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">เลือก</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="">รหัส Ticket ID</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="">จังหวัดที่เกิดเหตุ</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">เลือก</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">ค้นหา</button>
                                    <button type="submit" class="btn btn-primary">Preview</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">รายงานความก้าวหน้า</h3>
                            <!-- <a href="" class="btn btn-info btn-sm float-right"><i class="fas fa-file"></i> export excel</a> -->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="datatable">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>รหัส Ticket ID /วันที่หน่วยงานได้รับเรื่อง</th>
                                                <th>ผู้ร้องเรียน/ประเด็นสำคัญของเรื่อง</th>
                                                <th>จังหวัดที่เกิดเหตุ</th>
                                                <th>หน่วยงาน</th>
                                                <th>หน่วยงานระดับสำนัก/กอง/ศูนย์ ที่ได้รับมอบหมาย</th>
                                                <th>หน่วยงานระดับส่วน/ฝ่าย/กลุ่ม ที่ได้รับมอบหมาย</th>
                                                <th>เบอร์โทรศัพท์สำนักงาน/มือถือ</th>
                                                <th>ความก้าวหน้าผลการดำเนินงาน</th>
                                                <th>ปัญหาอุปสรรคในการดำเนินงาน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;foreach($listProgress as $val){ ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $val['case_code']; ?></td>
                                                <td><?php echo $val['topic_title']; ?></td>
                                                <td><?php echo $val['PROVINCE_NAME']; ?></td>
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
    $('#progressReport').addClass('active');
    $('#report').parent().addClass('menu-is-opening menu-open');
    $(document).ready(function() {
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