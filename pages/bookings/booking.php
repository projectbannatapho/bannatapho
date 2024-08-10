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


$bookings = $conn->query("SELECT * FROM `booking` WHERE `user_id` = '".$_SESSION['user_id']."'");

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
      <div class="row mt-3">
        <center>
          <h1> <img src="../../images/calendar.png" style="width: 50px"> การจองรอบการเข้าชม</h1>
          <div class="mt-5"></div>
          <a href="booking_add.php" class="btn btn-success col-2">จองเลย</a><br>
          <div class="mt-3"></div>
          <font color="gray"><h4>* เปิดจอง 24 ชั่วโมง *</h4></font><br>
          <font color="gray">หมายเหตุ : เมื่อการจองหนึ่งรอบ จำนวนไม่ถึงตามที่กำหนด ทางผู้ดูแลขอยกเลิกการจองของท่านทุกกรณี และจะส่ง E-mail ให้ท่านทราบภายในสามวัน</font>
          <br><br>
        </center>
      </div>

      <div class="row mt-3">
          <h3>ประวัติการจอง</h3>
          <table class="table table-bordered">
            <thead>
                <tr align="center">
                  <th scope="col">ลำดับ</th>
                  <th scope="col">ชื่อผู้จอง</th>
                  <th scope="col">แพ็คเกจ</th>
                  <th scope="col">วันที่จอง</th>
                  <th scope="col">ราคารวม</th>
                  <th scope="col">สถานะ</th>
                  <th scope="col">ตัวเลือก</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($bookings as $key => $value): ?>
              <?php 
                $users = $conn->query("SELECT * FROM `user` WHERE `user_id` = '".$value['user_id']."'");
                $user = $users->fetch_array();

                $packages = $conn->query("SELECT * FROM `packages` WHERE `package_id` = '".$value['package_id']."'");
                $p = $packages->fetch_array();
              ?>
              <tr>
                <td><?= $key+1?></td>
                <td><?= $user['full_name']?></td>
                <td><?= $p['package_name']?></td>
                <td><?= DateThai($value['date_booking'])?></td>
                <td><?= number_format($value['total_price'],2)?></td>
                <td><?= $status_Arr[$value['status']-1] ?></td>
                <td>
                  <?php if($value['status'] == '1'){?>
                  <a 
                    href="confirm_booking.php?id=<?= $value['booking_id']?>" 
                    class="btn btn-primary"
                  >
                    ยืนยันการจอง
                  </a>
                  <?php } ?>
                  <?php if($value['status'] == '3'){?>
                  <a 
                    href="confirm_booking.php?id=<?= $value['booking_id']?>" 
                    class="btn btn-success"
                  >
                    ชำระเงิน
                  </a>
                  <?php } ?>
                  <?php if($value['status'] != '5'){?>
                  <a 
                    href="dalete_booking.php?id=<?= $value['booking_id']?>" 
                    class="btn btn-danger"
                  >
                    ยกเลิกการจอง
                  </a>
                  <?php } ?>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
      </div>
    </div>


    <div class="mt-2"></div>
  </div>

  <div class="mt-5"></div>
</div>



</body>
</html>
