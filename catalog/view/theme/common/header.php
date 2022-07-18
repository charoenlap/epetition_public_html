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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <style>
      *{
        font-family: 'Prompt', sans-serif;
      }
    </style>


</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-theme">
        <div class="container">
        <a class="navbar-brand" href="<?php echo route('home'); ?>"><img src="images/logo.jpg" alt="" class="w-50" style="width: 65% !important;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav menu-theme ml-md-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo route('home'); ?>">หน้าหลัก</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www2.energy.go.th/th/#1" target="_blank">เกี่ยวกับกระทรวง</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo route('home/map'); ?>">แผนที่กระทรวง</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://e-petition.energy.go.th/admin_back_office/" target="_blank">เข้าสู่ระบบ</a>
            </li>
          </ul>
        </div>
        </div>
    </nav>