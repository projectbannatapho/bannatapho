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
    body, html {
      height: 100%;
    }

    img {
      background-image: url("../../images/LINE_ALBUM_ep1_240415_1.jpg");
      opacity: 0.6;
      width: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .card{
      -webkit-box-shadow: 0 12px 34px rgba(0, 0, 0, 0.12);
      -moz-box-shadow: 0 12px 34px rgba(0, 0, 0, 0.12);
      box-shadow: 0 12px 34px rgba(0, 0, 0, 0.12);
    }

  </style>
</head>
<body>
<img src="../../images/LINE_ALBUM_ep1_240415_1.jpg" >
<div class="container" >
  
  <div class="card" style="margin-top: -140%;">
    <form action="save_register.php" method="POST">
    <input type="hidden" value="user" name="level">
    <div class="card-body">
      <center><h2>สมัครสมาชิก</h2></center>
      <div class="row col-4 offset-4 mt-4">
        <div class="mb-3">
          <label for="full_name" class="form-label">ชื่อ-นามสกุล</label>
          <input 
            type="text" 
            class="form-control" 
            name="full_name" 
            id="full_name" 
            placeholder="ชื่อ-นามสกุล"
          >
        </div>
        <div class="mb-3">
          <label for="tel" class="form-label">เบอร์โทร</label>
          <input 
            type="text" 
            class="form-control" 
            name="tel" 
            id="tel" 
            placeholder="เบอร์โทร"
          >
        </div>
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
        <div class="row mt-4">
          <div class="col-auto offset-3">
            <a href="/<?= $project_name?>/" class="btn btn-warning">ย้อนกลับ</a>
          </div>
          |
          <div class="col-auto">
            <button type="submit" class="btn btn-success">สมัคสมาชิก</button>
          </div>
        </div>
      </div>
    </div>
    </form>

  </div>
  
  <div class="mt-5"></div>
</div>



</body>
</html>
