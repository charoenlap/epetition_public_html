
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $title;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active"><?php echo $title;?></li>
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
                            <h4 class="card-title">ข้อมูลผู้ใช้งาน</h4>
                        </div>
                        <div class="card-body">
                            <?php if($result){?>
                                <div class="alert alert-danger">
                                    <p><?php echo $result; ?></p>
                                </div>
                            <?php } ?>
                            <form action="<?php echo route('user/submitAdd');?>" method="POST">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="">หน่วยงาน</label>
                                        <select name="" id="DEPARTMENT_ID" class="form-control">
                                            <option value="">เลือกหน่วยงาน</option>
                                            <?php foreach($agency->rows as $val){?>
                                                <option value="<?php echo $val['id'];?>"><?php echo $val['agency_minor_title'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">ชื่อผู้ใช้</label>
                                        <input type="text" class="form-control" name="AUT_USERNAME" value="<?php echo (isset($user['AUT_USERNAME'])?$user['AUT_USERNAME']:'');?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">รหัสผ่าน</label>
                                        <input type="password" class="form-control" name="AUT_PASSWORD">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">กลุ่มผู้ใช้งาน</label>
                                        <select name="USER_GROUP_ID" id="" class="form-control">
                                            <?php foreach($getGroups->rows as $val){?>
                                                <option value="<?php echo $val['USER_GROUP_ID'];?>">
                                                    <?php echo $val['GROUP_NAME'];?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">ชื่อ</label>
                                        <input type="text" class="form-control" name="FIRSTNAME"  value="<?php echo (isset($user['FIRSTNAME'])?$user['FIRSTNAME']:'');?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">นามสกุล</label>
                                        <input type="text" class="form-control" name="LASTNAME"  value="<?php echo (isset($user['LASTNAME'])?$user['LASTNAME']:'');?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">สถานะ</label>
                                        เปิด<input type="radio" value="1" name="ACTIVE_STATUS" checked>
                                        ปิด<input type="radio" value="0" name="ACTIVE_STATUS">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary">บันทึก</button>
                                        <a href="<?php echo route('user'); ?>" class="btn btn-dark">ยกเลิก</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>

<script>
    $('#pageUser').addClass('active');
</script>
