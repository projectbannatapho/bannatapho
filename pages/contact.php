<?php
session_start();
include("conn.php")

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("layouts/title.php")?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  #rcorners1 {
    border-radius: 25px;
    background: #73AD21;
    padding: 10 px; 
    margin-bottom: 30px;
    text-align: center;
    background-color: #6F3B06;
    color: #fff;
        
  }
  </style>
</head>
<body>

<?php include("layouts/navbar.php")?>
<div class="container">
  <div class=" mt-5">
    
      <div class="row">
        <div class="col-6">
          <div class=" row">
            <label for="staticEmail" class="col-sm-3 col-form-label" id="rcorners1">ที่ตั้ง</label>
            <label for="staticEmail" class="col-sm-8 col-form-label">
              กลุ่มทอผ้าบ้านนาตาโพ เลขที่ 29 หมู่ 3 บ้านนาตาโพ <br>ตำบลบ้านบึง อำเภอบ้านไร่ จังหวัดอุทัยธานี
            </label>
          </div>
          <div class=" row">
            <label for="staticEmail" class="col-sm-3 col-form-label" id="rcorners1">Facebook</label>
            <label for="staticEmail" class="col-sm-8 col-form-label">
              BANNATAPO กลุ่มทอผ้าบ้านนาตาโพ
            </label>
          </div>
          <div class=" row">
            <label for="staticEmail" class="col-sm-3 col-form-label" id="rcorners1">ติดต่อ</label>
            <label for="staticEmail" class="col-sm-8 col-form-label">
              081-971-0521
            </label>
          </div>
          <div class=" row">
            <label for="staticEmail" class="col-sm-3 col-form-label" id="rcorners1">E-mail</label>
            <label for="staticEmail" class="col-sm-8 col-form-label">
              DEWZILL07@GMAIL.COM
            </label>
          </div>
        </div>
        <div class="col-6" style="background-color: #D3D3D3; border-radius: 25px;">
          <br>
          <center>
            <p>ช่องทางการชำระเงิน</p>
            <img src="../assets/logo_bank.png" height="100">
            <br><br>
            <p>ไทยพาณิชน์ : 408-418329-8</p>
            <p>ชื่อบัญชี : จันทรา แก้วเอี่ยม</p>
          </center>
        </div>
      </div>

  </div>
  <div class="mt-5"></div>
</div>



</body>
</html>
