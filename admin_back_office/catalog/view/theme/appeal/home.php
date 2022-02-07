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
                            <form action="" method="post">
                                <div class="row mb-3">
                                    <div class="col-md-3 mb-3">
                                        <label for="">เรื่องที่ร้องเรียน/ร้องทุกข์</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">เลือก</option>
                                            <?php foreach($topic as $val){ ?>
                                                <option value=""><?php echo $val['topic_title']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="">วันที่เรื่องร้องเรียน/ร้องทุกข์</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="">ถึงวันที่</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="">เวลาที่ร้องเรียน/ร้องทุกข์</label>
                                        <input type="time" class="form-control">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">รหัสเรื่องที่ร้องเรียน/ร้องทุกข์ (Ticket ID)</label>
                                        <input type="text" class="form-control" placeholder="Ticket ID">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">สถานะเรื่องร้องเรียน/ร้องทุกข์</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">เลือก</option>
                                            <?php foreach($status as $val){ ?>
                                            <option value="<?php echo $val['id']; ?>"><?php echo $val['text']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">หน่วยงานที่รับผิดชอบ</label>
                                        <select name="" id="" class="form-control">
                                            <?php foreach($department as $val){?>
                                            <option value="<?php echo $val['DEPARTMENT_ID'];?>">
                                                <?php echo $val['DEPARTMENT_NAME'];?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="">สถานที่</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="">วันที่คาดว่าจะแล้วเสร็จ</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="">หมายเลขบัตรประชาชน</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">ชื่อสกุลผู้ร้องเรียน/ร้องทุกข์</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">เบอร์โทรศัพท์ผู้ร้องเรียน/ร้องทุกข์</label>
                                        <input type="text" class="form-control" placeholder="">
                                        <input type="radio" name="chkTypePhone" id="rdoHome" checked>
                                        <label for="rdoHome">โทรศัพท์บ้าน</label>
                                        <input type="radio" name="chkTypePhone" id="rdoPhone">
                                        <label for="rdoPhone">มือถือ</label>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">คำสำคัญ</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">ช่องทางการร้องเรียน</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">จดหมาย</option> 
                                            <option value="">เว็บไซต์ และ อีเมล์ </option>
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
                                        <button class="btn btn-warning " type="reset">ล้างคำค้นหา</button>
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
                                                <i class="fas fa-square-full status-yellow"></i> เรื่องร้องเรียน/ร้องทุกข์อยู่ระหว่างการดำเนินการ
                                            </td>
                                            <td>
                                                <i class="fas fa-square-full status-orange"></i> เรื่องร้องเรียน/ร้องทุกข์อีก 7 วันจะครบกำหนด
                                            </td>
                                            <td>
                                                <i class="fas fa-square-full status-red"></i> เรื่องร้องเรียน/ร้องทุกข์ที่ยังไม่เสร็จ และช้ากว่ากำหนด
                                            </td>
                                            <td>
                                                <i class="fas fa-square-full status-green"></i> เรื่องร้องเรียน/ร้องทุกข์ที่ดำเนินการเสร็จสิ้นแล้ว
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
                                                <th>เรื่องที่ร้องเรียน/ร้องทุกข์</th>
                                                <th>ช่องทางการร้องเรียน</th>
                                                <th>ช่องสถานที่เกิดเหตุ</th>
                                                <th style="width:130px;">วันที่ร้องเรียน</th>
                                                <th class="text-center" style="width:50px;">สถานะ</th>
                                                <th class="text-center" style="width:200px;">การจัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 1;
                                                foreach($lists as $key => $value){ 
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i++; ?></td>
                                                <td><?php echo $value['ticketId']; ?></td>
                                                <td><?php echo $value['fullname']; ?></td>
                                                <td><?php echo $value['topicTitle']; ?></td>
                                                <td>จากเว็บไซต์</td>
                                                <td>(จังหวัด)</td>
                                                <td><?php echo $value['dateadd']; ?></td>
                                                <td></td>
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
</script>