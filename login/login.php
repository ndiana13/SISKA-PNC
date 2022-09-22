<?php  
session_start();
include '../config.php';
include "function.php";
// Fungsi Login
if (isset($_POST['submit'])) {
  if  (login($_POST)>0){
      
    }else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISKA | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Shortcut Icon -->
  <link rel="shortcut icon" href="../dist/img/pnc.png">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-info">
    <div class="card-header text-center">
      <img src="../dist/img/pnc.png" width="120px" height="120px"><br>
      <a href="../../index2.html" class="h2"><b>SISKA</b> PNC</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Log in untuk masuk SISKA.</p>

      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <p class="mb-1">
              <a href="forgot_password.php">I forgot my password</a>
            </p>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="submit" >Log In</button>     
          </div>
        </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
