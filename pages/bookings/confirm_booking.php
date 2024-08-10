<?php
session_start();
include("../conn.php");

$bookings = $conn->query("SELECT * FROM `booking` WHERE `booking_id` = '".$_GET['id']."'");
$b = $bookings->fetch_array();

$users = $conn->query("SELECT * FROM `user` WHERE `user_id` = '".$b['user_id']."'");
$user = $users->fetch_array();

$packages = $conn->query("SELECT * FROM `packages` WHERE `package_id` = '".$b['package_id']."'");
$p = $packages->fetch_array();

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
    <div class="card-body">
      <div class="row">

        <div class="col-6" style="background-color: #D3D3D3; border-radius: 25px;">
          <br>
          <center><h4>ตรวจสอบข้อมูลการจอง</h4><br></center>
          <div class="row">
            <label for="staticEmail" class="col-sm-4 col-form-label"><b>วันที่จอง</b></label>
            <label for="staticEmail" class="col-sm-4 col-form-label">
              <?= DateThai($b['date_booking'])?>  
            </label>
          </div>
          <div class="row">
            <label for="staticEmail" class="col-sm-4 col-form-label"><b>ชื่อ-นามสกุล</b></label>
            <label for="staticEmail" class="col-sm-4 col-form-label">
              <?= $user['full_name']?>  
            </label>
          </div>
          <div class="row">
            <label for="staticEmail" class="col-sm-4 col-form-label"><b>E-mail</b></label>
            <label for="staticEmail" class="col-sm-4 col-form-label">
              <?= $user['email']?>  
            </label>
          </div>
          <div class="row">
            <label for="staticEmail" class="col-sm-4 col-form-label"><b>เบอร์โทร</b></label>
            <label for="staticEmail" class="col-sm-4 col-form-label">
              <?= $user['tel']?>  
            </label>
          </div>
          <div class="row">
            <label for="staticEmail" class="col-sm-4 col-form-label"><b>จำนวนผู้เข้าชม</b></label>
            <div class="col-6">
              <?php if ($p['package_type'] == 'รายคน'){?>
              <div class="row">
                <label for="staticEmail" class="col-sm-4 col-form-label">เด็ก</label>
                <label for="staticEmail" class="col-sm-2 col-form-label">
                  <?= $b['total_child']?>  
                </label>
                <label for="staticEmail" class="col-sm-2 col-form-label">คน</label>
              </div>
              <div class="row">
                <label for="staticEmail" class="col-sm-4 col-form-label">ผู้ใหญ่</label>
                <label for="staticEmail" class="col-sm-2 col-form-label">
                  <?= $b['total_adult']?>  
                </label>
                <label for="staticEmail" class="col-sm-2 col-form-label">คน</label>
              </div>
              <?php }else{ ?>
              <div class=" row">
                <label for="staticEmail" class="col-sm-4 col-form-label">
                  แบบหมู่คณะ 
                </label>
                <label for="staticEmail" class="col-sm-2 col-form-label">
                  <?= $b['total_group']?>
                </label>
                <label for="staticEmail" class="col-sm-2 col-form-label">คน</label>
              </div>
              <?php }?>
            </div>
          </div>
          <div class="row">
            <label for="staticEmail" class="col-sm-4 col-form-label"><b>ราคารวม</b></label>
            <label for="staticEmail" class="col-sm-4 col-form-label">
              <?= number_format($b['total_price'],2)?>  
            </label>
            <label for="staticEmail" class="col-sm-4 col-form-label"><b>บาท</b></label>
          </div>

          <br>
        </div>

        <div class="col-6">
          <br>
          <?php if($b['status'] == '1'){?>
          <center><h4>แนบหลักฐานมัดจำ</h4><br></center>
          <?php }?>
          <?php if($b['status'] == '3'){?>
          <center><h4>แนบหลักฐานการชำระเงิน</h4><br></center>
          <?php }?>
          <form action="save_confirm_booking.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="booking_id" value="<?= $b['booking_id']?>">
          <?php if($b['status'] == '1'){?>
          <input type="hidden" name="status" value="2">
          <?php }?>
          <?php if($b['status'] == '3'){?>
          <input type="hidden" name="status" value="4">
          <?php }?>
          <div class="row">
            <label for="staticEmail" class="col-sm-4 col-form-label"><b>ไทยพาณิชย์</b></label>
            <label for="staticEmail" class="col-sm-4 col-form-label">
              408-418329-8
            </label>
          </div>
          <div class="row">
            <label for="staticEmail" class="col-sm-4 col-form-label"><b>ชื่อบัญชี</b></label>
            <label for="staticEmail" class="col-sm-4 col-form-label">
              จันทรา แก้วเอี่ยม
            </label>
          </div>
          <div class="row mt-2">
            <label for="staticEmail" class="col-sm-4 col-form-label"><b>วันที่โอน</b></label>
            <div class="col-6">
              <input type="date" name="date_payment" class="form-control">
            </div>
          </div>
          <div class="row mt-2">
            <label for="staticEmail" class="col-sm-4 col-form-label"><b>เวลาที่โอน</b></label>
            <div class="col-6">
              <input type="time" name="time_payment" class="form-control">
            </div>
          </div>
          <div class="row mt-2">
            <label for="staticEmail" class="col-sm-4 col-form-label"><b>หลักฐานการโอน</b></label>
            <div class="col-6">
              <input type="file" name="slip_payment" class="form-control">
            </div>
          </div>
          <?php if($b['status'] == '1'){?>
          <div class="row">
            <label for="staticEmail" class="col-sm-4 col-form-label"><b>หมายเหตุ</b></label>
            <div class="col-6">
              <p>เมื่อจองแล้ว 1-2 วัน กรุณาตรวจสอบสถานะการจองของท่าน เมื่อได้รับการอนุมัติ กรุณาชำระเงินส่วนที่เหลือ</p>
            </div>
          </div>
          <?php }?>
          <div class="mt-4"></div>
          <center>
          <?php if($b['status'] == '1'){?>
          <a 
            href="booking_add.php?id=<?= $b['booking_id']?>"
            class="btn btn-warning"
          >
            แก้ไข
          </a>
          <?php }?>
          <a 
            href="booking_delete.php?id=<?= $b['booking_id']?>"
            class="btn btn-danger"
          >
            ยกเลิก
          </a>
          <button type="submit" class="btn btn-success">ยืนยันการจอง</button>
          </center>
          </form>
        </div>

      </div>
    </div>
  </div>
  <div class="mt-5"></div>
</div>



</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

</html>
