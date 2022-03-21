<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Petition</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
      <div class="text-center">
        <img src="../images/logo.jpg" alt="" style="width:250px;height:auto;">
      </div>
      <form action="<?php echo route('home');?>" method="post" id="form-login">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" id="username" name="username" value="opmegov">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password" value="opmegov">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div id="alert" class=""></div>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-6">
            <a href="#" id="btn-opm" class="btn btn-default btn-block">เข้าสู่ระบบ OPM</a>
          </div> -->
          <div class="col-6">
            <button type="button" id="btn-open-id" class="btn btn-default btn-block">เข้าสู่ระบบด้วย OpenID</button>
          </div>
          <div class="col-6">
            <button type="button" id="btn-ldap" class="btn btn-default btn-block">เข้าสู่ระบบด้วย AD</button>
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
<div id="result_ldap"></div>
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script>
    $(document).on('submit','#form-login',function(e){
      $('#alert').addClass('alert');
      $.ajax({
        url: 'index.php?route=home/login',
        type: 'POST',
        dataType: 'json',
        data: {
          username: $('#username').val(),
          password: $('#password').val()
        },
      })
      .done(function(json) {
        console.log(json);
        if(json.status=='success'){
          $('#alert').text(json.desc);
          $('#alert').addClass('alert-success');
          window.location='index.php?route=home';
        }else{
          $('#alert').text(json.desc);
          $('#alert').addClass('alert-danger');
        }
        console.log("success");
      })
      .fail(function(a,b,c) {
        console.log("error");
        console.log(a);
        console.log(b);
        console.log(c);
      })
      .always(function() {
        console.log("complete");
      });
      
      e.preventDefault();
    });
    $(document).on('click','#btn-open-id',function(e){
      window.location = 'openid/SSOLogin.php';
      // $.ajax({
      //   url: 'index.php?route=home/loginLdap',
      //   type: 'POST',
      //   dataType: 'json',
      //   data: {
      //     username: $('#username').val(),
      //     password: $('#password').val()
      //   },
      // })
      // .done(function(json) {
      //   console.log(json);

      //   if(json.detail.token_id!=''){
      //     window.location = 'index.php?route=home';
      //   }
      //   console.log("success");
      // })
      // .fail(function(a,b,c) {
      //   console.log(a);
      //   console.log(b);
      //   console.log(c);
      //   console.log("error");
      // })
      // .always(function() {
      //   console.log("complete");
      // });
      // e.preventDefault();
    });
    $(document).on('click','#btn-ldap',function(e){
      $('#alert').html('เริ่มการเข้าสู่ระบบด้วย LDAP');
      $.ajax({
        url: 'index.php?route=home/loginLdap',
        type: 'POST',
        // dataType: 'json',
        data: {
          username: $('#username').val(),
          password: $('#password').val()
        },
      })
      .done(function(json) {
        // $('#alert').html(json);
          // window.location = 'index.php?route=home';
          if(json.status=='success'){
            $('#alert').text(json.desc);
            $('#alert').addClass('alert-success');
            window.location='index.php?route=home';
          }else{
            $('#alert').text(json.desc);
            $('#alert').addClass('alert-danger');
          }
        console.log("success");
      })
      .fail(function(a,b,c) {
        $('#alert').html('เข้าสู่ระบบด้วย ldap ไม่สำเร็จ<br>'+a.responseText);
        console.log(a);
        console.log(b);
        console.log(c);
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      e.preventDefault();
    });
  </script>
  <style>
    .login-box, .register-box {
      width: 460px;
    }
  </style>
</body>
</html>
