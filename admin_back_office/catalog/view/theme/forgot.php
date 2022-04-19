<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Petition - ลิมรหัสผ่าน</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
      <div class="text-center">
        <img src="../images/logo.jpg" alt="" style="width:250px;height:auto;">
      </div>
      <form action="#" method="post" id="form-login">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="E-mail" id="email" name="email" value="" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div id="alert" class="text-success"></div>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">ลืมรหัสผ่าน</button>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-12 text-right">
            <a href="<?php echo route('login');?>">กลับสู่หน้าเข้าสู่ระบบ</a>
          </div>
        </div>
      </form> 

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
  <style>
    .login-box, .register-box {
      width: 460px;
    }
  </style>
  <script>
    $(document).on('submit','#form-login',function(e){
      var ele = $('#form-login');
      $.ajax({
        url: 'index.php?route=login/forgot',
        type: 'POST',
        dataType: 'html',
        data: ele.serialize(),
      })
      .done(function(html) {
        console.log("success");
        console.log(html);
        $('#alert').html(html);
      })
      .fail(function(a,b,c) {
        console.log("error");
        console.log(a);console.log(b);console.log(c);
      })
      .always(function() {
        console.log("complete");
      });
      
      e.preventDefault();
    });
  </script>
</body>
</html>
