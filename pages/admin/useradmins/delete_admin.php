<?php
session_start();
require('../../conn.php');


$sql = "DELETE FROM `user` WHERE `user_id` = '".$_GET['id']."'";
$result = $conn->query($sql);

if ($result === true) {
  echo "
    <script>
      alert('ลบข้อมูลเรียบร้อย')
      window.location.href = 'list_admins.php'
    </script>
  ";
}else{
  echo "
    <script>
      alert('ลบข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง')
      window.location.href = 'list_admins.php'
    </script>
  ";
}



?>