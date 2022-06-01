<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active"><?php echo $title; ?></li>
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
                    <div class="card"> 
                        <div class="card-body">
                            <form action="<?php echo route('appeal/opm');?>" method="get">
                                <input type="hidden" name="route" value="appeal/opm">
                                <div class="row mb-3">
                                    <div class="col-md-3 mb-3">
                                        <label for="timeline_type">ประเภทกำเนินการร้องเรียน</label>
                                        <select name="timeline_type" id="timeline_type" class="form-control">
                                            <option value="A" <?php echo ($timeline_type=="A"?'selected':''); ?>>   ทั้งหมด
                                            </option>
                                            <option value="I" <?php echo ($timeline_type=="I"?'selected':''); ?>>   รายการรับ
                                            </option>
                                            <option value="P" <?php echo ($timeline_type=="P"?'selected':''); ?>>   กำลังดำเนินการ
                                            </option>
                                            <option value="N" <?php echo ($timeline_type=="N"?'selected':''); ?>>   รายการแจ้งเตือน
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">&nbsp;</label>
                                        <button class="btn btn-success btn-block" type="submit"><i class="fas fa-search"></i> ค้นหา</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if($error){ ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-danger"><?php echo $error;?></div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <!-- <a href="<?php echo route('appeal');?>" class="btn btn-theme">เรื่องร้องเรียนที่ได้โดยตรง</a>
                                    <a href="<?php echo route('appeal/opm');?>" class="btn btn-primary">เรื่องร้องเรียนจาก สปน.</a> -->
                                </div>
                                <div class="col-md-6 text-right">
                                    <!-- <a href="" class="btn btn-warning"><i class="fas fa-cloud-upload-alt"></i> สำรองข้อมูล</a> -->
                                    <!-- <a href="<?php echo route('appeal/opmAdd');?>" class="btn btn-info"><i class="fas fa-folder-plus"></i> แบบฟอร์มเรื่องร้องเรียน</a> -->
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <?php if($active_view AND $active_add){ ?>
                                        <a href="#" class="btn btn-primary disabled" id="btn-send-topic" role="button" aria-disabled="true" data-toggle="tooltip" data-placement="top" title="ต้องมีสิทธิ์ ดู และเพิ่มเท่านั้น">นำเรื่องส่งเข้ากระทรวงพลังงาน</a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    <input type="checkbox" id="checkAll"> ทั้งหมด
                                                </th>
                                                <th class="text-center"  style="width:45px;">ลำดับ</th>
                                                <th  style="width:80px;">Ticket ID</th>
                                                <th  style="width:80px;">Ticket ID (สปน)</th>
                                                <th style="width:180px;">ชื่อผู้ร้องเรียน</th>
                                                <th>หัวข้อร้องเรียน</th>
                                                <th>ช่องทางการร้องเรียน</th>
                                                <th style="width:100px;">วันที่ร้องเรียน</th>
                                                <th class="text-center" style="width:30px;">สถานะ</th>
                                                <th class="text-center" style="width:50px;">การจัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(is_array($result)){ ?>
                                            <?php $i=1;foreach($result as $val){ 
                                                $status = '';
                                                if($val['main_status_text']=="อยู่ระหว่างดำเนินการ"){
                                                    $status = '<i class="fas fa-square-full status-yellow"></i>';
                                                }
                                            ?>
                                            <tr>
                                                <td class="text-center">
                                                    <input type="checkbox" class="checkboxSend" value="<?php echo $val['case_code']; ?>"
                                                    case_code="<?php echo $val['case_code'];?>"
                                                    case_id="<?php echo $val['case_id'];?>">
                                                </td>
                                                <td class="text-center"><?php echo $i++;?></td>
                                                <td class="case_code_system" id="case_code_<?php echo $val['case_id'];?>">
                                                    
                                                </td>
                                                <td class="case_code_td">
                                                    <?php echo $val['case_code']; ?>
                                                </td>
                                                <td><?php echo $val['customer_name'];?></td>
                                                <td><?php echo $val['summary'];?></td>
                                                <td><?php echo $val['objective_text']; ?></td>
                                                <td><?php echo $val['operating_date']; ?></td>
                                                <td class="text-center"><?php echo $status;?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo route('appeal/opmDetail&case_id='.$val['case_id'].'&case_code='.$val['case_code']);?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="รายละเอียด"><i class="fas fa-eye"></i></a>
                                                    <!-- <a href="<?php echo route('appeal/opmStatus&case_id='.$val['case_id'].'&case_code='.$val['case_code']);?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="รับเรื่องร้องเรียน"><i class="far fa-check-square"></i></a>
                                                    <a href="<?php echo route('appeal/opmEdit&case_id='.$val['case_id'].'&case_code='.$val['case_code']);?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"><i class="fas fa-edit"></i></a>
                                                    <a href="<?php echo route('appeal/opmDel&case_id='.$val['case_id'].'&case_code='.$val['case_code']); ?>" class="btn btn-danger btn-sm btn-del" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"><i class="far fa-trash-alt"></i></a> -->
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <!-- <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                            </li>
                                        </ul>
                                    </nav> -->
                                </div>
                            </div>

                            <!-- <div class="row mb-3">
                                <div class="col-md-12">
                                    <p>สถานะ</p>
                                    <ul class="list-unstyled">
                                        <li><p><i class="fas fa-check status-green"></i> ดำเนินการแล้วเสร็จ</p></li>
                                        <li><p><i class="fas fa-hourglass-start status-yellow"></i> อยู่ระหว่างการดำเนินการ</p></li>
                                        <li><p><i class="fas fa-hourglass-half status-orange"></i> อยู่ระหว่างการดำเนินการเหลืออีก 7 วันครบกำหนด</p></li>
                                        <li><p><i class="fas fa-times-circle status-red"></i> ดำเนินการล่าช้ากว่ากำหนด</p></li>
                                    </ul>
                                </div>
                            </div> -->
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
<div class="modal fade" id="process" tabindex="-1" role="dialog" aria-labelledby="processTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ส่งเรื่องไปยัง กระทรวงพลังงาน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
            <thead>
                <th>Ticket ID</th>
                <th>สถานะ</th>
            </thead>
            <tbody>
                
            </tbody>
        </table>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div> -->
      </div>
    </div>
</div>
<script>
    $(function(e){
        $( '.case_code_td' ).each(function( index ) {
            var case_code = $.trim($(this).text());
            var ele = $(this).parents('tr').find('.case_code_system');
            $.ajax({
                url: 'index.php?route=appeal/checkCaseOPM',
                type: 'GET',
                dataType: 'json',
                data: {case_code: case_code},
            })
            .done(function(json) {
                ele.text(json.case_code);
                console.log("success");
            })
            .fail(function(a,b,c) {
                console.log("error");
                console.log(a);
                console.log(b);
                console.log(c);
            })
            .always(function() {
                console.log("complete");
            });
            
        })
    });
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
    $(document).on('click','#btn-send-topic',function(e){
        $('#process').modal('show');
        var html = '';
        $('#process .modal-body .table tbody').html('');
        $('.checkboxSend').each(function() {
            var ele = $(this);
            
             if(ele.is(':checked')){
                var case_code   = ele.attr('case_code');
                var case_id     = ele.attr('case_id');
                html = "<tr id='process_case_code_"+case_code+"'>"+
                            "<td class='text-case-code'>"+case_code+"</td>"+
                            "<td class='process' id='case_id_"+case_id+"'>กำลังดำเนินการ"+
                        "</tr>";
                $('#process .modal-body .table tbody').append(html);
                $.ajax({
                    url: 'index.php?route=appeal/submitAddOPM',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        case_code: case_code,
                        case_id: case_id
                    },
                })
                .done(function(json) {
                    console.log(json);
                    $('#process_case_code_'+case_code+' .process').text(json.status);
                    console.log("success");
                })
                .fail(function(a,b,c) {
                    // 
                    console.log(a);
                    console.log(b);
                    console.log(c);
                })
                .always(function() {
                    console.log("complete");
                });
             }
        });
        e.preventDefault();
    });
    $(document).on('click','#checkAll',function(){
        $('.checkboxSend').not(this).prop('checked', this.checked);
        $('#btn-send-topic').addClass('disabled');
        $('#btn-send-topic').attr('aria-disabled','true');
        $('.checkboxSend').each(function() {
             if($(this).is(':checked')){
                $('#btn-send-topic').removeClass('disabled');
                $('#btn-send-topic').attr('aria-disabled','false');
                 return false;
             }
        });
    });
    $(document).on('click','.checkboxSend',function(e){
        $('#btn-send-topic').addClass('disabled');
        $('#btn-send-topic').attr('aria-disabled','true');
        $('.checkboxSend').each(function() {
             if($(this).is(':checked')){
                $('#btn-send-topic').removeClass('disabled');
                $('#btn-send-topic').attr('aria-disabled','false');
                 return false;
             }
        });
    });
    $('#appealOPM').addClass('active');

    $('.btn-del').click(function(event){
        if(confirm('ลบข้อมูล')==true){
            window.location.href = $(this).attr('href');
        }else{
            event.preventDefault();
        }
    });
</script>