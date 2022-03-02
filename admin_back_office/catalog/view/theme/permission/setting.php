<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">กำหนดสิทธ์การใช้งาน</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo route('home');?>">หน้าหลัก</a></li>
            <li class="breadcrumb-item"><a href="<?php echo route('user/group');?>">กำหนดสิทธิ์กลุ่มผู้ใช้งาน</a></li>
            <li class="breadcrumb-item active">กำหนดสิทธ์การใช้งาน</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    ตั้งค่าสิทธิ์การเข้าถึง
                </div>
                <div class="card-body">
                    <form action="<?php echo $action;?>" method="POST">
                        <input type="hidden" name="group_id" value="<?php echo $group_id;?>">
                        <div class="row mb-2">
                            <div class="col-md-12 text-right">
                                <input type="submit" value="บันทึก" class="btn btn-primary">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <th width="100px;" class="text-center">เมนู<br><input type="checkbox" id="checkAll"></th>
                                        <th>หัวข้อ</th>
                                        <th>เพิ่ม</th>
                                        <th>แก้ไข</th>
                                        <th>ปรับสถานะ</th>
                                    </thead>
                                    <tbody>
                                    <?php foreach($menu->rows as $val){?>
                                        <tr>
                                            <td class="text-center"><input type="checkbox" 
                                                name="menu_id[<?php echo $val['MENU_ID'];?>]" 
                                                value="<?php echo $val['MENU_ID'];?>" 
                                                class="checkboxSend"
                                                <?php echo ($val['checkbox']?'checked':'');?>></td>
                                            <td><?php echo $val['MENU-DESC'];?></td>
                                            <td><input type="checkbox" 
                                                name="user_add[<?php echo $val['MENU_ID'];?>]" 
                                                value="1" 
                                                <?php echo ($val['USER_ADD']?'checked':'');?>></td>
                                            <td><input type="checkbox" 
                                                name="user_edit[<?php echo $val['MENU_ID'];?>]" 
                                                value="1" 
                                                <?php echo ($val['USER_EDIT']?'checked':'');?>></td>
                                            <td><input type="checkbox" 
                                                name="user_del[<?php echo $val['MENU_ID'];?>]" 
                                                value="1" 
                                                <?php echo ($val['USER_DELETE']?'checked':'');?>></td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                    <?php /* ?>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="">ข้อมูลผู้ร้องเรียน</label>
                        </div>
                        <div class="col-md-5">
                            <select name="" id="" class="form-control">
                                <option value="">เลือกปิดข้อมูลส่วนตัว</option>
                                <option value="">เลขประจำตัวประชาชน</option>
                                <option value="">ชื่อสกุล</option>
                                <option value="">เบอร์โทร</option>
                                <option value="">บ้านเลขที่</option>
                            </select>
                            <!-- <button class="btn btn-primary">เลือกหน่วยงาน</button> -->
                        </div>
                        
                        <div class="col-md-2">
                            <button class="btn btn-primary" id="addFrom"><i class="fas fa-folder-plus"></i> เพิ่ม</button>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>รายการ</th>
                                        <th style="width:100px;">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>ชื่อ</td>
                                        <td><a href="#" class="btn btn-primary">ลบ</a></td>
                                    </tr>
                                </tbody>
                            </table>   
                        </div>
                    </div>
                    <?php */?>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).on('click','#checkAll',function(){
        $('.checkboxSend').not(this).prop('checked', this.checked);
        $('.checkboxSend').each(function() {
             if($(this).is(':checked')){
                $('#btn-send-topic').removeClass('disabled');
                $('#btn-send-topic').attr('aria-disabled','false');
                 return false;
             }
        });
    });
</script>