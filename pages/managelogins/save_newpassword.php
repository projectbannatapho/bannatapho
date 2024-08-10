<?php
session_start();
include("../conn.php");


$new_password 	= $_POST['New_Password'];
$user_id 		= $_POST['user_id'];

$update = "UPDATE `user` SET `password`='".$new_password ."' WHERE `user_id`='".$user_id."'";

if ($conn->query($update) === true) {
  echo "
    <script>
      alert('เปลี่ยนรหัสผ่านเรียบร้อย กรุณาลองอีกครั้ง')
      window.location.href = '/$project_name/'
    </script>
  ";
}else{
  echo "
    <script>
      alert('เปลี่ยนรหัสผ่านไม่สำเร็จ กรุณาลองอีกครั้ง')
      window.location.href = '/$project_name/'
    </script>
  ";
}


?>