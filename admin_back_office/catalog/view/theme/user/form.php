
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
                            <form action="<?php echo $action;?>" method="POST">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="">หน่วยงาน</label>
                                        <select name="id_agency" id="id_agency" class="form-control">
                                            <option value="">เลือกหน่วยงาน</option>
                                            <?php foreach($agency->rows as $val){
                                                $id_agency = (isset($user['id_agency'])?$user['id_agency']:'');
                                            ?>
                                                <option value="<?php echo $val['id'];?>"
                                                    <?php echo ($id_agency==$val['id']?'SELECTED':'');?>
                                                >
                                                    <?php echo $val['agency_title'];?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">หน่วยงานระดับส่วน</label>
                                        <select name="id_agency_minor" id="id_agency_minor" class="form-control">
                                            <option value="">เลือกหน่วยงานระดับส่วน</option>
                                            <?php foreach($agencyMinor->rows as $val){ 
                                                $id_agency_minor = (isset($user['id_agency_minor'])?$user['id_agency_minor']:'');
                                            ?>
                                                <option value="<?php echo $val['id'];?>"
                                                     <?php echo ($id_agency_minor==$val['id']?'SELECTED':'');?>
                                                >
                                                    <?php echo $val['agency_minor_title'];?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="">กลุ่มผู้ใช้งาน</label>
                                        <select name="USER_GROUP_ID" id="USER_GROUP_ID" class="form-control">
                                            <?php foreach($getGroups->rows as $val){
                                                $USER_GROUP_ID = (isset($user['USER_GROUP_ID'])?$user['USER_GROUP_ID']:'');
                                            ?>
                                                <option value="<?php echo $val['USER_GROUP_ID'];?>"
                                                    <?php echo ($USER_GROUP_ID==$val['USER_GROUP_ID']?'SELECTED':'');?>>
                                                    <?php echo $val['GROUP_NAME'];?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">    
                                    <div class="col-md-3 mb-3">
                                        <label for="">ชื่อผู้ใช้</label>
                                        <input type="text" class="form-control" name="AUT_USERNAME" value="<?php echo (isset($user['AUT_USERNAME'])?$user['AUT_USERNAME']:'');?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">ชื่อผู้ใช้ Open ID</label>
                                        <input type="text" class="form-control" name="open_id_email" value="<?php echo (isset($user['open_id_email'])?$user['open_id_email']:'');?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">ชื่อผู้ใช้ AD</label>
                                        <input type="text" class="form-control" name="user_ldap" value="<?php echo (isset($user['user_ldap'])?$user['user_ldap']:'');?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">รหัสผ่าน</label>
                                        <input type="password" class="form-control" name="AUT_PASSWORD">
                                    </div>
                                    
                                    <div class="col-md-4 mb-3">
                                        <label for="">ชื่อ</label>
                                        <input type="text" class="form-control" name="FIRSTNAME"  value="<?php echo (isset($user['FIRSTNAME'])?$user['FIRSTNAME']:'');?>">
                                    </div>
                                    <div class="col-md-4 mb-3">
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
    $(document).on('change','#id_agency',function(e){
        var ele = $(this);
        var val = ele.val();
        $.ajax({
            url: 'index.php?route=user/getAgencyMinor',
            type: 'GET',
            dataType: 'json',
            data: {
                id_agency: val
            },
        })
        .done(function(json) {
            $('#id_agency_minor option').each(function() {
                $(this).remove();
            });
            $.each(json, function(index, val) {
                 $('#id_agency_minor').append($('<option>', {
                    value: val.id_agency,
                    text: val.agency_minor_title
                }));
            });
            console.log("success");
        })
        .fail(function(a,b,c) {
            console.log(a);
            console.log(b);
            console.log(c);
        })
        .always(function() {
            console.log("complete");
        });
        
    });
</script>
