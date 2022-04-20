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
    <form action="<?php echo route('setting/submitApprove'); ?>" method="POST">
        <section class="content">
            <?php if($active_view){ ?>
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <label for="">ช่วงวันที่ต้องการมอบหมายแทน</label>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control datethaipicker" name="date_start">
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control datethaipicker" name="date_end">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-3">
                                    <label for="">มอบหมายให้ บุคคลทำหน้าที่แทน</label>
                                </div>
                                <div class="col-6">
                                    <select name="assign_user_id" id="assign_user_id" class="form-control">
                                        <option value=""></option>
                                        <?php foreach($users as $val){?>
                                            <option value="<?php echo $val['AUT_USER_ID'];?>"><?php echo $val['FIRSTNAME'].' '.$val['LASTNAME'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary" value="บันทึก">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>วันที่เริ่ม</th>
                                            <th>วันที่สิ้นสุด</th>
                                        </thead>
                                        <tbody>
                                            <?php if($listAssign){ ?>
                                                <?php foreach($listAssign as $val){?>
                                                    <tr>
                                                        <td><?php echo $val['FIRSTNAME'];?></td>
                                                        <td><?php echo $val['LASTNAME'];?></td>
                                                        <td><?php echo $val['date_start'];?></td>
                                                        <td><?php echo $val['date_end'];?></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php }else{?>
                                                    <tr>
                                                        <td colspan="4">ไม่พบข้อมูล</td>
                                                    </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
    </form>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script>
    $(document).ready(function(){
        $('.datethaipicker').datepicker({
            dateFormat: 'yy-mm-dd' 
        //  $('.datethaipicker').datetimepicker({
        //     // yearOffset:222,
        //     lang:'th',
        //     timepicker:false,
        //     format:'Y-m-d H:i:s',
        //     formatDate:'Y-m-d',
        //     // minDate:'-1970/01/02', // yesterday is minimum date
        //     // maxDate:'+1970/01/02' // and tommorow is maximum date calendar
        });
    });
        
    // });
    // $( function() {
    //     var dateFormat = "yy-mm-dd",
    //       from = $( "#date_start" )
    //         .datepicker({
    //           defaultDate: "+1w",
    //           changeMonth: true,
    //           numberOfMonths: 3
    //         })
    //         .on( "change", function() {
    //           to.datepicker( "option", "minDate", getDate( this ) );
    //         }),
    //       to = $( "#date_end" ).datepicker({
    //         defaultDate: "+1w",
    //         changeMonth: true,
    //         numberOfMonths: 3
    //       })
    //       .on( "change", function() {
    //         from.datepicker( "option", "maxDate", getDate( this ) );
    //       });
    // } );
    // function getDate( element ) {
    //   var date;
    //   try {
    //     date = $.datepicker.parseDate( dateFormat, element.value );
    //   } catch( error ) {
    //     date = null;
    //   }
 
    //   return date;
    // }
</script>