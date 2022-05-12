<?php  
// if (!isset($_SESSION['id_admin'])) {
//   header('location:index.php?route=home/login');
//   exit();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="assets/toastr.css">
  <!-- css theme -->
  <link rel="stylesheet" href="dist/css/theme.css">
  <link href="assets/datetimepicker-master/build/jquery.datetimepicker.min.css" rel="stylesheet">
  <link href="plugins/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
  <?php if(isset($style)){ 
      foreach ($style as $key => $value) { ?>
    <link rel="stylesheet" href="<?php echo $value;?>">
  <?php } } ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo 'assets/vfs_fonts.js';?>"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script type="text/javascript" language="javascript" src="assets/datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="plugins/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<!-- <script src="plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- thailand -->

<script src="plugins/jqvmap-thai-stable/jqvmap/jquery.vmap.js"></script>
<script src="plugins/jqvmap-thai-stable/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="plugins/jqvmap-thai-stable/jqvmap/maps/jquery.vmap.thai.js"></script>
  <?php 
  if(isset($script)){
  foreach ($script as $key => $value) { ?>
    <script src="<?php echo $value;?>"></script>
  <?php } } ?>
  
  
  <script src="assets/toastr.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <img src="http://localhost/epetition/public_html/images/logo.jpg" alt="" style="width:auto;height:50px;">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <?php if(isset($assign->row['date_end'])){ ?>
      <li class="nav-item">
        <span class="text-danger">คุณได้รับสิทธ์ในการอนุมัติ ถึงวันที่ <?php echo (isset($assign->row['date_end'])?$assign->row['date_end']:''); ?></span>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php if(!empty($image)){ ?>
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="">
          <?php } ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $name; ?></a>
          <a href="#" class="d-block"><small><?php echo $role_name; ?></small></a>
          <a href="#" class="d-block"><small><?php echo $agency_title;?></small></a>
          <a href="#" class="d-block"><small>เข้าใช้งานเมื่อ: <?php echo $last_login; ?></small></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column menu-left" data-widget="treeview" role="menu" data-accordion="false">
          <?php if($menu[1]){ ?>
          <li class="nav-item">
            <a href="<?php echo route('home'); ?>" class="nav-link px-1" id="dashbord">
              <i class="nav-icon fas fa-home"></i>
              <p>
                หน้าหลัก
              </p>
            </a>
          </li>
          <?php } ?>
          <?php if($menu[2]){ ?>
          <li class="nav-item">
            <a href="<?php echo route('appeal'); ?>" class="nav-link px-1" id="appeal">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                เรื่องร้องเรียน <label class="text-danger"><?php echo ($noti>0?' ( '.$noti.' )':'');?></label>
              </p>
            </a>
          </li>
          <?php } ?>
          <?php if($menu[20]){ ?>
          <li class="nav-item">
            <a href="<?php echo route('appeal/opm'); ?>" class="nav-link px-1" id="appealOPM">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                เรื่องร้องเรียนจากสำนักงานปลัด สำนักงานนายกรัฐมนตรี
              </p>
            </a>
          </li>
          <?php } ?>
          <?php if($menu[4]){ ?>
            <li class="nav-item">
            <a href="<?php echo route('progress'); ?>" class="nav-link px-1" id="progress">
              <i class="nav-icon far fa-address-book"></i>
              <p>
                ความก้าวหน้าเรื่องร้องเรียน
              </p>
            </a>
          </li>
          <?php } ?>
          <?php if($menu[5]){ ?>
          <li class="nav-item">
            <a href="#" class="nav-link px-1" id="report">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                รายงาน
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if($menu[6]){ ?>
              <li class="nav-item">
                <a href="<?php echo route('report/department'); ?>" class="nav-link px-1" id="department">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แยกตามหน่วยงาน</p>
                </a>
              </li>
              <?php } ?>
              <?php if($menu[7]){ ?>
              <li class="nav-item">
                <a href="<?php echo route('report/way'); ?>" class="nav-link px-1" id="way">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แยกตามช่องทางการร้องเรียน</p>
                </a>
              </li>
              <?php } ?>
              <?php if($menu[8]){ ?>
              <li class="nav-item">
                <a href="<?php echo route('report/zone'); ?>" class="nav-link px-1" id="zone">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แยกตามพื้นที่เขตตรวจ</p>
                </a>
              </li>
              <?php } ?>
              <?php if($menu[9]){ ?>
              <li class="nav-item">
                <a href="<?php echo route('report/mission'); ?>" class="nav-link px-1" id="mission">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แยกตามกลุ่มภารกิจ</p>
                </a>
              </li>
              <?php } ?>
              <?php if($menu[10]){ ?>
              <li class="nav-item">
                <a href="<?php echo route('report/land'); ?>" class="nav-link px-1" id="land">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แยกตามภูมิภาคและจังหวัด</p>
                </a>
              </li>
              <?php } ?>
              <?php if($menu[11]){ ?>
              <li class="nav-item">
                <a href="<?php echo route('report/problem'); ?>" class="nav-link px-1" id="problem">
                  <i class="far fa-circle nav-icon"></i>
                  <p>รายงานเวลาเฉลี่ยของแต่ละประเภทปัญหา</p>
                </a>
              </li>
              <?php } ?>
              <?php if($menu[12]){ ?>
              <li class="nav-item">
                <a href="<?php echo route('report/type'); ?>" class="nav-link px-1" id="type">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แยกตามประเภทปัญหาตามหัวข้อเรื่องร้องเรียน</p>
                </a>
              </li>
              <?php } ?>
              <?php if($menu[13]){ ?>
              <li class="nav-item">
                <a href="<?php echo route('report/progress'); ?>" class="nav-link px-1" id="progressReport">
                  <i class="far fa-circle nav-icon"></i>
                  <p>รายงานความก้าวหน้า</p>
                </a>
              </li>
              <?php } ?>
              <?php if($menu[14]){ ?>
              <li class="nav-item">
                <a href="<?php echo route('report/topic'); ?>" class="nav-link px-1" id="topic">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แยกตามหัวข้อเรื่องร้องเรียน</p>
                </a>
              </li>
              <?php } ?>
              <?php if($menu[15]){ ?>
              <li class="nav-item">
                <a href="<?php echo route('report/status'); ?>" class="nav-link px-1" id="status">
                  <i class="far fa-circle nav-icon"></i>
                  <p>สรุปผลการดำเนินงาน</p>
                </a>
              </li>
              <?php } ?>
              <?php if($menu[16]){ ?>
              <!-- <li class="nav-item">
                <a href="<?php echo route('report/satisfaction'); ?>" class="nav-link px-1" id="satisfaction">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ข้อเสนอแนะการใช้งานเว็บไซต์ e-Petition</p>
                </a>
              </li> -->
              <?php } ?>
            </ul>
          </li>
          <?php } ?>
          <?php if($menu[17]){ ?>
          <li class="nav-item">
            <a href="<?php echo route('user'); ?>" class="nav-link px-1" id="pageUser">
              <i class="nav-icon fas fa-user"></i>
              <p>
                ผู้ใช้งานทั้งหมด
              </p>
            </a>
          </li>
          <?php } ?>
          
          <?php if($menu[19]){ ?>
          <li class="nav-item">
            <a href="#" class="nav-link px-1" id="report">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                ตั้งค่า
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo route('setting'); ?>" class="nav-link px-1" id="pageSetting">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>ตั้งค่าระบบ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo route('setting/approve'); ?>" class="nav-link px-1" id="pageSetting">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>ตั้งค่าส่วนตัว การอนุมัติ</p>
                </a>
              </li>
              <?php if($menu[3]){ ?>
              <li class="nav-item">
                <a href="<?php echo route('topic'); ?>" class="nav-link px-1" id="pageTopic">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    ประเภทเรื่องร้องเรียน
                  </p>
                </a>
              </li>
              <?php } ?>
              <?php if($menu[18]){ ?>
              <li class="nav-item">
                <a href="<?php echo route('user/group'); ?>" class="nav-link px-1" id="pagePermission">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    กำหนดสิทธิ์ผู้ใช้งาน
                  </p>
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a href="<?php echo route('setting/prefix'); ?>" class="nav-link px-1" id="pageSetting">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>คำนำหน้า</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo route('setting/part'); ?>" class="nav-link px-1" id="pageSetting">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>เขตที่ตรวจ</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo route('setting/provinces'); ?>" class="nav-link px-1" id="pageSetting">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>จังหวัด</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo route('setting/position'); ?>" class="nav-link px-1" id="pageSetting">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>ตำแหน่ง</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo route('setting/agency'); ?>" class="nav-link px-1" id="pageSetting">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>หน่วยงาน</p>
                </a>
              </li>
              
            </ul>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a href="<?php echo route('login'); ?>" class="nav-link px-1" id="">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                ออกจากระบบ
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <style>
    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
      color: #000 !important;
    }
   .nav-link.px-1.active .text-danger{
    color:#fff !important;
   }
  </style>