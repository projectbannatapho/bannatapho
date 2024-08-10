<?php
session_start();
require('../conn.php');


$sql = "DELETE FROM `booking` WHERE `booking_id` = '".$_GET['id']."'";
$result = $conn->query($sql);

if ($result === true) {
  echo "
    <script>
      alert('ยกเลิกการจองเรียบร้อย')
      window.location.href = 'booking.php'
    </script>
  ";
}else{
  echo "
    <script>
      alert('ลบข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง')
      window.location.href = 'booking.php'
    </script>
  ";
}



?>