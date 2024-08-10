<?php
session_start();
include("../conn.php");


$full_name		= $_POST['full_name'];
$tel			= $_POST['tel'];
$email			= $_POST['email'];
$password		= $_POST['password'];
$level			= $_POST['level'];


$results = $conn->query("SELECT * FROM `user` WHERE `full_name` = '".$full_name."' OR `email` = '".$email."'");
if ($results !== false && $results->num_rows > 0){
	echo "
      <script>
        alert('พบข้อมูลซ้ำ กรุณาลองอีกครั้ง')
        window.location.href = 'register.php'
      </script>
    ";
	
}else{
	$insert = "INSERT INTO `user`(`full_name`, `email`, `password`, `tel`, `level`) VALUES ('".$full_name."','".$email."','".$password."','".$tel."','".$level."')";
	if ($conn->query($insert) === true) {
	      echo "
	        <script>
	          alert('สมัครสมาชิกเรียบร้อย กรุณาเข้าสู่ระบบ')
	          window.location.href = '/$project_name/'
	        </script>
	      ";
	    }else{
	      echo "
	        <script>
	          alert('สมัครสมาชิกไม่สำเร็จ กรุณาลองอีกครั้ง')
	          window.location.href = 'register.php'
	        </script>
	      ";
	    }
}
?>