<?php
session_start();
include("../conn.php")

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("../layouts/title.php")?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style type="text/css">
    .border-login{
      border-bottom: solid groove; 
      border-right: solid groove; 
      border-top: solid groove;
      margin-left: -12px;
      -webkit-box-shadow: 0 12px 34px rgba(0, 0, 0, 0.12);
      -moz-box-shadow: 0 12px 34px rgba(0, 0, 0, 0.12);
      box-shadow: 0 12px 34px rgba(0, 0, 0, 0.12);
    }
    a:link { text-decoration: none; }
    a:visited { text-decoration: none; }
    a:hover { text-decoration: none; color: black; }
    a:active { text-decoration: none; }
    a{
      color: gray;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row mt-4">
    <div class="col-6">
      <img src="../../images/LINE_ALBUM_3_240115_16.jpg" width="100%" height="680">
    </div>
    <div class="col-6 border-login">
      <br><br>
      <div class="row mt-5">
        <center>
        <h3>WELCOME</h3>
        <h6>SIGN TO BE CONTINUE</h6>
        </center>
      </div>
      <form action="checklogin.php" method="POST">
      <div class="row col-8 offset-2 mt-2">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input 
            type="email" 
            class="form-control" 
            name="email" 
            id="email" 
            placeholder="name@example.com"
          >
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input 
            type="password" 
            class="form-control" 
            name="password" 
            id="password" 
            placeholder="*******"
          >
        </div>
        <div class="row">
          <div class="col-auto offset-6">
            <a href="register.php">ลงทะเบียน</a>
          </div>
          |
          <div class="col-auto">
            <a href="forgotpassword.php">ลืมรหัสผ่าน</a>
          </div>
        </div>
        <button type="submit" class="btn btn-success col-8 offset-2 mt-5">เข้าสู่ระบบ</button>
      </div>
      </form>

    </div>
  </div>

  
  <div class="mt-5"></div>
</div>



</body>
</html>
