<?php 
    $month = array(
        array("name" => 'มกราคม',"count" => '19'),
        array("name" => 'กุมภาพันธ์',"count" => '55'),
        array("name" => 'มีนาคม',"count" => '23'),
        array("name" => 'เมษายน',"count" => '76'),
        array("name" => 'พฤษภาคม',"count" => '12'),
        array("name" => 'มิถุนายน',"count" => '1'),
        array("name" => 'กรกฎาคม',"count" => '98'),
        array("name" => 'สิงหาคม',"count" => '89'),
        array("name" => 'กันยายน',"count" => '54'),
        array("name" => 'ตุลาคม',"count" => '55'),
        array("name" => 'พฤศจิกายน',"count" => '32'),
        array("name" => 'ธันวาคม',"count" => '41')
    );
    
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">ความก้าวหน้าของเรื่องร้องเรียน</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">ความก้าวหน้าของเรื่องร้องเรียน</li>
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
                            <h4 class="card-title">ความก้าวหน้าของเรื่องร้องเรียน</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="">ปี พ.ศ.</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">2564</option>
                                        <option value="">2563</option>
                                        <option value="">2562</option>
                                        <option value="">2561</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="">&nbsp;</label><br>
                                    <button class="btn btn-primary">ค้นหา</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>เดือน</th>
                                                <th>จำนวนเรื่อง</th>
                                                <th width="10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($month as $key => $value){ ?>
                                            <tr>
                                                <td><?php echo $value['name']; ?></td>
                                                <td><?php echo $value['count']; ?></td>
                                                <td class="text-center"><a href="<?php echo route('progress/detail'); ?>" class="btn btn-info">รายละเอียด</a></td>
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
    </section>
    <!-- /.content -->
  </div>

<script>
    $('#progress').addClass('active');
</script>
