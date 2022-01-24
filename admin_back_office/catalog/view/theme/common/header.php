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
  <!-- css theme -->
  <link rel="stylesheet" href="dist/css/theme.css">
  <?php if(isset($style)){ 
      foreach ($style as $key => $value) { ?>
    <link rel="stylesheet" href="<?php echo $value;?>">
  <?php } } ?>
  <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
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
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- thailand -->
<link href="plugins/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
<script src="plugins/jqvmap-thai-stable/jqvmap/jquery.vmap.js"></script>
<script src="plugins/jqvmap-thai-stable/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="plugins/jqvmap-thai-stable/jqvmap/maps/jquery.vmap.thai.js"></script>
  <?php 
  if(isset($script)){
  foreach ($script as $key => $value) { ?>
    <script src="<?php echo $value;?>"></script>
  <?php } } ?>
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
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
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
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">สมชาย ใจดี (หัวหน้า)</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column menu-left" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo route('home'); ?>" class="nav-link px-1" id="dashbord">
              <i class="nav-icon fas fa-home"></i>
              <p>
                หน้าหลัก
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo route('appeal'); ?>" class="nav-link px-1" id="appeal">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                เรื่องร้องเรียน
                <span class="badge badge-danger right">5</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo route('topic'); ?>" class="nav-link px-1" id="pageTopic">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                ประเภทเรื่องร้องเรียน
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo route('progress'); ?>" class="nav-link px-1" id="progress">
              <i class="nav-icon far fa-address-book"></i>
              <p>
                ความก้าวหน้าเรื่องร้องเรียน
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link px-1" id="report">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                รายงาน
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo route('report/department'); ?>" class="nav-link px-1">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แยกตามหน่วยงาน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo route('report/way'); ?>" class="nav-link px-1">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แยกตามช่องทางการร้องเรียน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo route('report/zone'); ?>" class="nav-link px-1">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แยกตามพื้นที่เขตตรวจ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo route('report/mission'); ?>" class="nav-link px-1">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แยกตามกลุ่มภารกิจ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo route('report/land'); ?>" class="nav-link px-1">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แยกตามภูมิภาคและจังหวัด</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo route('report/problem'); ?>" class="nav-link px-1">
                  <i class="far fa-circle nav-icon"></i>
                  <p>รายงานเวลาเฉลี่ยของแต่ละประเภทปัญหา</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo route('report/type'); ?>" class="nav-link px-1">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แยกตามประเภทปัญหา</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo route('report/progress'); ?>" class="nav-link px-1">
                  <i class="far fa-circle nav-icon"></i>
                  <p>รายงานความก้าวหน้า</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo route('report/topic'); ?>" class="nav-link px-1">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แยกตามหัวข้อเรื่องร้องเรียน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo route('report/status'); ?>" class="nav-link px-1">
                  <i class="far fa-circle nav-icon"></i>
                  <p>สรุปผลการดำเนินงาน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo route('report/satisfaction'); ?>" class="nav-link px-1">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ข้อเสนอแนะการใช้งานเว็บไซต์ e-Petition</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo route('user'); ?>" class="nav-link px-1" id="pageUser">
              <i class="nav-icon fas fa-user"></i>
              <p>
                ผู้ใช้งานทั้งหมด
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo route('user/group'); ?>" class="nav-link px-1" id="pagePermission">
              <i class="nav-icon fas fa-user"></i>
              <p>
                กำหนดสิทธิ์ผู้ใช้งาน
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo route('setting'); ?>" class="nav-link px-1" id="pageSetting">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                ตั้งค่าระบบ
              </p>
            </a>
          </li>
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