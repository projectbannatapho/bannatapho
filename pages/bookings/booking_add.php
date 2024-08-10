<?php
session_start();
include("../conn.php");

if (empty($_SESSION['level']) && ($_SESSION["level"] == '')){
  echo "
    <script>
      alert('กรุณาเข้าสู่ระบบ เพื่อทำการจอง')
      window.location.href = '/$project_name/'
    </script>
  ";
}

$packages = $conn->query("SELECT * FROM `packages`");
$users = $conn->query("SELECT * FROM `user` WHERE `user_id` = '".$_SESSION['user_id']."'");
$user = $users->fetch_array();

$booking_id   = "";
$user_id      = $user['user_id'];
$date_booking = "";
$package_id   = "";
$full_name    = $user['full_name'];
$tel          = $user['tel'];
$email        = $user['email'];
$total_child  = "";
$total_adult  = "";
$total_group  = "";
$note         = "";

if (isset($_GET['id'])) {
  $booking_id = $conn->query("SELECT * FROM `booking` WHERE `booking_id` = '".$_GET['id']."'");
  $b = $booking_id->fetch_array();

  $users = $conn->query("SELECT * FROM `user` WHERE `user_id` = '".$b['user_id']."'");
  $user = $users->fetch_array();

  $packageins = $conn->query("SELECT * FROM `packages` WHERE `package_id` = '".$b['package_id']."'");
  $p = $packageins->fetch_array();

  $booking_id   = $b['booking_id'];
  $user_id      = $user['user_id'];
  $date_booking = $b['date_booking'];
  $package_id   = $b['package_id'];
  $full_name    = $user['full_name'];
  $tel          = $user['tel'];
  $email        = $user['email'];
  $total_child  = $b['total_child'];
  $total_adult  = $b['total_adult'];
  $total_group  = $b['total_group'];
  $note         = $b['note'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("../layouts/title.php")?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>



<?php include("../layouts/navbar.php")?>

<div class="container mt-5">

  <div class="card">
    <form action="save_booking.php" method="POST">
    <input type="hidden" name="user_id" value="<?= $user['user_id']?>">
    <input type="hidden" name="booking_id" value="<?= $booking_id ?>">
    <div class="card-body">
      <center><h3>แบบฟอร์มกรอกข้อมูลการจอง</h3><br></center>
      <div class="mb-3 row col-6 offset-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">แพ็คเกจ</label>
        <div class="col-sm-10">
          <select name="package_id" id="package_id" class="form-control" onchange="myFunction()">
            <?php foreach ($packages as $key => $value): ?>
            <?php if($package_id == $value['package_id']){?>
            <option value="<?= $value['package_id']?>" selected>
              <?= $value['package_name']?>
              
            </option>
            <?php }else{?>
            <option value="<?= $value['package_id']?>">
              <?= $value['package_name']?>
              
            </option>
            <?php }?>

            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="mb-3 row col-6 offset-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">วันที่</label>
        <div class="col-sm-10">
          <input 
            type="date" 
            class="form-control" 
            id="date_booking" 
            name="date_booking"
            value="<?= $date_booking ?>" 
          >
        </div>
      </div>
      <div class="mb-3 row col-6 offset-3">
        <label for="inputPassword" class="col-sm-2 col-form-label"><b>ข้อมูลผู้จอง</b></label> 
      </div>
      <div class="mb-3 row col-6 offset-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">ชื่อ-สกุล</label>
        <div class="col-sm-10">
          <input 
            type="text" 
            class="form-control" 
            id="full_name" 
            name="full_name" 
            value="<?= $full_name ?>"
          >
        </div>
      </div>
      <div class="mb-3 row col-6 offset-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">เบอร์โทร</label>
        <div class="col-sm-10">
          <input 
            type="text" 
            class="form-control" 
            id="tel" 
            name="tel" 
            value="<?= $tel ?>"
          >
        </div>
      </div>
      <div class="mb-3 row col-6 offset-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">E-mail</label>
        <div class="col-sm-10">
          <input 
            type="text" 
            class="form-control" 
            id="email" 
            name="email" 
            value="<?= $email ?>"
          >
        </div>
      </div>
      <div class="mb-3 row col-6 offset-3">
        <label for="inputPassword" class="col-sm-2 col-form-label"><b>จำนวนคน</b></label> 
      </div>
      <div id="div_one">
        <div class="mb-3 row col-6 offset-3">
          <label for="inputPassword" class="col-sm-2 col-form-label">เด็ก</label>
          <div class="col-sm-8">
            <input 
              type="text" 
              class="form-control" 
              id="total_child" 
              name="total_child" 
              value="<?= $total_child?>"
            >
          </div>
          <label for="inputPassword" class="col-sm-2 col-form-label">คน</label>
        </div>
        <div class="mb-3 row col-6 offset-3">
          <label for="inputPassword" class="col-sm-2 col-form-label">ผู้ใหญ่</label>
          <div class="col-sm-8">
            <input 
              type="text" 
              class="form-control" 
              id="total_adult" 
              name="total_adult" 
              value="<?= $total_adult?>"
            >
          </div>
          <label for="inputPassword" class="col-sm-2 col-form-label">คน</label>
        </div>
      </div>

      <div id="div_group">
        <div class="mb-3 row col-6 offset-3">
          <label for="inputPassword" class="col-sm-2 col-form-label">หมู่คณะ</label>
          <div class="col-sm-8">
            <input 
              type="text" 
              class="form-control" 
              id="total_group" 
              name="total_group" 
              value="<?= $total_group?>"
            >
          </div>
          <label for="inputPassword" class="col-sm-2 col-form-label">คน</label>
        </div>
      </div>
      <div class="mb-3 row col-6 offset-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">หมายเหตุ</label>
        <div class="col-sm-10">
          <textarea id="w3review" name="note" class="form-control" ><?= $note ?></textarea>
        </div>
      </div>

      <div class="mb-3 row col-6 offset-3">
        <font color="red">
        <label for="inputPassword" class="col-sm-2 col-form-label">หมายเหตุ</label>
        <div class="col-sm-10">
          <p>1. กรุณาจองล่วงหน้าอย่างน้อย 1 วัน</p>
          <p>2. กรอกข้อมูลและตรวจสอบข้อมูลให้ครบถ้วน</p>
          <p>3. จองแล้วกรุณาโอนมัดจำก่อน 50%</p>
          <p>4. กรณียกเลิกการจองไม่คืนมัดจำ</p>
        </div>
        </font>
      </div>
      <a href="booking.php" class="btn btn-warning offset-5">ย้อนกลับ</a>
      <button type="submit" class="btn btn-success">ถัดไป</button>
    </div>
  </div>
  </form>
  <div class="mt-5"></div>
</div>



</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function () {
  var e = document.getElementById("package_id");
  var value = e.value;

  $.ajax({
    type: "POST",
    url:'checkpackage.php',
    data: {"package_id": value}, //sending the data to page.php
    success: function(data) {  
        if (data === 'รายคน') {
          document.getElementById('div_one').style.display ='block';
          document.getElementById('div_group').style.display ='none';
        }else{
          document.getElementById('div_one').style.display ='none';
          document.getElementById('div_group').style.display ='block';
        }
    }
  });
});

function myFunction() {
  var package_id = document.getElementById("package_id").value;
  $.ajax({
    type: "POST",
    url:'checkpackage.php',
    data: {"package_id": package_id}, //sending the data to page.php
    success: function(data) {  
        if (data === 'รายคน') {
          document.getElementById('div_one').style.display ='block';
          document.getElementById('div_group').style.display ='none';
        }else{
          document.getElementById('div_one').style.display ='none';
          document.getElementById('div_group').style.display ='block';
        }
    }
  });
}
</script>
</html>
