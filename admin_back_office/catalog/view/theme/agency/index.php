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
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-right mb-3">
                      <a href="<?php echo route('setting/agencyAdd'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> เพิ่ม</a>
                    </div>
                    <div class="col-md-12">
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="50px;" class="text-center">#</th>
                                    <th>หน่วยงาน</th>
                                    <th width="180px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $i = '1';
                                foreach($lists as $key => $val){ 
                              ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++; ?></td>
                                    <td><?php echo $val['agency_title']; ?></td>
                                    <td class="text-center">
                                      <a href="<?php echo route('user/settingAgency&id='.$val['id']); ?>" class="btn btn-primary"><i class="fas fa-cog"></i></a>
                                      <a href="<?php echo route('setting/agencyEdit&id='.$val['id']); ?>" class="btn btn-primary"><i class="fas fa-edit"></i> แก้ไข</a>
                                      <a href="<?php echo route('setting/agencyDel&id='.$val['id']); ?>" class="btn btn-danger btn-del"><i class="fas fa-trash"></i> ลบ</a>
                                    </td>
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
<script>
  $('.btn-del').click(function (e) { 
    if(confirm('Do you want to delete ?')==true){
      window.location = $(this).attr('href');
    }else{
      e.preventDefault();
    }
  });
  $('#table').DataTable({
    searching:false,
    lengthChange:false
  });
</script>