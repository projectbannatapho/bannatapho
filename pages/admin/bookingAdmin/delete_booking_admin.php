<?php
session_start();
require('../../conn.php');


$sql = "UPDATE `booking` SET `status`='7' WHERE `booking_id`='".$_GET['id']."'";
$result = $conn->query($sql);

if ($result === true) {
  echo "
    <script>
      alert('ยกเลิกการจองเรียบร้อย')
      window.location.href = 'booking_admin.php'
    </script>
  ";
}else{
  echo "
    <script>
      alert('ยกเลิกการจองไม่สำเร็จ กรุณาลองอีกครั้ง')
      window.location.href = 'booking_admin.php'
    </script>
  ";
}



?>