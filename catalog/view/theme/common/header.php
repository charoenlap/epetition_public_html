<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="assets/bootstrap-4/css/bootstrap.min.css">
    <!-- css theme -->
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/css/master.css?time=<?php echo time();?>">
    <!-- icon -->
    <link href="assets/fontawesome-free/css/all.css" rel="stylesheet">

    <!-- <script src="assets/js/jquery-3.2.1.slim.min.js"></script> -->
    <script src="assets/js/jquery-3.6.0.js"></script>
    <script src="assets/bootstrap-4/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-theme">
        <div class="container">
        <a class="navbar-brand" href="<?php echo route('home'); ?>"><img src="images/logo.jpg" alt="" class="w-50"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav menu-theme ml-md-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo route('home'); ?>">หน้าหลัก</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">เกี่ยวกับหน่วยงาน</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">แผนที่หน่วยงาน</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="<?php echo route('member/signin'); ?>">เข้าสู่ระบบ</a>
            </li> -->
          </ul>
        </div>
        </div>
    </nav>