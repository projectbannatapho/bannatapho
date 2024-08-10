<?php
session_start();
include("../conn.php");

$email = $_POST['email'];

$users = $conn->query("SELECT * FROM `user` WHERE `email` = '".$email."'");
$user = $users->fetch_array();

$user_id = $user['user_id'];

if ($users !== false && $users->num_rows <= 0){
  	echo "
      <script>
        alert('ไม่พบข้อมูล email กรุณาลองอีกครั้ง')
        window.location.href = 'forgotpassword.php'
      </script>
    ";
      
}else{
	echo "
      <script>
        window.location.href = 'changepassword.php?id=$user_id'
      </script>
    ";
}





?>