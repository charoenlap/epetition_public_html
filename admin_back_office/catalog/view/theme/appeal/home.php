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
                                        <label for="">เรื่องที่ร้องเรียน/ร้องทุกข์</label>
                                        <select name="topic_id" id="topic_id" class="form-control">
                                            <option value="">เลือก</option>
                                            <?php foreach($topic as $val){ ?>
                                                <option value="<?php echo $val['id']; ?>"><?php echo $val['topic_title']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="">วันที่เรื่องร้องเรียน/ร้องทุกข์</label>
                                        <input type="text" name="dateadd" value="<?php echo $dateadd; ?>" class="datethaipicker form-control">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="">ถึงวันที่</label>
                                        <input type="text" name="dateadd_end" value="<?php echo $dateadd_end; ?>" class="datethaipicker form-control">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="dateadd">เวลาที่ร้องเรียน/ร้องทุกข์</label>
                                        <input type="text" name="dateadd_time" value="<?php echo $dateadd_time; ?>" class="time timepicker form-control">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">รหัสเรื่องที่ร้องเรียน/ร้องทุกข์ (Ticket ID)</label>
                                        <input type="text" name="case_code" value="<?php echo $case_code; ?>" id="case_code" class="form-control" placeholder="Ticket ID">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">สถานะเรื่องร้องเรียน/ร้องทุกข์</label>
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
                                            <?php foreach($department as $val){?>
                                            <option value="<?php echo $val['DEPARTMENT_ID'];?>" <?php echo ($department_id==$val['DEPARTMENT_ID']?'selected':'');?>>
                                                <?php echo $val['DEPARTMENT_NAME'];?>
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
                                        <label for="">ชื่อสกุลผู้ร้องเรียน/ร้องทุกข์</label>
                                        <input type="text" name="name_lastname" value="<?php echo $name_lastname;?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">เบอร์โทรศัพท์ผู้ร้องเรียน/ร้องทุกข์</label>
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
                                        <select name="type" id="type" class="form-control">
                                            <option value="1">เว็บไซต์ และ อีเมล์ </option>
                                            <option value="">Call center </option>
                                            <option value="">ยื่นหนังสือด้วยตนเอง</option>
                                            <option value="">facebook </option>
                                            <option value="">ส่วนด่วน</option>
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
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <a href="<?php echo route('appeal');?>" class="btn btn-theme">เรื่องร้องเรียนที่ได้โดยตรง</a>
                                    <a href="<?php echo route('appeal/opm');?>" class="btn btn-primary">เรื่องร้องเรียนที่ได้รับจาก สปน.</a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="" class="btn btn-warning"><i class="fas fa-cloud-upload-alt"></i> สำรองข้อมูล</a>
                                    <a href="<?php echo route('appeal/add');?>" class="btn btn-info"><i class="fas fa-folder-plus"></i> แบบฟอร์มเรื่องร้องเรียน</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <i class="fas fa-square-full status-yellow"></i> <small>เรื่องร้องเรียน/ร้องทุกข์อยู่ระหว่างการดำเนินการ</small>
                                            </td>
                                            <td>
                                                <i class="fas fa-square-full status-orange"></i> <small>เรื่องร้องเรียน/ร้องทุกข์อีก 7 วันจะครบกำหนด</small>
                                            </td>
                                            <td>
                                                <i class="fas fa-square-full status-red"></i> <small>เรื่องร้องเรียน/ร้องทุกข์ที่ยังไม่เสร็จ และช้ากว่ากำหนด</small>
                                            </td>
                                            <td>
                                                <i class="fas fa-square-full status-green"></i> <small>เรื่องร้องเรียน/ร้องทุกข์ที่ดำเนินการเสร็จสิ้นแล้ว</small>
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
                                                <th class="text-center"  style="width:45px;">ลำดับ</th>
                                                <th  style="width:80px;">Ticket ID</th>
                                                <th style="width:180px;">ชื่อผู้ร้องเรียน</th>
                                                <th>ประเภทเรื่องที่ร้องเรียน</th>
                                                <th>ช่องทางการร้องเรียน</th>
                                                <th>สถานที่เกิดเหตุ</th>
                                                <th style="width:130px;">วันที่ร้องเรียน</th>
                                                <th class="text-center" style="width:50px;">สถานะ</th>
                                                <th class="text-center" style="width:200px;">การจัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = ($page-1)*DEFAULT_LIMIT_PAGE;
                                                foreach($lists as $key => $value){ 
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo ++$i; ?></td>
                                                <td><?php echo $value['case_code']; ?></td>
                                                <td><?php echo $value['fullname']; ?></td>
                                                <td><?php echo $value['topicTitle']; ?></td>
                                                <td>จากเว็บไซต์</td>
                                                <td><?php echo $value['t_id_provinces']; ?></td>
                                                <td><?php echo $value['dateadd']; ?></td>
                                                <td>
                                                    <i class="fas fa-square-full status-<?php echo $value['status_icon']; ?>"></i>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo route('appeal/detail&id='.$value['id']);?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="รายละเอียด"><i class="fas fa-eye"></i></a>
                                                    <a href="<?php echo route('appeal/status&id='.$value['id']);?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="รับเรื่องร้องเรียน"><i class="far fa-check-square"></i></a>
                                                    <a href="<?php echo route('appeal/edit&id='.$value['id']);?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"><i class="fas fa-edit"></i></a>
                                                    <a href="<?php echo route('appeal/del&id='.$value['id']); ?>" class="btn btn-danger btn-sm btn-del" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <!-- <tr>
                                                <td class="text-center">1</td>
                                                <td>65010001</td>
                                                <td>นายสมชาย</td>
                                                <td>แจ้งเรื่อง</td>
                                                <td>12/10/2021</td>
                                                <td class="text-center"><i class="fas fa-check status-green"></i></td>
                                                <td class="text-center">
                                                    <a href="<?php echo route('appeal/detail');?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="รายละเอียด"><i class="fas fa-eye"></i></a>
                                                    <a href="<?php echo route('appeal/status');?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="รับเรื่องร้องเรียน"><i class="far fa-check-square"></i></a>
                                                    <a href="<?php echo route('appeal/edit');?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"><i class="fas fa-edit"></i></a>
                                                    <a href="" class="btn btn-danger btn-sm btn-del" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td>65010002</td>
                                                <td>นายสมชาย</td>
                                                <td>แจ้งเรื่อง</td>
                                                <td>12/10/2021</td>
                                                <td class="text-center"><i class="fas fa-times-circle status-red"></i></td>
                                                <td class="text-center">
                                                    <a href="<?php echo route('appeal/detail');?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="รายละเอียด"><i class="fas fa-eye"></i></a>
                                                    <a href="<?php echo route('appeal/status');?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="รับเรื่องร้องเรียน"><i class="far fa-check-square"></i></a>
                                                    <a href="<?php echo route('appeal/edit');?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"><i class="fas fa-edit"></i></a>
                                                    <a href="" class="btn btn-danger btn-sm btn-del" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td>65010003</td>
                                                <td>นายสมชาย</td>
                                                <td>แจ้งเรื่อง</td>
                                                <td>12/10/2021</td>
                                                <td class="text-center"><i class="fas fa-hourglass-half status-orange"></i></td>
                                                <td class="text-center">
                                                    <a href="<?php echo route('appeal/detail');?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="รายละเอียด"><i class="fas fa-eye"></i></a>
                                                    <a href="<?php echo route('appeal/status');?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="รับเรื่องร้องเรียน"><i class="far fa-check-square"></i></a>
                                                    <a href="<?php echo route('appeal/edit');?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"><i class="fas fa-edit"></i></a>
                                                    <a href="" class="btn btn-danger btn-sm btn-del" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">4</td>
                                                <td>65010004</td>
                                                <td>นายสมชาย</td>
                                                <td>แจ้งเรื่อง</td>
                                                <td>12/10/2021</td>
                                                <td class="text-center"><i class="fas fa- status-yellow"></i></td>
                                                <td class="text-center">
                                                    <a href="<?php echo route('appeal/detail');?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="รายละเอียด"><i class="fas fa-eye"></i></a>
                                                    <a href="<?php echo route('appeal/status');?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="รับเรื่องร้องเรียน"><i class="far fa-check-square"></i></a>
                                                    <a href="<?php echo route('appeal/edit');?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"><i class="fas fa-edit"></i></a>
                                                    <a href="" class="btn btn-danger btn-sm btn-del" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">5</td>
                                                <td>65010005</td>
                                                <td>นายสมชาย</td>
                                                <td>แจ้งเรื่อง</td>
                                                <td>12/10/2021</td>
                                                <td class="text-center"><i class="fas fa-check status-green"></i></td>
                                                <td class="text-center">
                                                    <a href="<?php echo route('appeal/detail');?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="รายละเอียด"><i class="fas fa-eye"></i></a>
                                                    <a href="<?php echo route('appeal/status');?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="รับเรื่องร้องเรียน"><i class="far fa-check-square"></i></a>
                                                    <a href="<?php echo route('appeal/edit');?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"><i class="fas fa-edit"></i></a>
                                                    <a href="" class="btn btn-danger btn-sm btn-del" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr> -->
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
<script>
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