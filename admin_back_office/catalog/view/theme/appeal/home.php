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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo route('appeal');?>" method="get">
                                <input type="hidden" name="route" value="appeal">
                                <div class="row mb-3">
                                    <div class="col-md-3 mb-3">
                                        <label for="">ประเภท</label>
                                        <select name="topic_id" id="topic_id" class="form-control">
                                            <option value="">ประเภท</option>
                                            <?php foreach($topic as $val){ ?>
                                                <option value="<?php echo $val['id']; ?>"><?php echo $val['topic_title']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="">วันที่</label>
                                        <input type="text" name="dateadd" value="<?php echo $dateadd; ?>" class="datethaipicker form-control">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="">ถึงวันที่</label>
                                        <input type="text" name="dateadd_end" value="<?php echo $dateadd_end; ?>" class="datethaipicker form-control">
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label for="">รหัสเรื่อง (Ticket ID)</label>
                                        <input type="text" name="case_code" value="<?php echo $case_code; ?>" id="case_code" class="form-control" placeholder="Ticket ID">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">สถานะ</label>
                                        <select name="status_id" class="form-control">
                                            <option value="">เลือก</option>
                                            <?php foreach($status as $val){ ?>
                                            <option value="<?php echo $val['id']; ?>" <?php echo ($status_id==$val['id']?'selected':'');?>><?php echo $val['status_text']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">หน่วยงานที่รับผิดชอบ</label>
                                        <select name="department_id" id="department_id" class="form-control">
                                            <option value=""></option>
                                            <?php foreach($department->rows as $val){?>
                                            <option value="<?php echo $val['id'];?>" <?php echo ($department_id==$val['id']?'selected':'');?>>
                                                <?php echo $val['agency_minor_title'];?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="t_id_provinces">สถานที่</label>
                                        <input type="text" name="t_id_provinces" value="<?php echo $t_id_provinces;?>" id="t_id_provinces" class="form-control">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="">วันที่คาดว่าจะแล้วเสร็จ</label>
                                        <input type="text" name="date_respect" value="<?php echo $date_respect;?>" class="datethaipicker form-control">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="">หมายเลขบัตรประชาชน</label>
                                        <input type="text" name="id_card" value="<?php echo $id_card;?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">ชื่อสกุล</label>
                                        <input type="text" name="name_lastname" value="<?php echo $name_lastname;?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">เบอร์โทรศัพท์</label>
                                        <input type="text" name="phone" value="<?php echo $phone;?>" class="form-control" placeholder="">
                                        <input type="radio" name="chkTypePhone" <?php echo ($chkTypePhone=="tel"?'selected':'');?> value="tel" id="rdoHome" checked>
                                        <label for="rdoHome">โทรศัพท์บ้าน</label>
                                        <input type="radio" name="chkTypePhone" <?php echo ($chkTypePhone=="phone"?'selected':'');?> value="phone" id="rdoPhone">
                                        <label for="rdoPhone">มือถือ</label>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">คำสำคัญ</label>
                                        <input type="text" class="form-control" name="response_person" placeholder="" value="<?php echo $response_person;?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">ช่องทางการร้องเรียน</label>
                                        <select name="addBy" id="addBy" class="form-control">
                                            <option value="">ทั้งหมด</option>
                                            <option value="0" <?php echo ($addBy==0?'selected':'');?>>เว็บไซต์</option>
                                            <option value="1" <?php echo ($addBy==1?'selected':'');?>>แอฟพิเคชั่น</option>
                                            <option value="2" <?php echo ($addBy==2?'selected':'');?>>สปน</option>
                                            <option value="3" <?php echo ($addBy==3?'selected':'');?>>ยื่นหนังสือด้วยตนเอง</option>
                                            <option value="4" <?php echo ($addBy==4?'selected':'');?>>จดหมาย</option>
                                            <option value="5" <?php echo ($addBy==5?'selected':'');?>>หมายเลขโทรศัพท์</option>
                                            <option value="6" <?php echo ($addBy==6?'selected':'');?>>สายด่วน</option>
                                            <option value="7" <?php echo ($addBy==7?'selected':'');?>>อีเมล</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <label for="">&nbsp;</label>
                                        <button class="btn btn-success " type="submit"><i class="fas fa-search"></i> ค้นหา</button>
                                        <a class="btn btn-warning" href="<?php echo route("appeal"); ?>">ล้างคำค้นหา</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <!-- <a href="<?php echo route('appeal');?>" class="btn btn-theme">เรื่องร้องเรียนที่ได้โดยตรง</a>
                                    <a href="<?php echo route('appeal/opm');?>" class="btn btn-primary">เรื่องร้องเรียนจาก สปน.</a> -->
                                </div>
                                <div class="col-md-6 text-right">
                                    <!-- <a href="" class="btn btn-warning"><i class="fas fa-cloud-upload-alt"></i> สำรองข้อมูล</a> -->
                                    <?php if($active_add){ ?>
                                    <a href="<?php echo route('appeal/add');?>" class="btn btn-info"><i class="fas fa-folder-plus"></i> เพิ่มเรื่องร้องเรียน</a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <i class="fas fa-square-full status-yellow"></i> <small>อยู่ระหว่างการดำเนินการ</small>
                                            </td>
                                            <td>
                                                <i class="fas fa-square-full status-orange"></i> <small>อีก 7 วันจะครบกำหนด</small>
                                            </td>
                                            <td>
                                                <i class="fas fa-square-full status-red"></i> <small>ยังไม่เสร็จ และช้ากว่ากำหนด</small>
                                            </td>
                                            <td>
                                                <i class="fas fa-square-full status-green"></i> <small>ดำเนินการเสร็จสิ้นแล้ว</small>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="checkAll"></th>
                                                <th class="text-center align-top"  style="width:45px;">ลำดับ</th>
                                                <th class="align-top"  style="width:80px;">Ticket ID</th>
                                                <th class="align-top" style="width:180px;">ชื่อผู้ร้องเรียน</th>
                                                <th class="align-top">ประเภทเรื่องที่ร้องเรียน</th>
                                                <th class="align-top">ช่องทางการร้องเรียน</th>
                                                <th class="align-top">สถานที่เกิดเหตุ</th>
                                                <th class="align-top" style="width:130px;">วันที่ร้องเรียน</th>
                                                <th class="align-top" style="width:130px;">จำนวนวันที่ผ่านมา</th>
                                                <th class="text-center align-top" style="width:50px;">สถานะ</th>
                                                <th class="text-center align-top" style="width:200px;">การจัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = ($page-1)*DEFAULT_LIMIT_PAGE;
                                                foreach($lists as $key => $value){ 
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="checkboxSend" 
                                                        value="<?php echo $value['id']; ?>"
                                                        case_code="<?php echo $value['case_code']; ?>"
                                                    >
                                                </td>
                                                <td class="text-center"><?php echo ++$i; ?></td>
                                                <td><?php echo $value['case_code']; ?></td>
                                                <td><?php echo $value['fullname']; ?></td>
                                                <td><?php echo $value['topicTitle']; ?></td>
                                                <td><?php echo $value['addBy']; ?></td>
                                                <td><?php echo $value['PROVINCE_NAME']; ?></td>
                                                <td><?php echo $value['dateadd']; ?></td>
                                                <td><?php echo $value['days']; ?></td>
                                                <td>
                                                    <i class="fas fa-square-full status-<?php echo $value['status_icon']; ?>"></i>
                                                </td>
                                                <td class="text-center">
                                                    <?php if($active_view){ ?>
                                                        <a href="<?php echo route('appeal/detail&id='.$value['id']);?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="รายละเอียด"><i class="fas fa-eye"></i></a>
                                                        <?php /* ?>
                                                        <a href="<?php echo route('appeal/status&id='.$value['id']);?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="รับเรื่องร้องเรียน"><i class="far fa-check-square"></i></a>
                                                        <?php */?>
                                                    <?php }?>
                                                    <?php /*if($active_edit){ ?>
                                                        <a href="<?php echo route('appeal/edit&id='.$value['id']);?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"><i class="fas fa-edit"></i></a>
                                                    <?php }*/ ?>
                                                    <?php if($active_del){ ?>
                                                        <a href="<?php echo route('appeal/del&id='.$value['id']); ?>" class="btn btn-danger btn-sm btn-del" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"><i class="far fa-trash-alt"></i></a>
                                                    <?php }?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <!-- <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            </li> -->
                                            <?php for($i=1; $i<=$page_limit; $i++){ ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?php echo route('appeal&page='.$i); ?>"><?php echo $i;?></a>
                                            </li>
                                            <?php } ?>
                                            <!-- <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                            </li> -->
                                        </ul>
                                    </nav>
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
<div class="modal fade" id="process" tabindex="-1" role="dialog" aria-labelledby="processTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ส่งเรื่องไปยัง สปน</h5>
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
                var case_code = ele.attr('case_code');
                html = "<tr id='process_case_code_"+case_code+"'>"+
                            "<td class='text-case-code'>"+case_code+"</td>"+
                            "<td class='process'>กำลังดำเนินการ"+
                        "</tr>";
                $('#process .modal-body .table tbody').append(html);
                $.ajax({
                    url: 'index.php?route=appeal/submitSendOPM',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        case_code: case_code
                    },
                })
                .done(function(json) {
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
    $('#appeal').addClass('active');

    $('.btn-del').click(function(event){
        if(confirm('ลบข้อมูล')==true){
            window.location.href = $(this).attr('href');
        }else{
            event.preventDefault();
        }
    });
    $(document).ready(function(){
        $('.datethaipicker').datetimepicker({
            // yearOffset:222,
            lang:'ch',
            timepicker:false,
            format:'Y-m-d',
            formatDate:'Y-m-d',
            // minDate:'-1970/01/02', // yesterday is minimum date
            // maxDate:'+1970/01/02' // and tommorow is maximum date calendar
        });

        $('.time').datetimepicker({
            datepicker:false,
            format:'H:i',
            step:5
        });
    });

</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script>
    $(document).ready(function(){
        $('.datethaipicker').datepicker({
            dateFormat: 'yy-mm-dd' 
        });
    });
</script>