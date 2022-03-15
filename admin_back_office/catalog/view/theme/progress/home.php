<?php 
    $month = array(
        array("name" => 'มกราคม',   "count" => '0', "index" => 1),
        array("name" => 'กุมภาพันธ์',  "count" => '0', "index" => 2),
        array("name" => 'มีนาคม',    "count" => '0', "index" => 3),
        array("name" => 'เมษายน',   "count" => '0', "index" => 4),
        array("name" => 'พฤษภาคม',  "count" => '0', "index" => 5),
        array("name" => 'มิถุนายน',   "count" => '0', "index" => 6),
        array("name" => 'กรกฎาคม',  "count" => '0', "index" => 7),
        array("name" => 'สิงหาคม',   "count" => '0', "index" => 8),
        array("name" => 'กันยายน',   "count" => '0', "index" => 9),
        array("name" => 'ตุลาคม',    "count" => '0', "index" => 10),
        array("name" => 'พฤศจิกายน', "count" => '0', "index" => 11),
        array("name" => 'ธันวาคม',   "count" => '0', "index" => 12)
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
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">ความก้าวหน้าของเรื่องร้องเรียน</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
        <?php if($active_view){ ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ความก้าวหน้าของเรื่องร้องเรียน</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo route('progress');?>" method="get">
                                <input type="hidden" name="route" value="progress">
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="">ปี พ.ศ.</label>
                                        <?php $count_year = date('Y')+543; ?>
                                        <select name="year" id="year" class="form-control">
                                            <?php for($i=$count_year-5;$i<=$count_year;$i++){?>
                                                <option value="<?php echo $i;?>" 
                                                    <?php echo ($year==$i?'selected':'');?>>
                                                    <?php echo $i;?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">&nbsp;</label><br>
                                        <button class="btn btn-primary" type="submit">ค้นหา</button>
                                    </div>
                                </div>
                            </form>
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
                                                <td>
                                                    <?php echo $listProgress['detail'][$value['index']][0]['count_id']; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo route('progress/detail&year='.$year.'&month='.$value['index']); ?>" 
                                                        class="btn btn-info">รายละเอียด</a>
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
  </div>

<script>
    $('#progress').addClass('active');
</script>
